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
            // retornar o nome dos cartões de credito
            $.each(retorno.paymentMethods.CREDIT_CARD.options, function (i, obj){
                $('.meio-pagamento').append("<span>"+ obj.name +"</span>");
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