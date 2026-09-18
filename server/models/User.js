<<<<<<< HEAD
<<<<<<< HEAD
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
    verificado: { type: Boolean, default: false },  // Si es true es prq ya confirmó su email.
    tokenVerificacion: { type: String }, // token random que se manda por mail.
    tokenVerificacionExpira: { type: Date }, // Duración. Vence a las 24hs.
    ultimoReenvioVerificacion: { type: Date}, // Este sirve para indicar cuando fue el último reenvio del gmail para verificar la cuenta
    
    // --- Recuperación de contraseña ("olvidé mi contraseña") ⬇️ 
    tokenReset: { type: String, default: null },   // Mientras tokenReset no sea null y no haya expirado, hay un reset pendiente. Y se limpia (vuelve a null) apenas se usa o al vencer, para que no se reutilice.
    tokenResetExpira: { type: Date, default: null },  // Ventana de validez del token de reset. Corta a propósito (15-30 min), a diferencia de las 24hs de verificación de email: acá el token permite cambiar la contraseña, así que conviene exponerlo poco tiempo.
    passwordChangedAt: { type: Date, default: null }    // Se actualiza cada vez que el usuario cambia su contraseña (por el reseteo). Sirve para invalidar JWTs viejos: en authenticateToken se compara este valor contra el "iat" (issued-at) del token — si el token fue emitido ANTES de este timestamp, se rechaza, aunque todavía no haya expirado. Así, si alguien resetea su contraseña porque sospecha que le robaron la sesión, cualquier JWT viejo queda muerto.
});

const User = model('User', userSchema);
=======
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
    verificado: { type: Boolean, default: false },  // Si es true es prq ya confirmó su email.
    tokenVerificacion: { type: String }, // token random que se manda por mail.
    tokenVerificacionExpira: { type: Date }, // Duración. Vence a las 24hs.
    ultimoReenvioVerificacion: { type: Date}, // Este sirve para indicar cuando fue el último reenvio del gmail para verificar la cuenta
    
    // --- Recuperación de contraseña ("olvidé mi contraseña") ⬇️ 
    tokenReset: { type: String, default: null },   // Mientras tokenReset no sea null y no haya expirado, hay un reset pendiente. Y se limpia (vuelve a null) apenas se usa o al vencer, para que no se reutilice.
    tokenResetExpira: { type: Date, default: null },  // Ventana de validez del token de reset. Corta a propósito (15-30 min), a diferencia de las 24hs de verificación de email: acá el token permite cambiar la contraseña, así que conviene exponerlo poco tiempo.
    passwordChangedAt: { type: Date, default: null }    // Se actualiza cada vez que el usuario cambia su contraseña (por el reseteo). Sirve para invalidar JWTs viejos: en authenticateToken se compara este valor contra el "iat" (issued-at) del token — si el token fue emitido ANTES de este timestamp, se rechaza, aunque todavía no haya expirado. Así, si alguien resetea su contraseña porque sospecha que le robaron la sesión, cualquier JWT viejo queda muerto.
});

const User = model('User', userSchema);
>>>>>>> 4f8cd05ede75ffd85e63997c76811357776e14f6
=======
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
    verificado: { type: Boolean, default: false },  // Si es true es prq ya confirmó su email.
    tokenVerificacion: { type: String }, // token random que se manda por mail.
    tokenVerificacionExpira: { type: Date }, // Duración. Vence a las 24hs.
    ultimoReenvioVerificacion: { type: Date}, // Este sirve para indicar cuando fue el último reenvio del gmail para verificar la cuenta
    
    // --- Recuperación de contraseña ("olvidé mi contraseña") ⬇️ 
    tokenReset: { type: String, default: null },   // Mientras tokenReset no sea null y no haya expirado, hay un reset pendiente. Y se limpia (vuelve a null) apenas se usa o al vencer, para que no se reutilice.
    tokenResetExpira: { type: Date, default: null },  // Ventana de validez del token de reset. Corta a propósito (15-30 min), a diferencia de las 24hs de verificación de email: acá el token permite cambiar la contraseña, así que conviene exponerlo poco tiempo.
    passwordChangedAt: { type: Date, default: null }    // Se actualiza cada vez que el usuario cambia su contraseña (por el reseteo). Sirve para invalidar JWTs viejos: en authenticateToken se compara este valor contra el "iat" (issued-at) del token — si el token fue emitido ANTES de este timestamp, se rechaza, aunque todavía no haya expirado. Así, si alguien resetea su contraseña porque sospecha que le robaron la sesión, cualquier JWT viejo queda muerto.
});

const User = model('User', userSchema);
>>>>>>> 4f8cd05ede75ffd85e63997c76811357776e14f6
module.exports = User;