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
    <div class="inicio">
        <div class="descripcion">
            <h1>Asignación y Administracion de Roles</h1>
            <h4>Editar roles, buscar y borrar usuarios</h4>
        </div>
        <div class="filtros">
            <input type="text" id="search" placeholder="Buscar por nombre o Gmail"></input>
                <button class="dropdown" id="Drop">Filtrar por Rol
                    <i class="fa-solid fa-caret-down"></i>
                </button>
                <div class="ocultar" id="ocult" hidden>
                    <div class="dp-menu" id="dropmenu">
                        <div class="drop-op" id="dropoption">Estudiante</div>
                        <div class="drop-op" id="dropoption">Profesor</div>
                        <div class="drop-op" id="dropoption">Administrador</div>
                    </div>
                </div>
                <script src="panel-fun.js"></script>
        </div>
        <div class="lista">
            <h3>Usuario</h3>
            <h3>Correo Electrónico</h3>
            <h3>Roles</h3>
        </div>
        <div class="cont-box">
            <div class="datos">
                <h6>nombre</h6>
                <h6>correo</h6>
                <h6>rol</h6>
            </div>
            <div class="op-icon">
                <i class="fa-solid fa-pen t-clas"></i>
                <i class="fa-solid fa-trash t-clas"></i>  
            </div>
        </div>
    </div>
</body>
</html>
