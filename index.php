<?php require './config.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PagSeguro Checkout transparent</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <span class="endereco" data-endereco="<?=URL;?>"></span>
    <span id="msg-erro"></span>
    <form action="" id="formPagamento">     
        <input type="hidden" name="paymentMethod" id="paymentMethod" value="creditCard">
        
        <input type="hidden" name="receiverEmail" id="receiverEmail" value="<?php echo EMAIL_LOJA; ?>">
        
        <input type="hidden" name="currency" id="currency" value="<?php echo MOEDA_PAGAMENTO; ?>">

        <!-- <input type="hidden" name="extraAmount" id="extraAmount" value=""> -->

        <input type="hidden" name="itemId1" id="itemId1" value="0001">

        <input type="hidden" name="itemDescription1" id="itemDescription1" value="Curso de PHP Orientado a Objetos">

        <input type="hidden" name="itemAmount1" id="itemAmount1" value="600.00">

        <input type="hidden" name="itemQuantity1" id="itemQuantity1" value="1">

        <input type="hidden" name="notificationURL" id="notificationURL" value="<?php echo URL_NOTIFICACAO; ?>">

        <input type="hidden" name="reference" id="reference" value="1001">

        <input type="hidden" name="amount" id="amount" value="600.00">

        <input type="hidden" name="noInterestInstallmentQuantity" id="noInterestInstallmentQuantity" value="3">

        <h2>Dados do Comprador</h2>

        <label>Nome</label>
        <input type="text" name="senderName" id="senderName" placeholder="Nome completo" required value="Jose Comprador"><br><br>

        <label>Data de Nascimento</label>
        <input type="text" name="creditCardHolderBirthDate" id="creditCardHolderBirthDate" placeholder="Data de Nascimento. Ex: 12/12/1912" required value="12/12/1992"><br><br>

        <label>CPF</label>
        <input type="text" name="senderCPF" id="senderCPF" placeholder="CPF sem traço" required value="22111944785"><br><br>

        <label>Telefone</label>
        <input type="text" name="senderAreaCode" id="senderAreaCode" placeholder="DDD" required value="11">
        <input type="text" name="senderPhone" id="senderPhone" placeholder="Somente número" required value="56273440"><br><br>

        <label>E-mail</label>
        <input type="email" name="senderEmail" id="senderEmail" placeholder="E-mail do comprador" required value="c35765315136898999659@sandbox.pagseguro.com.br"><br><br>

        <h2>Endereço de Entrega</h2>
        <label>Entrega</label>
        <input type="text" name="shippingAddressRequired" id="shippingAddressRequired" value="true" required><br><br>

        <label>Logradouro</label>
        <input type="text" name="shippingAddressStreet" id="shippingAddressStreet" placeholder="Av. Rua" value="Av. Brig. Faria Lima"><br><br>

        <label>Número</label>
        <input type="text" name="shippingAddressNumber" id="shippingAddressNumber" placeholder="Número" value="1384"><br><br>

        <label>Complemento</label>
        <input type="text" name="shippingAddressComplement" id="shippingAddressComplement" placeholder="Complemento" value="5o andar"><br><br>

        <label>Bairro</label>
        <input type="text" name="shippingAddressDistrict" id="shippingAddressDistrict" placeholder="Bairro" value="Jardim Paulistano"><br><br>

        <label>CEP</label>
        <input type="text" name="shippingAddressPostalCode" id="shippingAddressPostalCode" placeholder="CEP sem traço" value="01452002"><br><br>

        <label>Cidade</label>
        <input type="text" name="shippingAddressCity" id="shippingAddressCity" placeholder="Cidade" value="Sao Paulo"><br><br>

        <label>Estado</label>
        <input type="text" name="shippingAddressState" id="shippingAddressState" placeholder="Sigla do Estado" value="SP"><br><br>

        <label>País</label>
        <input type="text" name="shippingAddressCountry" id="shippingAddressCountry" value="BRL"><br><br>

        <label>Frete</label>
        <input type="radio" name="shippingType" value="1"> PAC
        <input type="radio" name="shippingType" value="2"> SEDEX
        <input type="radio" name="shippingType" value="3" checked> Sem frete<br><br>

        <label>Valor Frete</label>
        <input type="text" name="shippingCost" id="senderCPF" placeholder="Preço do frete. Ex: 0" value="0.00"><br><br>

        <h2>Dados do Cartão</h2>
        <label>Número do cartão</label>
        <input type="text" name="numCartao" id="numCartao">
        <span class="bandeira-cartao"></span><br><br>

        <label>CVV do cartão</label>
        <input type="text" name="cvvCartao" id="cvvCartao" maxlength="3" value='123'><br><br>

        <input type="hidden" name="bandeiraCartao" id="bandeiraCartao">

        <label>Mês de Validade</label>
        <input type="text" name="mesCartao" id="mesCartao" maxlength="2" value="12"><br><br>

        <label>Ano de Validade</label>
        <input type="text" name="anoCartao" id="anoCartao" maxlength="4" value="2030"><br><br>

        <label>Quantidades de Parcelas</label>
        <select name="qtdParcelas" id="qtdParcelas" class="qtd-parcelas">
            <option value="">Selecione</option>
        </select><br><br>

        <label>Valor Parcelas</label>
        <input type="text" name="valorParcelas" id="valorParcelas"><br><br>

        <label>CPF do Cartão</label>
        <input type="text" name="creditCardHolderCPF" id="creditCardHolderCPF" placeholder="CPF sem traço" required value="22111944785"><br><br>

        <label>Nome no Cartão</label>
        <input type="text" name="creditCardHolderName" id="creditCardHolderName" placeholder="Nome igual ao escrito no cartão" required value="27/10/1987"><br><br>

        <label>Token do cartão</label>
        <input type="text" name="tokenCartao" id="tokenCartao"><br><br>

        <label>Identificador com os dados do comprador </label>
        <input type="text" name="hashCartao" id="hashCartao"><br><br>

        <h2>Endereço do Cartão</h2>

        <label>Logradouro</label>
        <input type="text" name="billingAddressStreet" id="billingAddressStreet" placeholder="Av. Rua" value="Av. Brig. Faria Lima"><br><br>

        <label>Número</label>
        <input type="text" name="billingAddressNumber" id="billingAddressNumber" placeholder="Número" value="1384"><br><br>

        <label>Complemento</label>
        <input type="text" name="billingAddressComplement" id="billingAddressComplement" placeholder="Complemento" value="5o andar"><br><br>

        <label>Bairro</label>
        <input type="text" name="billingAddressDistrict" id="billingAddressDistrict" placeholder="Bairro" value="Jardim Paulistano"><br><br>

        <label>CEP</label>
        <input type="text" name="billingAddressPostalCode" id="billingAddressPostalCode" placeholder="CEP sem traço" value="01452002"><br><br>

        <label>Cidade</label>
        <input type="text" name="billingAddressCity" id="billingAddressCity" placeholder="Cidade" value="Sao Paulo"><br><br>

        <label>Estado</label>
        <input type="text" name="billingAddressState" id="billingAddressState" placeholder="Sigla do Estado" value="SP"><br><br>

        <label>País</label>
        <input type="text" name="billingAddressCountry" id="billingAddressCountry" value="BRL"><br><br>

        <input type="submit" name="btnComprar" id="btnComprar" value="Comprar">

    </form>
    
    <!-- <div class="meio-pagamento"></div> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="<?=SCRIPT_PAGSEGURO;?>"></script>
<script src="js/pagar.js"></script>
</body>
</html>