<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $sql = 'INSERT INTO pengguna (nama, username, password, role) VALUES (?, ?, ?, ?)';
    $stmt = $db->prepare($sql);
    $row = $stmt->execute([$nama, $username, $password, $role]);

    if ($row) {
        header("Location: pengguna.php");
        exit;
    }
}
?>

    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah pengguna</title>
</head>
<body>
    <h1>tambah pengguna</h1>

    <form action="" method="post">
        <div>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama">
        </div>
        <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        </div>
        <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        </div>
        <div>
        <label for="role">Role</label>
        <select name="role" id="role">
            <option value="admin">Admin</option>
            <option value="kader">Kader</option>
        </select>
        </div>
        <button type="submit">Tambah</button>
        <a href="pengguna.php">Batal</a>
    </form>
</body>
</html>
