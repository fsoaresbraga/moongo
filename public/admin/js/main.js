$( document ).ready(function() {

    $('.money').mask('000.000.000.000.000,00', {reverse: true});
    
    $('.date').mask('00/00/0000');

    $('.js-example-basic-single').select2();


  
    
    
    var table = $('#footer-search').DataTable({

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

    });

    table.on( 'draw', function () {
        $('.paginate_button.previous').html("<button class='btn btn-out btn-warning btn-square'>Anterior</button>");
        $('.paginate_button.next').html("<button class='btn btn-out btn-warning btn-square'>Próximo</button>");
    } );
    
    
});