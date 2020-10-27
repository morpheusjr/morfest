<?php

    require_once "src/controllers/PessoaController.php";

    $uri=parse_url($_SERVER['REQUEST_URI'])['path'];
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $data = $_REQUEST;

    $pessoa = new PessoaController();    

    if (preg_match('/\.(?:js|css|html)$/', $_SERVER["REQUEST_URI"])) {
        return false;    
    } else if ( ( $uri == "/pessoa") && ( $requestMethod == "GET") ) {
        $pessoa->listar($data);
        return true;
    } else if ( ( $uri == "/pessoa/criar" ) && ( $requestMethod == "GET") )  {
        $pessoa->criar();
        return true;
    } else if ( ( $uri == "/pessoa/visualizar" ) && ( $requestMethod == "GET") )  {
        $pessoa->visualizar();
        return true;    
    } else if ( ( $uri == "/pessoa/salvar" ) && ( $requestMethod == "POST") )  {
        $pessoa->salvar($data); 
        return true;
    } else {
        $template = file_get_contents("index.html");
        echo $template;
        return true;
    }
    