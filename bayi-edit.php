<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_bayi = $_GET['id'];
    $nama = $_POST['nama'];
    $nama_ibu = $_POST['nama_ibu'];
    $nama_ayah = $_POST['nama_ayah'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    $sql = 'UPDATE bayi SET nama=?, nama_ibu=?, nama_ayah=?, tanggal_lahir=? WHERE id_bayi=?';
    $stmt = $db->prepare($sql);
    $stmt->execute([$nama, $nama_ibu, $nama_ayah, $tanggal_lahir, $id_bayi]);

    if ($stmt) {
        header("location: bayi.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_bayi = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM bayi WHERE id_bayi=?");
    $stmt->execute([$id_bayi]);
    $baby = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$baby) {
        echo "Data tidak ditemukan";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bayi</title>
</head>
<body>
    <h1>Edit Data Bayi</h1>

    <form action="" method="post">
        <div>
            <label for="nama">Nama Bayi</label>
            <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($baby['nama']) ?>">
        </div>
        <div>
            <label for="nama_ibu">Nama Ibu</label>
            <input type="text" name="nama_ibu" id="nama_ibu" value="<?= htmlspecialchars($baby['nama_ibu']) ?>">
        </div>
        <div>
            <label for="nama_ayah">Nama Ayah</label>
            <input type="text" name="nama_ayah" id="nama_ayah" value="<?= htmlspecialchars($baby['nama_ayah']) ?>">
        </div>
        <div>
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?= htmlspecialchars($baby['tanggal_lahir']) ?>">
        </div>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
