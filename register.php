<?php
include 'koneksi.php';
if (isset($_POST['register'])) {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telp = $_POST['telepon'];
    $tgl = $_POST['tgl_lahir'];

    $sql = "INSERT INTO users (username, password, nama, email, telepon, tgl_lahir) VALUES ('$user', '$pass', '$nama', '$email', '$telp', '$tgl')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Daftar Berhasil!'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Daftar Gagal!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Daftar Admin</title>
    <style>
        body { display: flex; justify-content: center; align-items: center; height: 100vh; background: #f4f4f4; }
        .auth-box { background: white; padding: 30px; border-radius: 12px; width: 350px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .input-field { width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
        .btn { width: 100%; padding: 10px; background: #8d7171; color: white; border: none; border-radius: 6px; cursor: pointer; }
    </style>
</head>
<body>
<div class="auth-box">
    <h2>DAFTAR ADMIN</h2>
    <form method="POST">
        <input type="text" name="nama" class="input-field" placeholder="Nama Lengkap" required>
        <input type="text" name="username" class="input-field" placeholder="Username" required>
        <input type="email" name="email" class="input-field" placeholder="Email" required>
        <input type="text" name="telepon" class="input-field" placeholder="No Telepon" required>
        <input type="date" name="tgl_lahir" class="input-field" required>
        <input type="password" name="password" class="input-field" placeholder="Password" required>
        <button type="submit" name="register" class="btn">DAFTAR</button>
    </form>
    <p style="text-align:center; font-size:14px; margin-top:15px;">Sudah punya akun? <a href="login.php">Login</a></p>
</div>
</body>
</html>