<?php
include "koneksi.php";

// tangkap keyword pencarian dari form
$keyword = "";

if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
}

// =====================================================
// QUERY DATABASE
// =====================================================

if($keyword != ""){
    $query = mysqli_query($koneksi, "SELECT * FROM barang
        WHERE nama_barang LIKE '%$keyword%'
        OR harga LIKE '%$keyword%'
        ORDER BY id DESC");
} else {
    $query = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id DESC");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>CRUD Barang</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- =====================================================
            HEADER
    ===================================================== -->

    <h2>💵 Data Barang</h2>

    <br>

    <!-- =====================================================
            Tombol Tambah Data
    ===================================================== -->

    <a href="tambah.php">+ Tambah Barang</a>

    <!-- =====================================================
            FORM SEARCH
    ===================================================== -->

    <div class="search-box">
    <form method="GET" action="">
        <input type="text" name="keyword" placeholder="Cari nama barang / harga"
        value="<?= $keyword; ?>">
        <button type="submit">Search</button>
        <a class="reset" href="index.php">Reset</a>
    </form>
    </div>

    <!-- =====================================================
            TABEL DATA
    ===================================================== -->

    <table>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Harga Rp.</th>
            <th>Stock</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while($data = mysqli_fetch_array($query)){
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['id']; ?></td>
            <td><?= $data['nama_barang']; ?></td>
         <td>Rp <?= number_format($data['harga'], 0, ',', '.'); ?></td>
            <td><?= $data['stock']; ?></td>
            <td>
                <a href="edit.php?id=<?= $data['id']; ?>">Edit</a>
                <a class="hapus" href="hapus.php?id=<?= $data['id']; ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
            </td>
        </tr>

        <?php } ?>

    </table>

    <!-- =====================================================
            SELESAI
    ===================================================== -->

</body>

</html>
