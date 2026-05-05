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
        <input type="text" name="nama" placeholder="ketik nama karyawan">
        <br><br>
        <label for="">Masa Kerja (thn):</label>
        <input type="number" name="masa_kerja" placeholder="masukkan masa kerja">
        <br><br>
        <label for="pendidikan">Pendidikan:</label>
        <select name="pendidikan" id="">
            <option value="SD">SD</option>
            <option value="SLTP">SLTP</option>
            <option value="SLTA">SLTA</option>
            <option value="DIPLOMA">DIPLOMA</option>
            <option value="S1">S1</option>
        </select>
        <br><br>
        <label for="">Jenis Kelamin:</label>
        <select name="jenis_kelamin" id="">
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
        <br><br>
        <button type="submit" name="aksi">Buat Slip Gaji</button>
    </form>
</fieldset>    

</body>
</html>

<?php
if(isset($_POST['aksi'])){
    $nama = $_POST['nama'];
    $masa_kerja = $_POST['masa_kerja'];
    $pendidikan = $_POST['pendidikan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    
    $gaji_pokok = CARI_GAJI_POKOK($pendidikan);
    $tunjangan_keluarga = 200000;
    $tunjangan_transport = 100000;
    $gaji_bersih = $gaji_pokok + $tunjangan_keluarga + $tunjangan_transport;
    
    echo "<br><div style='border: 2px solid black; padding: 20px; width: 400px;'>";
    echo "<h3 style='text-align: center;'>SLIP GAJI KARYAWAN</h3>";
    echo "<table>";
    echo "<tr><td>NAMA</td><td>: ".$nama."</td></tr>";
    echo "<tr><td>Masa Kerja (thn)</td><td>: ".$masa_kerja."</td></tr>";
    echo "<tr><td>PENDIDIKAN</td><td>: ".$pendidikan."</td></tr>";
    echo "<tr><td>JENIS KELAMIN</td><td>: ".$jenis_kelamin."</td></tr>";
    echo "</table>";
    echo "<br>";
    echo "<table>";
    echo "<tr><td>Gaji Pokok</td><td>Rp. ".number_format($gaji_pokok)."</td></tr>";
    echo "<tr><td>Tunjangan Keluarga</td><td>Rp. ".number_format($tunjangan_keluarga)."</td></tr>";
    echo "<tr><td>Tunjangan Transport</td><td>Rp. ".number_format($tunjangan_transport)."</td></tr>";
    echo "<tr><td><hr></td><td><hr></td></tr>";
    echo "<tr><td><strong>Gaji Bersih</strong></td><td><strong>Rp. ".number_format($gaji_bersih)."</strong></td></tr>";
    echo "</table>";
    echo "</div>";
}

function CARI_GAJI_POKOK($pendidikan){
    if ($pendidikan == "SD") {
        return 400000;
    } else if ($pendidikan == "SLTP") {
        return 500000;
    } else if ($pendidikan == "SLTA") {
        return 700000;
    } else if ($pendidikan == "DIPLOMA") {
        return 1400000;
    } else if ($pendidikan == "S1") {
        return 2000000;
    }
}
?>