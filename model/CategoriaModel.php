<?php
    require_once __DIR__. "/../config/Database.php";

    class CategoriaModel {
        private $conn;
        private $table = "categorias";

        public function __construct() {
            $db = new Database();
            $this->conn = $db->conectar();
        }

        public function listar() {
            $query = "select * from $this->table";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
        
            $categorias = $stmt->fetchAll();
        
            if ($categorias) {
                return $categorias;
            } else {
                return [];
            }
        }

        public function buscar($id) {
            $query = "select * from $this->table where id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        }

        public function criar($nome) {
            $query = "INSERT INTO $this->table (nome) VALUES (:nome);";
    
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->execute();
    
            return $stmt->rowCount() > 0;
        }
    
        public function editar($categoria) {
            $query = "UPDATE $this->table SET nome = :nome WHERE id = :id;";
    
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $categoria["id"]);
            $stmt->bindParam(":nome", $categoria["nome"]);
            $stmt->execute();
    
            return $stmt->rowCount() > 0;
        }
    
        public function excluir($id) {
            echo "Método excluir chamado com ID: " . $id;
            var_dump($id);
        
            $query = "DELETE FROM categorias WHERE id = :id";
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