<<<<<<< HEAD
<<<<<<< HEAD
const form = document.getElementById('auth-form');
const toggle = document.getElementById('toggle-form');
const mensaje = document.getElementById('mensaje');
const nombreField = document.getElementById('nombre');
const nombreInput = document.getElementById('nombre');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const formTitle = document.getElementById('form-title');
const button = form.querySelector('button');

let esRegistro = false;

function logina() {
  esRegistro = !esRegistro;

  // Actualizar el título del formulario si existe
  if (formTitle) {
    formTitle.textContent = esRegistro ? 'Registro de Profesor' : 'Iniciar Sesión';
  }

  // Mostrar u ocultar el campo de nombre
  nombreInput.style.display = esRegistro ? 'block' : 'none';
  nombreInput.required = esRegistro;
  button.textContent = esRegistro ? 'Registrarse' : 'Ingresar';  // Actualizar texto del botón

  // Actualizar el texto del enlace para cambiar entre registro/login
  toggle.innerHTML = `<p>${esRegistro ? '¿Ya tienes cuenta? Iniciar sesión' : '¿No tienes cuenta? Registrate'}</p>`;

  // Limpiar mensajes de error/éxito
  mensaje.textContent = '';
};

// ─── "Olvidé mi contraseña" ──────────────────────────────────────────
// Reutiliza los mismos elementos del modal (toggle-forgot, forgot-form,
// volver-login) que hay que agregar al HTML del modal de login.

const toggleForgot = document.getElementById('toggle-forgot');
const forgotForm = document.getElementById('forgot-form');
const volverLogin = document.getElementById('volver-login');
const mensajeForgot = document.getElementById('mensaje-forgot');

toggleForgot.addEventListener('click', () => {
  form.style.display = 'none';
  toggle.style.display = 'none';
  toggleForgot.style.display = 'none';
  forgotForm.style.display = 'block';
  volverLogin.style.display = 'block';
  mensaje.textContent = '';
});

volverLogin.addEventListener('click', () => {
  forgotForm.style.display = 'none';
  form.style.display = 'block';
  toggle.style.display = 'block';
  toggleForgot.style.display = 'block';
  volverLogin.style.display = 'none';
  mensajeForgot.textContent = '';
});

forgotForm.addEventListener('submit', async (e) => {
  e.preventDefault();

  const email = document.getElementById('forgot-email').value.trim();

  try {
    const res = await fetch('/api/forgot-password', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ email })
    });

    const data = await res.json();
    mensajeForgot.textContent = data.message;
    mensajeForgot.style.color = data.success ? 'green' : 'red';
  } catch (err) {
    console.error(err);
    mensajeForgot.textContent = 'Error de conexión con el servidor.';
    mensajeForgot.style.color = 'red';
  }
});

// Verificación y reenvio

const reenviarBtn = document.getElementById('reenviar-verificacion');

form.addEventListener('submit', async (e) => {
  e.preventDefault();
  const nombre = nombreInput.value.trim();
  const email = emailInput.value.trim();
  const contrasena = passwordInput.value.trim();

  const endpoint = esRegistro ? 'register' : 'login';
  const payload = esRegistro ? { nombre, email, contrasena } : { email, contrasena };

  reenviarBtn.style.display = 'none'; // reset en cada intento

  try {
    const res = await fetch(`/api/${endpoint}`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      credentials: 'include',
      body: JSON.stringify(payload)
    });

    const data = await res.json();
    console.log(data.noVerificado);
    if (data.success) {
      mensaje.textContent = esRegistro ? 'Registro exitoso. Ahora puedes iniciar sesión.' : 'Inicio de sesión exitoso.';
      mensaje.style.color = 'green';

      if (!esRegistro) {
        window.location.href = 'index.php';
      }
    } else {
      mensaje.textContent = data.message || 'Ocurrió un error.';
      mensaje.style.color = 'red';

      if (data.noVerificado) {
        reenviarBtn.style.display = 'inline-block';
      }
    }
  } catch (err) {
    console.error(err);
    mensaje.textContent = 'Error de conexión con el servidor.';
    mensaje.style.color = 'red';
  }
});

reenviarBtn.addEventListener('click', async () => {
  const email = emailInput.value.trim();

  try {
    const res = await fetch('/api/resend-verification', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ email })
    });

    const data = await res.json();
    mensaje.textContent = data.message;
    mensaje.style.color = data.success ? 'green' : 'red';
    reenviarBtn.style.display = 'none';
  } catch (err) {
    console.error(err);
    mensaje.textContent = 'Error de conexión con el servidor.';
    mensaje.style.color = 'red';
  }
