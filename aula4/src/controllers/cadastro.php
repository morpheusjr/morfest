<?php

require_once '../services/PerssoaService.php';
require_once '../models/Pessoa.php';


$resposta = new stdClass();
$resposta->pessoa = new Pessoa();
$resposta->pessoa->nome = $_POST['nome'];
$resposta->pessoa->email = $_POST['email'];
$resposta->pessoa->senha = $_POST['senha'];
$confSenha = $_POST['confSenha'];

$service = new PessoaService($resposta->pessoa);


if ($service->verificaSenha($confSenha)) {
    $resposta->status = $service->criaPessoa();
} else {
    $resposta->status = 400;
}

echo json_encode($resposta);
