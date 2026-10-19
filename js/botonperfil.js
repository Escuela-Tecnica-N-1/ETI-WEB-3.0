function menudesplegableuser() {
    document.getElementById('menuOpciones').classList.toggle('mostrar');
}

// Cerrar el menú si se hace click afuera
document.addEventListener('click', function(event) {
    if (!event.target.closest('.boton-despleperfil')) {
        document.getElementById('menuOpciones').classList.remove('mostrar');
    }
});