=======
const form = document.getElementById('auth-form');
const toggle = document.getElementById('toggle-form');
const mensaje = document.getElementById('mensaje');
const nombreField = document.getElementById('nombre');
const nombreInput = document.getElementById('nombre');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const formTitle = document.getElementById('form-title');
const button = form.querySelector('button');

let esRegistro = false;

function logina() {
  esRegistro = !esRegistro;

  // Actualizar el título del formulario si existe
  if (formTitle) {
    formTitle.textContent = esRegistro ? 'Registro de Profesor' : 'Iniciar Sesión';
  }

  // Mostrar u ocultar el campo de nombre
  nombreInput.style.display = esRegistro ? 'block' : 'none';
  nombreInput.required = esRegistro;
  button.textContent = esRegistro ? 'Registrarse' : 'Ingresar';  // Actualizar texto del botón

  // Actualizar el texto del enlace para cambiar entre registro/login
  toggle.innerHTML = `<p>${esRegistro ? '¿Ya tienes cuenta? Iniciar sesión' : '¿No tienes cuenta? Registrate'}</p>`;

  // Limpiar mensajes de error/éxito
  mensaje.textContent = '';
};

// ─── "Olvidé mi contraseña" ──────────────────────────────────────────
// Reutiliza los mismos elementos del modal (toggle-forgot, forgot-form,
// volver-login) que hay que agregar al HTML del modal de login.

const toggleForgot = document.getElementById('toggle-forgot');
const forgotForm = document.getElementById('forgot-form');
const volverLogin = document.getElementById('volver-login');
const mensajeForgot = document.getElementById('mensaje-forgot');

toggleForgot.addEventListener('click', () => {
  form.style.display = 'none';
  toggle.style.display = 'none';
  toggleForgot.style.display = 'none';
  forgotForm.style.display = 'block';
  volverLogin.style.display = 'block';
  mensaje.textContent = '';
});

volverLogin.addEventListener('click', () => {
  forgotForm.style.display = 'none';
  form.style.display = 'block';
  toggle.style.display = 'block';
  toggleForgot.style.display = 'block';
  volverLogin.style.display = 'none';
  mensajeForgot.textContent = '';
});

forgotForm.addEventListener('submit', async (e) => {
  e.preventDefault();

  const email = document.getElementById('forgot-email').value.trim();

  try {
    const res = await fetch('/api/forgot-password', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ email })
    });

    const data = await res.json();
    mensajeForgot.textContent = data.message;
    mensajeForgot.style.color = data.success ? 'green' : 'red';
  } catch (err) {
    console.error(err);
    mensajeForgot.textContent = 'Error de conexión con el servidor.';
    mensajeForgot.style.color = 'red';
  }
});

// Verificación y reenvio

const reenviarBtn = document.getElementById('reenviar-verificacion');

form.addEventListener('submit', async (e) => {
  e.preventDefault();
  const nombre = nombreInput.value.trim();
  const email = emailInput.value.trim();
  const contrasena = passwordInput.value.trim();

  const endpoint = esRegistro ? 'register' : 'login';
  const payload = esRegistro ? { nombre, email, contrasena } : { email, contrasena };

  reenviarBtn.style.display = 'none'; // reset en cada intento

  try {
    const res = await fetch(`/api/${endpoint}`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      credentials: 'include',
      body: JSON.stringify(payload)
    });

    const data = await res.json();
    console.log(data.noVerificado);
    if (data.success) {
      mensaje.textContent = esRegistro ? 'Registro exitoso. Ahora puedes iniciar sesión.' : 'Inicio de sesión exitoso.';
      mensaje.style.color = 'green';

      if (!esRegistro) {
        window.location.href = 'index.php';
      }
    } else {
      mensaje.textContent = data.message || 'Ocurrió un error.';
      mensaje.style.color = 'red';

      if (data.noVerificado) {
        reenviarBtn.style.display = 'inline-block';
      }
    }
  } catch (err) {
    console.error(err);
    mensaje.textContent = 'Error de conexión con el servidor.';
    mensaje.style.color = 'red';
  }
});

reenviarBtn.addEventListener('click', async () => {
  const email = emailInput.value.trim();

  try {
    const res = await fetch('/api/resend-verification', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ email })
    });

    const data = await res.json();
    mensaje.textContent = data.message;
    mensaje.style.color = data.success ? 'green' : 'red';
    reenviarBtn.style.display = 'none';
  } catch (err) {
    console.error(err);
    mensaje.textContent = 'Error de conexión con el servidor.';
    mensaje.style.color = 'red';
  }
