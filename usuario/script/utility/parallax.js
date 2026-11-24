let parallaxActualizando = false;

window.addEventListener("scroll", () => {

    if (!parallaxActualizando) {

        window.requestAnimationFrame(() => {

            const welcomeSection = document.querySelector(".welcome-section");

            if (!welcomeSection) return;

            const rect = welcomeSection.getBoundingClientRect();

            const movimiento = rect.top * -0.40;

            welcomeSection.style.setProperty(
                "--parallax-y",
                `${movimiento}px`
            );

            parallaxActualizando = false;
        });

        parallaxActualizando = true;
    }

});