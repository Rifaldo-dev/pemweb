<?php
include "koneksi.php";

// Ambil ID dari URL
$id = $_GET['id'];

// Hapus data dari database
mysqli_query($koneksi, "DELETE FROM barang WHERE id='$id'");

// Kembali ke halaman index
header("Location:index.php");
?>
