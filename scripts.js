function openCategory(evt, categoryName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(categoryName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Setta il primo tab attivo all'avvio della pagina
window.onload = function() {
    document.getElementById('sportFilter').value = ""; // Imposta il valore del dropdown a "tutto"
    filterProducts(); // Chiamiamo la funzione che filtra i prodotti basandosi sulla selezione
};

function filterProducts() {
    var selectedSport = document.getElementById('sportFilter').value;
    if (selectedSport === "") {
        // Chiamata AJAX per ottenere tutti i prodotti
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_all_products.php', true);
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById('productsContainer').innerHTML = this.responseText;
            } else {
                document.getElementById('productsContainer').innerHTML = 'Errore nel caricamento dei prodotti.';
            }
        };
        xhr.send();
    } else {
        // Altre logiche di filtraggio qui, se necessario
    }
}

function addToCart(productId) {
    fetch('aggiungi_al_carrello.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'id=' + productId
    })
    .then(response => response.json())
    .then(data => {
        alert(data.success ? "Prodotto aggiunto al carrello!" : "Errore nell'aggiunta al carrello!");
    });
}

function filterProductsBySport() {
    var selectedSport = document.getElementById('sportFilter').value;
    var cards = document.querySelectorAll('.product-card');

    cards.forEach(card => {
        var sport = card.dataset.sport;
        if (selectedSport === "" || sport === selectedSport) { // Cambiato da 'all' a ""
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}


document.getElementById('sportFilter').addEventListener('change', function() {
    var sport = this.value;
    var url = sport === "" ? 'get_all_products.php' : 'get_products_by_sport.php?sport=' + encodeURIComponent(sport);
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.onload = function() {
        if (this.status === 200) {
            document.getElementById('productsContainer').innerHTML = this.responseText;
        } else {
            document.getElementById('productsContainer').innerHTML = 'Errore nel caricamento dei prodotti.';
        }
    };
    xhr.send();
});
