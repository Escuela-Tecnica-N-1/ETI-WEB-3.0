<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Técnico en Electromecánica - Escuela Técnica</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/electromecanica.css">
    <link rel="icon" href="imagenes/escudo.png" type="image/png">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head> 
<body>

    <?php include 'header.php'; ?>

    <?php include 'navbar.php'; ?>

    <!-- Mobile Navigation -->
    <div class="mobile-nav" id="mobile-nav">
        <div class="mobile-nav-container">
            <div class="mobile-nav-header">
                <h3>Menú</h3>
                <button class="mobile-nav-close" id="mobile-nav-close"><i class="fas fa-times"></i></button>
            </div>
            <div class="mobile-nav-search">
                <input type="text" placeholder="Buscar...">
            </div>
            <ul class="mobile-nav-menu">
                <li class="mobile-nav-item">
                    <a href="#" class="mobile-nav-link">Institucional</a>
                    <button class="mobile-nav-toggle" data-target="institucional-dropdown"><i class="fas fa-chevron-down"></i></button>
                    <ul class="mobile-nav-dropdown" id="institucional-dropdown">
                        <li><a href="#">Autoridades</a></li>
                        <li><a href="#">Información Administrativa</a></li>
                        <li><a href="#">Acuerdo de convivencia</a></li>
                        <li><a href="#">Profesores</a></li>
                    </ul>
                </li>
                <li class="mobile-nav-item">
                    <a href="#" class="mobile-nav-link">Egresados</a>
                    <button class="mobile-nav-toggle" data-target="egresados-dropdown"><i class="fas fa-chevron-down"></i></button>
                    <ul class="mobile-nav-dropdown" id="egresados-dropdown">
                        <li><a href="#">1970-1980</a></li>
                        <li><a href="#">1981-1990</a></li>
                        <li><a href="#">1991-2000</a></li>
                        <li><a href="#">2001-2010</a></li>
                        <li><a href="#">2011-2020</a></li>
                        <li><a href="#">2021-2030</a></li>
                    </ul>
                </li>
                <li class="mobile-nav-item">
                    <a href="#" class="mobile-nav-link">Talleres de Ciclo Básico</a>
                    <button class="mobile-nav-toggle" data-target="talleres-dropdown"><i class="fas fa-chevron-down"></i></button>
                    <ul class="mobile-nav-dropdown" id="talleres-dropdown">
                        <li><a href="#">Hojalatería</a></li>
                        <li><a href="#">Carpintería</a></li>
                        <li><a href="#">Vitrofusión</a></li>
                        <li><a href="#">Herrería</a></li>
                        <li><a href="#">Fundición</a></li>
                    </ul>
                </li>
                <li class="mobile-nav-item">
                    <a href="informatica.php" class="mobile-nav-link">Informática</a>
                </li>
                <li class="mobile-nav-item">
                    <a href="electromecanica.php" class="mobile-nav-link">Electromecánica</a>
                </li>
            </ul>
        </div>
    </div>

    <main>
        <div class="container">
            <section class="intro-section">
                <div class="section-header">
                    <h2>División Electromecánica</h2>
                </div>
                <div class="intro-content">
                    <p>Bienvenido a la división de Electromecánica de la Escuela de Educación Secundaria Técnica N°1 Gral. Manuel Belgrano. Nuestra especialidad combina los campos de la electricidad y la mecánica para formar técnicos capaces de diseñar, mantener y reparar equipos y sistemas electromecánicos.</p>
                    <p>Al completar el ciclo superior, obtendrás el título de <strong>Técnico en Electromecánica</strong>, que te permitirá desempeñarte en diversos sectores industriales y de servicios. Nuestro programa educativo está diseñado para brindarte una sólida formación teórica y práctica, con acceso a talleres y laboratorios equipados con tecnología actualizada.</p>
                </div>
            </section>

            <section class="subjects-section">
                <div class="section-header">
                    <h2>Materias Específicas</h2>
                </div>
                
                <div class="subjects-grid">
                    <div class="subject-card">
                        <div class="subject-image">
                            <img src="imagenes/electro/Electro Técnica y Electrónica.jpg" alt="Electrotecnia">
                        </div>
                        <div class="subject-content">
                            <h3>Electrotecnia</h3>
                            <p>Estudio de los principios y aplicaciones de la electricidad. Incluye el análisis de circuitos eléctricos, componentes, mediciones, y aplicaciones prácticas en sistemas de potencia y control.</p>
                        </div>
                    </div>

                    <div class="subject-card">
                        <div class="subject-image">
                            <img src="imagenes/electro/Mecanica y Mecanismo.jpg" alt="Mecánica Técnica">
                        </div>
                        <div class="subject-content">
                            <h3>Mecánica Técnica</h3>
                            <p>Estudio de los principios físicos que gobiernan el movimiento y equilibrio de los cuerpos. Incluye el análisis de fuerzas, momentos, tensiones y deformaciones aplicados a sistemas mecánicos utilizados en la industria.</p>
                        </div>
                    </div>

                    <div class="subject-card">
                        <div class="subject-image">
                            <img src="imagenes/electro/Maquinas Electricas y Automatismo.jpg" alt="Máquinas Eléctricas">
                        </div>
                        <div class="subject-content">
                            <h3>Máquinas Eléctricas</h3>
                            <p>Estudio de los diferentes tipos de máquinas eléctricas como motores, generadores y transformadores. Incluye su funcionamiento, características, aplicaciones y mantenimiento en entornos industriales.</p>
                        </div>
                    </div>

                    <div class="subject-card">
                        <div class="subject-image">
                            <img src="imagenes/electro/Emprendimientos Productivos y de Desarrollo Industrial.jpg" alt="Automatización Industrial">
                        </div>
                        <div class="subject-content">
                            <h3>Automatización Industrial</h3>
                            <p>Estudio de los sistemas y tecnologías utilizados para controlar procesos industriales de forma automática. Incluye programación de PLC, sistemas SCADA, sensores, actuadores y redes industriales.</p>
                        </div>
                    </div>

                    <div class="subject-card">
                        <div class="subject-image">
                            <img src="imagenes/electro/Mantenimiento y Montaje Eléctrico.webp" alt="Instalaciones Eléctricas">
                        </div>
                        <div class="subject-content">
                            <h3>Instalaciones Eléctricas</h3>
                            <p>Diseño, implementación y mantenimiento de sistemas eléctricos en edificios e industrias. Incluye normativas, cálculos de carga, protecciones, iluminación y sistemas de distribución eléctrica.</p>
                        </div>
                    </div>

                    <div class="subject-card">
                        <div class="subject-image">
                            <img src="imagenes/electro/Electrónica Industrial.webp" alt="Electrónica Industrial">
                        </div>
                        <div class="subject-content">
                            <h3>Electrónica Industrial</h3>
                            <p>Aplicación de dispositivos y circuitos electrónicos en entornos industriales. Incluye el estudio de semiconductores, circuitos integrados, sistemas de control y potencia electrónica.</p>
                        </div>
                    </div>
                    <div class="subject-card">
                        <div class="subject-image">
                            <img src="imagenes/electro/Resistencia y Enseñanza de los Materiales.jpg" alt="Resistencia y Enseñanza de los Materiales">
                        </div>
                        <div class="subject-content">
                            <h3>Resistencia y Enseñanza de los Materiales</h3>
                            <p>Propiedades y comportamiento de los materiales utilizados en la construcción de componentes mecánicos y eléctricos, así como técnicas de enseñanza en este campo.</p>
                        </div>
                    </div>

                    <div class="subject-card">
                        <div class="subject-image">
                            <img src="imagenes/electro/Mediciones Electricas.jpeg" alt="Sistemas de Control">
                        </div>
                        <div class="subject-content">
                            <h3>Sistemas de Control</h3>
                            <p>Estudio de los métodos y tecnologías utilizados para controlar el comportamiento de sistemas dinámicos. Incluye teoría de control, modelado matemático, controladores y sistemas de retroalimentación.</p>
                        </div>
                    </div>

                    <div class="subject-card">
                        <div class="subject-image">
                            <img src="imagenes/electro/Diseño y Procesamiento Mecanico.jpg" alt="Mantenimiento Industrial">
                        </div>
                        <div class="subject-content">
                            <h3>Mantenimiento Industrial</h3>
                            <p>Técnicas y estrategias para mantener equipos y sistemas industriales en óptimas condiciones de funcionamiento. Incluye mantenimiento preventivo, predictivo y correctivo de maquinaria industrial.</p>
                        </div>
                    </div>

                    <div class="subject-card">
                        <div class="subject-image">
                            <img src="imagenes/electro/diseño_cad.jpg" alt="Diseño Asistido por Computadora">
                        </div>
                        <div class="subject-content">
                            <h3>Diseño Asistido por Computadora (CAD)</h3>
                            <p>Utilización de software especializado para el diseño y modelado de piezas, mecanismos y sistemas mecánicos. Incluye dibujo técnico, modelado 3D y simulación de ensamblajes.</p>
                        </div>
                    </div>

                    <div class="subject-card">
                        <div class="subject-image">
                            <img src="imagenes/electro/Laboratorio de Mediciones y de Control de Calidad.jpg" alt="Procesos de Manufactura">
                        </div>
                        <div class="subject-content">
                            <h3>Procesos de Manufactura</h3>
                            <p>Estudio de los métodos y técnicas utilizados para transformar materias primas en productos terminados. Incluye mecanizado, soldadura, fundición, conformado y tratamientos térmicos.</p>
                        </div>
                    </div>

                    <div class="subject-card">
                        <div class="subject-image">
                            <img src="imagenes/electro/Práctica Profesional del Sector Electromecánico.jpg" alt="Practicas Profesionalizantes">
                        </div>
                        <div class="subject-content">
                            <h3>Practicas Profesionalizantes</h3>
                            <p>Experiencia práctica en un entorno profesional relacionado con la orientación electromecánica, aplicando conocimientos teóricos adquiridos en situaciones reales.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="career-section">
                <div class="section-header">
                    <h2>Salida Laboral</h2>
                </div>
                <div class="career-content">
                    <p>Como Técnico en Electromecánica, estarás preparado para desempeñarte en diversos sectores industriales y de servicios:</p>
                    <ul class="career-list">
                        <li><i class="fas fa-check-circle"></i> Mantenimiento industrial en plantas productivas</li>
                        <li><i class="fas fa-check-circle"></i> Instalación y puesta en marcha de maquinaria</li>
                        <li><i class="fas fa-check-circle"></i> Diseño de sistemas electromecánicos</li>
                        <li><i class="fas fa-check-circle"></i> Automatización de procesos industriales</li>
                        <li><i class="fas fa-check-circle"></i> Supervisión de líneas de producción</li>
                        <li><i class="fas fa-check-circle"></i> Gestión de proyectos electromecánicos</li>
                    </ul>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
