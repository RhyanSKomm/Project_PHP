<?php
require_once './../../model/UsuarioModel.php';

$usuarioModel = new UsuarioModel();
$listar = $usuarioModel->listar();

?>

<?php require_once '../components/head.php' ?>


<body>
    <?php require_once '../components/navbar.php'; ?>

    <?php require_once '../components/sidebar.php'; ?>

    <main>
        <h1>Usuários</h1>

        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Data Nascimento</th>
                <th>CPF</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php foreach ($listar as $usuario) { ?>
                    <tr>
                        <td><?php echo $usuario['id'] ?></td>
                        <td><?php echo $usuario['nome'] ?></td>
                        <td><?php echo $usuario['email'] ?></td>
                        <td><?php echo $usuario['telefone'] ?></td>
                        <td><?php echo $usuario['data_nascimento'] ?></td>
                        <td><?php echo $usuario['cpf'] ?></td>
                        <td>
                            <form action="cadastro.php" method="GET">
                                <input type="hidden" name="id" value="<?= $usuario['id']; ?>">
                                <button>
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                </button>
                            </form>

                            <form action="excluir.php" method="POST">
                                <input type="hidden" name="id" value="<?= $usuario['id']; ?>">
                                <button onclick="return confirm('Tem certaza que deseja excluir o filme?')">
                                    <span class="material-symbols-outlined">
                                        delete
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>

    <?php require_once __DIR__ . '\..\..\components\footer.php'; ?>
</body>

</html>