<?php
require_once __DIR__ . '/../../model/CategoriaModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['id'])) {
        $id = (int) $_POST['id'];
        $categoriaModel = new CategoriaModel();
        $excluiu = $categoriaModel->excluir($id);

        if ($excluiu) {
            header('Location: categorias.php');
        } else {
            echo "Erro ao excluir categoria!";
        }
    } else {
        echo "ID da categoria não recebido!";
    }
}
?>