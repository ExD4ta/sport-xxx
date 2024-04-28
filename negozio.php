<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Negozio Articoli Sportivi</title>
    <link rel="stylesheet" href="negozio_styles.css">
</head>

<body>
    <header>
        <h1>Extreme Sports</h1>
        <nav>
            <ul>
                <a href="index.html" class="home-button">Home</a>
            </ul>
        </nav>

    </header>
    <div class="container">
        <div class="title-box">
            <h2>Prodotti Disponibili</h2>
        </div>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sport-xxx";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        $sql = "SELECT id_articolo, nome, sport, costo, quantita FROM articolo";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='product-card'>";
                echo "<h3>" . htmlspecialchars($row["nome"]) . "</h3>";
                echo "<p>Sport: " . htmlspecialchars($row["sport"]) . "</p>";
                echo "<p>Prezzo: €" . htmlspecialchars($row["costo"]) . "</p>";
                echo "<p>Quantità disponibile: " . htmlspecialchars($row["quantita"]) . "</p>";
                echo "<a href='dettaglio_prodotto.php?id=" . $row["id_articolo"] . "' class='button'>Vedi Dettagli</a></div>";
            }
        } else {
            echo "<p>Nessun prodotto disponibile.</p>";
        }
        $conn->close();
        ?>
    </div>

    <script src="scripts.js"></script>
</body>

</html>