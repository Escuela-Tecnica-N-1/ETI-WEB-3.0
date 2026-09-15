<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan de Estudios</title>

    <link rel="stylesheet" href="css/Plan_estudio.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" href="imagenes/escudo.png" type="image/png">
</head>

<body>

  <?php include 'header.php'; ?>

  <?php include 'navbar.php'; ?>

<main>
  <div class="container">
    <h1>Plan de Estudio</h1>
    <div class="controls">
        <div class="year-selector">
          <label for="year-select">Seleccionar Año:</label>
            <select id="year-select">
              <option value="1">1er Año</option>
              <option value="2">2do Año</option>
              <option value="3">3er Año</option>
              <option value="4">4to Año</option>
              <option value="5">5to Año</option>
              <option value="6">6to Año</option>
              <option value="7">7mo Año</option>
            </select>
        </div>

      <div class="specialty-selector" id="specialty-container">
        <label for="specialty-select">Especialidad:</label>
        <select id="specialty-select">
          <option value="informatica">Informática</option>
          <option value="electromecanica">Electromecánica</option>
        </select>
      </div>
    </div>

    <div class="schedule-container">
      <table id="plan-table" class="plan-table">
        <thead>
          <tr>
            <th>Materia</th>
            <th>Horas Semanales</th>
            <th>Total de Horas</th>
          </tr>
        </thead>

        <tbody id="plan-body">
        <!-- El contenido se genera dinámicamente con JavaScript -->
        </tbody>
      </table>
    </div>
  </div>
</main>

    <?php include 'footer.php'; ?>

    <script src="js/Plan_estudio.js"></script>

</body>

</html>