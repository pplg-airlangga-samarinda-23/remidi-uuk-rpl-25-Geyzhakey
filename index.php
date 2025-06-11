<?php

session_start();

if(!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard posyandu</title>
</head>
<body>
    <h1>sistem posyandu</h1>
    <h2>Selamat datang, <?=$_SESSION['nama']?></h2>
    <a href="logout.php">logout</a>

    <nav>
        <ul>
            <?php if ($_SESSION['role'] == 'admin') : ?>
                <li><a href="pengguna.php">Data pengguna</a></li>
                <?php endif ?>

                <li><a href="bayi.php">Data bayi</a></li>
                <li><a href="catat.php">Catat pertumbuhan</a></li>
        </ul>
    </nav>
</body>
</html>