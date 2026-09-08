<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciclo Superior - Escuela Técnica</title>
    <link rel="stylesheet" href="css/informatica.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="imagenes/escudo.png" type="image/png">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <?php include 'navbar.php'; ?>

</body>
    <main>
        <div class="container">
            <section class="intro-section">
                <div class="section-header">
                    <h2>Ciclo Superior</h2>
                </div>
                <div class="intro-content">
                    <p>El ciclo superior de la Escuela de Educación Secundaria Técnica N°1 Gral. Manuel Belgrano abarca de cuarto a séptimo año y representa la etapa avanzada de la formación técnica. En esta fase, los estudiantes profundizan sus conocimientos y habilidades en la especialidad que han elegido, enfrentando desafíos más complejos y proyectos integradores que requieren mayor autonomía y responsabilidad.</p>
                    <p>Los talleres continúan siendo esenciales, permitiendo a los alumnos perfeccionar técnicas en áreas específicas como electrónica, mecánica, programación, automatización y diseño industrial. Así, los estudiantes consolidan su perfil profesional y se preparan para el ingreso al mundo laboral o la continuidad educativa en niveles superiores.</p>
                </div>
            </section>  
            <section class="modalities-section">
            <div class="container">
                <div class="section-header">
                    <h2>Nuestras Modalidades</h2>
                    <p>Ofrecemos dos especialidades técnicas para que nuestros estudiantes puedan elegir según sus intereses y
                        aptitudes.</p>
                </div>

                <div class="modalities-grid">
                    <div class="modality-card informatica">
                        <div class="modality-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3>Técnico en Informática Personal y Profesional</h3>
                        <p>Forma profesionales capacitados en el desarrollo de software, redes informáticas, y mantenimiento de
                            sistemas computacionales.</p>
                        <ul>
                            <li><i class="fas fa-chevron-right"></i> Programación y desarrollo web</li>
                            <li><i class="fas fa-chevron-right"></i> Redes y seguridad informática</li>
                            <li><i class="fas fa-chevron-right"></i> Bases de datos y sistemas de información</li>
                        </ul>
                        <a href="informatica.php"><button class="btn btn-blue">Explorar Informática</button></a>
                    </div>

                    <div class="modality-card electromecanica">
                        <div class="modality-icon">
                            <i class="fas fa-wrench"></i>
                        </div>
                        <h3>Técnico en Electromecánica</h3>
                        <p>Prepara técnicos con conocimientos en electricidad, mecánica y automatización para el mantenimiento y
                            operación de equipos industriales.</p>
                        <ul>
                            <li><i class="fas fa-chevron-right"></i> Sistemas eléctricos y electrónicos</li>
                            <li><i class="fas fa-chevron-right"></i> Mecánica industrial y automatización</li>
                            <li><i class="fas fa-chevron-right"></i> Diseño asistido por computadora (CAD)</li>
                        </ul>
                        <a href="electromecanica.php"><button class="btn btn-amber">Explorar Electromecánica</button></a>
                    </div>
                </div>
            </div>
        </section>
 
        </div>

        <?php include 'footer.php'; ?>
    </main>
</body>
</html>