<?php

require_once './../../model/ProdutoModel.php';

$produtoModel = new ProdutoModel();
$listar = $produtoModel->listar();

?>

<?php require_once './../components/head.php' ?>


<body>
    <?php require_once __DIR__ . '\..\components\navbar.php' ?>

    <?php require_once __DIR__ . '\..\components\sidebar.php' ?>


    <main>

        <div class="h1">
            <h1>Produtos</h1>
        </div>
        
        <div class="acao">
            <a href="produto.php">
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
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php foreach ($listar as $produto) { ?>
                    <tr>
                        <td><?php echo $produto['id'] ?></td>
                        <td><?php echo $produto['nome'] ?></td>
                        <td><?php echo $produto['descricao'] ?></td>
                        <td><?php echo $produto['categoria_nome'] ?></td>
                        <td>
                            <form action="produto.php" method="GET">
                                <input type="hidden" name="id" value="<?= $produto['id']; ?>">
                                <button class="icon-btn">
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                </button>
                            </form>

                            <form action="produto_excluir.php" method="POST">
                                <input type="hidden" name="id" value="<?= $produto['id']; ?>">
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

    <?php require_once __DIR__ . '/../components/footer.php'; ?>
</body>

</html>