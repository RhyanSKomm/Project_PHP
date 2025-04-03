<?php
    require_once '../../model/ProdutoModel.php';
    require_once '../../model/CategoriaModel.php';
    if(isset($_GET['id'])) {
        $modo = 'Edicao';
        $produtoModel = new ProdutoModel();
        $produto = $produtoModel-> buscar((int)$_GET['id']);
        } else {
            $modo = 'Insercao';
            $produto = [
                'id' => '',
                'nome' => '',
                'descricao' => '',
                'id_categoria' => ''
            ];
        }
        
        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->listar();
?>

<?php require_once '../components/head.php'?>

    <?php require_once '../components/navbar.php'?>

    <?php require_once '../components/sidebar.php'?>
    
    <main>
    <div class="container">
            <form class="form" method="POST" action="<?= 'produto_salvar.php' ?>">
                <div class="form-content">
                    <input type="hidden" name="id" value="<?= $produto['id'] ?>">

                    <div class="input-group">
                        <label for="nome">Nome</label>
                        <input name="nome" type="text" value="<?php echo $produto['nome'] ?>" required>
                    </div>

                    <div class="input-group">
                        <label for="descricao">Descricao</label>
                        <input name="descricao" type="text" value="<?php echo $produto['descricao'] ?>" required>
                    </div>

                    <div class="input-group">
                        <label for="id_categoria">Categoria</label>
                        <select class="form-input" id="id_categoria" name="id_categoria" required>
                            <option value="">Selecione uma Categoria</option>
                            <?php if (is_array($categorias)) { ?>
                                <?php foreach ($categorias as $categoria) { ?>
                                    <option value="<?php echo $categoria['id']; ?>"
                                        <?php echo ($produto['id_categoria'] == $categoria['id']) ? 'selected' : ''; ?>>
                                        <?php echo $categoria['nome']; ?>
                                    </option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>


                <div class="form-actions">
                    <a href="<?='produtos.php' ?>">
                        <button class="btn" type="button">
                            Cancelar
                        </button>
                    </a>
                    <button class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </main>

</body>

