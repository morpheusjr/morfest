<?php


/*
    1 - Mostrar na tela as informacoes
    2 - Salvar as informacoes num arquivo .csv
*/

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$idade = $_POST['idade'] != '' ? $_POST['idade'] : 0;

$campos = [$nome, $email, $senha, $idade];

$nomeArquivo = $nome . '.csv';
$arquivo = fopen($nomeArquivo, 'w+');
fputcsv($arquivo, $campos);

echo "
    - Nome: $nome <br>
    - Email: $email <br>
    - Senha: $senha <br>
    - Idade: $idade <br>
";
