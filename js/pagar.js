function pagamento(){
    var endereco = jQuery('.endereco').attr("data-endereco");
    $.ajax({
        url: endereco + "pagamento.php",
        type: 'POST',
        dataType: 'json',
        success: function (retorno){
            PagSeguroDirectPayment.setSessionId(retorno.id);
        },
        complete: function(retorno) {
            // Callback para todas chamadas.
            listarMeiosPagamentos();
        }
    });
}

function listarMeiosPagamentos(){ 
    PagSeguroDirectPayment.getPaymentMethods({
        amount: 500.00,
        success: function(retorno) {
            // Retorna os meios de pagamento disponíveis.
            $.each(retorno.paymentMethods.CREDIT_CARD.options, function (i, obj){
                // retornar imagens dos cartões
                $('.meio-pagamento').append("<div>Cartão de Crédito</div>");
                $('.meio-pagamento').append("<span class='img-band'><img src='https://stc.pagseguro.uol.com.br"+obj.images.SMALL.path+"'></span>");
                // retornar o nome dos cartões de credito
                //$('.meio-pagamento').append("<span>"+ obj.name +"</span><br>");
                $('.meio-pagamento').append("<div>Boleto</div>");
                $('.meio-pagamento').append("<span class='img-band'><img src='https://stc.pagseguro.uol.com.br'"+retorno.paymentMethods.BOLETO.options.BOLETO.images.SMALL.path+"'></span>");
            });
        },
        error: function(retorno) {
            // Callback para chamadas que falharam.
        },
        complete: function(retorno) {
            // Callback para todas chamadas.
        }
    });
}