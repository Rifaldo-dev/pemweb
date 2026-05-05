<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biaya Kuliah</title>
</head>
<body>
<fieldset>
    <h2>Biaya Kuliah Mahasiswa</h2>
    <form action="" method="POST">
        <label for="">Nama Mahasiswa:</label>
        <input type="text" name="nama" placeholder="ketik nama mahasiswa">
        <br><br>
        <label for="">No. BP:</label>
        <input type="text" name="nobp" placeholder="ketik nomor BP">
        <br><br>
        <label for="angkatan">Tahun Angkatan:</label>
        <select name="angkatan" id="">
            <option value="2009">2009</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
        </select>
        <br><br>
        <label for="">Jumlah SKS:</label>
        <input type="number" name="sks" placeholder="masukkan jumlah SKS">
        <br><br>
        <button type="submit" name="aksi">Hitung Biaya</button>
    </form>
</fieldset>    

</body>
</html>

<?php
if(isset($_POST['aksi'])){
    $nama = $_POST['nama'];
    $nobp = $_POST['nobp'];
    $angkatan = $_POST['angkatan'];
    $sks = $_POST['sks'];
    
    $biaya_adm = CARI_BIAYA_ADM($angkatan);
    $biaya_sks = $sks * 110000; // Rp. 110.000 per SKS
    $total_biaya = $biaya_adm + $biaya_sks;
    
    echo "<br><h3>BIAYA KULIAH</h3>";
    echo "Nama : ".$nama."<br>";
    echo "No. BP : ".$nobp."<br>";
    echo "Jumlah SKS : ".$sks."<br>";
    echo "<br>";
    echo "Biaya Adm Rp. ".number_format($biaya_adm)."<br>";
    echo "Biaya SKS Rp. ".number_format($biaya_sks)."<br>";
    echo "<hr>";
    echo "Uang Kuliah Rp. ".number_format($total_biaya)."<br>";
}

function CARI_BIAYA_ADM($angkatan){
    if ($angkatan == "2009") {
        return 500000;
    } else if ($angkatan == "2010") {
        return 600000;
    } else if ($angkatan == "2011") {
        return 700000;
    } else if ($angkatan == "2012") {
        return 700000;
    } else if ($angkatan == "2013") {
        return 900000;
    } else if ($angkatan == "2014") {
        return 1000000;
    }
}
?>