<?php
include 'koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM produk");
if($query) {
    echo "Koneksi berhasil! Ada " . mysqli_num_rows($query) . " produk di database.";
} else {
    echo "Gagal: " . mysqli_error($conn);
}
?>