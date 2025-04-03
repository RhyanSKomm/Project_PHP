<?php

require_once __DIR__. "/../config/Database.php";

class UsuarioModel
{
    private $conn;
    private $table = "usuarios";

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function listar()
    {
        $query = "select * from $this->table";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}

?>