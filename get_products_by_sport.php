<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sport-xxx";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sport = isset($_GET['sport']) ? $_GET['sport'] : '';

$sql = "SELECT id_articolo, nome, costo, quantita FROM articolo WHERE sport = ? AND quantita > 0";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $sport);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product-card'>";
        echo "<h3>" . htmlspecialchars($row["nome"]) . "</h3>";
        echo "<img src='" . htmlspecialchars($row["nome"]) . ".jpg'>";
        echo "<p>Prezzo: €" . htmlspecialchars($row["costo"]) . "</p>";
        echo "<p>Quantità disponibile: " . htmlspecialchars($row["quantita"]) . "</p>";
        echo "<a href='dettaglio_prodotto.php?id=" . $row["id_articolo"] . "' class='button'>Vedi Dettagli</a></div>";
    }
} else {
    echo "Nessun prodotto disponibile per lo sport selezionato.";
}
$conn->close();
?>
