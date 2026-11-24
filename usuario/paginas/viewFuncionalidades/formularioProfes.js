    //pone año
    document.getElementById('current-year').textContent = new Date().getFullYear();

    // Manejo del selector de archivos
    const fileInput = document.getElementById('archivo');
    const fileLabel = document.querySelector('.file-label span');
    const fileInfo = document.getElementById('fileInfo');

    fileInput.addEventListener('change', function(e) {
      const file = e.target.files[0];
      if (file) {
        fileLabel.textContent = file.name;
        
        // Mostrar información del archivo
        const fileSize = (file.size / 1024 / 1024).toFixed(2);
        fileInfo.innerHTML = `
          <strong>Archivo seleccionado:</strong><br>
          📄 Nombre: ${file.name}<br>
          📊 Tamaño: ${fileSize} MB<br>
          🗂️ Tipo: ${file.type || 'Desconocido'}
        `;
        fileInfo.classList.add('show');
      } else {
        fileLabel.textContent = 'Seleccionar archivo';
        fileInfo.classList.remove('show');
      }
    });

    // Validación del formulario
    const form = document.getElementById('uploadForm');
    const requiredFields = form.querySelectorAll('[required]');

    form.addEventListener('submit', function(e) {
      e.preventDefault();
      
      let isValid = true;
      
      // Validar campos requeridos
      requiredFields.forEach(field => {
        const formGroup = field.closest('.form-group');
        
        if (!field.value.trim()) {
          formGroup.classList.add('error');
          isValid = false;
        } else {
          formGroup.classList.remove('error');
        }
      });

      // Validar archivo específicamente
      if (!fileInput.files[0]) {
        fileInput.closest('.form-group').classList.add('error');
        isValid = false;
      } else {
        fileInput.closest('.form-group').classList.remove('error');
      }

      if (isValid) {
        // Simular subida de archivo
        const submitBtn = form.querySelector('.btn-primary');
        const originalText = submitBtn.innerHTML;
        
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Subiendo...';
        submitBtn.disabled = true;
        
        setTimeout(() => {
          alert('¡Archivo subido exitosamente!');
          submitBtn.innerHTML = originalText;
          submitBtn.disabled = false;
          form.reset();
          fileLabel.textContent = 'Seleccionar archivo';
          fileInfo.classList.remove('show');
        }, 2000);
      }
    });

    // Remover errores cuando el usuario empiece a escribir
    requiredFields.forEach(field => {
      field.addEventListener('input', function() {
        const formGroup = this.closest('.form-group');
        if (this.value.trim()) {
          formGroup.classList.remove('error');
        }
      });
    });