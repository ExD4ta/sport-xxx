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

$sql = "SELECT * FROM news WHERE quantita > 0"; // Sostituisci 'prodotti' con il nome reale della tua tabella
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Stampa i dati di ogni prodotto
    while($row = $result->fetch_assoc()) {
        echo '<div class="article">';
        echo '<h2>' . htmlspecialchars($row["titolo"]) . '</h2>';
        echo '<p>' . nl2br(htmlspecialchars($row["testo"])) . '</p>';
        echo '<p> Pubblicato il ' . date('d/m/Y', strtotime($row['data'])) . ' alle ' . date('H:i', strtotime($row['ora'])) . '</p>';
        echo '</div>';
    }
} else {
    echo "0 risultati";
}

$conn->close();
?>
