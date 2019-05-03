<?php

    $sandbox = true;

    define("URL", "https://pagseguroapptest.herokuapp.com/");

    if($sandbox){
        define("EMAIL_PAGSEGURO", "gabriel.modesto@nexttecnologiadainformacao.com.br");
        define("TOKEN_PAGSEGURO", "88CA315883C44686BAD5C8AF3FD830A2");
        define("URL_PAGSEGURO", "https://ws.sandbox.pagseguro.uol.com.br/v2");
        define("SCRIPT_PAGSEGURO", "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js");
        define("EMAIL_LOJA", "gabriel.modesto@nexttecnologiadainformacao.com.br");
        define("MOEDA_PAGAMENTO", "BRL");
        define("URL_NOTIFICACAO", "https://sualoja.com.br/notifica.html");
    }else{
        define("EMAIL_PAGSEGURO", "gabriel.modesto@nexttecnologiadainformacao.com.br");
        define("TOKEN_PAGSEGURO", "02235d7b-f337-4389-806d-c60f448c9c6c1ff0edc642e3ac5bcf424d710288f2d15baf-2421-43b1-a303-0ca71a6a68e4");
        define("URL_PAGSEGURO", "https://ws.pagseguro.uol.com.br/v2");
        define("SCRIPT_PAGSEGURO", "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js");
        define("EMAIL_LOJA", "gabriel.modesto@nexttecnologiadainformacao.com.br");
        define("MOEDA_PAGAMENTO", "BRL");
        define("URL_NOTIFICACAO", "https://sualoja.com.br/notifica.html");
    }