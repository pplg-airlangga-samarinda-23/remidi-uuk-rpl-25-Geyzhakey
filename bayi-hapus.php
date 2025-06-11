<?php

require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id_bayi = $_GET['id'];

    $sql = "DELETE FROM bayi WHERE id_bayi = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id_bayi]);

    if ($stmt) {
        header("Location: bayi.php");
        exit;
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID tidak ditemukan.";
}

?>
