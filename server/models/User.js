const { Schema, model, SchemaType } = require('mongoose');

const userSchema = new Schema({
    nombre: { type: String, required: true },
    email: { type: String, required: true },
    contrasena: { type: String, required: true },
    roles: [{ type: String, enum: ['admin', 'profesor', 'alumno'], default: ['alumno'] }],
    verificado: { type: Boolean, default: false },
    tokenVerificacion: { type: String },
    tokenVerificacionExpira: { type: Date }
});

const User = model('User', userSchema);
module.exports = User;