document.addEventListener('DOMContentLoaded', function() {
    // Funzione per filtrare le news in base allo sport selezionato
    function filterInstructorBySport() {
        var selectedSport = document.getElementById('instructorFilter').value;
        var url = 'get_instructor_by_sport.php';
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
            document.getElementById('instructor-container').innerHTML = html;
        })
        .catch(error => {
            console.error('Failed to fetch news:', error);
            document.getElementById('instructor-container').innerHTML = 'Errore nel caricamento delle news.';
        });
    }

    // Imposta l'ascoltatore di eventi sul dropdown
    document.getElementById('instructorFilter').addEventListener('change', filterInstructorBySport);

    // Opzionalmente, chiama filterNewsBySport() al caricamento per mostrare tutte le news
    filterInstructorBySport();
});
