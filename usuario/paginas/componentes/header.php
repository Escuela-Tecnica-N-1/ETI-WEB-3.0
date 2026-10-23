<?php require_once __DIR__ . '/../../../config/config.php'; ?>

<header>
    <div class="container">
        <div class="header-content">

            <div class="logo">
                <a href="<?= BASE_URL ?>/index.php">
                    <img src="<?= BASE_URL ?>/usuario/imagenes/escudo.png"
                         alt="Escudo de la Escuela Técnica">
                    <h1>Escuela Técnica N°1</h1>
                </a>
            </div>

            <div class="boton-despleperfil">
                <button class="boton-perfil" onclick="menudesplegableuser()">
                    <i class="fa-solid fa-user"></i>
                </button>

                <div class="menu-opciones" id="menuOpciones">
                    <a href="<?= BASE_URL ?>/adminqsy">
                        <i class="fa-solid fa-user-shield"></i> Admin
                    </a>

                    <a href="<?= BASE_URL ?>/interfazProfe.php">
                        <i class="fa-solid fa-chalkboard-user"></i> Profesores
                    </a>

                    <a href="<?= BASE_URL ?>/ns">
                        <i class="fa-solid fa-user-graduate"></i> Alumnos
                    </a>

                    <a href="<?= BASE_URL ?>/configuracion">
                        <i class="fa-solid fa-gear"></i> Configuración
                    </a>

                    <a href="<?= BASE_URL ?>/inicionsesiada" class="opcion-cerrar">
                        <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
                    </a>
                </div>
            </div>

        </div>
    </div>
</header>

<script src="<?= BASE_URL ?>/usuario/script/botonPerfil.js"></script>

