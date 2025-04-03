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
        <div class="h1">
            <h1>Usuários</h1>
        </div>

        <div class="acao">
            <a href="usuario.php">
                <button>
                    <span>Novo</span>
                    <span class="material-symbols-outlined">
                        add
                    </span>
                </button>
            </a>
        </div>

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
                            <form action="usuario.php" method="GET">
                                <input type="hidden" name="id" value="<?= $usuario['id']; ?>">
                                <button class="icon-btn">
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                </button>
                            </form>

                            <form action="usuario_excluir.php" method="POST">
                                <input type="hidden" name="id" value="<?= $usuario['id']; ?>">
                                <button onclick="return confirm('Tem certaza que deseja excluir o filme?')" class="icon-btn">
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

</body>

</html>