<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias - Escuela Técnica</title>
    <link rel="stylesheet" href="css/noticias.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="imagenes/escudo.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    
    <?php include 'header.php'; ?>

    <?php include 'navbar.php'; ?>

    <main>
        <div class="container">
            <!-- Noticias Header -->
            <section class="noticias-header">
                <h1>Últimas Noticias</h1>
                <p>Mantente informado sobre las actividades y novedades de nuestra escuela</p>
            </section>

            <!-- Filtros de Noticias -->
            <section class="noticias-filtros">
                <div class="filtro-categorias">
                    <button class="filtro-btn active" data-categoria="todas">Todas</button>
                    <button class="filtro-btn" data-categoria="institucional">Institucional</button>
                    <button class="filtro-btn" data-categoria="academico">Académico</button>
                    <button class="filtro-btn" data-categoria="eventos">Eventos</button>
                    <button class="filtro-btn" data-categoria="proyectos">Proyectos</button>
                </div>
            </section>

            <!-- Grid de Noticias -->
            <section class="noticias-grid">
                <!-- Noticia 1 -->
                <article class="noticia-card" data-categoria="institucional">
                    <div class="noticia-imagen">
                        <img src="https://placehold.co/600x400" alt="Imagen de noticia">
                        <div class="noticia-fold"></div>
                    </div>
                    <div class="noticia-contenido">
                        <div class="noticia-meta">
                            <span class="noticia-fecha"><i class="far fa-calendar-alt"></i> 15 Abril, 2023</span>
                            <span class="noticia-categoria">Institucional</span>
                        </div>
                        <h2 class="noticia-titulo">Inauguración del nuevo laboratorio de informática</h2>
                        <p class="noticia-extracto">La escuela cuenta con un nuevo espacio equipado con tecnología de última generación para el aprendizaje de programación y diseño digital.</p>
                        <a href="#" class="noticia-enlace">Leer más <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <!-- Noticia 2 -->
                <article class="noticia-card" data-categoria="academico">
                    <div class="noticia-imagen">
                        <img src="https://placehold.co/600x400" alt="Imagen de noticia">
                        <div class="noticia-fold"></div>
                    </div>
                    <div class="noticia-contenido">
                        <div class="noticia-meta">
                            <span class="noticia-fecha"><i class="far fa-calendar-alt"></i> 10 Abril, 2023</span>
                            <span class="noticia-categoria">Académico</span>
                        </div>
                        <h2 class="noticia-titulo">Estudiantes participan en olimpiada nacional de matemáticas</h2>
                        <p class="noticia-extracto">Un grupo de alumnos representará a nuestra institución en la competencia que se realizará en Buenos Aires durante el mes de mayo.</p>
                        <a href="#" class="noticia-enlace">Leer más <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <!-- Noticia 3 -->
                <article class="noticia-card" data-categoria="eventos">
                    <div class="noticia-imagen">
                        <img src="https://placehold.co/600x400" alt="Imagen de noticia">
                        <div class="noticia-fold"></div>
                    </div>
                    <div class="noticia-contenido">
                        <div class="noticia-meta">
                            <span class="noticia-fecha"><i class="far fa-calendar-alt"></i> 5 Abril, 2023</span>
                            <span class="noticia-categoria">Eventos</span>
                        </div>
                        <h2 class="noticia-titulo">Feria de ciencias y tecnología 2023</h2>
                        <p class="noticia-extracto">El próximo 20 de mayo se realizará la feria anual donde los estudiantes presentarán sus proyectos innovadores en diversas áreas del conocimiento.</p>
                        <a href="#" class="noticia-enlace">Leer más <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <!-- Noticia 4 -->
                <article class="noticia-card" data-categoria="proyectos">
                    <div class="noticia-imagen">
                        <img src="https://placehold.co/600x400" alt="Imagen de noticia">
                        <div class="noticia-fold"></div>
                    </div>
                    <div class="noticia-contenido">
                        <div class="noticia-meta">
                            <span class="noticia-fecha"><i class="far fa-calendar-alt"></i> 1 Abril, 2023</span>
                            <span class="noticia-categoria">Proyectos</span>
                        </div>
                        <h2 class="noticia-titulo">Proyecto de energía renovable gana concurso provincial</h2>
                        <p class="noticia-extracto">Estudiantes de 6° año de Electromecánica desarrollaron un sistema de generación eléctrica con paneles solares que fue reconocido a nivel provincial.</p>
                        <a href="#" class="noticia-enlace">Leer más <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <!-- Noticia 5 -->
                <article class="noticia-card" data-categoria="institucional">
                    <div class="noticia-imagen">
                        <img src="https://placehold.co/600x400" alt="Imagen de noticia">
                        <div class="noticia-fold"></div>
                    </div>
                    <div class="noticia-contenido">
                        <div class="noticia-meta">
                            <span class="noticia-fecha"><i class="far fa-calendar-alt"></i> 28 Marzo, 2023</span>
                            <span class="noticia-categoria">Institucional</span>
                        </div>
                        <h2 class="noticia-titulo">Convenio con empresas locales para prácticas profesionales</h2>
                        <p class="noticia-extracto">La escuela firmó acuerdos con cinco empresas de la región para que los estudiantes puedan realizar prácticas profesionales durante el último año.</p>
                        <a href="#" class="noticia-enlace">Leer más <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>

                <!-- Noticia 6 -->
                <article class="noticia-card" data-categoria="academico">
                    <div class="noticia-imagen">
                        <img src="https://placehold.co/600x400" alt="Imagen de noticia">
                        <div class="noticia-fold"></div>
                    </div>
                    <div class="noticia-contenido">
                        <div class="noticia-meta">
                            <span class="noticia-fecha"><i class="far fa-calendar-alt"></i> 25 Marzo, 2023</span>
                            <span class="noticia-categoria">Académico</span>
                        </div>
                        <h2 class="noticia-titulo">Nuevos talleres extracurriculares para el ciclo 2023</h2>
                        <p class="noticia-extracto">Este año se incorporan talleres de robótica, diseño 3D y programación de videojuegos como actividades complementarias para todos los estudiantes.</p>
                        <a href="#" class="noticia-enlace">Leer más <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
            </section>

            <!-- Paginación -->
            <div class="paginacion">
                <button class="pag-btn active">1</button>
                <button class="pag-btn">2</button>
                <button class="pag-btn">3</button>
                <button class="pag-btn next"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </main>

    <!-- Footer (puedes reutilizar el footer de tu página principal) -->
    <?php include 'footer.php'; ?>

<!--Scripts-->
<script>
    const filtroBtns = document.querySelectorAll('.filtro-btn');
const noticiaCards = document.querySelectorAll('.noticia-card');

filtroBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        // Remover clase active de todos los botones
        filtroBtns.forEach(b => b.classList.remove('active'));
        
        // Añadir clase active al botón clickeado
        this.classList.add('active');
        const categoria = this.getAttribute('data-categoria');
        
        // Mostrar/ocultar noticias según la categoría
        noticiaCards.forEach(card => {
            if (categoria === 'todas' || card.getAttribute('data-categoria') === categoria) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
</script>
</body>
</html>