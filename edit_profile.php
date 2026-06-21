<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['status_login'])) { header("Location: login.php"); exit; }
$user = $_SESSION['username'];
if (isset($_POST['update'])) {
    $nama = $_POST['nama']; $email = $_POST['email']; $telp = $_POST['telepon']; $tgl = $_POST['tgl_lahir'];
    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "assets/".$foto);
        mysqli_query($conn, "UPDATE users SET foto='$foto' WHERE username='$user'");
    }
    mysqli_query($conn, "UPDATE users SET nama='$nama', email='$email', telepon='$telp', tgl_lahir='$tgl' WHERE username='$user'");
    echo "<script>alert('Berhasil!'); window.location='profile.php';</script>";
}
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE username='$user'"));
$foto_path = (!empty($data['foto'])) ? "assets/".$data['foto'] : "https://ui-avatars.com/api/?name=".urlencode($data['nama']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .card { background: white; padding: 40px; border-radius: 20px; width: 400px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); text-align: center; position: relative; }
        .back-btn { position: absolute; top: 20px; left: 20px; text-decoration: none; color: #8d7171; font-weight: bold; }
        .profile-img { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 3px solid #8d7171; margin-bottom: 15px; }
        .field { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        .btn { width: 100%; padding: 12px; background: #8d7171; color: white; border: none; border-radius: 8px; cursor: pointer; }
    </style>
</head>
<body>
<div class="card">
    <a href="profile.php" class="back-btn">← Back</a>
    <h2>Edit Profile</h2>
    <form method="POST" enctype="multipart/form-data">
        <img src="<?php echo $foto_path; ?>" class="profile-img">
        <input type="file" name="foto" class="field">
        <input type="text" name="nama" value="<?php echo $data['nama']; ?>" class="field">
        <input type="email" name="email" value="<?php echo $data['email']; ?>" class="field">
        <input type="text" name="telepon" value="<?php echo $data['telepon']; ?>" class="field">
        <input type="date" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" class="field">
        <button type="submit" name="update" class="btn">SIMPAN</button>
    </form>
</div>
</body>
</html>