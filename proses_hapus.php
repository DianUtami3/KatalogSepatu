<?php
include 'koneksi.php';

if(isset($_GET['tabel']) && isset($_GET['id'])) {
    $tabel = $_GET['tabel'];
    $id = $_GET['id'];

    $q = mysqli_query($conn, "SELECT * FROM $tabel");
    $fields = mysqli_fetch_fields($q);
    $pk = $fields[0]->name;

    $query = "DELETE FROM $tabel WHERE $pk = '$id'";
    
    if(mysqli_query($conn, $query)) {
        echo "<script>alert('Berhasil!'); window.location='admin_data.php?tabel=$tabel';</script>";
    } else {
        echo "<script>alert('Gagal: Pastikan data ini tidak sedang digunakan oleh tabel lain!'); window.location='admin_data.php?tabel=$tabel';</script>";
    }
}
?>