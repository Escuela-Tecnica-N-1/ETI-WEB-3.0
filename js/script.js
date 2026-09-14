document.addEventListener('DOMContentLoaded', function() {
    
    // Obtiene el año actual del sistema y lo coloca automáticamente en el pie de página.
    document.getElementById('current-year').textContent = new Date().getFullYear();

    // Hace que los enlaces de anclaje se desplacen suavemente hasta la sección correspondiente en lugar de saltar directamente.
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');

            if (targetId === '#') return;
                const targetElement = document.querySelector(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
});
