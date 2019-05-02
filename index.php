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
        <label>Número do cartão</label>
        <input type="text" name="numCartao" id="numCartao"><br>

        <label for="qtdParcelas" id="qtdParcelas">Parcelas</label>
        <select name="qtdParcelas" id="qtdParcelas" class="qtdParcelas">
            <option value="">Selecione</option>
        </select><br>

        <label>Valor de parcelas</label>
        <input type="text" name="valorParcelas" id="valorParcelas"><br>

        <label>Token do cartão</label>
        <input type="text" name="tokenCartao" id="tokenCartao" /><br>

        <label>Identificador dos dados do cartão</label>
        <input type="text" name="hashCartao" id="hashCartao" />
        <input type="submit" name="btnComprar" id="btnComprar" value="Comprar" />

    </form>
    <div class="bandeira-cartao"></div>
    <div class="meio-pagamento"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="<?=SCRIPT_PAGSEGURO;?>"></script>
<script src="js/pagar.js"></script>
</body>
</html>