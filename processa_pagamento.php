<?php

    require 'config.php';

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $retorna = ['erro' => true, 'dados' => $dados];
    header('Content-Type: application/json');
    echo json_encode($retorna);