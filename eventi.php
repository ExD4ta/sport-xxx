<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sezione Eventi</title>
    <link rel="stylesheet" href="events_styles.css">
</head>

<body>
    <div class="events-header">
        <h1>Prossimi Eventi</h1>

        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo '<button class="home-button" onclick="window.location.href=\'logout.php\'">' . $_SESSION['username'] . '</button>';
        } else {
            echo '<button class="home-button" onclick="window.location.href=\'login.php\'">Login</button>';
        }
        ?>
        <!-- Menu a discesa per filtrare gli eventi per sport -->
        <form method="GET">

            <a href="index.php" class="home-button">Home</a>
            <select id="sportFilter" name="sport" onchange="this.form.submit()" class="sport-dropdown">
                <option value="">Tutti gli sport</option>
                <?php
                // Connessione al database per ottenere gli sport
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "sport-xxx"; // Il nome del tuo database
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }

                // Query per ottenere gli sport
                $sql_sport = "SELECT nome_sport FROM sport";
                $result_sport = $conn->query($sql_sport);

                // Loop per visualizzare gli sport nel menu a discesa
                while ($row_sport = $result_sport->fetch_assoc()) {
                    $selected = isset($_GET['sport']) && $_GET['sport'] == $row_sport['nome_sport'] ? 'selected' : '';
                    echo "<option value='" . htmlspecialchars($row_sport['nome_sport']) . "' $selected>" . htmlspecialchars($row_sport['nome_sport']) . "</option>";
                }

                // Chiudi la connessione al database
                $conn->close();
                ?>
            </select>
        </form>
    </div>
    <button class="scroll-button left" id="scrollLeftButton" onclick="scrollLeft()">◄</button>
    <button class="scroll-button right" id="scrollRightButton" onclick="scrollRight()">►</button>

    <div class="events-container" id="eventsContainer">
        <?php
        // Connessione al database e query per ottenere gli eventi
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sport-xxx"; // Il nome del tuo database
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        // Costruisci la query SQL per ottenere gli eventi
        $sql = "SELECT * FROM evento";

        // Se è stato selezionato uno sport nel menu a discesa, filtra gli eventi per quello sport
        if (isset($_GET['sport']) && $_GET['sport'] != '') {
            $sport_filter = $_GET['sport'];
            $sql .= " WHERE sport = '$sport_filter'";
        }

        // Esegui la query SQL
        $result = $conn->query($sql);

        // Loop per visualizzare gli eventi
        if ($result->num_rows > 0) {
            echo '<div class="events-scroll-container">';
            while ($row = $result->fetch_assoc()) {
                echo '<div class="event">';
                echo '<h2>' . htmlspecialchars($row["nome"]) . '</h2>';
                echo "<img src='immagini/evento/" . htmlspecialchars($row["nome"]) . ".jpg'>";
                echo '<p>Data inizio: ' . htmlspecialchars($row["data_inizio"]) . '  -  Data fine: ' . htmlspecialchars($row["data_fine"]) . '</p>';
                echo '<p>Sport: ' . htmlspecialchars($row["sport"]) . '</p>';
                echo '<p>Indirizzo: ' . htmlspecialchars($row["indirizzo"]) . '</p>';
                echo '<p>' . nl2br(htmlspecialchars($row["descrizione"])) . '</p>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<p>Nessun evento disponibile.</p>';
        }

        $conn->close();
        ?>
    </div>

    <script>
        // Funzione per scorrere gli eventi a sinistra
        document.getElementById("scrollLeftButton").addEventListener("click", function () {
            document.getElementById("eventsContainer").scrollBy({ left: -300, behavior: 'smooth' }); // Modificare questo valore per regolare la quantità di scorrimento
        });

        // Funzione per scorrere gli eventi a destra
        document.getElementById("scrollRightButton").addEventListener("click", function () {
            document.getElementById("eventsContainer").scrollBy({ left: 300, behavior: 'smooth' }); // Modificare questo valore per regolare la quantità di scorrimento
        });
        // Funzione per gestire la visibilità dei pulsanti di scorrimento
        function handleScrollVisibility() {
            var container = document.getElementById("eventsContainer");
            var leftButton = document.getElementById("scrollLeftButton");
            var rightButton = document.getElementById("scrollRightButton");

            // Se sei al massimo dello scorrimento a sinistra, nascondi il pulsante sinistro
            if (container.scrollLeft === 0) {
                leftButton.classList.add("hidden");
            } else {
                leftButton.classList.remove("hidden");
            }

            // Se sei al massimo dello scorrimento a destra, nascondi il pulsante destro
            if (container.scrollLeft + container.clientWidth >= container.scrollWidth) {
                rightButton.classList.add("hidden");
            } else {
                rightButton.classList.remove("hidden");
            }
        }

        // Aggiungi un ascoltatore per l'evento di scorrimento del contenitore
        document.getElementById("eventsContainer").addEventListener("scroll", handleScrollVisibility);

        // Chiama la funzione iniziale per gestire la visibilità dei pulsanti
        handleScrollVisibility();
    </script>
</body>

</html>