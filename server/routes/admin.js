const express = require('express');
const jwt = require('jsonwebtoken');
const User = require('../models/User');

const router = express.Router();

// Middleware: verifica que el token sea válido
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

// Middleware: verifica que el usuario sea admin
const soloAdmin = (req, res, next) => {
    if (!req.user.roles.includes('admin')) {
        return res.status(403).json({ success: false, message: 'Solo los admins pueden hacer esto' });
    }
    next();
};

// GET /admin/usuarios - Traer todos los usuarios
router.get('/usuarios', authenticateToken, soloAdmin, async (req, res) => {
    try {
        // El -contrasena le dice a MongoDB que traiga todo MENOS la contraseña
        const usuarios = await User.find().select('-contrasena');
        res.json({ success: true, usuarios });
    } catch (error) {
        console.error('Error al obtener usuarios:', error);
        res.status(500).json({ success: false, message: 'Error del servidor' });
    }
});

// PUT /admin/usuarios/:id/roles - Cambiar roles de un usuario
router.put('/usuarios/:id/roles', authenticateToken, soloAdmin, async (req, res) => {
    try {
        // req.params.id es el ID que viene en la URL
        // req.body.roles son los nuevos roles que manda el frontend
        const { roles } = req.body;

        const usuario = await User.findByIdAndUpdate(
            req.params.id,
            { $set: { roles } },
            { new: true } // devuelve el usuario ya actualizado
        ).select('-contrasena');

        if (!usuario) {
            return res.status(404).json({ success: false, message: 'Usuario no encontrado' });
        }

        res.json({ success: true, message: 'Roles actualizados', usuario });
    } catch (error) {
        console.error('Error al actualizar roles:', error);
        res.status(500).json({ success: false, message: 'Error del servidor' });
    }
});

// DELETE /admin/usuarios/:id - Eliminar un usuario
router.delete('/usuarios/:id', authenticateToken, soloAdmin, async (req, res) => {
    try {
        // Evita que el admin se elimine a sí mismo
        if (req.params.id === req.user.id) {
            return res.status(400).json({ success: false, message: 'No podés eliminarte a vos mismo' });
        }

        const usuario = await User.findByIdAndDelete(req.params.id);

        if (!usuario) {
            return res.status(404).json({ success: false, message: 'Usuario no encontrado' });
        }

        res.json({ success: true, message: 'Usuario eliminado' });
    } catch (error) {
        console.error('Error al eliminar usuario:', error);
        res.status(500).json({ success: false, message: 'Error del servidor' });
    }
});

module.exports = router;