<?php include 'footer.php'; ?>

    <script>
        // Set current year in footer
        document.getElementById('current-year').textContent = new Date().getFullYear();

        // Mobile menu functionality
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileNav = document.getElementById('mobile-nav');
        const mobileNavClose = document.getElementById('mobile-nav-close');
        const mobileNavToggles = document.querySelectorAll('.mobile-nav-toggle');

        // Open mobile menu
        mobileMenuBtn.addEventListener('click', function() {
            mobileNav.classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent scrolling when menu is open
        });

        // Close mobile menu
        mobileNavClose.addEventListener('click', function() {
            mobileNav.classList.remove('active');
            document.body.style.overflow = ''; // Restore scrolling
        });

        // Close menu when clicking outside
        mobileNav.addEventListener('click', function(e) {
            if (e.target === mobileNav) {
                mobileNav.classList.remove('active');
                document.body.style.overflow = '';
            }
        });

        // Toggle dropdown menus in mobile nav
        mobileNavToggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const targetDropdown = document.getElementById(targetId);
                
                // Close all other dropdowns
                document.querySelectorAll('.mobile-nav-dropdown.active').forEach(dropdown => {
                    if (dropdown.id !== targetId) {
                        dropdown.classList.remove('active');
                    }
                });
                
                // Toggle the clicked dropdown
                targetDropdown.classList.toggle('active');
                
                // Toggle the icon
                const icon = this.querySelector('i');
                if (targetDropdown.classList.contains('active')) {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                } else {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                }
            });
        });

        // Funcionalidad para el popover de contacto
        const contactBtn = document.getElementById('contact-btn');
        const contactPopover = document.getElementById('contact-popover');
        
        if (contactBtn && contactPopover) {
            // Mostrar/ocultar popover al hacer clic
            contactBtn.addEventListener('click', function(e) {
                e.preventDefault();
                contactPopover.classList.toggle('active');
                
                // Cerrar el popover cuando se hace clic en cualquier otro lugar
                document.addEventListener('click', function closePopover(event) {
                    if (!contactBtn.contains(event.target)) {
                        contactPopover.classList.remove('active');
                        document.removeEventListener('click', closePopover);
                    }
                });
            });
            
            // Evitar que el clic en el popover cierre el mismo
            contactPopover.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        }
    </script>
</body>
</html>