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

function logina(){
  esRegistro = !esRegistro;
  
  // Actualizar el título del formulario si existe
  if (formTitle) {
    formTitle.textContent = esRegistro ? 'Registro de Profesor' : 'Iniciar Sesión';
  }
  
  // Mostrar u ocultar el campo de nombre
  nombreInput.style.display = esRegistro ? 'block' : 'none';
  // 👈 ESTA LÍNEA ES LA CLAVE
  nombreInput.required = esRegistro;
  // Actualizar texto del botón
  button.textContent = esRegistro ? 'Registrarse' : 'Ingresar';
  
  // Actualizar el texto del enlace para cambiar entre registro/login
  toggle.innerHTML = `<p>${esRegistro ? '¿Ya tienes cuenta? Iniciar sesión' : '¿No tienes cuenta? Registrate'}</p>`;
  
  // Limpiar mensajes de error/éxito
  mensaje.textContent = '';
};

form.addEventListener('submit', async (e) => {
  e.preventDefault();
  const nombre = nombreInput.value.trim();
  const email = emailInput.value.trim();
  const contrasena = passwordInput.value.trim();

  const endpoint = esRegistro ? 'register' : 'login';
  const payload = esRegistro ? { nombre, email, contrasena } : { email, contrasena };

  try {
    const res = await fetch(`http://localhost:3000/api/${endpoint}`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(payload)
    });

    const data = await res.json();

    if (data.success) {
      mensaje.textContent = esRegistro ? 'Registro exitoso. Ahora puedes iniciar sesión.' : 'Inicio de sesión exitoso.';
      mensaje.style.color = 'green';

      if (!esRegistro) {
        localStorage.setItem('token', data.token);
        window.location.href = 'interfazProfe.php';
      }
    } else {
      mensaje.textContent = data.message || 'Ocurrió un error.';
      mensaje.style.color = 'red';
    }
  } catch (err) {
    console.error(err);
    mensaje.textContent = 'Error de conexión con el servidor.';
    mensaje.style.color = 'red';
  }
});