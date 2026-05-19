<?php
include "koneksi.php";

// Ambil data dari form
$nama_barang = $_POST['nama_barang'];
$harga       = $_POST['harga'];
$stock       = $_POST['stock'];

// Simpan ke database
mysqli_query($koneksi,
    "INSERT INTO barang (nama_barang, harga, stock)
     VALUES ('$nama_barang', '$harga', '$stock')");

// Kembali ke halaman index
header("Location:index.php");
?>
