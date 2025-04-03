<?php
    require_once '../../model/CategoriaModel.php';
    if(isset($_GET['id'])) {
        $modo = 'Edicao';
        $categoriaModel = new CategoriaModel();
        $categoria = $categoriaModel-> buscar((int)$_GET['id']);
        } else {
            $modo = 'Insercao';
            $categoria = [
                'id' => '',
                'nome' => '',
            ];
        }
    

?>

<?php require_once '../components/head.php'?>

    <?php require_once '../components/navbar.php'?>

    <?php require_once '../components/sidebar.php'?>
    
    <main>
    <div class="container">
            <form class="form" method="POST" action="<?= 'categoria_salvar.php' ?>">
                <div class="form-content">
                    <input type="hidden" name="id" value="<?= $categoria['id'] ?>">

                    <div class="input-group">
                        <label for="nome">Nome</label>
                        <input name="nome" type="text" value="<?= $categoria['nome'] ?>" required>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="<?='categorias.php' ?>">
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

