<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subir Archivo - Interfaz Docente</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="css/formulario_profes.css">
  <link rel="icon" href="imagenes/escudo.png" type="image/png">
</head>
<body>
  <header>
    <div class="container header-content">
      <div class="logo">
        <a href="interfazProfe.php">
          <img src="imagenes/escudo.png" alt="Escudo de la Escuela Técnica">
          <h1>Escuela Técnica N°1</h1>
        </a>
      </div>
      <a href="interfazProfe.php" class="logout-link">
        <img class="logout" src="imagenes/cerrar sesión.png" alt="Cerrar sesión">
      </a>
    </div>
  </header>

  <div class="wrapper">
    <section class="form-section container">
      <div class="form-container">
        <div class="form-header">
          <h2><i class="fas fa-upload"></i> Subir Nuevo Archivo</h2>
          <p>Completa los datos para agregar un nuevo contenido digital didáctico</p>
        </div>

        <form id="uploadForm" method="POST" action="http://localhost:3000/api/upload" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group">
              <label for="nombreTarea">
                <i class="fas fa-tasks"></i> Nombre de la tarea *
              </label>
              <input type="text" id="nombreTarea" name="nombreTarea" required>
              <div class="error-message">Este campo es obligatorio</div>
            </div>

            <div class="form-group">
              <label for="materia">
                <i class="fas fa-book"></i> Materia *
              </label>
              <select name="category" id="materia" required>
                <option value="" selected disabled >Seleccionar materia</option>
                <option value="matematicas">Matemáticas</option>
                <option value="lengua">Lengua y Literatura</option>
                <option value="ciencias">Ciencias Naturales</option>
                <option value="historia">Historia</option>
                <option value="geografia">Geografía</option>
                <option value="fisica">Física</option>
                <option value="quimica">Química</option>
                <option value="biologia">Biología</option>
                <option value="informatica">Informática</option>
                <option value="tecnologia">Tecnología</option>
                <option value="ingles">Inglés</option>
                <option value="educacion_fisica">Educación Física</option>
                <option value="arte">Arte</option>
                <option value="musica">Música</option>
              </select>
              <div class="error-message">Por favor selecciona una materia</div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="año">
                <i class="fas fa-calendar-alt"></i> Año *
              </label>
              <select name="año" id="año" required>
                <option value="" selected disabled>Seleccionar año</option>
                <option value="1">1° Año</option>
                <option value="2">2° Año</option>
                <option value="3">3° Año</option>
                <option value="4">4° Año</option>
                <option value="5">5° Año</option>
                <option value="6">6° Año</option>
                <option value="7">7° Año</option>
              </select>
              <div class="error-message">Por favor selecciona un año</div>
            </div>

            <div class="form-group">
              <label for="archivo">
                <i class="fas fa-file-upload"></i> Archivo *
              </label>
              <div class="file-input-container">
                <input type="file" id="archivo" name="file" class="file-input" required accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.txt,.jpg,.jpeg,.png,.gif,.mp4,.avi,.mp3,.wav">
                <label for="archivo" class="file-label">
                  <i class="fas fa-cloud-upload-alt"></i>
                  <span>Seleccionar archivo</span>
                </label>
                <div class="file-info" id="fileInfo"></div>
              </div>
              <div class="error-message">Por favor selecciona un archivo</div>
            </div>
          </div>

          <div class="form-group">
            <label for="descripcion">
              <i class="fas fa-align-left"></i> Descripción breve / Consigna *
            </label>
            <textarea id="descripcion" name="descripcion" placeholder="Describe brevemente el contenido del archivo o proporciona la consigna para los estudiantes..." required></textarea>
            <div class="error-message">Este campo es obligatorio</div>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-upload"></i>
              Subir Archivo
            </button>
            <a href="interfazProfe.php" class="btn btn-secondary">
              <i class="fas fa-times"></i>
              Cancelar
            </a>
          </div>
        </form>

        <div id="mensaje" style="margin-top: 15px;"></div>
      </div>
    </section>
  </div>

  <footer>
    <div class="container">
      <p>&copy; <span id="current-year"></span> Escuela Técnica N°1. Todos los derechos reservados.</p>
    </div>
  </footer>

<script>
  // Mostrar nombre del archivo seleccionado
  const archivoInput = document.getElementById('archivo');
  const fileInfo = document.getElementById('fileInfo');
  archivoInput.addEventListener('change', function () {
    if (this.files.length > 0) {
      fileInfo.textContent = this.files[0].name;
    } else {
      fileInfo.textContent = '';
    }
  });

  // Envío del formulario al backend en Node.js
  document.getElementById('uploadForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData();
    formData.append('file', document.getElementById('archivo').files[0]);
    formData.append('description', document.getElementById('descripcion').value);
    formData.append('category', document.getElementById('materia').value);
    formData.append('anio', document.getElementById('año').value);
    formData.append('taskName', document.getElementById('nombreTarea').value);

    const mensaje = document.getElementById('mensaje');

    try {
      const response = await fetch('/api/upload', {
        method: 'POST',
        credentials: 'include',
        body: formData
      });

      const result = await response.json();
      if (result.success) {
        mensaje.style.color = 'green';
        mensaje.innerText = 'Archivo subido exitosamente.';
        this.reset();
        fileInfo.innerText = '';
      } else {
        mensaje.style.color = 'red';
        mensaje.innerText = 'Error: ' + (result.message || 'Subida fallida.');
      }
    } catch (error) {
      console.error(error);
      mensaje.style.color = 'red';
      mensaje.innerText = 'Error al conectar con el servidor.';
    }
  });

  // Año dinámico en el footer
  document.getElementById('current-year').textContent = new Date().getFullYear();
</script>

</body>
</html>
