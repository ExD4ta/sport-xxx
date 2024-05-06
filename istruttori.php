

<!DOCTYPE html>
    <html lang="it">

    <head>
        <meta charset="UTF-8">
        <title>Negozio Articoli Sportivi</title>
        <link rel="stylesheet" href="negozio_styles.css">
    </head>
    
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sport-xxx"; // Cambia con il nome del tuo database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Recupera lo sport dalla richiesta GET, con un default vuoto
$sport = isset($_GET['sport']) ? $_GET['sport'] : '';

// Prepara la query SQL con parametri per evitare SQL injection
$sql = "SELECT * FROM insegnati WHERE sport = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $sport);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Visualizza i risultati in formato HTML simile a quello degli articoli
    while ($row = $result->fetch_assoc()) {
        echo "<div class='teacher-card'>";
        echo "<h3>" . htmlspecialchars($row["nome"] . " " . htmlspecialchars($row["cognome"])) . "</h3>";
        echo "<p>Sport: " . htmlspecialchars($row["sport"]) . "</p>";
        echo "<p>Descrizione: " . htmlspecialchars($row["descrizione"]) . "</p>";
        echo "<a href='dettaglio_insegnante.php?id=" . htmlspecialchars($row["id"]) . "' class='button'>Vedi Dettagli</a>";
        echo "</div>";
    }
} else {
    // Messaggio nel caso in cui non ci siano insegnanti per lo sport specificato
    echo "Nessun insegnante disponibile per lo sport selezionato.";
}

$conn->close();
?>






