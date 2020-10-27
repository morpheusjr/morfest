<?php

require_once 'src/services/DatabaseService.php';
require_once 'src/services/PerssoaService.php';
require_once 'src/models/Pessoa.php';

/*
*   listar - listar os dados de todas as pessoas
*   visualizar - mostra página de visualizar as pessoas
*   criar - mostra página de criar pessoa    
*   salvar - salva os dados de uma pessoa
*/

class PessoaController
{
   
    public function listar (?array $data): void
    {   
        $pessoaService = new PessoaService();
        $resposta = $pessoaService->carregar();
        echo json_encode($resposta);
    }

    public function visualizar (): void
    {   
        $template = file_get_contents("views/visualizar.html");
        echo $template;    
    }

    public function criar (): void
    {
        $template = file_get_contents("views/cadastro.html");
        echo $template;
    }


    public function salvar (array $data): void
    {   
        $resposta = new stdClass();
        
        $resposta->pessoa = new Pessoa();
        $resposta->pessoa->nome = $data['nome'];
        $resposta->pessoa->email = $data['email'];
        $resposta->pessoa->senha = $data['senha'];
        $resposta->confSenha = $data['confSenha'];

        $service = new PessoaService($resposta->pessoa);

        if ($service->verificaSenha($resposta->confSenha)) {
            $resposta->status = $service->criaPessoa();
        } else {
            $resposta->status = 400;
        }
        unset($resposta->confSenha);
        echo json_encode($resposta);
    }

}
