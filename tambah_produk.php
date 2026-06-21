<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>G3S0 - Add Product</title>
</head>
<body>
    <div class="container">
        <h2>TAMBAH KOLEKSI BARU</h2>
        <form method="POST" style="margin-top:30px;">
            <input type="text" name="nama" placeholder="Nama Sepatu" style="padding:15px; width:400px; display:block; margin-bottom:15px;" required>
            <input type="number" name="harga" placeholder="Harga" style="padding:15px; width:400px; display:block; margin-bottom:15px;" required>
            <input type="number" name="stok" placeholder="Stok" style="padding:15px; width:400px; display:block; margin-bottom:15px;" required>
            <button type="submit" name="submit" class="btn-buy">SIMPAN KOLEKSI</button>
        </form>
    </div>
    <?php
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $query = "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama', '$harga', '$stok')";
        if(mysqli_query($conn, $query)){
            echo "<script>alert('Berhasil!'); window.location='index.php';</script>";
        }
    }
    ?>
</body>
</html>