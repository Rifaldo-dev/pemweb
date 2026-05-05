<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Gaji Karyawan</title>
</head>

<body>
<fieldset>
    <h2>Slip Gaji Karyawan</h2>
    <form action="" method="POST">
        <label for="">Nama Karyawan:</label>
        <input type="text" name="nama" id="nama" placeholder="ketik nama karyawan">
        <br><br>
        <label for="">Masa Kerja (thn):</label>
        <input type="number" name="masa_kerja" id="masa_kerja" placeholder="masukkan masa kerja">
        <br><br>
        <label for="pendidikan">Pendidikan:</label>
        <select name="pendidikan" id="pendidikan" onchange="hitungGaji()">
            <option value="">Pilih Pendidikan</option>
            <option value="SD">SD</option>
            <option value="SLTP">SLTP</option>
            <option value="SLTA">SLTA</option>
            <option value="DIPLOMA">DIPLOMA</option>
            <option value="S1">S1</option>
        </select>
        <br><br>
        <label for="">Jenis Kelamin:</label>
        <select name="jenis_kelamin" id="jenis_kelamin">
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
        <br><br>
        <label for="">Gaji Pokok Rp.</label>
        <input type="number" id="gaji_pokok" readonly>
        <br><br>
        <label for="">Tunjangan Keluarga Rp.</label>
        <input type="number" id="tunjangan_keluarga" value="200000" readonly>
        <br><br>
        <label for="">Tunjangan Transport Rp.</label>
        <input type="number" id="tunjangan_transport" value="100000" readonly>
        <br><br>
        <label for="">Gaji Bersih Rp.</label>
        <input type="number" id="gaji_bersih" readonly>
    </form>
</fieldset>
    
</body>

<script>
function hitungGaji() {
    let pendidikan = document.getElementById("pendidikan").value;
    
    let gaji_pokok = 0;
    
    // Menentukan gaji pokok berdasarkan pendidikan
    if (pendidikan === "SD") {
        gaji_pokok = 400000;
    } else if (pendidikan === "SLTP") {
        gaji_pokok = 500000;
    } else if (pendidikan === "SLTA") {
        gaji_pokok = 700000;
    } else if (pendidikan === "DIPLOMA") {
        gaji_pokok = 1400000;
    } else if (pendidikan === "S1") {
        gaji_pokok = 2000000;
    }
    
    // Tunjangan tetap
    let tunjangan_keluarga = 200000;
    let tunjangan_transport = 100000;
    
    // Menghitung gaji bersih
    let gaji_bersih = gaji_pokok + tunjangan_keluarga + tunjangan_transport;
    
    // Menampilkan hasil
    document.getElementById("gaji_pokok").value = gaji_pokok;
    document.getElementById("gaji_bersih").value = gaji_bersih;
}
</script>
</html>

<?php

?>