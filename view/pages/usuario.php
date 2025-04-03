<?php
    require_once '../../model/UsuarioModel.php';
    if(isset($_GET['id'])) {
        $modo = 'Edicao';
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel-> buscar((int)$_GET['id']);
        } else {
            $modo = 'Insercao';
            $usuario = [
                'id' => '',
                'nome' => '',
                'email' => '',
                'telefone' => '',
                'data_nascimento' => '',
                'cpf' => '',
            ];
        }
    

?>

<?php require_once '../components/head.php'?>

    <?php require_once '../components/navbar.php'?>

    <?php require_once '../components/sidebar.php'?>
    
    <main>
    <div class="container">
            <form class="form" method="POST" action="<?= 'usuario_salvar.php' ?>">
                <div class="form-content">
                    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

                    <div class="input-group">
                        <label for="nome">Nome</label>
                        <input name="nome" type="text" value="<?= $usuario['nome'] ?>" required>
                    </div>

                    <div class="input-group">
                        <label for="email">email</label>
                        <input name="email" type="email" value="<?= $usuario['email'] ?>" required>
                    </div>

                    <div class="input-group">
                        <label for="telefone">telefone</label>
                        <input name="telefone" type="text" value="<?= $usuario['telefone'] ?>" required>
                    </div>

                    <div class="input-group">
                        <label for="data_nascimento">data_nascimento</label>
                        <input name="data_nascimento" type="date" value="<?= $usuario['data_nascimento'] ?>" required>
                    </div>

                    <div class="input-group">
                        <label for="cpf">cpf</label>
                        <input name="cpf" type="text" value="<?= $usuario['cpf'] ?>" required>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="<?='usuarios.php' ?>">
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

