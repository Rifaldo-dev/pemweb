<?php
include "koneksi.php";
// #R2: tangkap keyword pencarian dari form
$keyword = "";

if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
}

// =====================================================
// #R3: QUERY DATABASE
// =====================================================

// jika keyword ADA -> lakukan pencarian
if($keyword != ""){

    $query = mysqli_query($koneksi, "SELECT
        p.id,
        b.nama_barang,
        b.harga,
        p.jumlah,

        (b.harga * p.jumlah) as total,
        p.metode_bayar,
        p.tanggal

    FROM penjualan p
    JOIN barang b ON p.barang_id = b.id

    WHERE
        b.nama_barang LIKE '%$keyword%'
        OR p.metode_bayar LIKE '%$keyword%'
        OR p.tanggal LIKE '%$keyword%'

    ORDER BY p.id DESC");

} else {

    // jika keyword kosong -> tampilkan semua data
    $query = mysqli_query($koneksi, "SELECT
        p.id,

        b.nama_barang,
        b.harga,
        p.jumlah,
        (b.harga * p.jumlah) as total,
        p.metode_bayar,
        p.tanggal

    FROM penjualan p
    JOIN barang b ON p.barang_id = b.id

    ORDER BY p.id DESC");
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>CRUD Penjualan + Search</title>

    <!-- #R4: CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- =====================================================
            #R5: HEADER
    ===================================================== -->

    <h2>🧺 Mini POS DATA TRANSAKSI</h2>

    <br>

    <!-- =====================================================

            #C1: Tombol Tambah Data
    ===================================================== -->

    <a href="tambah.php">+ Tambah Data</a>

    <!-- =====================================================
            #C2: FORM SEARCH
    ===================================================== -->

    <div class="search-box">

    <form method="GET" action="">

        <input type="text" name="keyword" placeholder="Cari nama barang / tanggal / bayar"
        value="<?= $keyword; ?>">

        <button type="submit">
            Search
        </button>

        <a class="reset" href="index.php">
            Reset
        </a>

    </form>

    </div>

    <!-- =====================================================
            #R52: TABEL DATA
    ===================================================== -->

    <table>


        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Total Rp</th>
            <th>Metode Bayar</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        // #R53: baca data record per record
        while($data = mysqli_fetch_array($query)){

        ?>

        <!-- #R54: tampilkan isi record -->

        <tr>

            <td><?= $no++; ?></td>

            <td><?= $data['id']; ?></td>

            <td><?= $data['tanggal']; ?></td>

            <td><?= $data['nama_barang']; ?></td>

            <td><?= $data['harga']; ?></td>

            <td><?= $data['jumlah']; ?></td>

            <td><?= $data['total']; ?></td>

            <td><?= $data['metode_bayar']; ?></td>

            <!-- =====================================================
                    #R55: TOMBOL EDIT & HAPUS
            ===================================================== -->


            <td>

                <a href="edit.php?id=<?= $data['id']; ?>">
                    Edit
                </a>

                <a class="hapus" href="hapus.php?id=<?= $data['id']; ?>" onclick="return
                confirm('Yakin hapus data?')">

                    Hapus
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

    <!-- =====================================================
            #R56: SELESAI
    ===================================================== -->

</body>

</html>