>>>>>>> 4f8cd05ede75ffd85e63997c76811357776e14f6
=======
const form = document.getElementById('auth-form');
const toggle = document.getElementById('toggle-form');
const mensaje = document.getElementById('mensaje');
const nombreField = document.getElementById('nombre');
const nombreInput = document.getElementById('nombre');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const formTitle = document.getElementById('form-title');
const button = form.querySelector('button');

let esRegistro = false;

function logina() {
  esRegistro = !esRegistro;

  // Actualizar el título del formulario si existe
  if (formTitle) {
    formTitle.textContent = esRegistro ? 'Registro de Profesor' : 'Iniciar Sesión';
  }

  // Mostrar u ocultar el campo de nombre
  nombreInput.style.display = esRegistro ? 'block' : 'none';
  nombreInput.required = esRegistro;
  button.textContent = esRegistro ? 'Registrarse' : 'Ingresar';  // Actualizar texto del botón

  // Actualizar el texto del enlace para cambiar entre registro/login
  toggle.innerHTML = `<p>${esRegistro ? '¿Ya tienes cuenta? Iniciar sesión' : '¿No tienes cuenta? Registrate'}</p>`;

  // Limpiar mensajes de error/éxito
  mensaje.textContent = '';
};

// ─── "Olvidé mi contraseña" ──────────────────────────────────────────
// Reutiliza los mismos elementos del modal (toggle-forgot, forgot-form,
// volver-login) que hay que agregar al HTML del modal de login.

const toggleForgot = document.getElementById('toggle-forgot');
const forgotForm = document.getElementById('forgot-form');
const volverLogin = document.getElementById('volver-login');
const mensajeForgot = document.getElementById('mensaje-forgot');

toggleForgot.addEventListener('click', () => {
  form.style.display = 'none';
  toggle.style.display = 'none';
  toggleForgot.style.display = 'none';
  forgotForm.style.display = 'block';
  volverLogin.style.display = 'block';
  mensaje.textContent = '';
});

volverLogin.addEventListener('click', () => {
  forgotForm.style.display = 'none';
  form.style.display = 'block';
  toggle.style.display = 'block';
  toggleForgot.style.display = 'block';
  volverLogin.style.display = 'none';
  mensajeForgot.textContent = '';
});

forgotForm.addEventListener('submit', async (e) => {
  e.preventDefault();

  const email = document.getElementById('forgot-email').value.trim();

  try {
    const res = await fetch('/api/forgot-password', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ email })
    });

    const data = await res.json();
    mensajeForgot.textContent = data.message;
    mensajeForgot.style.color = data.success ? 'green' : 'red';
  } catch (err) {
    console.error(err);
    mensajeForgot.textContent = 'Error de conexión con el servidor.';
    mensajeForgot.style.color = 'red';
  }
});

// Verificación y reenvio

const reenviarBtn = document.getElementById('reenviar-verificacion');

form.addEventListener('submit', async (e) => {
  e.preventDefault();
  const nombre = nombreInput.value.trim();
  const email = emailInput.value.trim();
  const contrasena = passwordInput.value.trim();

  const endpoint = esRegistro ? 'register' : 'login';
  const payload = esRegistro ? { nombre, email, contrasena } : { email, contrasena };

  reenviarBtn.style.display = 'none'; // reset en cada intento

  try {
    const res = await fetch(`/api/${endpoint}`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      credentials: 'include',
      body: JSON.stringify(payload)
    });

    const data = await res.json();
    console.log(data.noVerificado);
    if (data.success) {
      mensaje.textContent = esRegistro ? 'Registro exitoso. Ahora puedes iniciar sesión.' : 'Inicio de sesión exitoso.';
      mensaje.style.color = 'green';

      if (!esRegistro) {
        window.location.href = 'index.php';
      }
    } else {
      mensaje.textContent = data.message || 'Ocurrió un error.';
      mensaje.style.color = 'red';

      if (data.noVerificado) {
        reenviarBtn.style.display = 'inline-block';
      }
    }
  } catch (err) {
    console.error(err);
    mensaje.textContent = 'Error de conexión con el servidor.';
    mensaje.style.color = 'red';
  }
});

reenviarBtn.addEventListener('click', async () => {
  const email = emailInput.value.trim();

  try {
    const res = await fetch('/api/resend-verification', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ email })
    });

    const data = await res.json();
    mensaje.textContent = data.message;
    mensaje.style.color = data.success ? 'green' : 'red';
    reenviarBtn.style.display = 'none';
  } catch (err) {
    console.error(err);
    mensaje.textContent = 'Error de conexión con el servidor.';
    mensaje.style.color = 'red';
  }
>>>>>>> 4f8cd05ede75ffd85e63997c76811357776e14f6
});