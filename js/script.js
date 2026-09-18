document.addEventListener('DOMContentLoaded', function() {
    // Sample news data - this would typically come from a CMS or API
    const latestNews = [
        {
            id: 1,
            title: "Inscripciones abiertas para el próximo año lectivo",
            date: "10 de abril, 2025",
            excerpt: "Las inscripciones para el próximo año lectivo ya están abiertas. No pierdas la oportunidad de formar parte de nuestra institución."
        },
        {
            id: 2,
            title: "Feria de ciencias y tecnología",
            date: "5 de abril, 2025",
            excerpt: "Nuestros estudiantes presentaron proyectos innovadores en la feria anual de ciencias y tecnología."
        },
        {
            id: 3,
            title: "Reconocimiento a nuestros docentes",
            date: "28 de marzo, 2025",
            excerpt: "El ministerio de educación reconoció a nuestros docentes por su excelencia académica."
        }
    ];

    // Populate news section
    const newsContainer = document.getElementById('news-container');
    
    latestNews.forEach(news => {
        const newsItem = document.createElement('div');
        newsItem.className = 'news-item';
        
        newsItem.innerHTML = `
            <div class="news-item-header">
                <h3>${news.title}</h3>
                <div class="date">${news.date}</div>
            </div>
            <div class="news-item-content">
                <p>${news.excerpt}</p>
                <a href="#" class="news-link">Leer más <i class="fas fa-chevron-right"></i></a>
            </div>
        `;
        
        newsContainer.appendChild(newsItem);
    });

    // Set current year in footer
    document.getElementById('current-year').textContent = new Date().getFullYear();

    // Add hover effects to modality cards
    const modalityCards = document.querySelectorAll('.modality-card');
    
    modalityCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Add smooth scrolling for anchor links
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

