<?php require_once __DIR__ . '/../../../config/config.php'; ?>
<?php
$token = isset($_GET['token']) ? htmlspecialchars($_GET['token']) : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer contraseña - Escuela Técnica</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/usuario/paginas/viewFuncionalidades/reset-password.css">
</head>
<body>

    <?php if ($token): ?> <!-- agregar un ! antes del token para que funcione la pagina -->

        <p>Link inválido. Volvé a solicitar el restablecimiento de contraseña desde la pantalla de login.</p>

    <?php else: ?>

        <div class="full-div">
        
            <div class="full-div-inside">

                <h1>Restablecer contraseña</h1>
                <p>Inserta tu nueva contraseña. Recuerda guardarla en un lugar seguro.</p>

                <form id="formReset">
                    <div class="form-separator">
                        <input type="password" id="nuevaContrasena" placeholder="Nueva contraseña" required minlength="6">
                        <input type="password" id="confirmarContrasena" placeholder="Confirmar contraseña" required minlength="6">
                    </div>

                    <button class="button-cambiarcontraseña" type="submit">Cambiar contraseña</button>
                </form>

                <p id="mensaje"></p>

            </div>

        </div>

        <section class="welcome-section"> <!-- FONDO CON FILTRO -->
            <div class="container">
                <div class="welcome-grid">

                    <div class="welcome-image">
                        <img src="../../../usuario/imagenes/escuelafoto.jpeg" alt="Escuela Técnica" id="fotoEsc">
                    </div>

                </div>
            </div>
        </section>

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