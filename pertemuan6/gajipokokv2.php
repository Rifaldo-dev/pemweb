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
        <input type="text" name="namakar" id="namakar" placeholder="ketik nama karyawan"><br>
        <label for="">Pendidikan:</label>
        <select name="pdd" id="pdd" onchange="CARI_GP()">
            <option value="SD">SD</option>
            <option value="SLTP">SLTP</option>
            <option value="SLTA">SLTA</option>
            <option value="D3">D3</option>
            <option value="S1">S1</option>
        </select>
        <br>
       <label for="">Gaji Pokok Rp.</label>
       <input type="number" id="gp" readonly>
    </form>
</fieldset>
    
</body>

<script>
function CARI_GP() {
    let pdd = document.getElementById("pdd").value;

    if (pdd === "SD") {
        gp = 1400000;
    } else if (pdd === "SLTP") {
        gp = 1750000;
    } else if (pdd === "SLTA") {
        gp = 1900000;
    } else if (pdd === "D3") {
        gp = 2400000;
    } else if (pdd === "S1") {
        gp = 2800000;
    }
    document.getElementById("gp").value = gp;
}
</script>
</html>
<?php

?>