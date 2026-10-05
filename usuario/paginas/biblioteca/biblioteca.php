<?php require_once __DIR__ . '/../../../config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Escuela Técnica</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/usuario/css/styles.css">
    <link rel="stylesheet" href="biblioteca.css">

    <link rel="icon" href="<?= BASE_URL ?>/usuario/imagenes/escudo.png" type="image/png">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    
    <?php include BASE_PATH . '/usuario/paginas/componentes/header.php'; ?>

    <?php include BASE_PATH . '/usuario/paginas/componentes/navbar.php'; ?>

    <main>
        <div class="container">
            <section class="intro-section">
                <div class="section-header">
                    <h2>Biblioteca</h2>
                </div>
                <div class="intro-content">
                    <p>La Biblioteca de nuestra institución es un espacio destinado al estudio, la investigación y el desarrollo académico de los estudiantes. Cuenta con una amplia variedad de material bibliográfico relacionado con las especialidades de Informática y Electromecánica, además de recursos educativos para las materias de formacion</p>

                    <p>
                        Qué ofrece la biblioteca?
                        Libros técnicos de Informática y Electromecánica.
                        Manuales de programación, hardware y redes.
                        Material de consulta para Matemática, Física y Química.
                        Enciclopedias y diccionarios.
                        Revistas educativas y técnicas.
                        Espacios de lectura y estudio individual o grupal.
                        Acceso a computadoras con conexión a Internet para fines educativos.
                    </p>
                </div>
            </section>
            <img src="<?= BASE_URL ?>/usuario/imagenes/WhatsApp Image 2026-08-10 at 14.42.10.jpeg" alt="Descripción de la imagen">

    </main>

    <?php include BASE_PATH . '/usuario/paginas/componentes/footer.php'; ?>

</body>
</html>