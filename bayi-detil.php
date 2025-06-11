<?php

require 'koneksi.php';

$id_bayi = $_GET['id'] ?? null;

if (!$id_bayi) {
    echo "ID bayi tidak ditemukan.";
    exit;
}

$sql = "SELECT c.id, p.nama AS kader, c.id_bayi, c.tinggi, c.berat, c.tanggal 
        FROM catatan c 
        INNER JOIN pengguna p ON c.id_kader = p.id_pengguna 
        WHERE c.id_bayi = ?
        ORDER BY c.id DESC";

$stmt = $db->prepare($sql);
$stmt->execute([$id_bayi]);
$details = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detil Bayi</title>
</head>
<body>
    <h1>Detil Bayi</h1>
    <h2>Catatan Pertumbuhan Bayi</h2>

    <a href="bayi.php">Kembali</a>
    <table border="1">
        <thead style="background-color: gray;">
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Tinggi</th>
                <th>Berat</th>
                <th>Kader</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($details as $detail): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($detail['tanggal']) ?></td>
                    <td><?= htmlspecialchars($detail['tinggi']) ?> cm</td>
                    <td><?= htmlspecialchars($detail['berat']) ?> kg</td>
                    <td><?= htmlspecialchars($detail['kader']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
