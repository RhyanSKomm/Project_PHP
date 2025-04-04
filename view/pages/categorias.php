<?php
require_once './../../model/CategoriaModel.php';

$categoriaModel = new CategoriaModel();
$listar = $categoriaModel->listar();


?>

<?php require_once __DIR__ . '\..\components\head.php'; ?>


<body>
    <?php require_once __DIR__ . '\..\components\navbar.php'; ?>
    <?php require_once __DIR__ . '\..\components\sidebar.php'; ?>

    <main>
        <div class="h1">
            <h1>Categorias</h1>
        </div>

        <div class="acao">
            <a href="categoria.php">
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
                <th>Ações</th>
            </thead>
            <tbody>
                <?php foreach ($listar as $categoria) { ?>
                    <tr>
                        <td><?php echo $categoria['id'] ?></td>
                        <td><?php echo $categoria['nome'] ?></td>
                        <td>
                            <form action="categoria.php" method="GET">
                                <input type="hidden" name="id" value="<?= $categoria['id']; ?>">
                                <button class="icon-btn">
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                </button>
                            </form>

                            <form action="categoria_excluir.php" method="POST">
                                <input type="hidden" name="id" value="<?= $categoria['id']; ?>">
                                <button class="icon-btn">
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

    <?php require_once __DIR__ . '\..\components\footer.php'; ?>
</body>

</html>