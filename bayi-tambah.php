<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nama_ibu = $_POST['nama_ibu'];
    $nama_ayah = $_POST['nama_ayah'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    $sql = 'INSERT INTO bayi (nama, nama_ibu, nama_ayah, tanggal_lahir) VALUES (?, ?, ?, ?)';
    $stmt = $db->prepare($sql);
    $stmt->execute([$nama, $nama_ibu, $nama_ayah, $tanggal_lahir]);

    if ($stmt) {
        header("location: bayi.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Bayi</title>
</head>
<body>
    <h1>Tambah Data Bayi</h1>

    <a href="bayi.php">Kembali</a>

    <form action="" method="post">
        <div>
            <label for="nama">Nama Bayi</label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <div>
            <label for="nama_ibu">Nama Ibu</label>
            <input type="text" name="nama_ibu" id="nama_ibu" required>
        </div>
        <div>
            <label for="nama_ayah">Nama Ayah</label>
            <input type="text" name="nama_ayah" id="nama_ayah" required>
        </div>
        <div>
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" required>
        </div>
        <button type="submit">Tambah</button>
    </form>
</body>
</html>
