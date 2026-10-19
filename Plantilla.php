<?php require_once __DIR__ . '/config/config.php'; ?>
<!--
    Esto debe conectar al archivo config.php de la carpeta config

    Dependiendo de dónde esté la futura página esa dirección cambia

    Por ejemplo:
    /../../../config/config.php

    LEAN LO QUE DICE EL ARCHIVO config.php NO SEAN VAGOS!! ahí está la explicación de cómo funciona lo demas 
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Escuela Técnica</title>
    
    <link rel="stylesheet" href="<?= BASE_URL ?>/usuario/css/styles.css"> <!-- esto queda asi siempre -->
    <link rel="stylesheet" href="biblioteca.css"> <!-- se conecta al css especifico, si estan en la misma carpeta no usen base_url, sino usenlo. -->
    <link rel="icon" href="<?= BASE_URL ?>/usuario/imagenes/escudo.png" type="image/png">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <?php include BASE_PATH . '/usuario/paginas/componentes/header.php'; ?> <!-- NO TOCAR, ASI ANDAN BIEN LOS include -->
    <?php include BASE_PATH . '/usuario/paginas/componentes/navbar.php'; ?>

    <main>
        <?php include BASE_PATH . '/usuario/paginas/componentes/404.php'; ?>
        <!-- hacer la pagina aca y borrar el 404.php -->

    </main>

    <?php include BASE_PATH . '/usuario/paginas/componentes/footer.php'; ?>
</body>
</html>