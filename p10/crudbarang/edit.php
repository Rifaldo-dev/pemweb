<?php
include "koneksi.php";

// Ambil ID dari URL
$id = $_GET['id'];

// Baca data barang berdasarkan ID
$queryEdit = mysqli_query($koneksi,
    "SELECT * FROM barang WHERE id='$id'");
$data = mysqli_fetch_array($queryEdit);

// Jika tombol update ditekan
if(isset($_POST['update'])){

    $nama_barang = $_POST['nama_barang'];
    $harga       = $_POST['harga'];
    $stock       = $_POST['stock'];

    // Update data ke database
    mysqli_query($koneksi,
        "UPDATE barang SET
            nama_barang = '$nama_barang',
            harga       = '$harga',
            stock       = '$stock'
         WHERE id='$id'");

    // Kembali ke halaman index
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Barang</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- =====================================================
            HEADER
    ===================================================== -->

    <h2>Edit Data Barang</h2>

    <a href="index.php">&laquo; Kembali</a>

    <br><br>

    <!-- =====================================================
            FORM EDIT
    ===================================================== -->

    <form method="POST">

        <p>
            ID Barang
            <br>
            <input type="number" name="id" value="<?= $data['id']; ?>" readonly>
        </p>

        <p>
            Nama Barang
            <br>
            <input type="text" name="nama_barang" value="<?= $data['nama_barang']; ?>" required>
        </p>

        <p>
            Harga
            <br>
            <input type="number" name="harga" value="<?= $data['harga']; ?>" min="0" required>
        </p>

        <p>
            Stock
            <br>
            <input type="number" name="stock" value="<?= $data['stock']; ?>" min="0" required>
        </p>

        <p>
            <button type="submit" name="update">Update</button>
        </p>

    </form>

    <!-- =====================================================
            SELESAI
    ===================================================== -->

</body>

</html>
