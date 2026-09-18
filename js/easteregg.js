const foto = document.getElementById("fotoEsc");
foto.addEventListener('click', function(event) {
    if (event.shiftKey) {
        window.location.href = 'pepe.html';
    }
});
