$( document ).ready(function() {
    let itens = JSON.parse(localStorage.getItem('products'));
    var STATE = {
	    products: itens,
        total: 0
    };

    cart = () => {
        var containerProdutos = document.getElementById('containerCart');
        if(containerProdutos != null) {
            containerProdutos.innerHTML = "";

            if(STATE.products != null) {
                STATE.products.map((item) => {
                    var price = '';
                    price = parseInt(item.price.replace(/[\D]+/g,''));
                    price = price + '';
                    price = price.replace(/([0-9]{2})$/g, ",$1");
    
                    if (price.length > 6) {
                        price = price.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
                    }
    
                    containerProdutos.innerHTML += `
                        <div class="cart-product-wrap" >
                            <div class="thumb" style="width:90px">
                                <img src="https://www.moongo.com.br/assets/img/${item.image}"  width="70px" alt="img">
                            </div>
                            <div class="media-body">
                                <h6>${item.title}</h6>
                                <div class="row">
                                    <div class="col-5">
                                        <span class="priceCheckout">R$ ${price}</span>
                                    </div>
                                    <div class="col-7">
                                        <form>
                                            <div class="quantity buttons_added">
                                                <input type="button" onclick="sumCartQtd('${item.id}')" value="-" class="minus">
                                                <input type="number" class="input-text qty text" step="1" min="1" max="${item.stock}" name="quantity_${item.id}" value="${item.qtd}">
                                                <input type="button" onclick="sumCartQtd('${item.id}')" value="+" class="plus">
                                            </div>
                                        </form>
                                    </div>
    
                                </div>
                            </div>
                            <div class="removeItemCart" onclick="removeCart('${item.id}')">
                                    <i class="fas fa-trash-alt"></i>
                            </div>
                        </div>
                    `;
                });
            } else {
                containerProdutos.innerHTML = `
                <section class="section section-projects">
                    <div class="row">
                        <div class="col-12">
                            <div class="box">
                                <div class="alert alert-warning" role="alert">
                                    <i class="far fa-frown"></i>
                                    Nenhum produto no Carrinho!
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                `;
    
            }
        }
        
    };


    removeCart = (id) => {

        var remove = STATE.products.filter(function(el) {
            return el.id != id;
        });

        localStorage.removeItem('products');
        STATE.products = null;
        if(remove.length > 0) {
            localStorage.setItem('products', JSON.stringify(remove));
            STATE.products = remove;
        }

        cart();
        sumTotalCart();
    }

    sumTotalCart = (id) => {
        var valueTotal = document.getElementById('valueTotal');
        if(valueTotal != null) {
            if(STATE.products != null) {
                var arrTotal = [];
                STATE.products.map(item => {
                    arrTotal.push((item.price * item.qtd));
                })
                STATE.total = arrTotal.reduce(function(previousValue, currentValue){
                    return previousValue + currentValue;
                }, 0);
    
    
                valueTotal.innerHTML = 'R$ '+  STATE.total.toLocaleString('pt-br', {minimumFractionDigits: 2});
            }else {
                valueTotal.innerHTML = '---';
            }
        }
       

    }

    sumCartQtd = (id) => {

        $(`[name=quantity_${id}]`).change(function () {
            var newQtd = $(this).val();
            //let itens = JSON.parse(localStorage.getItem('products'));
            STATE.products.map(item => {
                if(item.id == id) {
                    localStorage.removeItem('products')
                    Object.assign(item, { qtd: parseInt(newQtd)})
                    //atualzar storage
                }
            })

            localStorage.setItem('products', JSON.stringify(STATE.products));

            var arrTotal = [];
            STATE.products.map(item => {
                arrTotal.push((item.price * item.qtd));
            })

            STATE.total = arrTotal.reduce(function(previousValue, currentValue){
                return previousValue + currentValue;
            }, 0);


            var valueTotal = document.getElementById('valueTotal');
            valueTotal.innerHTML = 'R$ '+  STATE.total.toLocaleString('pt-br', {minimumFractionDigits: 2});

        });

        //console.log(STATE.products);

    }

    $('.submitPayment').click(function() {

        var user = $('#user').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        jQuery.ajax({
            url: `/send/carrinho`,
            method: 'POST',
            data: {products: STATE.products, total: STATE.total, user: user},
            success: function(result){

                if(result.type == 'success') {

                    window.location.href = window.location.origin + '/' + result.data.id + '/checkout'
                    localStorage.removeItem('products')


                }else {
                    Swal.fire({
                        position: 'top-end',
                        html:`<b style="font-size:12px">${result.data}</b>`,
                        showConfirmButton: false,
                        color: '#fff',
                        background: '#37a987',
                        timer: 2500
                    })
                }
                //console.log(result);

            },
            error: function(error) {
                console.log(error);
            }
        });
    })


    cart();
    sumTotalCart();
});