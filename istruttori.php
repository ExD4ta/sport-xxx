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

$sql = "SELECT codice_fiscale, nome, cognome, descrizione, sport FROM insegnanti"; //tabella insegnanti-istruttori
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "codice fiscale: " . $row["codice_fiscale"]. " - Nome: " . $row["nome"]. " - cognome: " . $row["cognome"]. " - descrizione: " . $row["descrizione"]. " - sport: " . $row["sport"]. "<br>";
  }
} else {
  echo "0 risultati";
}
$conn->close();
?>
