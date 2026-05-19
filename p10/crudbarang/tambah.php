<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- =====================================================
            HEADER
    ===================================================== -->

    <h2>Tambah Data Barang</h2>

    <a href="index.php">&laquo; Kembali</a>

    <br><br>

    <!-- =====================================================
            FORM TAMBAH
    ===================================================== -->

    <form action="simpan.php" method="POST">

        <p>
            Nama Barang
            <br>
            <input type="text" name="nama_barang" required autofocus>
        </p>

        <p>
            Harga
            <br>
            <input type="number" name="harga" min="0" required>
        </p>

        <p>
            Stock
            <br>
            <input type="number" name="stock" min="0" required>
        </p>

        <p>
            <button type="submit">Simpan</button>
        </p>

    </form>

    <!-- =====================================================
            SELESAI
    ===================================================== -->

</body>

</html>
