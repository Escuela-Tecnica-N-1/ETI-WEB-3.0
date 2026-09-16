<?php
$usuario = null;

if (!empty($_COOKIE['token'])) {
    $token = $_COOKIE['token'];

    $ch = curl_init('http://localhost:3000/api/me');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Cookie: token=' . $token
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200) {
        $usuario = json_decode($response, true);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escuela Técnica</title>
    <link rel="stylesheet" href="usuario/css/styles.css">
    <link rel="stylesheet" href="usuario/css/login.css">
    <link rel="stylesheet" href="usuario/css/componentes/estadisticas.css">
    <link rel="stylesheet" href="usuario/css/componentes/boton_mapa.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <link rel="icon" href="usuario/imagenes/escudo.png" type="image/png">
</head>

<body>

    <?php if ($usuario): ?>
    <!-- ─── Usuario logueado: menú de usuario ─────────────────────────────── -->
        <div class="corner-fold" id="login-trigger">
            <div class="fold"></div>
            <div class="login-icon">
                <i class="fas fa-user-lock"></i>
            </div>
        </div>

    <!-- Login Modal -->
        <div class="login-modal" id="login-modal">
            <div class="login-container">
                <button class="close-btn" id="close-login"><i class="fas fa-times"></i></button>
                <div class="login-header">
                    <h2>¡Hola, <?= htmlspecialchars($usuario['nombre']) ?>!</h2>
                    <p><?= htmlspecialchars($usuario['email']) ?></p>
                </div>
                
                <div style="display: flex; flex-direction: column; gap: 12px; margin-top: 20px;">
                    <a href="usuario/paginas/viewFuncionalidades/interfazProfe.php" style="text-decoration: none;">
                        <button class="btn btn-primary" style="width: 100%;">
                            <i class="fas fa-folder-open"></i>&nbsp; Acceder a la interfaz
                        </button>
                    </a>
                    <button id="btnLogout" class="btn btn-outline" style="background-color: black; color: white;">
                        <i class="fas fa-sign-out-alt"></i>&nbsp; Cerrar sesión
                    </button>
                </div>
            </div>
        </div>
        

    <?php else: ?>
        <!-- ─── No logueado: modal de login/registro ──────────────────────────── -->
        <div class="corner-fold" id="login-trigger">
            <div class="fold"></div>
            <div class="login-icon">
                <i class="fas fa-user-lock"></i>
            </div>
        </div>
    
        <div class="login-modal" id="login-modal">
            <div class="login-container">
                <button class="close-btn" id="close-login"><i class="fas fa-times"></i></button>
                <div class="login-header">
                    <h2>Acceso Docentes</h2>
                    <p>Ingrese sus credenciales para acceder al panel</p>
                </div>
                <form id="auth-form">
                    <input type="text" id="nombre" placeholder="Nombre" style="display: none;">
                    <input type="email" id="email" placeholder="Email" required>
                    <input type="password" id="password" placeholder="Contraseña" required>
                    <button type="submit">Ingresar</button>
                </form>
                <div class="switch" id="toggle-form" onclick="logina()">
                    <p>¿No tienes cuenta? Registrate</p>
                </div>
                <p id="mensaje"></p>

                <!-- link para ir al formulario de recuperación -->
                <div class="switch" id="toggle-forgot">
                    <p>¿Olvidaste tu contraseña?</p>
                </div>

                <button id="reenviar-verificacion" type="button" style="display:none; margin-top: 8px;">
                    Reenviar mail de verificación
                </button>

                <p id="mensaje"></p>

                <!-- formulario de "olvidé mi contraseña", oculto por defecto -->
                <form id="forgot-form" style="display: none;">
                    <input type="email" id="forgot-email" placeholder="Email" required>
                    <button type="submit">Enviar link de recuperación</button>
                </form>
                <div class="switch" id="volver-login" style="display: none;">
                    <p>Volver a iniciar sesión</p>
                </div>
                <p id="mensaje-forgot"></p>
            </div>
        </div>
    
    <?php endif; ?>

    <main>
        <!-- Welcome Section -->
        <section class="welcome-section">
            <div class="container">
                <div class="welcome-grid">
                    <div class="welcome-content">
                        <h1>Bienvenidos a nuestra <br> Escuela Técnica <br> Gral. Manuel Belgrano</h1>

                        <p>
                            Formando profesionales con excelencia académica y valores humanos
                            para construir un futuro mejor.
                        </p>

                        <div class="button-group">
                            <a href="usuario/paginas/conoceMas/conoceMas.php">
                                <button class="btn btn-primary" id="conocemas-button">
                                    Conoce más sobre nosotros
                                </button>
                            </a>

                            <a href="#redirect-contacto">
                                <button class="btn btn-outline">
                                    Contacto
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="welcome-image">
                        <img src="usuario/imagenes/escuelafoto.jpeg"
                            alt="Escuela Técnica"
                            id="fotoEsc">
                    </div>
                </div>
            </div>
        </section>

        <!--ESTADISTICAS-->
<section class="stats-section">

    <div class="stats-container">

        <div class="stat">
            <div class="number">
                <h2 class="counter" data-target="64">0</h2>
                
            </div>
            <p>Años de trayectoria</p>
        </div>

        <div class="stat">
            <div class="number">
                <h2 class="counter" data-target="377">0</h2>
    
            </div>
            <p>Estudiantes activos</p>
        </div>

        <div class="stat">
            <div class="number">
                <h2 class="counter" data-target="2">0</h2>
            </div>
            <p>Especialidades técnicas</p>
        </div>

    </div>

</section>

</section>
        <!-- Main Content with News on Right -->
        <section class="main-content">
            <div class="container">
                <div class="content-grid">
                    <div class="main-info">
                        <div class="mission">
                            <h2>Nuestra Misión Educativa</h2>
                            <p>En nuestra escuela técnica, nos dedicamos a proporcionar una educación integral que combina
                                conocimientos teóricos con habilidades prácticas. Nuestro enfoque educativo está diseñado para
                                preparar a los estudiantes para los desafíos del mundo laboral moderno y fomentar su desarrollo
                                personal.</p>
                            <p>Con más de 60 años de experiencia en la formación técnica, nuestros graduados son reconocidos por su
                                excelente preparación y capacidad para adaptarse a las demandas cambiantes de la industria.</p>
                        </div>

                        <div class="features-grid">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Instalaciones modernas</h3>
                                </div>
                                <div class="card-content">
                                    <p>Contamos con laboratorios equipados con la última tecnología para garantizar una formación
                                        práctica de calidad.</p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3>Docentes calificados</h3>
                                </div>
                                <div class="card-content">
                                    <p>Nuestro equipo docente está formado por profesionales con amplia experiencia en el campo educativo
                                        e industrial.</p>
                                </div>
                            </div>
                        </div>
                        <h2>Encontranos en:</h2>
                        
                        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" 
                        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" 
                        crossorigin=""/>

                        <!-- HTML donde se muestra el mapa -->
                        <div id="mapa" style="width: 100%; height: 400px; border-radius: 10px;"></div>

                            <!-- boton del mapa -->
                            <a class="map-btn-wrapper" href="https://maps.app.goo.gl/aaeUxEye4HNBApg48" target="_blank">

                                <span class="map-btn">Google Maps</span>
                                <span class="pinpoint"></span>

                            </a>

                            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" 
                            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" 
                            crossorigin=""></script>

                            <!-- Función de mapa -->
                            <script src="js/script/mapa.js"></script>

                        </div>

                    <!-- seccion de noticias ubicadas a la derecha -->
                    <div class="news-section">
                        <div class="news-header">
                            <i class="fas fa-newspaper"></i>
                            <h2>Últimas Noticias</h2>
                        </div>

                        <div class="news-list" id="news-container">
                            <!-- Las noticias seran agregad mediante JavaScript -->
                        </div>

                    </div>

                </div>
            </div>
        </section>
        
    <!-- Footer -->
    <?php include 'usuario/paginas/componentes/footer.php'; ?>
    </main>


    <!--Script de noticias y login-->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="usuario/script/utility/mapa.js"></script>
    <script src="usuario/script/servidor.js"></script>
    <script src="usuario/script/login.js"></script>
    <script src="usuario/script/interfaz.js"></script>
    <script src="usuario/script/fileManager.js"></script>
</body>
</html>