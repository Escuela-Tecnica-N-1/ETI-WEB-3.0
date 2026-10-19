<?php require_once __DIR__ . '/../../../config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    
    <link rel="stylesheet" href="<?= BASE_URL ?>/usuario/css/styles.css"> <!-- esto queda asi siempre -->
    <link rel="stylesheet" href="panel-ad.css"> <!-- se conecta al css especifico, si estan en la misma carpeta no usen base_url, sino usenlo. -->
    <link rel="icon" href="<?= BASE_URL ?>/usuario/imagenes/escudo.png" type="image/png">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <aside class="sidebar"> 
       <li class="titulo">
            <i class="fa-solid fa-book-open-reader icono"></i>
            <div class="t-title">Sistema Educativo<br>E.E.S.T N1</div>
        </li>
            <li class="opciones"> 
                <i class="fa-solid fa-house t-clas"></i>
                <div class="op-name">Home</div>
            </li>
        <div class="opciones">
           <i class="fa-solid fa-user t-clas"></i>
            <div class="op-name">Usuarios</div>
        </div>
</aside>
</body>
</html>
