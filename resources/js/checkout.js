var verifyClass = $('.copyPix');
if(verifyClass.length > 0) {

    var copyText = new ClipLab(".copyPix"); 
    // true
    copyText.onCopied = function(copied) {
        message('Chave Pix copiada com Sucesso.', '#fff', '#37a987')
    };

    // false
    copyText.notCopied = function(copied) {
        message('Erro ao copiar chave PIX.', '#fff', '#db6077')
    }; 

    setTimeout(function(){
        
        $("#paymentOk").removeClass("d-none");
    }, 20000);
}
  