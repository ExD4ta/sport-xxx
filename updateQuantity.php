<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sport-xxx";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$productId = $_POST['id'];
$stmt = $conn->prepare("UPDATE articolo SET quantita = quantita - 1 WHERE id_articolo = ?");
$stmt->bind_param("i", $productId);
$stmt->execute();

$stmt->close();
$conn->close();
?>
