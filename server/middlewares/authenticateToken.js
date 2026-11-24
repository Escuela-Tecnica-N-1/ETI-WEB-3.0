// middlewares/authenticateToken.js
const jwt = require('jsonwebtoken');
const User = require('../models/User');

const authenticateToken = async (req, res, next) => {
    const token = req.cookies.token;

    if (!token) {
        return res.status(401).json({ success: false, message: 'Token requerido' });
    }

    jwt.verify(token, process.env.JWT_SECRET, async (err, decoded) => {
        if (err) {
            return res.status(403).json({ success: false, message: 'Token inválido' });
        }

        try {
            const usuario = await User.findById(decoded.id);

            if (!usuario) {
                return res.status(403).json({ success: false, message: 'Usuario no encontrado' });
            }

            // decoded.iat viene en SEGUNDOS (estándar JWT).
            // passwordChangedAt es un Date de Mongo, en MILISEGUNDOS.
            if (usuario.passwordChangedAt) {
                const passwordChangedTimestamp = Math.floor(usuario.passwordChangedAt.getTime() / 1000);

                if (passwordChangedTimestamp > decoded.iat) {
                    return res.status(403).json({ success: false, message: 'Token inválido: la contraseña cambió después de emitirse' });
                }
            }

            req.user = decoded;
            next();
        } catch (error) {
            console.error('Error en authenticateToken:', error);
            return res.status(500).json({ success: false, message: 'Error al verificar la sesión' });
        }
    });
};

module.exports = authenticateToken;