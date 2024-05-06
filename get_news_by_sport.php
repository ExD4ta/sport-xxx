<?php
// Connettersi al database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sport-xxx";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificare la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$sport = isset($_GET['sport']) ? $_GET['sport'] : '';

// Preparare la query SQL in base al filtro sportivo
if (empty($sport)) {
    $query = "SELECT * FROM news"; // Nessun filtro applicato
} else {
    $query = $conn->prepare("SELECT * FROM news WHERE sport = ?");
    $query->bind_param("s", $sport);
}

// Esecuzione della query e invio dei risultati
if ($query instanceof mysqli_stmt) {
    $query->execute();
    $result = $query->get_result();
} else {
    $result = $conn->query($query);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="article">';
        echo '<h2>' . htmlspecialchars($row["titolo"]) . '</h2>';
        echo '<p>' . nl2br(htmlspecialchars($row["testo"])) . '</p>';
        echo '<p> Pubblicato il ' . date('d/m/Y', strtotime($row['data'])) . ' alle ' . date('H:i', strtotime($row['ora'])) . '</p>';
        echo '</div>';
    }
} else {
    echo '<div class="article">Nessuna notizia trovata per lo sport selezionato.</div>';
}

$conn->close();
?>
