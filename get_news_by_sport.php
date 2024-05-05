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

$sql = "SELECT * FROM news WHERE sport = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $sport);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="article">';
        echo '<h2>' . htmlspecialchars($row["titolo"]) . '</h2>';
        echo '<p>' . nl2br(htmlspecialchars($row["testo"])) . '</p>';
        echo '<p> Pubblicato il ' . date('d/m/Y', strtotime($row['data'])) . ' alle ' . date('H:i', strtotime($row['ora'])) . '</p>';
        echo '</div>';
    }
} else {
    echo "Nessun prodotto disponibile per lo sport selezionato.";
}
$conn->close();
?>
