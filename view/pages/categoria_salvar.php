<?php
require_once __DIR__ . '/../../model/CategoriaModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST); // Verifique os dados recebidos
    $categoriaModel = new CategoriaModel();

    if (empty($_POST['id'])) {
        // Criar - se não tiver id
        $salvou = $categoriaModel->criar($_POST['nome']);
    } else {
        // Editar - se tiver id
        $salvou = $categoriaModel->editar([
            'id' => $_POST['id'],
            'nome' => $_POST['nome']
        ]);
    }

    if ($salvou) {
        header('Location: categorias.php');
    } else {
        echo "ERRO";
    }
} else {
    header('Location: categorias.php');
}
?>