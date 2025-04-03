<?php
    require_once __DIR__. "/../config/Database.php";

    class ProdutoModel {
        private $conn;
        private $table = "produtos";

        public function __construct() {
            $db = new Database();
            $this->conn = $db->conectar();
        }

        public function listar() {
            $query = "SELECT p.*, c.nome as categoria_nome FROM  $this->table p INNER JOIN categorias c ON p.id_categoria = c.id";

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

        public function criar($nome, $desc, $idc) {
            $query = "INSERT INTO $this->table (nome, descricao, id_categoria) VALUES (:nome, :descricao, :id_categoria);";
    
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nome', $nome );
            $stmt->bindParam(':descricao', $desc);
            $stmt->bindParam(':id_categoria', $idc);
            $stmt->execute();
    
            return $stmt->rowCount() > 0;
        }
    
        public function editar($produto) {
            $query = "UPDATE $this->table SET nome = :nome, descricao = :descricao, id_categoria = :id_categoria WHERE id = :id;";
    
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $categoria["id"]);
            $stmt->bindParam(":nome", $categoria["nome"]);
            $stmt->bindParam(":descricao", $categoria["descricao"]);
            $stmt->bindParam(":id_categoria", $categoria["id_categoria"]);
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