class FileManager {
  constructor() {
    this.baseURL = 'http://localhost:3000/api';
    this.token = localStorage.getItem('token');
    this.init();
  }

  init() {
    this.setupEventListeners();
    this.loadFiles();
  }

  setupEventListeners() {
    // Configurar drag & drop
    const dropZone = document.getElementById('drop-zone');
    if (dropZone) {
      ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, this.preventDefaults, false);
      });

      ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => dropZone.classList.add('drag-over'), false);
      });

      ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => dropZone.classList.remove('drag-over'), false);
      });

      dropZone.addEventListener('drop', (e) => this.handleDrop(e), false);
      dropZone.addEventListener('click', () => document.getElementById('file-input').click());
    }

    // Input de archivo
    const fileInput = document.getElementById('file-input');
    if (fileInput) {
      fileInput.addEventListener('change', (e) => this.handleFileSelect(e));
    }

    // Botón de subida
    const uploadBtn = document.getElementById('upload-btn');
    if (uploadBtn) {
      uploadBtn.addEventListener('click', () => this.uploadSelectedFiles());
    }

    // Filtros de categoría
    const categoryFilter = document.getElementById('category-filter');
    if (categoryFilter) {
      categoryFilter.addEventListener('change', () => this.filterByCategory());
    }

    // Buscador
    const searchInput = document.getElementById('search-input');
    if (searchInput) {
      searchInput.addEventListener('input', () => this.searchFiles());
    }
  }

  preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
  }

  handleDrop(e) {
    const files = Array.from(e.dataTransfer.files);
    this.processFiles(files);
  }

  handleFileSelect(e) {
    const files = Array.from(e.target.files);
    this.processFiles(files);
  }

  processFiles(files) {
    const fileList = document.getElementById('selected-files');
    fileList.innerHTML = '';

    files.forEach((file, index) => {
      if (this.isValidFile(file)) {
        const fileItem = this.createFileItem(file, index);
        fileList.appendChild(fileItem);
      } else {
        this.showMessage(`Archivo no válido: ${file.name}`, 'error');
      }
    });

    this.selectedFiles = files.filter(file => this.isValidFile(file));
    document.getElementById('upload-btn').disabled = this.selectedFiles.length === 0;
  }

  isValidFile(file) {
    const validTypes = [
      'application/pdf',
      'application/msword',
      'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
      'application/vnd.ms-excel',
      'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
      'image/jpeg',
      'image/png',
      'image/gif',
      'image/webp',
      'text/plain'
    ];

    const maxSize = 50 * 1024 * 1024; // 50MB

    return validTypes.includes(file.type) && file.size <= maxSize;
  }

  createFileItem(file, index) {
    const div = document.createElement('div');
    div.className = 'file-item';
    div.innerHTML = `
      <div class="file-info">
        <i class="fas ${this.getFileIcon(file.type)}"></i>
        <span class="file-name">${file.name}</span>
        <span class="file-size">${this.formatFileSize(file.size)}</span>
      </div>
      <div class="file-meta">
        <input type="text" placeholder="Descripción" class="file-description" data-index="${index}">
        <select class="file-category" data-index="${index}">
          <option value="general">General</option>
          <option value="contenido_didactico">Contenido Didáctico</option>
          <option value="evaluaciones">Evaluaciones</option>
          <option value="asistencias">Asistencias</option>
          <option value="presentaciones">Presentaciones</option>
          <option value="documentos">Documentos</option>
          <option value="imagenes">Imágenes</option>
        </select>
        <button type="button" class="remove-file" onclick="fileManager.removeFile(${index})">
          <i class="fas fa-trash"></i>
        </button>
      </div>
    `;
    return div;
  }

  removeFile(index) {
    this.selectedFiles.splice(index, 1);
    this.processFiles(this.selectedFiles);
  }

  async uploadSelectedFiles() {
    if (!this.selectedFiles || this.selectedFiles.length === 0) return;

    const uploadBtn = document.getElementById('upload-btn');
    uploadBtn.disabled = true;
    uploadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Subiendo...';

    try {
      for (let i = 0; i < this.selectedFiles.length; i++) {
        const file = this.selectedFiles[i];
        const description = document.querySelector(`[data-index="${i}"].file-description`).value;
        const category = document.querySelector(`[data-index="${i}"].file-category`).value;

        await this.uploadSingleFile(file, description, category);
      }

      this.showMessage('Archivos subidos exitosamente', 'success');
      this.resetUploadForm();
      this.loadFiles();
    } catch (error) {
      this.showMessage('Error al subir archivos', 'error');
    } finally {
      uploadBtn.disabled = false;
      uploadBtn.innerHTML = '<i class="fas fa-upload"></i> Subir Archivos';
    }
  }

  async uploadSingleFile(file, description, category) {
    const formData = new FormData();
    formData.append('file', file);
    formData.append('description', description);
    formData.append('category', category);

    const response = await fetch(`${this.baseURL}/upload`, {
      method: 'POST',
      headers: {
        'Authorization': `Bearer ${this.token}`
      },
      body: formData
    });

    if (!response.ok) {
      throw new Error('Error en la subida');
    }

    return await response.json();
  }

  async loadFiles() {
    try {
      const response = await fetch(`${this.baseURL}/files`, {
        headers: {
          'Authorization': `Bearer ${this.token}`
        }
      });

      if (response.ok) {
        const data = await response.json();
        this.displayFiles(data.files);
      }
    } catch (error) {
      console.error('Error al cargar archivos:', error);
      this.showMessage('Error al cargar archivos', 'error');
    }
  }

  displayFiles(files) {
    const container = document.getElementById('files-container');
    if (!container) return;

    if (files.length === 0) {
      container.innerHTML = '<p class="no-files">No hay archivos subidos</p>';
      return;
    }

    container.innerHTML = files.map(file => this.createFileCard(file)).join('');
  }

  createFileCard(file) {
    return `
      <div class="file-card">
        <div class="file-header">
          <div class="file-icon">
            <i class="fas ${this.getFileIcon(file.mimetype)}"></i>
          </div>
          <div class="file-details">
            <h3 class="file-title">${file.originalName}</h3>
            <p class="file-meta">
              ${this.formatFileSize(file.size)} • ${this.formatDate(file.uploadDate)}
            </p>
            <span class="file-category-badge">${this.getCategoryName(file.category)}</span>
          </div>
        </div>
        
        ${file.description ? `<p class="file-description">${file.description}</p>` : ''}
        
        <div class="file-actions">
          <button onclick="fileManager.downloadFile('${file._id}')" class="btn-download">
            <i class="fas fa-download"></i> Descargar
          </button>
          <button onclick="fileManager.editFile('${file._id}')" class="btn-edit">
            <i class="fas fa-edit"></i> Editar
          </button>
          <button onclick="fileManager.deleteFile('${file._id}')" class="btn-delete">
            <i class="fas fa-trash"></i> Eliminar
          </button>
        </div>
      </div>
    `;
  }

  async downloadFile(fileId) {
    try {
      const response = await fetch(`${this.baseURL}/download/${fileId}`, {
        headers: {
          'Authorization': `Bearer ${this.token}`
        }
      });

      if (response.ok) {
        const blob = await response.blob();
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = response.headers.get('Content-Disposition')?.split('filename=')[1]?.replace(/"/g, '') || 'archivo';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        window.URL.revokeObjectURL(url);
      }
    } catch (error) {
      this.showMessage('Error al descargar archivo', 'error');
    }
  }

  async deleteFile(fileId) {
    if (!confirm('¿Estás seguro de que quieres eliminar este archivo?')) return;

    try {
      const response = await fetch(`${this.baseURL}/files/${fileId}`, {
        method: 'DELETE',
        headers: {
          'Authorization': `Bearer ${this.token}`
        }
      });

      if (response.ok) {
        this.showMessage('Archivo eliminado exitosamente', 'success');
        this.loadFiles();
      }
    } catch (error) {
      this.showMessage('Error al eliminar archivo', 'error');
    }
  }

  filterByCategory() {
    const category = document.getElementById('category-filter').value;
    if (category === 'all') {
      this.loadFiles();
    } else {
      this.loadFilesByCategory(category);
    }
  }

  async loadFilesByCategory(category) {
    try {
      const response = await fetch(`${this.baseURL}/files/category/${category}`, {
        headers: {
          'Authorization': `Bearer ${this.token}`
        }
      });

      if (response.ok) {
        const data = await response.json();
        this.displayFiles(data.files);
      }
    } catch (error) {
      this.showMessage('Error al filtrar archivos', 'error');
    }
  }

  getFileIcon(mimeType) {
    const iconMap = {
      'application/pdf': 'fa-file-pdf',
      'application/msword': 'fa-file-word',
      'application/vnd.openxmlformats-officedocument.wordprocessingml.document': 'fa-file-word',
      'application/vnd.ms-excel': 'fa-file-excel',
      'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet': 'fa-file-excel',
      'image/jpeg': 'fa-file-image',
      'image/png': 'fa-file-image',
      'image/gif': 'fa-file-image',
      'text/plain': 'fa-file-alt'
    };
    return iconMap[mimeType] || 'fa-file';
  }

  getCategoryName(category) {
    const categoryNames = {
      general: 'General',
      contenido_didactico: 'Contenido Didáctico',
      evaluaciones: 'Evaluaciones',
      asistencias: 'Asistencias',
      presentaciones: 'Presentaciones',
      documentos: 'Documentos',
      imagenes: 'Imágenes'
    };
    return categoryNames[category] || 'General';
  }

  formatFileSize(bytes) {
    if (bytes === 0) return '0 B';
    const k = 1024;
    const sizes = ['B', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
  }

  formatDate(dateString) {
    return new Date(dateString).toLocaleDateString('es-ES');
  }

  resetUploadForm() {
    document.getElementById('selected-files').innerHTML = '';
    document.getElementById('file-input').value = '';
    this.selectedFiles = [];
    document.getElementById('upload-btn').disabled = true;
  }

  showMessage(message, type) {
    const messageDiv = document.getElementById('message-container');
    if (messageDiv) {
      messageDiv.innerHTML = `
        <div class="message ${type}">
          <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'}"></i>
          ${message}
        </div>
      `;
      setTimeout(() => {
        messageDiv.innerHTML = '';
      }, 5000);
    }
  }
}

// Inicializar el gestor de archivos cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
  window.fileManager = new FileManager();
});