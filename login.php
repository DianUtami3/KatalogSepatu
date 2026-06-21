<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$user'");
    $data = mysqli_fetch_assoc($result);

    if ($data && password_verify($pass, $data['password'])) {
        $_SESSION['status_login'] = true;
        $_SESSION['username'] = $user;
        header("Location: admin_data.php");
        exit;
    } else {
        echo "<script>alert('Username atau Password salah!');</script>";
    }
}

if (isset($_POST['register'])) {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telp = mysqli_real_escape_string($conn, $_POST['telepon']);
    $tgl = $_POST['tgl_lahir'];

    $sql = "INSERT INTO users (username, password, nama, email, telepon, tgl_lahir) VALUES ('$user', '$pass', '$nama', '$email', '$telp', '$tgl')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Daftar Berhasil! Silakan Login'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Daftar Gagal! Username sudah terpakai.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>G3S0 - Authentication</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .auth-container { background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 350px; text-align: center; }
        .input-group { margin-bottom: 10px; }
        .input-group input { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
        .btn-auth { width: 100%; padding: 10px; background: #8d7171; color: #fff; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; }
        .toggle-btn { margin-top: 15px; color: #666; font-size: 14px; cursor: pointer; }
        #register-form { display: none; }
    </style>
</head>
<body>
<div class="auth-container">
    <div id="login-form">
        <h2>LOGIN</h2>
        <form method="POST">
            <div class="input-group"><input type="text" name="username" placeholder="Username" required></div>
            <div class="input-group"><input type="password" name="password" placeholder="Password" required></div>
            <button type="submit" name="login" class="btn-auth">LOGIN</button>
        </form>
        <p class="toggle-btn" onclick="toggleAuth()">Belum punya akun? Daftar</p>
    </div>
    <div id="register-form">
        <h2>DAFTAR</h2>
        <form method="POST">
            <div class="input-group"><input type="text" name="nama" placeholder="Nama Lengkap" required></div>
            <div class="input-group"><input type="text" name="username" placeholder="Username" required></div>
            <div class="input-group"><input type="email" name="email" placeholder="Email" required></div>
            <div class="input-group"><input type="text" name="telepon" placeholder="No Telepon" required></div>
            <div class="input-group"><input type="date" name="tgl_lahir" required></div>
            <div class="input-group"><input type="password" name="password" placeholder="Password" required></div>
            <button type="submit" name="register" class="btn-auth">DAFTAR</button>
        </form>
        <p class="toggle-btn" onclick="toggleAuth()">Sudah punya akun? Login</p>
    </div>
</div>
<script>
    function toggleAuth() {
        const login = document.getElementById('login-form');
        const reg = document.getElementById('register-form');
        if (login.style.display === 'none') {
            login.style.display = 'block';
            reg.style.display = 'none';
        } else {
            login.style.display = 'none';
            reg.style.display = 'block';
        }
    }
</script>
</body>
</html>