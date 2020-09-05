<?php
require_once 'DatabaseService.php';

class PessoaService
{
    private $db;
    private $pessoa;

    public function __construct($pessoa = null)
    {
        $this->db = new DatabaseService();
        $this->pessoa = $pessoa;
    }

    public function setPessoa($pessoa)
    {
        $this->pessoa = $pessoa;
    }

    public function verificaSenha($confSenha)
    {
        return $this->pessoa->senha == $confSenha ? true : false;
    }

    public function criaPessoa()
    {
        $connection = $this->db->connect();

        if (!isset($connection)) {
            return 500;
        }

        if (!isset($this->pessoa)) {
            return 500;
        }

        $query = $connection->prepare("INSERT INTO pessoa (nome, email, senha) VALUES (?, ?, ?)");
        $query->bind_param(
            'sss',
            $this->pessoa->nome,
            $this->pessoa->email,
            $this->pessoa->senha
        );
        $query->execute();

        $this->db->close();
        return 201;
    }

    public function carregar()
    {
        $resposta = new stdClass();
        $resposta->data = [];

        $connection = $this->db->connect();

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

        $this->db->close();
        $resposta->status = 200;
        return $resposta;
    }
}
