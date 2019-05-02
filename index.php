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
        <h2>Dados da Compra</h2>

        
        <input type="hidden" name="paymentMethod" id="paymentMethod" value="creditCard"><br><br>

        
        <input type="hidden" name="receiverEmail" id="receiverEmail" value="<?php echo EMAIL_LOJA; ?>"><br><br>

        
        <input type="hidden" name="currency" id="currency" value="<?php echo MOEDA_PAGAMENTO; ?>"><br><br>

        
        <input type="hidden" name="extraAmount" id="extraAmount" value=""><br><br>

        
        <input type="hidden" name="itemId1" id="itemId1" value="0001"><br><br>

        
        <input type="hidden" name="itemDescription1" id="itemDescription1" value="Curso de PHP Orientado a Objetos"><br><br>

        
        <input type="hidden" name="itemAmount1" id="itemAmount1" value="600.00"><br><br>

        
        <input type="hidden" name="itemQuantity1" id="itemQuantity1" value="1"><br><br>

        
        <input type="hidden" name="notificationURL" id="notificationURL" value="<?php echo URL_NOTIFICACAO; ?>"><br><br>

        
        <input type="hidden" name="reference" id="reference" value="1001"><br><br>

        <h2>Dados do Comprador</h2>

        <label>Nome</label>
        <input type="text" name="senderName" id="senderName" placeholder="Nome completo" required><br><br>

        <label>Data de Nascimento</label>
        <input type="text" name="creditCardHolderBirthDate" id="creditCardHolderBirthDate" placeholder="Data de Nascimento. Ex: 12/12/1912" required><br><br>

        <label>CPF</label>
        <input type="text" name="senderCPF" id="senderCPF" placeholder="CPF sem traço" required><br><br>

        <label>Telefone</label>
        <input type="text" name="senderAreaCode" id="senderAreaCode" placeholder="DDD" required>
        <input type="text" name="senderPhone" id="senderPhone" placeholder="Somente número" required><br><br>

        <label>E-mail</label>
        <input type="email" name="senderEmail" id="senderEmail" placeholder="E-mail do comprador" required><br><br>

        <h2>Endereço de Entrega</h2>
        <label>Entrega</label>
        <input type="text" name="shippingAddressRequired" id="shippingAddressRequired" value="true" required><br><br>

        <label>Logradouro</label>
        <input type="text" name="shippingAddressStreet" id="shippingAddressStreet" placeholder="Av. Rua"><br><br>

        <label>Número</label>
        <input type="text" name="shippingAddressNumber" id="shippingAddressNumber" placeholder="Número"><br><br>

        <label>Complemento</label>
        <input type="text" name="shippingAddressComplement" id="shippingAddressComplement" placeholder="Complemento"><br><br>

        <label>Bairro</label>
        <input type="text" name="shippingAddressDistrict" id="shippingAddressDistrict" placeholder="Bairro"><br><br>

        <label>CEP</label>
        <input type="text" name="shippingAddressPostalCode" id="shippingAddressPostalCode" placeholder="CEP sem traço"><br><br>

        <label>Cidade</label>
        <input type="text" name="shippingAddressCity" id="shippingAddressCity" placeholder="Cidade"><br><br>

        <label>Estado</label>
        <input type="text" name="shippingAddressState" id="shippingAddressState" placeholder="Sigla do Estado"><br><br>

        <label>País</label>
        <input type="text" name="shippingAddressCountry" id="shippingAddressCountry" value="BRL"><br><br>

        <label>Frete</label>
        <input type="radio" name="shippingType" value="1"> PAC
        <input type="radio" name="shippingType" value="2"> SEDEX
        <input type="radio" name="shippingType" value="3"> Sem frete<br><br>

        <label>Valor Frete</label>
        <input type="text" name="shippingCost" id="senderCPF" placeholder="Preço do frete. Ex: 2.10"><br><br>

        <h2>Dados do Cartão</h2>
        <label>Número do cartão</label>
        <input type="text" name="numCartao" id="numCartao"><br><br>

        <label>CVV do cartão</label>
        <input type="text" name="cvvCartao" id="cvvCartao" maxlength="3"><br><br>

        <label>Bandeira</label>
        <input type="text" name="bandeiraCartao" id="bandeiraCartao"><br><br>

        <label>Mês de Validade</label>
        <input type="text" name="mesCartao" id="mesCartao" maxlength="2"><br><br>

        <label>Ano de Validade</label>
        <input type="text" name="anoCartao" id="anoCartao" maxlength="4"><br><br>

        <label>Quantidades de Parcelas</label>
        <select name="qtdParcelas" id="qtdParcelas" class="qtd-parcelas">
            <option value="">Selecione</option>
        </select><br><br>

        <label>Valor Parcelas</label>
        <input type="text" name="valorParcelas" id="valorParcelas"><br><br>

        <label>CPF do Cartão</label>
        <input type="text" name="creditCardHolderCPF" id="creditCardHolderCPF" placeholder="CPF sem traço" required><br><br>

        <label>Nome no Cartão</label>
        <input type="text" name="creditCardHolderName" id="creditCardHolderName" placeholder="Nome igual ao escrito no cartão" required><br><br>

        <label>Token do cartão</label>
        <input type="text" name="tokenCartao" id="tokenCartao"><br><br>

        <label>Identificador com os dados do comprador </label>
        <input type="text" name="hashCartao" id="hashCartao"><br><br>

        <h2>Endereço do Cartão</h2>

        <label>Logradouro</label>
        <input type="text" name="billingAddressStreet" id="billingAddressStreet" placeholder="Av. Rua"><br><br>

        <label>Número</label>
        <input type="text" name="billingAddressNumber" id="billingAddressNumber" placeholder="Número"><br><br>

        <label>Complemento</label>
        <input type="text" name="billingAddressComplement" id="billingAddressComplement" placeholder="Complemento"><br><br>

        <label>Bairro</label>
        <input type="text" name="billingAddressDistrict" id="billingAddressDistrict" placeholder="Bairro"><br><br>

        <label>CEP</label>
        <input type="text" name="billingAddressPostalCode" id="billingAddressPostalCode" placeholder="CEP sem traço"><br><br>

        <label>Cidade</label>
        <input type="text" name="billingAddressCity" id="billingAddressCity" placeholder="Cidade"><br><br>

        <label>Estado</label>
        <input type="text" name="billingAddressState" id="billingAddressState" placeholder="Sigla do Estado"><br><br>

        <label>País</label>
        <input type="text" name="billingAddressCountry" id="billingAddressCountry" value="BRL"><br><br>

        <input type="submit" name="btnComprar" id="btnComprar" value="Comprar">

    </form>
    <div class="bandeira-cartao"></div>
    <div class="meio-pagamento"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="<?=SCRIPT_PAGSEGURO;?>"></script>
<script src="js/pagar.js"></script>
</body>
</html>