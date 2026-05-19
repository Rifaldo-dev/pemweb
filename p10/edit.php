<?php
// Universitas Metamedia - Fakultas Teknologi Informasi dan Industri Kreatif
// Prodi: Sistem Informasi, Matakuliah: Pemrograman Web,
// Ir. Muhammad Amrin Lubis, M.Sc email: mamrinlubis@metamedia.ac.id

// C#2: koneksikan aplikasi ke DB(database)
include "koneksi.php";

// ==========================================
// ALGORITMA:
// 1. Ambil ID dari URL
// 2. Baca data penjualan berdasarkan ID
// 3. Baca data barang
// 4. Tampilkan data ke FORM
// 5. User mengubah data
// 6. Update data ke database
// ==========================================
// C#3: ambil ID dari URL
$id = $_GET['id'];

// C#4: baca data penjualan berdasarkan ID
$queryEdit = mysqli_query($koneksi,

 "SELECT * FROM penjualan
 WHERE id='$id'");

$data = mysqli_fetch_array($queryEdit);

// C#5: baca data barang
$queryBarang = mysqli_query($koneksi,
"SELECT * FROM barang");

// ==========================================
// C#6: jika tombol update ditekan
// ==========================================

if(isset($_POST['update'])){

    // C#61: ambil data dari form

    $barang_id    = $_POST['barang_id'];
    $jumlah       = $_POST['jumlah'];
    $usia_pembeli = $_POST['usia_pembeli'];
    $metode_bayar = $_POST['metode_bayar'];

    // C#62: update data ke tabel penjualan
    mysqli_query($koneksi,

    "UPDATE penjualan SET

    barang_id     = '$barang_id',
    jumlah        = '$jumlah',
    usia_pembeli  = '$usia_pembeli',
    metode_bayar  = '$metode_bayar'

    WHERE id='$id'");

    // C#63: kembali ke halaman index
    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Penjualan</title>
    <!-- C#7: setting CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- C#8: tampil judul -->

    <h2>Edit Data Penjualan</h2>

    <!-- C#9: FORM EDIT -->
    <form method="POST">
        <p>
            ID Transaksi
            <br>
            <input type="number" name="id" value="<?= $data['id']; ?>" readonly>
        </p>
        <!-- ==========================================
        PILIH BARANG
        ==========================================  -->
        <p>
            Nama Barang
            <br>
            <select name="barang_id" id="barang_id" required>
                <option value="">
                    -- Pilih Barang --
                </option>
                <?php
            while($barang = mysqli_fetch_array($queryBarang)){
                ?>

                <option value="<?= $barang['id']; ?>" dtharga="<?= $barang['harga']; ?>" <?php
                // C#91:
                // selected otomatis, sesuai data lama

                if($barang['id'] == $data['barang_id']){
                    echo "selected";
                }
                ?>>

                    <?= $barang['nama_barang']; ?>
                </option>
                <?php } ?>
            </select>
        </p>

        <!-- ==========================================
        JUMLAH
        ==========================================  -->
        <p>
            Jumlah
            <br>
            <input type="number" name="jumlah" value="<?= $data['jumlah']; ?>" required>
        </p>
