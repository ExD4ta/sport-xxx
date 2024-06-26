<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Extreme Sports</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>EXTREME SPORTS</h1>
    </header>
    
    <div class="tab">
        <button class="tablinks" onclick="window.location.href='news.php'">News</button>
        <?php
            session_start();
            if (isset($_SESSION['username'])) {
                echo '<button class="tablinks" onclick="window.location.href=\'logout.php\'">'.$_SESSION['username'].'</button>';
            } else {
                echo '<button class="tablinks" onclick="window.location.href=\'login.php\'">Login</button>';
            }
            ?>
        <button class="tablinks" onclick="window.location.href='eventi.php'">Eventi</button>
    </div>

    <div class="hero-image-container">
        <div class="button-container">
            <button class="main-button" onclick="window.location.href='negozio.php'">Negozio</button>
            <button class="main-button" onclick="window.location.href='istruttori.php'">Istruttori</button>
        </div>        
    </div>

    <script src="scripts.js"></script>
</body>
</html>
