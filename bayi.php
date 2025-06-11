<?php
require 'koneksi.php';

// Ambil data bayi pakai PDO
$sql = "SELECT * FROM bayi";
$stmt = $db->prepare($sql);
$stmt->execute();
$babies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bayi</title>
</head>
<body>
    <h1>Data Bayi</h1>
    <table border="1">
        <thead style="background-color: gray;">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Nama Ibu</th> 
                <th>Nama Ayah</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($babies as $rows) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($rows["nama"]) ?></td>
                    <td><?= htmlspecialchars($rows["nama_ibu"]) ?></td>
                    <td><?= htmlspecialchars($rows["nama_ayah"]) ?></td>
                    <td><?= htmlspecialchars($rows["tanggal_lahir"]) ?></td>
                    <td>
                        <a href="bayi-edit.php?id=<?= $rows['id'] ?>">edit</a> /
                        <a href="bayi-tambah.php">tambah</a> /
                        <a href="bayi-hapus.php?id=<?= $rows['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
