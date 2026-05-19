<?php
include "koneksi.php";

// ==========================================
// ALGORITMA:
// 1. Ambil ID dari URL
// 2. Hapus data berdasarkan ID
// 3. Kembali ke index.php
// ==========================================

$id = $_GET['id'];

mysqli_query($koneksi,
"DELETE FROM penjualan WHERE id='$id'");

header("Location:index.php");

?>
