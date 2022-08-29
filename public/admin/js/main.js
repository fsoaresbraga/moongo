$( document ).ready(function() {
   
    window.onload = function() {

        $('.loader').fadeOut();
    }


    $('.money').mask('000.000.000.000.000,00', {reverse: true});

    $('.js-example-basic-single').select2();
    
});