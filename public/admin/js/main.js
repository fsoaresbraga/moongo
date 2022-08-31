$( document ).ready(function() {

    $('.money').mask('000.000.000.000.000,00', {reverse: true});

    $('.date').mask('00/00/0000');

    $('.js-example-basic-single').select2();





    var product = $('#footer-search').DataTable({

        initComplete: function () {
            // Apply the search
            this.api()
            .columns()
            .every(function () {
                var that = this;
                $('input', this.footer()).on('keyup change clear', function () {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });

        },

        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': ['nosort']
        }],

        "language": {
            "url": "/../admin/js/pt-BR.json"
        },

        "columns": [
            { "width": "36%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "4%" }
        ]

    });

    product.on( 'draw', function () {
        $('.paginate_button.previous').html("<button class='btn btn-out btn-warning btn-square'>Anterior</button>");
        $('.paginate_button.next').html("<button class='btn btn-out btn-warning btn-square'>Próximo</button>");
    } );

    var movement = $('#movement-search').DataTable({

        initComplete: function () {
            // Apply the search
            this.api()
            .columns()
            .every(function () {
                var that = this;
                $('input', this.footer()).on('keyup change clear', function () {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });

        },

        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': ['nosort']
        }],

        "language": {
            "url": "/../admin/js/pt-BR.json"
        },

        "columns": [
            { "width": "23%" },
            { "width": "13%" },
            { "width": "7%" },
            { "width": "7%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "6%" },
            { "width": "4%" }
        ]

    });

    movement.on( 'draw', function () {
        $('.paginate_button.previous').html("<button class='btn btn-out btn-warning btn-square'>Anterior</button>");
        $('.paginate_button.next').html("<button class='btn btn-out btn-warning btn-square'>Próximo</button>");
    } );



    deleteProduct = async(id) => {


        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success order-2',
                cancelButton: 'btn btn-danger order-3',
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Deletar Produto?',
            text: "Após essa ação será deleto o Produto!",
            icon: 'warning',
            background: '#191c24',
            showCancelButton: true,
            confirmButtonText: 'Sim, deletar!',
            cancelButtonText: 'Não, cancelar',
            reverseButtons: true,

        }).then(async (result) => {

            if (result.isConfirmed) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "delete",
                    dataType: "json",
                    url: "/area_restrita/deletar/produto/" + id,
                    data: {
                        'id': id,
                    },
                    success: function(data) {

                        if(data.type = 'success')
                        {
                            swalWithBootstrapButtons.fire({
                                title: 'Excluído',
                                text: "Produto Excluído com Sucesso.",
                                icon: 'success',
                                background: '#191c24'
                            })
                            setTimeout(function() {
                                location.reload();
                            }, 1500);
                        }
                        else{
                            swalWithBootstrapButtons.fire({
                                title: 'Cancelado',
                                text: "Produto não Encontrado.",
                                icon: 'success',
                                background: '#191c24'
                            })
                        }

                    }
                });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: 'Cancelado!',
                    text: "Produto não foi Deletado.",
                    icon: 'success',
                    background: '#191c24'
                })
            }

        })
    }

    deleteMovement = async(id) => {


        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success order-2',
                cancelButton: 'btn btn-danger order-3',
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Deletar Movimentaçao?',
            text: "Após essa ação será deleta á Movimentaçao!",
            icon: 'warning',
            background: '#191c24',
            showCancelButton: true,
            confirmButtonText: 'Sim, deletar!',
            cancelButtonText: 'Não, cancelar',
            reverseButtons: true,

        }).then(async (result) => {

            if (result.isConfirmed) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "delete",
                    dataType: "json",
                    url: "/area_restrita/deletar/movimentacao/" + id,
                    data: {
                        'id': id,
                    },
                    success: function(data) {

                        if(data.type = 'success')
                        {
                            swalWithBootstrapButtons.fire({
                                title: 'Excluída',
                                text: "Movimentaçao Excluída com Sucesso.",
                                icon: 'success',
                                background: '#191c24'
                            })

                            setTimeout(function() {
                                location.reload();
                            }, 1500);
                        }
                        else{
                            swalWithBootstrapButtons.fire({
                                title: 'Cancelada',
                                text: "Movimentaçao não Encontrada.",
                                icon: 'success',
                                background: '#191c24'
                            })
                        }

                    }
                });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: 'Cancelada!',
                    text: "Movimentaçao não foi Deletada.",
                    icon: 'success',
                    background: '#191c24'
                })
            }

        })
    }
});
