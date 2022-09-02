totalQtdCart = () => {
    if(document.getElementById("count-cart") != null) {
        let itens = JSON.parse(localStorage.getItem('products'));
        document.getElementById("count-cart").innerHTML =  (itens == null ? '0' : itens.length);

        if(itens != null){
            for($i = 0; $i < itens.length; $i++) {
                $(`#btn_prod_${itens[$i].id}`).removeClass("btn-base");
                $(`#btn_prod_${itens[$i].id}`).addClass("btn-success-cart");
                $(`#btn_prod_${itens[$i].id}`).attr("disabled","disabled");
            }
        }
    }
}

addToCart = (idProduct, idUser) => {

    event.preventDefault();

    //$(`#btn_prod_${idProduct}`).removeClass("btn-base");
    //$(`#btn_prod_${idProduct}`).addClass("btn-success-cart");
    //$(`#btn_prod_${idProduct}`).attr("disabled","disabled");



    verify = false;
    let  itens = JSON.parse(localStorage.getItem('products'));
    if(itens != null){
        for($i = 0; $i < itens.length; $i++) {
            if(itens[$i].id == idProduct) {
                verify = true;
            }
        }
    }

    if(!verify) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        jQuery.ajax({
            url: `/get/carrinho`,
            method: 'get',
            data: {product: idProduct, user: idUser},
            success: function(result){

                Object.assign(result.data, {'qtd': 1});
                let itens = JSON.parse(localStorage.getItem('products'));


                if(itens !== null && result.type == 'success'){

                    itens.push(result.data);
                    localStorage.setItem('products', JSON.stringify(itens));
                    totalQtdCart();
                    Swal.fire({
                        position: 'top-end',
                        html:'<b style="font-size:12px">Produto adicionado ao Carrinho.</b>',
                        showConfirmButton: false,
                        color: '#fff',
                        background: '#37a987',
                        timer: 2500
                    })
                } else if(result.type == 'success') {
                    localStorage.setItem('products', JSON.stringify([result.data]));
                    totalQtdCart();

                    Swal.fire({
                        position: 'top-end',
                        html:'<b style="font-size:12px">Produto adicionado ao Carrinho.</b>',
                        showConfirmButton: false,
                        color: '#fff',
                        background: '#37a987',
                        timer: 2500
                    })

                }

            },
            error: function(error) {
                //console.log(error);
            }
        });
    }else{
        Swal.fire({
            position: 'top-end',
            html:'<b style="font-size:12px">Produto já existe no Carrinho.</b>',
            showConfirmButton: false,
            color: '#666',
            background: '#fff3cd',
            timer: 2500

        })
    }
}


totalQtdCart();

