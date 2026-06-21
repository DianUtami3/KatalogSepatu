<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['status_login'])) { header("Location: login.php"); exit; }
$user = $_SESSION['username'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE username='$user'"));
$foto = (!empty($data['foto'])) ? "assets/".$data['foto'] : "https://ui-avatars.com/api/?name=".urlencode($data['nama']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .card { background: white; padding: 40px; border-radius: 20px; width: 400px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); position: relative; }
        .options { position: absolute; top: 20px; right: 20px; cursor: pointer; font-size: 20px; color: #888; }
        .menu-edit { display: none; position: absolute; top: 50px; right: 20px; background: white; border: 1px solid #ddd; border-radius: 6px; padding: 10px; }
        .menu-edit a { text-decoration: none; color: #333; }
        .profile-top { display: flex; align-items: center; gap: 20px; margin-bottom: 20px; }
        .profile-img { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 3px solid #8d7171; }
        .hr { border-bottom: 1px solid #eee; margin: 15px 0; }
    </style>
</head>
<body>
<div class="card">
    <div class="options" onclick="document.getElementById('menu').style.display='block'">⋮</div>
    <div id="menu" class="menu-edit" onmouseleave="this.style.display='none'">
        <a href="edit_profile.php">Edit Profile</a>
    </div>
    <div class="profile-top">
        <img src="<?php echo $foto; ?>" class="profile-img">
        <div>
            <h2 style="margin:0;"><?php echo $data['nama']; ?></h2>
            <p style="margin:5px 0; color:#888;">@<?php echo $data['username']; ?></p>
        </div>
    </div>
    <div class="hr"></div>
    <label style="color:#888; font-size:12px;">Email</label>
    <p style="margin:5px 0 15px;"><?php echo $data['email']; ?></p>
    <div class="hr"></div>
    <label style="color:#888; font-size:12px;">Telepon</label>
    <p style="margin:5px 0 15px;"><?php echo $data['telepon']; ?></p>
    <div class="hr"></div>
    <label style="color:#888; font-size:12px;">Tanggal Lahir</label>
    <p style="margin:5px 0 20px;"><?php echo $data['tgl_lahir']; ?></p>
    <a href="admin_data.php" style="color:#8d7171; text-decoration:none;">← Kembali</a>
</div>
</body>
</html>