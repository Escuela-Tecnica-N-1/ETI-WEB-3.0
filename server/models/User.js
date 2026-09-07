const { Schema, model, SchemaType } = require('mongoose');

const userSchema = new Schema({
    nombre: { type: String, required: true },
    email: { type: String, required: true },
    contrasena: { type: String, required: true },
    roles: {
        type: [String],
        enum: ['admin', 'profesor', 'alumno'],
        default: ['alumno']
    },
    verificado: { type: Boolean, default: false },  // true = ya confirmó su email.
    tokenVerificacion: { type: String }, // token random que se manda por mail.
    tokenVerificacionExpira: { type: Date }, // vence a las 24hs.

    // --- Recuperación de contraseña ("olvidé mi contraseña") ⬇️ ---

    // Mientras tokenReset no sea null y no haya expirado, hay un reset pendiente.
    // Se limpia (vuelve a null) apenas se usa o al vencer, para que no se reutilice.
    tokenReset: { type: String, default: null },

    // Ventana de validez del token de reset. Corta a propósito (15-30 min),
    // a diferencia de las 24hs de verificación de email: acá el token
    // permite cambiar la contraseña, así que conviene exponerlo poco tiempo.
    tokenResetExpira: { type: Date, default: null },

    // Se actualiza cada vez que el usuario cambia su contraseña (por el reseteo). Sirve para invalidar JWTs viejos:
    // en authenticateToken se compara este valor contra el "iat" (issued-at)
    // del token — si el token fue emitido ANTES de este timestamp, se rechaza,
    // aunque todavía no haya expirado. Así, si alguien resetea su contraseña
    // porque sospecha que le robaron la sesión, cualquier JWT viejo queda muerto.
    passwordChangedAt: { type: Date, default: null }
});

const User = model('User', userSchema);
module.exports = User;