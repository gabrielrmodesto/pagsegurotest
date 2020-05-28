<?php

//Necessário testar em dominio com SSL
define ("URL", "url_page");

$sandbox = true;
if ($sandbox) {
    //Credenciais do SandBox
    define("EMAIL_PAGSEGURO", "email_user");
    define("TOKEN_PAGSEGURO", "token_user_sandbox");
    define("URL_PAGSEGURO", "https://ws.sandbox.pagseguro.uol.com.br/v2/");
    define("SCRIPT_PAGSEGURO", "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js");
    define("EMAIL_LOJA", "email_loja");
    define("MOEDA_PAGAMENTO", "BRL");
    define("URL_NOTIFICACAO", "https://sualoja.com.br/notifica.html");
} else {
    //Credenciais do PagSeguro
    define("EMAIL_PAGSEGURO", "email_user");
    define("TOKEN_PAGSEGURO", "token_user_prod");
    define("URL_PAGSEGURO", "https://ws.pagseguro.uol.com.br/v2/");
    define("SCRIPT_PAGSEGURO", "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js");
    define("EMAIL_LOJA", "email_loja");
    define("MOEDA_PAGAMENTO", "BRL");
    define("URL_NOTIFICACAO", "https://sualoja.com.br/notifica.html");
}
