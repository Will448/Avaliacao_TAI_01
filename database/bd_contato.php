<?php

class BD_contato
{

    private $host = "localhost";
    private $dbname = "bd_avaliacao_tai_01";
    private $port = 3306;
    private $usuario = "root";
    private $senha = "";
    private $db_charset = "utf8";

    public function conn()
    {
        $conn = "mysql:host=$this->host;
            dbname=$this->dbname;port=$this->port";

        return new PDO(
            $conn,
            $this->usuario,
            $this->senha,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . $this->db_charset]
        );
    }
    public function select()
    {
        $conn = $this->conn();
        $st = $conn->prepare("SELECT * FROM contato ORDER BY id_contato ASC");
        $st->execute();

        return $st;
    }

    public function inserir($dados)
    {
        $conn = $this->conn();
        $sql = "INSERT INTO contato (nome,sobrenome, telefone1, tipo_telefone1, telefone2,tipo_telefone2,email) value (?, ?, ?, ?, ?, ?, ? )";

        $st = $conn->prepare($sql);
        $arrayDados = [$dados['nome'], $dados['sobrenome'], $dados['telefone1'], $dados['tipo_telefone1'], $dados['telefone2'],
        $dados['tipo_telefone2'],$dados['email']];
        $st->execute($arrayDados);

        return $st;
    }

    public function update($dados)
    {
        $conn = $this->conn();
        $sql = "UPDATE contato SET nome= ?, sobrenome= ?, telefone1= ?, tipo_telefone1= ?, telefone2= ?,tipo_telefone2= ?,email= ? WHERE id_contato = ?";

        $st = $conn->prepare($sql);
        $arrayDados = [$dados['nome'], $dados['sobrenome'], $dados['telefone1'], $dados['tipo_telefone1'], $dados['telefone2'],
        $dados['tipo_telefone2'],$dados['email'], $dados['id_contato']];
        $st->execute($arrayDados);

        return $st;
    }

    public function remover($id)
    {
        $conn = $this->conn();
        $sql = "DELETE FROM contato WHERE id_contato = ?";

        $st = $conn->prepare($sql);
        $arrayDados = [$id];
        $st->execute($arrayDados);

        return $st;
    }

    public function buscar($id)
    {
        $conn = $this->conn();
        $sql = "SELECT * FROM contato WHERE id_contato = ?";

        $st = $conn->prepare($sql);
        $arrayDados = [$id];
        $st->execute($arrayDados);

        return $st->fetchObject();
    }

    public function pesquisar($dados)
    {
        $conn = $this->conn();
        $sql = "SELECT * FROM contato WHERE nome LIKE ?;";

        $st = $conn->prepare($sql);
        $arrayDados = ["%" . $dados["nome"] . "%"];
        $st->execute($arrayDados);

        return $st;
    }
}
