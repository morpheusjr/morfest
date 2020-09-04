<?php
/* MAIN */
require_once 'database.php';

$resposta = new stdClass();
$resposta->data = [];

$resposta = carregar($resposta);
echo json_encode($resposta);

/* END MAIN*/

function carregar($resposta)
{
    $connection = dbConnect();

    if (!isset($connection)) {
        $resposta->status = 500;
        return $resposta;
    }

    $query = $connection->query("SELECT * FROM pessoa");

    if (mysqli_num_rows($query) > 0) {
        while ($linha = mysqli_fetch_assoc($query)) {
            $obj = new stdClass();
            $obj->id = $linha['id'];
            $obj->nome = $linha['nome'];
            $obj->email = $linha['email'];
            $obj->senha = $linha['senha'];
            $resposta->data[] = $obj;
        }
    }
    $resposta->status = 200;
    return $resposta;
}
