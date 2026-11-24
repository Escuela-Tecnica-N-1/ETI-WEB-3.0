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
    <link rel="stylesheet" href="<?= BASE_URL ?>/usuario/css/styles.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/usuario/paginas/viewFuncionalidades/reset-password.css">
</head>
<body>

    <?php if ($token): ?> <!-- agregar un ! antes del token para que funcione la pagina -->

        <p>Link inválido. Volvé a solicitar el restablecimiento de contraseña desde la pantalla de login.</p>

    <?php else: ?>

        <div class="full-div">
        
            <section class="welcome-section" aria-hidden="true">
                <div class="container">
                    <div class="welcome-grid">
                        <div class="welcome-image">
                            <img src="<?= BASE_URL ?>/usuario/imagenes/escuelafoto.jpeg" alt="">
                        </div>
                    </div>
                </div>
            </section>

            <div class="full-div-inside full-div-reset-p">

                <a class="button-goback" alt="Volver al inicio" href="<?= BASE_URL ?>/usuario/paginas/conoceMas/conoceMas.php" aria-label="Volver a Conoce más">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                    </svg>
                </a>

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