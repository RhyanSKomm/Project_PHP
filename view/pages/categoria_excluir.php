<?php
 
require_once './../../model/CategoriaModel.php';
 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = ["id"];
 
    if (!empty($id)) {
        try {
            $categoriaModel = new CategoriaModel();
            $categoriaModel->excluir($_POST['id']);
        } catch (Exception) {
            return header("Location: erro.php");
      }
    }
}
 
return header("Location: categorias.php");