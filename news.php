<?php
// Dati di connessione al database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sport-xxx";

// Creazione di una connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Query per ottenere le ultime notizie
$sql = "SELECT * FROM news";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Sezione Notizie</title>
    <link rel="stylesheet" href="news_styles.css">
</head>

<body>
    <div class="news-header">
        <h1>Ultime Notizie</h1>

        <a href="index.html" class="home-button">Home</a>
        <select id="newsFilter" onchange="filterNewsBySport()" class="sport-dropdown">
            <option value="">tutto</option>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "sport-xxx";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connessione fallita: " . $conn->connect_error);
            }
            $sql_sport = "SELECT nome_sport FROM sport";
            $result_sport = $conn->query($sql_sport);
            while ($row_sport = $result_sport->fetch_assoc()) {
                echo "<option value='" . htmlspecialchars($row_sport['nome_sport']) . "'>" . htmlspecialchars($row_sport['nome_sport']) . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="news-container">
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="article">';
                echo '<h2>' . htmlspecialchars($row["titolo"]) . '</h2>';
                echo '<p>' . nl2br(htmlspecialchars($row["testo"])) . '</p>';
                echo '<p> Pubblicato il ' . date('d/m/Y', strtotime($row['data'])) . ' alle ' . date('H:i', strtotime($row['ora'])) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<div class="article"><p>Nessuna notizia disponibile.</p></div>';
        }
        ?>
    </div>

    <div class="news-footer">
        <p>&copy; 2024 Negozio Articoli Sportivi. Tutti i diritti riservati.</p>
    </div>

    <?php $conn->close(); ?>
    <script src="scripts.js"></script>
</body>

</html>