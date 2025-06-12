<?php
require 'koneksi.php';
session_start();

$sql = "SELECT * FROM bayi";
$babies = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kader = $_SESSION['id'];
    $id_bayi = $_POST['bayi'];
    $tinggi = $_POST['tinggi'];
    $berat = $_POST['berat'];

    $sql = "INSERT INTO catatan (id_kader,id_bayi,tinggi,berat,tanggal_lahir) VALUES (?,?,?,?,CURRENT_DATE)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id_kader, $id_bayi, $tinggi, $berat]);

    if ($stmt) {
        header("Location: catat.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catat pertumbuhan</title>
</head>
<body>
    <h1>Catat Pertumbuhan Bayi</h1>

    <a href="index.php">kembali</a>

    <form action="" method="post">
        <div>
        <label for="bayi">Bayi</label>
        <select for="bayi" id="bayi">
            <?php foreach ($babies as $baby) : ?>
                <option value="<?=$baby['id_baby']?>"><?=$baby['nama']?></option>
                <?php endforeach ?>
        </select>
        </div>
        <div>
        <label for="tinggi">Tinggi</label>
        <input type="number" name="tinggi" id="tinggi" step="any">
        </div>
        <div>
        <label for="berat">Berat</label>
        <input type="number" name="berat" id="berat" step="any">
        </div>
        <button type="submit">Catat</button>
    </form>
</body>
</html>