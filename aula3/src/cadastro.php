<?php

/* MAIN */
require_once 'database.php';

$resposta = new stdClass();
$resposta->data = new stdClass();
$resposta->data->nome = $_POST['nome'];
$resposta->data->email = $_POST['email'];
$resposta->data->senha = $_POST['senha'];
$resposta->data->confSenha = $_POST['confSenha'];

if (verificaSenha($resposta)) {
    $resposta->status = criaPessoa($resposta);
} else {
    $resposta->status = 400;
}

echo json_encode($resposta);


/* END MAIN */

function verificaSenha($resposta)
{
    return ($resposta->data->senha == $resposta->data->confSenha) && (strlen($resposta->data->senha) >= 6);
}

function criaPessoa($resposta)
{
    $connection = dbConnect();

    if (!isset($connection)) {
        return 500;
    }

    $query = $connection->prepare("INSERT INTO pessoa (nome, email, senha) VALUES (?, ?, ?)");
    $query->bind_param(
        'sss',
        $resposta->data->nome,
        $resposta->data->email,
        $resposta->data->senha
    );
    $query->execute();

    mysqli_close($connection);
    return 201;
}
