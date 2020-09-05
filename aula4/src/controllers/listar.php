<?php
require_once '../services/DatabaseService.php';
require_once '../services/PerssoaService.php';

$service = new PessoaService();
$resposta = $service->carregar();
echo json_encode($resposta);
