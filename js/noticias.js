document.addEventListener('DOMContentLoaded', function() {
    // Funcionalidad para el slider de noticias en la página principal
    const sliderPrev = document.querySelector('.slider-btn.prev');
    const sliderNext = document.querySelector('.slider-btn.next');
    const sliderDots = document.querySelectorAll('.dot');
    const noticiasSlider = document.querySelector('.noticias-slider');
    
    if (sliderPrev && sliderNext && noticiasSlider) {
        let currentSlide = 0;
        const totalSlides = 3; // Ajustar según el número de slides
        
        // Función para cambiar el slide
        function goToSlide(slideIndex) {
            // En pantallas pequeñas, desplazamos el contenedor
            if (window.innerWidth < 768) {
                const cards = document.querySelectorAll('.noticia-card');
                if (cards.length > 0) {
                    const cardWidth = cards[0].offsetWidth + 16; // 16px de gap
                    noticiasSlider.scrollTo({
                        left: cardWidth * slideIndex,
                        behavior: 'smooth'
                    });
                }
            }
            
            // Actualizar los dots
            sliderDots.forEach((dot, index) => {
                dot.classList.toggle('active', index === slideIndex);
            });
            
            currentSlide = slideIndex;
        }
        
        // Event listeners para los botones
        sliderPrev.addEventListener('click', function() {
            const newSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            goToSlide(newSlide);
        });
        
        sliderNext.addEventListener('click', function() {
            const newSlide = (currentSlide + 1) % totalSlides;
            goToSlide(newSlide);
        });
        
        // Event listeners para los dots
        sliderDots.forEach((dot, index) => {
            dot.addEventListener('click', function() {
                goToSlide(index);
            });
        });
        
        // En pantallas pequeñas, convertir el grid en un scroll horizontal
        if (window.innerWidth < 768) {
            noticiasSlider.style.display = 'flex';
            noticiasSlider.style.overflowX = 'auto';
            noticiasSlider.style.scrollSnapType = 'x mandatory';
            
            const cards = document.querySelectorAll('.noticia-card');
            cards.forEach(card => {
                card.style.flex = '0 0 85%';
                card.style.scrollSnapAlign = 'center';
                card.style.marginRight = '1rem';
            });
        }
    }
    
    // Funcionalidad para los filtros en la página de noticias
    const filtroBtns = document.querySelectorAll('.filtro-btn');
    const noticiaCards = document.querySelectorAll('.noticia-card[data-categoria]');
    
    if (filtroBtns.length > 0 && noticiaCards.length > 0) {
        filtroBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remover clase active de todos los botones
                filtroBtns.forEach(b => b.classList.remove('active'));
                // Añadir clase active al botón clickeado
                this.classList.add('active');
                
                const categoria = this.getAttribute('data-categoria');
                
                // Mostrar/ocultar noticias según la categoría
                noticiaCards.forEach(card => {
                    if (categoria === 'todas' || card.getAttribute('data-categoria') === categoria) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    }
});