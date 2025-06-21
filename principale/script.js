// Header Scroll 
let nav = document.querySelector(".navbar");
window.onscroll = function () {
    if (document.documentElement.scrollTop > 50) {
        nav.classList.add("header-scrolled");
    } else {
        nav.classList.remove("header-scrolled");
    }
}


// nav hide  
document.addEventListener('DOMContentLoaded', function () {
    const searchForm = document.querySelector('.tea-search-form');
    const searchInput = document.querySelector('.tea-search-input');
    const searchButton = document.querySelector('.tea-search-btn');
    const resultsContainer = document.querySelector('.tea-search-results');

    // Données de démonstration (à remplacer par votre base de données réelle)
    const teaProducts = [
        { name: "Thé vert", category: "Thés verts", url: "http://localhost/Test/projet-pfe/projet-pfe/Nos%20produits/produitvert.html" },
        { name: "Tisane verveine", category: "Tisanes relaxantes", url: "/tisane-verveine" },
        { name: "Thé noir earl grey", category: "Thés noirs", url: "/the-noir-earl-grey" },
        { name: "Infusion camomille", category: "Tisanes digestives", url: "/infusion-camomille" },
        { name: "Thé blanc pêche", category: "Thés blancs", url: "/the-blanc-peche" },
        { name: "Rooibos vanille", category: "Infusions", url: "/rooibos-vanille" }
    ];

    // Recherche en temps réel
    searchInput.addEventListener('input', function () {
        const searchTerm = this.value.trim().toLowerCase();

        if (searchTerm.length > 2) {
            const results = teaProducts.filter(tea =>
                tea.name.toLowerCase().includes(searchTerm) ||
                tea.category.toLowerCase().includes(searchTerm)
            );

            displayResults(results);
        } else {
            hideResults();
        }
    });

    // Affichage des résultats
    function displayResults(results) {
        if (results.length > 0) {
            resultsContainer.innerHTML = results.map(tea => `
                <div class="tea-result-item" data-url="${tea.url}">
                    <div class="fw-bold">${highlightMatches(tea.name, searchInput.value)}</div>
                    <div class="small text-muted">${tea.category}</div>
                </div>
            `).join('');

            // Gestion du clic sur un résultat
            document.querySelectorAll('.tea-result-item').forEach(item => {
                item.addEventListener('click', function () {
                    window.location.href = this.getAttribute('data-url');
                });
            });

            resultsContainer.style.display = 'block';
        } else {
            resultsContainer.innerHTML = '<div class="tea-result-item">Aucun résultat trouvé</div>';
            resultsContainer.style.display = 'block';
        }
    }

    // Masquer les résultats
    function hideResults() {
        resultsContainer.style.display = 'none';
    }

    // Mise en évidence des correspondances
    function highlightMatches(text, search) {
        if (!search) return text;
        const regex = new RegExp(`(${search})`, 'gi');
        return text.replace(regex, '<span class="text-primary">$1</span>');
    }

    // Cacher les résultats quand on clique ailleurs
    document.addEventListener('click', function (e) {
        if (!searchForm.contains(e.target)) {
            hideResults();
        }
    });

    // Soumission du formulaire
    searchForm.addEventListener('submit', function (e) {
        e.preventDefault();
        if (searchInput.value.trim()) {
            // Redirection vers la page de résultats complets
            window.location.href = `/recherche?q=${encodeURIComponent(searchInput.value.trim())}`;
        }
    });
});