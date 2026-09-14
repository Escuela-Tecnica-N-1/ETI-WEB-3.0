const newsContainer = document.getElementById("news-container");

fetch("./obtenerNoticias.php")
    .then(response => response.json())
    .then(noticias => {

        if (noticias.length === 0) {
            document.querySelector(".news-section").style.display = "none";
            document.querySelector(".content-grid").style.gridTemplateColumns = "1fr";
            console.log("No hay noticias disponibles.");

            return;
        }

        noticias.forEach((noticia, index) => {

            const newsItem = document.createElement("div");

            newsItem.className = "news-item";
            newsItem.dataset.id = index + 1;

            newsItem.innerHTML = `
                <img src="imagenes/Noticias/${noticia.nombre}" alt="Noticia">
            `;

            newsContainer.appendChild(newsItem);
        });

    })
    .catch(error => {
        console.error("Error al obtener las noticias:", error);
    });