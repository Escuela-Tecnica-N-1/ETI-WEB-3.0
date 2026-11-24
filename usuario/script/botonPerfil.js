function menudesplegableuser() {
    document.getElementById('menuOpciones').classList.toggle('mostrar');
}

// Cerrar el menú si se hace click afuera
document.addEventListener('click', function(event) {
    if (!event.target.closest('.boton-despleperfil')) {
        document.getElementById('menuOpciones').classList.remove('mostrar');
    }
});

// Cerrar sesión: tiene que ser un POST al servidor porque la cookie es httpOnly
// y el navegador no puede borrarla por su cuenta.
document.getElementById('btn-logout').addEventListener('click', async (e) => {
    e.preventDefault();
    try {
        await fetch('/api/logout', { method: 'POST', credentials: 'include' });
    } catch (err) {
        console.error(err);
    }
    window.location.reload(); // la página se vuelve a dibujar ya sin sesión
});