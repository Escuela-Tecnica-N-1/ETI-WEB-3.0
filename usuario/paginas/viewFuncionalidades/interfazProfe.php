<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interfaz Docente</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/interfaz_profe.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="icon" href="imagenes/escudo.png" type="image/png">
</head>
<body>
<!-- HEADER -->
<header>
    <div class="container header-content asd">
        <div class="logo">
          <a href="index.php">
            <img src="imagenes/escudo.png" alt="Escudo de la Escuela Técnica">
            <h1>Escuela Técnica N°1</h1>
          </a>
        </div>
        <a href="index.php" class="logout-link">
        <img class="logout" src="imagenes/cerrar sesión.png" alt="Cerrar sesión">
      </a>
    </div>
</header>

<div class="wrapper">
  <!-- SECCIÓN DE TARJETAS -->
  <section class="card-section container">
    <div class="card-grid">
      <div class="card">
        <div class="card-header">
          <h3>Contenidos digitales didácticos</h3>
        </div>
        <div class="card-content">
          <p>Accede, edita y genera tus contenidos digitales didácticos.</p>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h3>Asistencias</h3>
        </div>
        <div class="card-content">
          <p>Registra la asistencia de tus estudiantes de forma ágil.</p>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h3>Evaluaciones</h3>
        </div>
        <div class="card-content">
          <p>Crea y gestiona instrumentos de evaluación personalizados.</p>
        </div>
      </div>
    </div>

    <div class="cta-container">
      <a href="formularioProfes.php" class="btn-green">Crear un nuevo contenido digital didáctico</a>
    </div>
  </section>
</div>

  <!-- FOOTER -->
  <?php include 'footer.php'; ?>

</body>
</html>
