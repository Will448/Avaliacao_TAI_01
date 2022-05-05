<?php

class BD_agenda
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
        $st = $conn->prepare("SELECT * FROM agenda ORDER BY id_agenda DESC");
        $st->execute();

        return $st;
    }

    public function inserir($dados)
    {
        $conn = $this->conn();
        $sql = "INSERT INTO agenda (titulo, data_inicio, hora_inicio, data_fim, hora_fim, lugar, descricao, convidado_id) value (?, ?, ?, ?, ?, ?, ?,?)";

        $st = $conn->prepare($sql);
        $arrayDados = [$dados['titulo'], $dados['data_inicio'], $dados['hora_inicio'], $dados['data_fim'], $dados['hora_fim'],
        $dados['lugar'], $dados['descricao'], $dados['convidado_id']];
        $st->execute($arrayDados);

        return $st;
    }

    public function update($dados)
    {
        $conn = $this->conn();
        $sql = "UPDATE agenda SET titulo = ?, data_inicio= ?,
                     hora_inicio = ?, data_fim = ?, hora_fim = ?, lugar = ?, descricao = ?, convidado_id = ?, WHERE id_agenda = ?";

        $st = $conn->prepare($sql);
        $arrayDados =[$dados['titulo'], $dados['data_inicio'], $dados['hora_inicio'], $dados['data_fim'], $dados['hora_fim'], 
        $dados['lugar'], $dados['descricao'], $dados['convidado_id']];
        $st->execute($arrayDados);

        return $st;
    }

    public function remover($id)
    {
        $conn = $this->conn();
        $sql = "DELETE FROM agenda WHERE id_agenda = ?";

        $st = $conn->prepare($sql);
        $arrayDados = [$id];
        $st->execute($arrayDados);

        return $st;
    }

    public function buscar($id)
    {
        $conn = $this->conn();
        $sql = "SELECT * FROM agenda WHERE id_agenda = ?";

        $st = $conn->prepare($sql);
        $arrayDados = [$id];
        $st->execute($arrayDados);

        return $st->fetchObject();
    }

    public function pesquisar($dados)
    {
        $conn = $this->conn();
        $sql = "SELECT * FROM agenda WHERE titulo LIKE ?;";

        $st = $conn->prepare($sql);
        $arrayDados = ["%" . $dados["titulo"] . "%"];
        $st->execute($arrayDados);

        return $st;
    }
}
