document.addEventListener('DOMContentLoaded', function() {
    // Funzione per filtrare le news in base allo sport selezionato
    function filterNewsBySport() {
        var selectedSport = document.getElementById('newsFilter').value;
        var url = 'get_news_by_sport.php';
        if (selectedSport) {
            url += '?sport=' + encodeURIComponent(selectedSport);
        }

        fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok.');
            }
            return response.text();
        })
        .then(html => {
            document.getElementById('news-container').innerHTML = html;
        })
        .catch(error => {
            console.error('Failed to fetch news:', error);
            document.getElementById('news-container').innerHTML = 'Errore nel caricamento delle news.';
        });
    }

    // Imposta l'ascoltatore di eventi sul dropdown
    document.getElementById('newsFilter').addEventListener('change', filterNewsBySport);

    // Opzionalmente, chiama filterNewsBySport() al caricamento per mostrare tutte le news
    filterNewsBySport();
});
