<?php
/**
 *verificacion.php
 * =============================================================
 * A esta página redirige el backend (GET /api/verify en auth.js)
 * después de procesar el token del mail de verificación.
 *
 * ---------------------------------------------------------------
 * ZONA SEGURA — el equipo de frontend puede modificar TODO lo que
 * está debajo de esta sección (textos, HTML, CSS, estructura de
 * la página). Lo único que no se debe tocar es el bloque de
 * "CONTRATO CON EL BACKEND" de más abajo: los nombres de los
 * valores de ?status= y el body que espera /api/resend-verification.
 * ---------------------------------------------------------------
 *
 * ============= CONTRATO CON EL BACKEND (no modificar) ==========
 * 1) Esta página siempre recibe un query param `status`, con uno
 *    de estos 5 valores posibles (definidos en auth.js):
 *
 *      - "ok"        -> el token era válido, la cuenta ya quedó verificada
 *      - "expirado"  -> el token existía pero venció (pasaron 24hs)
 *      - "invalido"  -> el token no existe / ya fue usado antes
 *      - "sin-token" -> llegaron a esta página sin token en la URL
 *      - "error"     -> error inesperado del servidor al verificar
 *
 *    Cualquier valor no reconocido se trata igual que "error".
 *
 * 2) Para reenviar el mail de verificación (casos "expirado" e
 *    "invalido"), esta página le pide el email al usuario y hace
 *    un fetch POST a /api/resend-verification con body:
 *
 *      { "email": "..." }
 *
 *    La respuesta siempre es { success, message } y SIEMPRE es
 *    genérica (no confirma ni niega si el email existe, es a
 *    propósito — así está hecho el endpoint). No hay que tratar
 *    de "adivinar" el resultado real a partir de la respuesta.
 * =================================================================
 */

$status = isset($_GET['status']) ? $_GET['status'] : 'error';

// ---------- ZONA DE DISEÑO: a partir de acá, todo es editable ----------

$contenido = [
    'ok' => [
        'titulo'   => '¡Cuenta verificada!',
        'mensaje'  => 'Tu email fue verificado correctamente. Ya podés iniciar sesión.',
        'icono'    => 'ok',
        'mostrarReenvio' => false,
        'mostrarLogin'   => true,
    ],
    'expirado' => [
        'titulo'   => 'El link venció',
        'mensaje'  => 'Este link de verificación ya expiró. Pedí uno nuevo con tu email.',
        'icono'    => 'warning',
        'mostrarReenvio' => true,
        'mostrarLogin'   => false,
    ],
    'invalido' => [
        'titulo'   => 'Link inválido',
        'mensaje'  => 'Este link no es válido (puede que ya lo hayas usado antes). Si necesitás uno nuevo, pedilo acá.',
        'icono'    => 'warning',
        'mostrarReenvio' => true,
        'mostrarLogin'   => false,
    ],
    'sin-token' => [
        'titulo'   => 'Falta información',
        'mensaje'  => 'A este link le falta el token de verificación. Revisá que copiaste el link completo desde el mail.',
        'icono'    => 'error',
        'mostrarReenvio' => true,
        'mostrarLogin'   => false,
    ],
    'error' => [
        'titulo'   => 'Algo salió mal',
        'mensaje'  => 'Hubo un error al verificar tu cuenta. Probá de nuevo en unos minutos.',
        'icono'    => 'error',
        'mostrarReenvio' => true,
        'mostrarLogin'   => false,
    ],
];

$data = isset($contenido[$status]) ? $contenido[$status] : $contenido['error'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($data['titulo']) ?> — Escuela Técnica Belgrano</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- El equipo de frontend puede reemplazar esto por el CSS/framework que ya usan en el resto del sitio -->
    <style>
        body {
        font-family: system-ui, sans-serif;
        background: #f4f4f4;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0;
        }
        .card {
        background: #fff;
        border-radius: 12px;
        padding: 2rem;
        max-width: 420px;
        width: 90%;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 { font-size: 1.3rem; margin-bottom: 0.5rem; }
        p { color: #555; margin-bottom: 1.5rem; }
        input[type="email"] {
        width: 100%;
        padding: 0.6rem;
        margin-bottom: 0.8rem;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
        }
        button, a.boton {
        display: inline-block;
        background: #1a73e8;
        color: #fff;
        border: none;
        padding: 0.6rem 1.2rem;
        border-radius: 6px;
        cursor: pointer;
        text-decoration: none;
        }
        #reenvio-mensaje { margin-top: 0.8rem; font-size: 0.9rem; }
    </style>
</head>
<body>

    <div class="card">
        <h1><?= htmlspecialchars($data['titulo']) ?></h1>
        <p><?= htmlspecialchars($data['mensaje']) ?></p>

        <?php if ($data['mostrarLogin']): ?>
        <!-- Ajustar el href al login real del sitio -->
        <a class="boton" href="index.php">Ir a iniciar sesión</a>
        <?php endif; ?>

        <?php if ($data['mostrarReenvio']): ?>
        <form id="form-reenvio">
            <input type="email" id="email-reenvio" placeholder="tu-email@ejemplo.com" required>
            <button type="submit">Reenviar link de verificación</button>
        </form>
        <div id="reenvio-mensaje"></div>
        <?php endif; ?>
    </div>

    <?php if ($data['mostrarReenvio']): ?>
    <script>
        // Contrato con el backend (no tocar): POST /api/resend-verification
        // body { email }, respuesta { success, message } siempre genérica.
        document.getElementById('form-reenvio').addEventListener('submit', async function (e) {
        e.preventDefault();
        const email = document.getElementById('email-reenvio').value;
        const mensajeEl = document.getElementById('reenvio-mensaje');
        mensajeEl.textContent = 'Enviando...';

        try {
            const resp = await fetch('/api/resend-verification', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email })
            });
            const data = await resp.json();
            mensajeEl.textContent = data.message;
        } catch (err) {
            mensajeEl.textContent = 'No se pudo conectar con el servidor. Probá de nuevo.';
        }
        });
    </script>
    <?php endif; ?>

</body>
</html>