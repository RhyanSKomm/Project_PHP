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

    public function buscar($id) {
        $query = "select * from $this->table where id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function criar($nome, $email, $tel, $dt_nasc, $cpf) {
        $query = "INSERT INTO $this->table (nome, email, telefone, data_nascimento, cpf) VALUES (:nome, :email, :telefone, :data_nascimento, :cpf);";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $nome );
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $tel);
        $stmt->bindParam(':data_nascimento', $dt_nasc);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function editar($usuario) {
        $query = "UPDATE $this->table SET nome = :nome, email = :email, telefone = :telefone, data_nascimento = :data_nascimento, cpf = :cpf WHERE id = :id;";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $usuario["id"]);
        $stmt->bindParam(":nome", $usuario["nome"]);
        $stmt->bindParam(":email", $usuario["email"]);
        $stmt->bindParam(":telefone", $usuario["telefone"]);
        $stmt->bindParam(":data_nascimento", $usuario["data_nascimento"]);
        $stmt->bindParam(":cpf", $usuario["cpf"]);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function excluir($id) {
    
        $query = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            echo "Categoria excluída com sucesso!";
            return true;
        } else {
            echo "Erro ao excluir categoria!";
            return false;
        }
    }
}

?>