<?php
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/usuario_actual.php';

$usuarioHeader = obtenerUsuarioActual();   // null si no hay sesión
$rolesHeader   = $usuarioHeader ? (array)($usuarioHeader['roles'] ?? []) : [];
?>

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

            <?php if ($usuarioHeader): ?>
                <!-- CON sesión: personita + desplegable según rol -->
                <div class="boton-despleperfil">
                    <button class="boton-perfil" onclick="menudesplegableuser()">
                        <i class="fa-solid fa-user"></i>
                    </button>

                    <div class="menu-opciones" id="menuOpciones">
                        <?php if (in_array('admin', $rolesHeader)): ?>
                            <a href="<?= BASE_URL ?>/adminqsy">
                                <i class="fa-solid fa-user-shield"></i> Admin
                            </a>
                        <?php endif; ?>

                        <?php if (in_array('profesor', $rolesHeader)): ?>
                            <a href="<?= BASE_URL ?>/usuario/paginas/viewFuncionalidades/interfazProfe.php">
                                <i class="fa-solid fa-chalkboard-user"></i> Profesores
                            </a>
                        <?php endif; ?>

                        <?php if (in_array('alumno', $rolesHeader)): ?>
                            <a href="<?= BASE_URL ?>/ns">
                                <i class="fa-solid fa-user-graduate"></i> Alumnos
                            </a>
                        <?php endif; ?>

                        <a href="<?= BASE_URL ?>/configuracion">
                            <i class="fa-solid fa-gear"></i> Configuración
                        </a>

                        <a href="#" id="btn-logout" class="opcion-cerrar">
                            <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <!-- SIN sesión: botón Cuenta (abre el modal) -->
                <button type="button" class="boton-cuenta" id="login-trigger">
                    <i class="fa-solid fa-circle-user"></i> Cuenta
                </button>
            <?php endif; ?>

        </div>
    </div>
</header>

<?php if ($usuarioHeader): ?>
    <script src="<?= BASE_URL ?>/usuario/script/botonPerfil.js"></script>
<?php else: ?>
    <link rel="stylesheet" href="<?= BASE_URL ?>/usuario/css/login.css">
    <?php include __DIR__ . '/modal-login.php'; ?>
    <!-- El modal tiene que estar ANTES de estos scripts: servidor.js busca los elementos apenas carga -->
    <script src="<?= BASE_URL ?>/usuario/script/login.js"></script>
    <script src="<?= BASE_URL ?>/usuario/script/servidor.js"></script>
<?php endif; ?>