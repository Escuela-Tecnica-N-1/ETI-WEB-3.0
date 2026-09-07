const { google } = require('googleapis');

const OAuth2 = google.auth.OAuth2;

function getOAuthClient() {
    const oauth2Client = new OAuth2(
        process.env.GOOGLE_CLIENT_ID,
        process.env.GOOGLE_CLIENT_SECRET,
        'https://developers.google.com/oauthplayground'
    );
    oauth2Client.setCredentials({
        refresh_token: process.env.GOOGLE_REFRESH_TOKEN
    });
    return oauth2Client;
}

function construirMensaje({ destinatario, asunto, cuerpoHtml }) {
    const remitente = process.env.GMAIL_USER;
    const mensaje = [
        `From: "Escuela Belgrano" <${remitente}>`,
        `To: ${destinatario}`,
        `Subject: ${asunto}`,
        'Content-Type: text/html; charset=utf-8',
        '',
        cuerpoHtml
    ].join('\n');

    return Buffer.from(mensaje)
        .toString('base64')
        .replace(/\+/g, '-')
        .replace(/\//g, '_')
        .replace(/=+$/, '');
}

async function enviarMailVerificacion(destinatario, token) {
    const oauth2Client = getOAuthClient();
    const gmail = google.gmail({ version: 'v1', auth: oauth2Client });

    const linkVerificacion = `${process.env.APP_URL}/api/verify?token=${token}`;

    const cuerpoHtml = `
        <p>Hola,</p>
        <p>Gracias por registrarte en la Escuela Técnica Gral. Manuel Belgrano.</p>
        <p>Para activar tu cuenta, hacé click en el siguiente link:</p>
        <p><a href="${linkVerificacion}">${linkVerificacion}</a></p>
        <p>Este link expira en 24 horas.</p>
    `;

    const raw = construirMensaje({
        destinatario,
        asunto: 'Verificá tu cuenta - Escuela Belgrano',
        cuerpoHtml
    });

    return gmail.users.messages.send({
        userId: 'me',
        requestBody: { raw }
    });
}

module.exports = { enviarMailVerificacion };