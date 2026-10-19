<header>
    <div class="container">
        <div class="header-content">
            <div class="logo">
                <a href="index.php">
                    <img src="imagenes/escudo.png" alt="Escudo de la Escuela Técnica">
                    <h1>Escuela Técnica N°1</h1>
                </a>
            </div>

            <?php if (isset($header_conocemas) && $header_conocemas) : ?>
                <div class="boton-despleperfil">
                   <button class="boton-perfil" onclick="menudesplegableuser()">
                  <i class="fa-solid fa-user"></i>
                   </button>
                    <div class="menu-opciones" id="menuOpciones">
                        <a href="adminqsy"><i class="fa-solid fa-user-shield"></i> Admin</a>
                        <a href="interfazProfe.php"><i class="fa-solid fa-chalkboard-user"></i> Profesores</a>
                        <a href="ns"><i class="fa-solid fa-user-graduate"></i> Alumnos</a>
                        <a href="configuracion"><i class="fa-solid fa-gear"></i> Configuracion</a>
                        <a href="inicionsesiada" class="opcion-cerrar"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesion</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>
<script src="js/botonperfil.js"></script>
