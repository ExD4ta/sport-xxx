<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sport-xxx";

// Crea la connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$sql = "SELECT * FROM articolo WHERE quantita > 0"; // Sostituisci 'prodotti' con il nome reale della tua tabella
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Stampa i dati di ogni prodotto
    while($row = $result->fetch_assoc()) {
        echo "<div class='product-card'>";
        echo "<h3>" . htmlspecialchars($row["nome"]) . "</h3>";
        echo "<img src='" . htmlspecialchars($row["nome"]) . ".jpg'>";
        echo "<p>Prezzo: €" . htmlspecialchars($row["costo"]) . "</p>";
        echo "<p>Quantità disponibile: " . htmlspecialchars($row["quantita"]) . "</p>";
        echo "<a href='dettaglio_prodotto.php?id=" . $row["id_articolo"] . "' class='button'>Vedi Dettagli</a></div>";
    }
} else {
    echo "0 risultati";
}

$conn->close();
?>
