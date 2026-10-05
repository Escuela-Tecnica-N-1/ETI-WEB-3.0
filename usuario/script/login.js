document.addEventListener('DOMContentLoaded', function() {
    const loginTrigger = document.getElementById('login-trigger');
    const loginModal = document.getElementById('login-modal');
    const closeLogin = document.getElementById('close-login');
    const loginForm = document.getElementById('login-form');

    // Abre modal con la esquina
    loginTrigger.addEventListener('click', function() {
        loginModal.classList.add('active');
        document.body.style.overflow = 'hidden'; // Prevent scrolling when modal is open
    });

    // Cierra modal del login con el boton
    closeLogin.addEventListener('click', function() {
        loginModal.classList.remove('active');
        document.body.style.overflow = ''; // Restore scrolling
    });

    // Cierra modal cuando se clickea fuera
    loginModal.addEventListener('click', function(e) {
        if (e.target === loginModal) {
            loginModal.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
});