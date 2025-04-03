<?php
require_once __DIR__ . '/../../model/UsuarioModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuarioModel = new UsuarioModel();

    if (empty($_POST['id'])) {
        // Criar - se não tiver id
        $salvou = $usuarioModel->criar($_POST['nome'],$_POST['email'],$_POST['telefone'],$_POST['data_nascimento'],$_POST['cpf']);
    } else {
        // Editar - se tiver id
        $salvou = $usuarioModel->editar([
            'id' => $_POST['id'],
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'telefone' => $_POST['telefone'],
            'data_nascimento' => $_POST['data_nascimento'],
            'cpf' => $_POST['cpf'],
        ]);
    }

    if ($salvou) {
        header('Location: usuarios.php');
    } else {
        echo "ERRO";
    }
} else {
    header('Location: usuarios.php');
}
?>