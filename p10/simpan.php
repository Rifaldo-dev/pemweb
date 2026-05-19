<?php
// <!--  C#73: koneksikan aplikasi ke DB(database)
include "koneksi.php";

// ======================================
var_dump($_POST);

// <!--  C#74: Ambil data dari form
$barang_id    = $_POST['barang_id'];
$jumlah       = $_POST['jumlah'];
$usia_pembeli = $_POST['usia_pembeli'];
$metode_bayar = $_POST['metode_bayar'];
$harga  = $_POST['harga'];

$tanggal = date("Y-m-d H:i:s"); //date time, timeStamp

$total = $harga * $jumlah;

// <!--  C#75: simpan data penjualan ke tabel: penjualan
mysqli_query($koneksi,
 "INSERT INTO penjualan(barang_id,jumlah, usia_pembeli, metode_bayar,tanggal)
 VALUES('$barang_id','$jumlah','$usia_pembeli','$metode_bayar','$tanggal')");

// <!--  C#76: kurangi stok BArang
mysqli_query($koneksi, "UPDATE barang SET stock = stock - $jumlah WHERE id=$barang_id");

// <!--  C#8: akses alur logi kembali ke index.php
//    data penjualan akan ditampilkan di sana

header("Location:index.php");

?>
