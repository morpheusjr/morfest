<?php

$resposta = new stdClass();
$resposta->id = $_POST['id'];
$resposta->nome = $_POST['nome'];
$resposta->email = $_POST['email'];
$resposta->idade = $_POST['idade'];

/* Fazendo varios processamento de dados maneiro */

echo json_encode($resposta);
