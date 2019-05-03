var amount = $("#amount").val();
pagamento();

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
        amount: amount,
        success: function(retorno) {
            // Retorna os meios de pagamento disponíveis.
            $('.meio-pagamento').append("<div>Cartão de Crédito</div>");
            $.each(retorno.paymentMethods.CREDIT_CARD.options, function (i, obj){
                // retornar imagens dos cartões
                $('.meio-pagamento').append("<span class='img-band'><img src='https://stc.pagseguro.uol.com.br"+obj.images.SMALL.path+"'></span>");
            });

            //retornando pagamento por boleto
            $('.meio-pagamento').append("<div>Boleto</div>");
            $('.meio-pagamento').append("<span class='img-band'><img src='https://stc.pagseguro.uol.com.br"+retorno.paymentMethods.BOLETO.options.BOLETO.images.SMALL.path+"'></span>");

            // retornando pagamento por débito online
            $('.meio-pagamento').append("<div>Débito Online</div>");
            $.each(retorno.paymentMethods.ONLINE_DEBIT.options, function (i, obj){
                // retornar imagens dos cartões
                $('.meio-pagamento').append("<span class='img-band'><img src='https://stc.pagseguro.uol.com.br"+obj.images.SMALL.path+"'></span>");
            });
        },
        error: function(retorno) {
            // Callback para chamadas que falharam.
        },
        complete: function(retorno) {
            // Callback para todas chamadas.
            //recuperaToken();
        }
    });
}

$('#numCartao').on('keyup', function(){
    var numCartao = $(this).val();
    var qtdDigitos = numCartao.length;

    if(qtdDigitos == 6){
        PagSeguroDirectPayment.getBrand({
            cardBin: numCartao,
            success: function(retorno) {
              //bandeira encontrada
              $('#msg-erro').empty();
              var imgBand = retorno.brand.name;
              $('.bandeira-cartao').html("<img src='https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/"+imgBand+".png'>");
              $("#bandeiraCartao").val(imgBand);
              recuperaParcelas(imgBand);
            },
            error: function(retorno) {
              //tratamento do erro
              $('.bandeira-cartao').empty();
              $('#msg-erro').html("Cartão inválido");
            }
        });
    }
});
//parcelamento da compra
function recuperaParcelas(bandeira){
    var parcelaSemJuros = $("#noInterestInstallmentQuantity").val();
    PagSeguroDirectPayment.getInstallments({
        
		amount: amount,
		//parcelas com juros
		maxInstallmentNoInterest: parcelaSemJuros,
		brand: bandeira,
		success: function(retorno){
            // Retorna as opções de parcelamento disponíveis
			//quantidade de parcelas
			$.each(retorno.installments, function(ia, obja){
				$.each(obja, function(ib, objb){
                    //formatar valor para real
                    var valorParcela = objb.installmentAmount.toFixed(2).replace(".",",");
					$('#qtdParcelas').show().append("<option value='"+objb.quantity+"' data-parcelas='"+objb.installmentAmount+"'>"+objb.quantity+"x R$"+valorParcela+"</option>")
				});
			});
		},
		error: function(retorno) {
			// callback para chamadas que falharam.
		},
		complete: function(retorno){
			// Callback para todas chamadas.
		}
    });
}
//valor da parcela no form
$("#qtdParcelas").change(function(){
    $('#valorParcelas').val($("#qtdParcelas").find(':selected').attr('data-parcelas'));
});


// recuperar hash do cartão
$("#formPagamento").on("submit", function(event){
    event.preventDefault();

    PagSeguroDirectPayment.createCardToken({
        cardNumber: $("#numCartao").val(), // Número do cartão de crédito
        brand: $("#bandeiraCartao").val(), // Bandeira do cartão
        cvv: $("#cvvCartao").val(), // CVV do cartão
        expirationMonth: $("#mesCartao").val(), // Mês da expiração do cartão
        expirationYear: $("#anoCartao").val(), // Ano da expiração do cartão, é necessário os 4 dígitos.
        success: function(retorno) {
            // Retorna o cartão tokenizado.
            $("#tokenCartao").val(retorno.card.token);
        },
        error: function(retorno) {
            // Callback para chamadas que falharam.
        },
        complete: function(retorno) {
            // Callback para todas chamadas.
            recuperaHash();
        }
    });
});

function recuperaHash (){
    PagSeguroDirectPayment.onSenderHashReady(function(retorno){
        if(retorno.status == 'error') {
            console.log(retorno.message);
            return false;
        }else{
            $("#hashCartao").val(retorno.senderHash); //Hash estará disponível nesta variável.
            var dados = $("#formPagamento").serialize();
            console.log(dados);

            var endereco = jQuery('.endereco').attr("data-endereco");
            $.ajax({
                method: "POST",
                url: endereco + "processa_pagamento.php",
                data: dados,
                dataType: "json",
                success: function(retorna){
                    console.log("Sucesso" + JSON.stringify(retorna));
                },
                error: function(retorna){
                    console.log("Erro");
                }
            });
        }
    });
}