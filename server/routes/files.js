const express = require('express');
const multer = require('multer');
const path = require('path');
const fs = require('fs').promises;
const jwt = require('jsonwebtoken');
const File = require('../models/File');

const router = express.Router();

// verificacion token JWT
const authenticateToken = (req, res, next) => {
  const token = req.cookies.token;

  if (!token) {
    return res.status(401).json({ success: false, message: 'Token requerido' });
  }

  jwt.verify(token, process.env.JWT_SECRET, (err, user) => {
    if (err) {
      return res.status(403).json({ success: false, message: 'Token inválido' });
    }
    req.user = user;
    next();
  });
};

// Esto es la verificacion de roles
const verificarRol = (rolesPermitidos) => {
  return (req, res, next) => {
    const roles = req.user.roles; // Agarrar los roles del usuario desde el token
    const tieneAcceso = rolesPermitidos.some(rol => roles.includes(rol)); // 

    if (!tieneAcceso) {
      return res.status(403).json({ success: false, message: 'No tenés permiso para esto' });
    }
    next();
  };
};

// configuración de multer para el almacenamiento de archivos
const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    const uploadPath = path.join(__dirname, '../uploads');

    // Si no existe la carpeta, la crea automáticamente
    fs.mkdir(uploadPath, { recursive: true })
      .then(() => cb(null, uploadPath))
      .catch(err => cb(err));
  },

  filename: (req, file, cb) => {
    const uniqueSuffix = Date.now() + '-' + Math.round(Math.random() * 1e9);
    const extension = path.extname(file.originalname);
    cb(null, `${uniqueSuffix}${extension}`);
  }
});



// Filtro para tipos de archivo permitidos
const fileFilter = (req, file, cb) => {
  const allowedTypes = [
    'application/pdf',
    'application/msword',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'application/vnd.ms-excel',
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    'application/vnd.ms-powerpoint',
    'application/vnd.openxmlformats-officedocument.presentationml.presentation',
    'image/jpeg',
    'image/png',
    'image/gif',
    'image/webp',
    'text/plain'
  ];

  if (allowedTypes.includes(file.mimetype)) {
    cb(null, true);
  } else {
    cb(new Error('Tipo de archivo no permitido'), false);
  }
};

const upload = multer({
  storage: storage,
  limits: {
    fileSize: 50 * 1024 * 1024 // 50MB máximo
  },
  fileFilter: fileFilter
});

// GET /files - Obtener todos los archivos del profesor
router.get('/files', authenticateToken, async (req, res) => {
  try {
    const files = await File.find({ UserId: req.user.id })
      .sort({ uploadDate: -1 });

    res.json({ success: true, files });
  } catch (error) {
    console.error('Error al obtener archivos:', error);
    res.status(500).json({ success: false, message: 'Error del servidor' });
  }
});

// POST /upload - Subir archivo
router.post('/upload', authenticateToken, verificarRol(['profesor', 'admin']), upload.single('file'), async (req, res) => {
  // console.log('Datos ingresados manualmente recibidos:', req.body); // Para ver la descripción, categoria, año y el nombre de la tarea.
  // console.log('Datos del archivo recibido:', req.file); // Para ver los datos del archivo
  try {
    if (!req.file) {
      return res.status(400).json({ success: false, message: 'No se proporcionó archivo' });
    }

    const { description, category } = req.body;

    // crea registro en la db
    const newFile = new File({
      filename: req.file.filename,
      originalName: req.file.originalname,
      mimetype: req.file.mimetype,
      size: req.file.size,
      path: req.file.path,
      description: description || '',
      category: category || 'general',
      UserId: req.user.id,
    });

    await newFile.save();

    res.status(201).json({
      success: true,
      message: 'Archivo subido exitosamente',
      file: {
        id: newFile._id,
        originalName: newFile.originalName,
        size: newFile.size,
        mimetype: newFile.mimetype,
        description: newFile.description,
        category: newFile.category,
        uploadDate: newFile.uploadDate
      }
    });
  } catch (error) {
    console.error('Error al subir archivo:', error);
    res.status(500).json({ success: false, message: 'Error al subir archivo' });
  }
});

// GET /download/:id - Descargar archivo
router.get('/download/:id', authenticateToken, async (req, res) => {
  try {
    const file = await File.findOne({
      _id: req.params.id,
      UserId: req.user.id
    });

    if (!file) {
      return res.status(404).json({ success: false, message: 'Archivo no encontrado' });
    }

    // Verificar que el archivo existe físicamente
    try {
      await fs.access(file.path);
    } catch {
      return res.status(404).json({ success: false, message: 'Archivo no encontrado en el servidor' });
    }

    // Configurar headers para descarga
    res.setHeader('Content-Disposition', `attachment; filename="${file.originalName}"`);
    res.setHeader('Content-Type', file.mimetype);

    // Enviar archivo
    res.sendFile(path.resolve(file.path));
  } catch (error) {
    console.error('Error al descargar archivo:', error);
    res.status(500).json({ success: false, message: 'Error al descargar archivo' });
  }
});

// DELETE /files/:id - Eliminar archivo
router.delete('/files/:id', authenticateToken, verificarRol(['profesor', 'admin']), async (req, res) => {
  try {
    const file = await File.findOne({
      _id: req.params.id,
      UserId: req.user.id
    });

    if (!file) {
      return res.status(404).json({ success: false, message: 'Archivo no encontrado' });
    }

    // Eliminar archivo físico
    try {
      await fs.unlink(file.path);
    } catch (error) {
      console.error('Error al eliminar archivo físico:', error);
    }

    // Eliminar registro de la base de datos
    await File.findByIdAndDelete(req.params.id);

    res.json({ success: true, message: 'Archivo eliminado exitosamente' });
  } catch (error) {
    console.error('Error al eliminar archivo:', error);
    res.status(500).json({ success: false, message: 'Error al eliminar archivo' });
  }
});

// PUT /files/:id - Actualizar información del archivo
router.put('/files/:id', authenticateToken, verificarRol(['profesor', 'admin']), async (req, res) => {

  try {
    const { description, category } = req.body;

    const file = await File.findOneAndUpdate(
      { _id: req.params.id, UserId: req.user.id },
      { description, category },
      { new: true }
    );

    if (!file) {
      return res.status(404).json({ success: false, message: 'Archivo no encontrado' });
    }

    res.json({ success: true, message: 'Archivo actualizado', file });
  } catch (error) {
    console.error('Error al actualizar archivo:', error);
    res.status(500).json({ success: false, message: 'Error al actualizar archivo' });
  }
});

// GET /files/category/:category - Obtener archivos por categoría
router.get('/files/category/:category', authenticateToken, async (req, res) => {
  try {
    const files = await File.find({
      UserId: req.user.id,
      category: req.params.category
    }).sort({ uploadDate: -1 });

    res.json({ success: true, files });
  } catch (error) {
    console.error('Error al obtener archivos por categoría:', error);
    res.status(500).json({ success: false, message: 'Error del servidor' });
  }
});

module.exports = router;