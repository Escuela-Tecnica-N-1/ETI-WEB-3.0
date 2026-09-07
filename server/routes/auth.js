const express = require('express');
const bcrypt = require('bcrypt');

const crypto = require('crypto');
const { enviarMailVerificacion } = require('../services/emailService');

const jwt = require('jsonwebtoken');
const dotenv = require('dotenv');
dotenv.config();

const router = express.Router();
const User = require('../models/User');

// POST /register
router.post('/register', async (req, res) => {
  const { nombre, email, contrasena } = req.body;

  try {
    const existe = await User.findOne({ email });
    if (existe) {
      return res.status(400).json({ success: false, message: 'Ya existe un usuario con ese email' });
    }

    const contrasenaHasheada = await bcrypt.hash(contrasena, 10);
    const tokenVerificacion = crypto.randomBytes(32).toString('hex');
    const tokenVerificacionExpira = new Date(Date.now() + 24 * 60 * 60 * 1000); // 24hs

    const hayUsuarios = await User.findOne();
    const datosUsuario = {
      nombre,
      email,
      contrasena: contrasenaHasheada,
      tokenVerificacion,
      tokenVerificacionExpira
    };

    if (!hayUsuarios) {
      datosUsuario.roles = ['admin', 'profesor'];
    }

    const nuevoUser = new User(datosUsuario);
    await nuevoUser.save();

    await enviarMailVerificacion(email, tokenVerificacion);

    res.status(201).json({ success: true, message: 'Registro exitoso. Revisá tu email para verificar tu cuenta.' });
  } catch (error) {
    console.error('Error en registro:', error);
    res.status(500).json({ success: false, message: 'Error al registrar usuario' });
  }
});

// POST /login
router.post('/login', async (req, res) => {
  const { email, contrasena } = req.body;

  try {
    const usuario = await User.findOne({ email });
    if (!usuario) {
      return res.status(401).json({ success: false, message: 'Credenciales inválidas' });
    }

    const match = await bcrypt.compare(contrasena, usuario.contrasena);
    if (!match) {
      return res.status(401).json({ success: false, message: 'Credenciales inválidas' });
    }

    if (!usuario.verificado) {
      return res.status(403).json({ success: false, message: 'Debés verificar tu email antes de ingresar' });
    }

    const token = jwt.sign(
      {
        id: usuario._id,
        nombre: usuario.nombre,
        email: usuario.email,
        roles: usuario.roles
      },
      process.env.JWT_SECRET,
      { expiresIn: '2h' }
    );

    res.cookie('token', token, { //El token entre ' ' es el nombre de la Cookie
      httpOnly: true,
      secure: process.env.NODE_ENV === 'production', // solo HTTPS en prod, en dev funciona sin HTTPS
      sameSite: 'Lax',
      maxAge: 2 * 60 * 60 * 1000 // 2 horas en milisegundos, igual que el JWT
    })
    // console.log('Cookie seteada'); Para ver que si la cookie se setea
    res.json({ success: true, message: 'Login exitoso' });
  } catch (error) {
    // console.error('Error en login:', error);  Para ver si salta algún error en el login
    res.status(500).json({ success: false, message: 'Error del servidor' });
  }
});

router.get('/verify', async (req, res) => {
  const { token } = req.query;

  if (!token) {
    return res.status(400).json({ success: false, message: 'Token no provisto' });
  }

  try {
    const usuario = await User.findOne({
      tokenVerificacion: token,
      tokenVerificacionExpira: { $gt: new Date() }
    });

    if (!usuario) {
      return res.status(400).json({ success: false, message: 'Token inválido o expirado' });
    }

    usuario.verificado = true;
    usuario.tokenVerificacion = undefined;
    usuario.tokenVerificacionExpira = undefined;
    await usuario.save();

    res.json({ success: true, message: 'Cuenta verificada correctamente' });
  } catch (error) {
    console.error('Error en verificación:', error);
    res.status(500).json({ success: false, message: 'Error al verificar la cuenta' });
  }
});

// GET /api/me — verifica el token de la cookie y devuelve el usuario
router.get('/me', (req, res) => {
  const token = req.cookies.token;

  if (!token) {
    return res.status(401).json({ error: 'No autenticado' });
  }

  try {
    const decoded = jwt.verify(token, process.env.JWT_SECRET);
    res.json({ id: decoded.id, nombre: decoded.nombre, email: decoded.email, roles: decoded.roles });
  } catch (err) {
    return res.status(401).json({ error: 'Token inválido o expirado' });
  }
});

// POST /logout
router.post('/logout', (req, res) => {
  res.clearCookie('token', {
    httpOnly: true,
    secure: process.env.NODE_ENV === 'production',
    sameSite: 'Strict'
  });
  res.json({ success: true, message: 'Sesión cerrada' });
});

module.exports = router;
