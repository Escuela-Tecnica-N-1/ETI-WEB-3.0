<?php
//tomi no toques esto es la base de todooo😣
require_once __DIR__ . '/config/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escuela Técnica</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/usuario/css/styles.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/usuario/css/componentes/estadisticas.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/usuario/css/componentes/boton_mapa.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <link rel="icon" href="./usuario/imagenes/logo-escuela-azull.png" type="image/png" alt="Logo de la escuela">
</head>

<body>

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
                                    <p>En nuestra escuela técnica, nos dedicamos a proporcionar una educación integral que combina conocimientos teóricos con habilidades prácticas. Nuestro enfoque educativo está diseñado para preparar a los estudiantes para los desafíos del mundo laboral moderno y fomentar su desarrollo personal.</p>
                                    <p>Con más de 60 años de experiencia en la formación técnica, nuestros graduados son reconocidos por su excelente preparación y capacidad para adaptarse a las demandas cambiantes de la industria.</p>
                                </div>

                                <div class="features-grid">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Instalaciones modernas</h3>
                                        </div>
                                        <div class="card-content">
                                            <p>Contamos con laboratorios equipados con la última tecnología para garantizar una formación práctica de calidad.</p>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Docentes calificados</h3>
                                        </div>
                                        <div class="card-content">
                                            <p>Nuestro equipo docente está formado por profesionales con amplia experiencia en el campo educativoe industrial.</p>
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
                                    <script src="usuario/script/utility/mapa.js"></script>

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
    <?php include BASE_PATH . '/usuario/paginas/componentes/footer.php'; ?>
    </main>


    <!--Script de noticias-->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>


    <script src="usuario/script/interfaz.js"></script>

    <script src="usuario/script/utility/parallax.js"></script>
    <script src="usuario/script/utility/easteregg.js"></script>
    <script src="usuario/script/utility/estadisticas.js"></script>

    <script src="usuario/paginas/noticias/obtenerNoticias.js"></script>
    
</body>
</html>