<?php require_once __DIR__ . '/config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/usuario/css/styles.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/usuario/css/login.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/usuario/css/informacion-administrativa.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="icon" href="<?= BASE_URL ?>/usuario/imagenes/escudo.png" type="image/png">

</head>

<body>
    <?php include BASE_PATH . '/usuario/paginas/componentes/header.php'; ?>
    <?php include BASE_PATH . '/usuario/paginas/componentes/navbar.php'; ?>

    <main>
        <?php include BASE_PATH . '/usuario/paginas/componentes/404.php'; ?>
        <!-- hacer la pagina aca y borrar el 404.php -->

        <img src="usuario/imagenes/enproceso.gif" alt="" style="display: block; margin: 0 auto; max-width: 100%; height: auto;">
    </main>

    <?php include BASE_PATH . '/usuario/paginas/componentes/footer.php'; ?>
</body>

</html>