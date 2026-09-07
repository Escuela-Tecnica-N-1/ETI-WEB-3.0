<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escuela Técnica</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="imagenes/escudo3.png" type="image/png">
</head>

<body>
    <!-- Folded Corner Login Trigger -->
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
                <h2>Acceso Docentes</h2>
                <p>Ingrese sus credenciales para acceder al panel</p>
            </div>
            <form id="auth-form">
                <input type="text" id="nombre" placeholder="Nombre" style="display: none;">
                <input type="email" id="email" placeholder="Email" required>
                <input type="password" id="password" placeholder="Contraseña" required>
                <button type="submit">Ingresar</button>
            </form>
            <div class="switch" id="toggle-form" onclick="logina()"><p>¿No tienes cuenta? Registrate</p></div>
            <p id="mensaje"></p>
        </div>
    </div>
    
    <main>
        <!-- Welcome Section -->
        <section class="welcome-section">
            <div class="container">
                <div class="welcome-grid">
                    <div class="welcome-content">
                        <h1>Bienvenidos a nuestra <br> Escuela Técnica <br> Gral. Manuel Belgrano</h1>
                        <p>Formando profesionales con excelencia académica y valores humanos para construir un futuro mejor.</p>
                        <div class="button-group">
                            <a href="conocemas.php"><button class="btn btn-primary">Conoce más sobre nosotros</button></a>
                            <a href="#redirect-contacto"><button class="btn btn-outline">Contacto</button></a>
                        </div>
                    </div>
                    <div class="welcome-image">
                        <img src="imagenes/escuelafoto.jpeg" alt="Escuela Técnica" id="fotoEsc">
                    </div>
                </div>
            </div>
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

                        <!-- Tu HTML donde quieres mostrar el mapa -->
                        <div id="mapa" style="width: 100%; height: 400px; border-radius: 10px;"></div>

                        <!-- Al final de tu body -->
                        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" 
                        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" 
                        crossorigin=""></script>

                        <!-- Función de mapa -->
                        <script>
                        // Inicializar el mapa
                        const mapa = L.map('mapa').setView([-36.02054340825117, -59.102123271464116], 17); // Coordenadas aproximadas de Buenos Aires, ajustar según tu ubicación

                        // Añadir capa de OpenStreetMap
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(mapa);

                        // Añadir marcador para la Escuela de Educación Técnica N°1
                        // Reemplaza estas coordenadas con las exactas de la escuela
                        const coordenadas = [-36.02054340825117, -59.102123271464116]; 

                        // Crear icono personalizado similar al de Google Maps
                        const iconoEscuela = L.icon({
                        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                        shadowSize: [41, 41]
                        });

                        // Añadir el marcador al mapa
                        const marcador = L.marker(coordenadas, {icon: iconoEscuela}).addTo(mapa);

                        // Añadir popup con información
                        marcador.bindPopup("<b>Escuela de Educación Técnica N°1</b>").openPopup();

                        // Añadir controles de zoom
                        L.control.zoom({
                        position: 'bottomright'
                        }).addTo(mapa);
                        </script>

                    </div>

                    <!-- Latest News Section (Right Side) -->
                    <div class="news-section">
                        <div class="news-header">
                            <i class="fas fa-newspaper"></i>
                            <h2>Últimas Noticias</h2>
                        </div>
                        <div class="news-list" id="news-container">
                            <!-- News items will be inserted here by JavaScript -->
                        </div>
                        <a href="noticias.php" class="news-link">Ver todas las noticias <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        
    <!-- Footer -->
    <?php include 'footer.php'; ?>
    </main>
<!--Script de noticias y login-->
    <script src="js/servidor.js"></script>
    <script src="js/login.js"></script>
    <script src="js/script.js"></script>
    <script src="js/easteregg.js"></script>
</body>
</html>