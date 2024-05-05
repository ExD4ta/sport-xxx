<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Dettagli Prodotto</title>
    <link rel="stylesheet" href="dettaglio_styles.css">
</head>
<body>
    <header>
        <h1>Dettagli Prodotto</h1>
        <ul>
                <li><a href="negozio.php" class="negozio-button">Negozio</a></li>
            </ul>
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
        $stmt = $conn->prepare("SELECT * FROM articolo WHERE id_articolo = ?");
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            echo "<div class='product-details'>";
            echo "<h2>" . htmlspecialchars($row['nome']) . "</h2>";
            echo "<img src='immagini/" . htmlspecialchars($row["nome"]) . ".jpg'>";
            echo "<p>Prezzo: €" . htmlspecialchars($row['costo']) . "</p>";
            echo "<p>Quantità disponibile: " . htmlspecialchars($row['quantita']) . "</p>";
            echo "<button id='buyButton' class='button'>Acquista</button>";
            echo "</div>";
        } else {
            echo "<p>Prodotto non trovato.</p>";
        }
        $stmt->close();
        $conn->close();
        ?>
    </div>

    <script>
    document.getElementById('buyButton').addEventListener('click', function() {
        var productId = <?php echo json_encode($productId); ?>;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "updateQuantity.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                window.location.href = "negozio.php"; // Redirect quando la query è completata
            }
        };
        xhr.send("id=" + productId);
    });
    </script>
</body>
</html>
