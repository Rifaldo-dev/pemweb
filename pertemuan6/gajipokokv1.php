<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaji Pokok</title>
</head>
<body>
<fieldset>
    <h2>Gaji Karyawan</h2>
    <form action="" method="POST">
<label for="">Nama Karyawan:</label>
    <input type="texat" name="namakar" placeholder="ketik nama karyawan">
    <br>
    <label for="Pendidikan">Pendidikan:</label>
    <select name="pdd" id="">
        <option value="SD">SD</option>
        <option value="SLTP">SLTP</option>
        <option value="SLTA">SLTA</option>
        <option value="D3">D3</option>
        <option value="S1">S1</option>
    </select>
    <br>
    <button type="submit" name="aksi">Hitung Gaji</button>
    </form>
</fieldset>    

</body>
</html>

<?php
if(isset($_POST['aksi'])){
   // echo "tombol proses aktif";
   // var_dump($_POST);
   $nama = $_POST['namakar'];
   
   $gp = CARI_GP($_POST['pdd']); // SD
   echo "<br>";
   echo "<br> Nama Karyawan : ".$nama;
   echo "<br> Gaji Pokok Rp. ".number_format($gp);
}

function CARI_GP($pdd){
    if ($pdd == "SD") {
        return 1400000;
    } else if ($pdd == "SLTP") {
        return 1750000;
    } else if ($pdd == "SLTA") {
        return 1900000;
    } else if ($pdd == "D3") {
        return 2400000;
    } else if ($pdd == "S1") {
        return 2800000;
    }
}
?>