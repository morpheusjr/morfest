<?php


/*
    1 - Mostrar na tela as informacoes
    2 - Salvar as informacoes num arquivo .csv
*/

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha2 = $_POST['senha2'];
$idade = $_POST['idade'] != '' ? $_POST['idade'] : 0;

try {
        
    if ($senha != $senha2){
        $error = 'Os valores das senhas de cadastro não são iguais!';
        throw new Exception($error);
    }

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

} catch (Exception $e) {
    echo "Erro: ", $e->getMessage(), "\n";
    echo "</br></br><a href='index.html'> voltar </a>";
}