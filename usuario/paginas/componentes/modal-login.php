<div class="login-modal" id="login-modal">
    <div class="login-container">
        <button class="close-btn" id="close-login"><i class="fas fa-times"></i></button>
        <div class="login-header">
            <h2>Acceso Docentes</h2>
            <p>Ingrese sus credenciales para acceder al panel</p>
        </div>
        <form id="auth-form">
            <input type="text" id="nombre" placeholder="Nombre" style="display: none;">
            <input type="email" id="email" placeholder="Email" required>
            <input type="password" id="password" placeholder="Contraseña" required>
            <button type="submit">Ingresar</button>
        </form>
        <div class="switch" id="toggle-form" onclick="logina()">
            <p>¿No tienes cuenta? Registrate</p>
        </div>
        <p id="mensaje"></p>

        <div class="switch" id="toggle-forgot">
            <p>¿Olvidaste tu contraseña?</p>
        </div>

        <form id="forgot-form" style="display: none;">
            <input type="email" id="forgot-email" placeholder="Email" required>
            <button type="submit">Enviar link de recuperación</button>
        </form>
        <div class="switch" id="volver-login" style="display: none;">
            <p>Volver a iniciar sesión</p>
        </div>
        <p id="mensaje-forgot"></p>
    </div>
</div>