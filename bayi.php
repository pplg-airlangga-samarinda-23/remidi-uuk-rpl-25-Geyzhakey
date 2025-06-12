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
    <style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(to bottom right, #c8e6c9, #a5d6a7); /* background halaman */
        margin: 0;
        padding: 40px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        width: 100%;
        max-width: 900px;
        background-color: #ffffff; /* putih bersih */
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }

    h1 {
        text-align: center;
        color: #2e7d32;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    thead {
        background: linear-gradient(to right, #2e7d32, #66bb6a); /* gradasi hijau tua */
        color: white;
    }

    th, td {
        padding: 12px;
        border: 1px solid #ccc;
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #f1f8e9; /* baris genap lebih soft */
    }

    a {
        color: #2e7d32;
        text-decoration: none;
        margin: 0 4px;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Data Bayi</h1>
        <table>
            <thead>
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
                            <a href="bayi-edit.php?id=<?= $rows['id'] ?>">Edit</a> /
                            <a href="bayi-tambah.php">Tambah</a> /
                            <a href="bayi-hapus.php?id=<?= $rows['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
