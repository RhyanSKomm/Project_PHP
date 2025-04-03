<?php
require_once __DIR__ . '/../../model/ProdutoModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produtoModel = new ProdutoModel();

    if (empty($_POST['id'])) {
        // Criar - se não tiver id
        $salvou = $categoriaModel->criar($_POST['nome']);
    } else {
        // Editar - se tiver id
        $salvou = $categoriaModel->editar([
            'id' => $_POST['id'],
            'nome' => $_POST['nome'],
            'descricao' => $_POST['descricao'],
            'id_categoria' => $_POST['id_categoria']
        ]);
    }

    if ($salvou) {
        header('Location: produtos.php');
    } else {
        echo "ERRO";
    }
} else {
    header('Location: produtos.php');
}
?>