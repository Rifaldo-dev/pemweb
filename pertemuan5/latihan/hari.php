<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Hari</title>
</head>
<body>
    <h2>Pilih Nama Hari</h2>
    
    <?php
    $hariDipilih = "";
    
    if(isset($_POST['proses'])){
        $hariDipilih = $_POST['hari'];
    }
    ?>
    
    <form method="POST">
        <label>Pilih Hari:</label>
        <select name="hari" required>
            <option value="">-- Pilih Hari --</option>
            <option value="Senin" <?php if($hariDipilih == "Senin") echo "selected"; ?>>Senin</option>
            <option value="Selasa" <?php if($hariDipilih == "Selasa") echo "selected"; ?>>Selasa</option>
            <option value="Rabu" <?php if($hariDipilih == "Rabu") echo "selected"; ?>>Rabu</option>
            <option value="Kamis" <?php if($hariDipilih == "Kamis") echo "selected"; ?>>Kamis</option>
            <option value="Jumat" <?php if($hariDipilih == "Jumat") echo "selected"; ?>>Jumat</option>
            <option value="Sabtu" <?php if($hariDipilih == "Sabtu") echo "selected"; ?>>Sabtu</option>
            <option value="Minggu" <?php if($hariDipilih == "Minggu") echo "selected"; ?>>Minggu</option>
        </select>
        <br><br>
        
        <button type="submit" name="proses">Proses</button>
    </form>
    
    <?php
    if($hariDipilih != ""){
        echo "<br><p>Anda memilih hari: <strong>$hariDipilih</strong></p>";
    }
    ?>
</body>
</html>
