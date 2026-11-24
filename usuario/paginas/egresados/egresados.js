
document.getElementById('searchInput-sw').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        searchImage();
    }
});

function searchImage() {

    const query = document
        .getElementById('searchInput-sw')
        .value
        .trim()
        .toLowerCase();

    const items = document.querySelectorAll('#carouselExample .carousel-item');

    for (let i = 0; i < items.length; i++) {

        const img = items[i].querySelector('img');

        const alt = img.getAttribute('alt').toLowerCase();
        const src = img.getAttribute('src').toLowerCase();

        if (alt.includes(query) || src.includes(query)) {

            const carousel = bootstrap.Carousel.getOrCreateInstance(
                document.getElementById('carouselExample')
            );

            carousel.to(i);

            return;
        }
    }

    showPopupMessage('No se encontró ninguna coincidencia.');
}

function showPopupMessage(message) {

    const popup = document.getElementById('popupMessage');

    popup.textContent = message;
    popup.classList.add('show');

    setTimeout(() => {
        popup.classList.remove('show');
        }, 2500);
}