<?php require './config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/style.css" rel="stylesheets">
</head>
<body>
    <button onclick="pagamento()">Pagar</button>
    <span class="endereco" data-endereco="<?=URL;?>"></span>

    <div class="meio-pagamento"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="<?=SCRIPT_PAGSEGURO;?>"></script>
<script src="js/pagar.js"></script>
</body>
</html>