<?php
require_once __DIR__ . '/../../model/usuarioModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['id'])) {
        $id = (int) $_POST['id'];
        $usuarioModel = new UsuarioModel();
        $excluiu = $usuarioModel->excluir($id);

        if ($excluiu) {
            header('Location: usuarios.php');
        } else {
            echo "Erro ao excluir usuario!";
        }
    } else {
        echo "ID da usuario não recebido!";
    }
}
?>