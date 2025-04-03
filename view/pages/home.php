<!DOCTYPE html>
<html lang="pt-BR">

<?php require_once __DIR__ . '\..\components\head.php'; ?>


<body>
    <?php require_once __DIR__ . '\..\components\navbar.php' ?>
    <?php require_once './../components/sidebar_home.php' ?>




    <main>
        <div class="card-container">
            <div class="card shadow" onclick="window.location.href='usuarios.php'">
                <h1>Usuarios</h1>
            </div>
            <div class="card shadow" onclick="window.location.href='produtos.php'">
                <h1>Produtos</h1>
            </div>
            <div class="card shadow" onclick="window.location.href='categorias.php'">
                <h1>
                    Categorias
                </h1>
            </div>
        </div>
    </main>

    <?php require_once __DIR__ . '\../components/footer.php'; ?>
</body>

</html>