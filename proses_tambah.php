<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tabel = $_POST['tabel'];
    unset($_POST['tabel']);

    $columns = [];
    $values = [];

    foreach ($_POST as $key => $value) {
        $columns[] = "`$key`";
        $values[] = "'" . mysqli_real_escape_string($conn, $value) . "'";
    }

    $col_string = implode(", ", $columns);
    $val_string = implode(", ", $values);

    $sql = "INSERT INTO $tabel ($col_string) VALUES ($val_string)";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data berhasil disimpan!'); window.location='admin_data.php?tabel=$tabel';</script>";
    } else {
        // Ini akan menampilkan error spesifik dari MySQL
        echo "<script>alert('Gagal: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
}
?>