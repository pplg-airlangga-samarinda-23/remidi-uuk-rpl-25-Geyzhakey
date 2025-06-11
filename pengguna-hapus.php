<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM pengguna WHERE id = ?";
    $stmt = $db->prepare($sql);
    $success = $stmt->execute([$id]);

    if ($success) {
        header("Location: pengguna.php");
        exit;
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID tidak ditemukan atau metode tidak valid.";
}
?>
