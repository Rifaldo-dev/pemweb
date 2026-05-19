<?php
// C#2: koneksikan aplikasi ke DB

include "koneksi.php";
// ==========================================
// ALGORITMA:
// 1. Ambil data dari tabel barang
// 2. Tampilkan data ke SELECT OPTION
// 3. User memilih barang
// 4. Harga otomatis muncul
// 5. User input jumlah
// 6. Data dikirim ke simpan.php
// ==========================================

// C#3: BACA data barang, simpan di var $queryBarang
$queryBarang = mysqli_query($koneksi,
"SELECT * FROM barang");
?>

<!DOCTYPE html>
<html>

<head>
    <!-- C#4: seting CSS -->
    <title>Tambah Penjualan</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- =====================================================
            #C5: HEADER
    ===================================================== -->

    <?php
    $tanggal = date("Y-m-d H:i:s"); //date time
    ?>

    <h2>Tambah Data Penjualan</h2>
    <p><?= 'Tanggal : ' . $tanggal ?></p>

    <!-- =====================================================
            #C6: TOMBOL KEMBALI
    ===================================================== -->

    <a href="index.php">&laquo; Kembali</a>

    <br><br>

    <!-- =====================================================
            #C7: FORM TAMBAH DATA
    ===================================================== -->

    <form action="simpan.php" method="POST">

        <!-- ==========================================
        PILIH BARANG
        ==========================================  -->

        <p>
            Nama Barang
            <br>
            <select name="barang_id" id="barang_id" required autofocus>

                <option value="">
                    -- Pilih Barang --
                </option>

                <?php
                while($barang = mysqli_fetch_array($queryBarang)){
                ?>

                <option value="<?= $barang['id']; ?>" data-harga="<?= $barang['harga']; ?>">
                    <?= $barang['nama_barang']; ?>
                </option>

                <?php } ?>

            </select>
        </p>

        <!-- ==========================================
        HARGA (otomatis dari pilihan barang)
        ==========================================  -->

        <p>
            Harga
            <br>
            <input type="number" name="harga" id="harga" readonly>
        </p>

        <!-- ==========================================
        JUMLAH
        ==========================================  -->

        <p>
            Jumlah
            <br>
            <input type="number" name="jumlah" min="1" required>
        </p>

        <!-- ==========================================
        USIA PEMBELI
        ==========================================  -->

        <p>
            Usia Pembeli
            <br>
            <input type="number" name="usia_pembeli" min="1" required>
        </p>

        <!-- ==========================================
        METODE BAYAR
        ==========================================  -->

        <p>
            Metode Bayar
            <br>
            <select name="metode_bayar" required>
                <option value="">-- Pilih Metode --</option>
                <option value="Cash">Cash</option>
                <option value="QRIS">QRIS</option>
                <option value="Transfer">Transfer</option>
            </select>
        </p>

        <!-- ==========================================
        TOMBOL SIMPAN
        ==========================================  -->

        <p>
            <button type="submit">Simpan</button>
        </p>

    </form>

    <!-- =====================================================
            #C8: JAVASCRIPT - Harga otomatis muncul
    ===================================================== -->

    <script>
    document.getElementById('barang_id').addEventListener('change', function() {
        var selected = this.options[this.selectedIndex];
        var harga = selected.getAttribute('data-harga');
        document.getElementById('harga').value = harga ? harga : '';
    });
    </script>

    <!-- =====================================================
            #C9: SELESAI
    ===================================================== -->

</body>

</html>
