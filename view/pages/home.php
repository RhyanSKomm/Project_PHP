<!DOCTYPE html>
<html lang="pt-BR">

<?php require_once __DIR__ . '\..\components\head.php'; ?>


<body>
    <?php require_once __DIR__ . '\..\components\navbar.php' ?>
    <?php require_once './../components/sidebar_home.php' ?>




    <main>

        <div id="recaptcha-container">
            <form action="" id="loginForm">
            <div class="g-recaptcha" 
     data-sitekey="6LcNkwkrAAAAAPX0yli8o8l6XUBCKITa4wcXrHO-" 
     data-callback="recaptchaCallback">
</div>

            </form>
            <div id="resposta"></div>
        </div>

        <div class="card-container">
            <div class="card card-disabled" data-href="usuarios.php">
                <h1>Usuarios</h1>
            </div>
            <div class="card card-disabled" data-href="produtos.php">
                <h1>Produtos</h1>
            </div>
            <div class="card card-disabled" data-href="categorias.php">
                <h1>Categorias</h1>
            </div>
        </div>
    </main>

    <?php require_once __DIR__ . '\../components/footer.php'; ?>
</body>

</html>