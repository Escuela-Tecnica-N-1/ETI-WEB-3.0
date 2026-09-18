const express = require('express');
const multer = require('multer');
const path = require('path');
const fs = require('fs');

const app = express();
const PORT = 3000;

// Middleware para parsear el cuerpo de las solicitudes
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

// Configuración de almacenamiento de Multer
const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    const { anio, curso, materia } = req.body;
    const dir = path.join(__dirname, '..', 'uploads', anio, curso, materia);

    // Crear el directorio si no existe
    fs.mkdirSync(dir, { recursive: true });
    cb(null, dir);
  },
  filename: (req, file, cb) => {
    const timestamp = Date.now();
    const originalName = file.originalname;
    cb(null, `${timestamp}-${originalName}`);
  }
});

const upload = multer({ storage });

// Ruta para manejar la subida de archivos
app.post('/subir', upload.single('archivo'), (req, res) => {
  if (!req.file) {
    return res.status(400).send('No se subió ningún archivo.');
  }
  res.send(`Archivo subido correctamente a ${req.file.path}`);
});

app.listen(PORT, () => {
  console.log(`Servidor de subida escuchando en http://localhost:${PORT}`);
});
