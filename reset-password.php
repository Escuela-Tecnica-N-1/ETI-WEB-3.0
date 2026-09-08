<?php
$token = isset($_GET['token']) ? htmlspecialchars($_GET['token']) : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Restablecer contraseña - Escuela Técnica</title>
</head>
<body>

    <?php if (!$token): ?>

        <p>Link inválido. Volvé a solicitar el restablecimiento de contraseña desde la pantalla de login.</p>

    <?php else: ?>

        <h1>Restablecer contraseña</h1>

        <form id="formReset">
            <label for="nuevaContrasena">Nueva contraseña:</label>
            <input type="password" id="nuevaContrasena" required minlength="6">

            <label for="confirmarContrasena">Confirmar contraseña:</label>
            <input type="password" id="confirmarContrasena" required minlength="6">

            <button type="submit">Cambiar contraseña</button>
        </form>

        <p id="mensaje"></p>

        <script>
            // El token viaja embebido acá porque PHP ya lo validó como presente
            // (no lo revalida el JS — la validación real ocurre en el backend).
            const token = "<?php echo $token; ?>";

            document.getElementById('formReset').addEventListener('submit', async (e) => {
                e.preventDefault();

                const nuevaContrasena = document.getElementById('nuevaContrasena').value;
                const confirmarContrasena = document.getElementById('confirmarContrasena').value;
                const mensaje = document.getElementById('mensaje');

                if (nuevaContrasena !== confirmarContrasena) {
                    mensaje.textContent = 'Las contraseñas no coinciden';
                    return;
                }

                try {
                    // Ojo: esto pega a /api/reset-password, que SÍ pasa por el
                    // proxy de Apache (ProxyPass /api -> Node), a diferencia
                    // del link del mail que apuntaba directo a este archivo PHP.
                    const res = await fetch('/api/reset-password', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ token, nuevaContrasena })
                    });

                    const data = await res.json();
                    mensaje.textContent = data.message;

                    if (data.success) {
                        document.getElementById('formReset').style.display = 'none';
                    }
                } catch (error) {
                    mensaje.textContent = 'Error de conexión con el servidor';
                }
            });
        </script>

    <?php endif; ?>

</body>
</html>