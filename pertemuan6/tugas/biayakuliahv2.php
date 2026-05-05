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
        <input type="text" name="nama" id="nama" placeholder="ketik nama mahasiswa">
        <br><br>
        <label for="">No. BP:</label>
        <input type="text" name="nobp" id="nobp" placeholder="ketik nomor BP">
        <br><br>
        <label for="angkatan">Tahun Angkatan:</label>
        <select name="angkatan" id="angkatan" onchange="hitungBiaya()">
            <option value="">Pilih Angkatan</option>
            <option value="2009">2009</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
        </select>
        <br><br>
        <label for="">Jumlah SKS:</label>
        <input type="number" name="sks" id="sks" placeholder="masukkan jumlah SKS" onchange="hitungBiaya()">
        <br><br>
        <label for="">Biaya Administrasi Rp.</label>
        <input type="number" id="biaya_adm" readonly>
        <br><br>
        <label for="">Biaya SKS Rp.</label>
        <input type="number" id="biaya_sks" readonly>
        <br><br>
        <label for="">Total Uang Kuliah Rp.</label>
        <input type="number" id="total_biaya" readonly>
    </form>
</fieldset>
    
</body>

<script>
function hitungBiaya() {
    let angkatan = document.getElementById("angkatan").value;
    let sks = document.getElementById("sks").value;
    
    let biaya_adm = 0;
    
    // Menentukan biaya administrasi berdasarkan angkatan
    if (angkatan === "2009") {
        biaya_adm = 500000;
    } else if (angkatan === "2010") {
        biaya_adm = 600000;
    } else if (angkatan === "2011") {
        biaya_adm = 700000;
    } else if (angkatan === "2012") {
        biaya_adm = 700000;
    } else if (angkatan === "2013") {
        biaya_adm = 900000;
    } else if (angkatan === "2014") {
        biaya_adm = 1000000;
    }
    
    // Menghitung biaya SKS (Rp. 110.000 per SKS)
    let biaya_sks = sks * 110000;
    
    // Menghitung total biaya
    let total_biaya = biaya_adm + biaya_sks;
    
    // Menampilkan hasil
    document.getElementById("biaya_adm").value = biaya_adm;
    document.getElementById("biaya_sks").value = biaya_sks;
    document.getElementById("total_biaya").value = total_biaya;
}
</script>
</html>

<?php

?>