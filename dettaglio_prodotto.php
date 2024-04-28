<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Dettagli Prodotto</title>
    <link rel="stylesheet" href="negozio_styles.css">
</head>
<body>
    <header>
        <h1>Dettagli Prodotto</h1>
    </header>
    <div class="container">
        <?php
        $servername = "localhost"; // Sostituire con l'indirizzo del tuo server
        $username = "root"; // Sostituire con il tuo username di MySQL
        $password = ""; // Sostituire con la tua password di MySQL
        $dbname = "sport-xxx"; // Nome del tuo database
        
        // Crea la connessione
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Controlla la connessione
        if ($conn->connect_error) {
          die("Connessione fallita: " . $conn->connect_error);
        }
        $productId = $_GET['id'];
        $query = "SELECT * FROM articolo WHERE id_articolo = $productId";
        $result = $conn->query($query);

        if ($row = $result->fetch_assoc()) {
            echo "<div class='product-details'>";
            echo "<h2>" . htmlspecialchars($row['nome']) . "</h2>";
            echo "<p>" . htmlspecialchars($row['sport']) . "</p>";
            echo "<p>Prezzo: €" . htmlspecialchars($row['costo']) . "</p>";
            echo "<p>Quantità disponibile: " . htmlspecialchars($row['quantita']) . "</p>";
            echo "</div>";
        } else {
            echo "<p>Prodotto non trovato.</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
