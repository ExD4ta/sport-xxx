<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Negozio Articoli Sportivi</title>
    <link rel="stylesheet" href="negozio_styles.css">
</head>
<body>
    <header>
    <div class="news-header">
        <h1>Negozio</h1>

        <a href="index.html" class="home-button">Home</a>
        <select id="sportFilter" onchange="filterProductsBySport()" class="sport-dropdown">
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
    </header>
    <div class="container">
        <div id="productsContainer">
            <!-- Qui verranno visualizzati i prodotti filtrati -->
        </div>
    </div>

    <script src="scripts.js"></script>
</body>
</html>
