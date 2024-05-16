<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sport-xxx";

// Crea connessione
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica connessione
if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
} // Include file di connessione al database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($_POST['register'])) {
        // Registrazione utente
        $sql = "INSERT INTO cliente (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo "Registrazione avvenuta con successo!";
        } else {
            echo "Errore: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        // Login utente
        $sql = "SELECT * FROM cliente WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
        } else {
            echo "Username o password errati!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="login_styles.css">
</head>
<body>
    <header>
        <h1>Login</h1>
        <a href="index.php" class="home-button">Home</a>
    </header>
    <div class="hero-image-container">
    <div class="login-container">
        <h2>Accedi o Registrati</h2>
        <form method="post" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
            <button type="submit" name="register">Register</button>
        </form>
    </div>
</div>
</body>
</html>