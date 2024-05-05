function filterEventsBySport() {
    var selectedSport = document.getElementById('sportFilter').value;
    var events = document.querySelectorAll('.event');

    events.forEach(event => {
        var sport = event.dataset.sport;
        if (selectedSport === "" || sport === selectedSport) {
            event.style.display = 'block';
        } else {
            event.style.display = 'none';
        }
    });
}
