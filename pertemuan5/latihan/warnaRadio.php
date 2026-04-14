<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Warna - RadioButton</title>
</head>
<body>
    <h2>Pilih Warna (RadioButton)</h2>
    
    <?php
    $warnaDipilih = "";
    
    if(isset($_POST['proses'])){
        if(isset($_POST['warna'])){
            $warnaDipilih = $_POST['warna'];
        }
    }
    ?>
    
    <form method="POST">
        <label>Pilih Warna:</label><br>
        <input type="radio" name="warna" value="Merah" <?php if($warnaDipilih == "Merah") echo "checked"; ?>> Merah<br>
        <input type="radio" name="warna" value="Biru" <?php if($warnaDipilih == "Biru") echo "checked"; ?>> Biru<br>
        <input type="radio" name="warna" value="Kuning" <?php if($warnaDipilih == "Kuning") echo "checked"; ?>> Kuning<br>
        <input type="radio" name="warna" value="Hitam" <?php if($warnaDipilih == "Hitam") echo "checked"; ?>> Hitam<br>
        <br>
        
        <button type="submit" name="proses">Proses</button>
    </form>
    
    <?php
    if($warnaDipilih != ""){
        $kodeWarna = "";
        if($warnaDipilih == "Merah") $kodeWarna = "red";
        elseif($warnaDipilih == "Biru") $kodeWarna = "blue";
        elseif($warnaDipilih == "Kuning") $kodeWarna = "yellow";
        elseif($warnaDipilih == "Hitam") $kodeWarna = "black";
        
        echo "<br><p>Warna yang dipilih: <strong>$warnaDipilih</strong></p>";
        echo "<div style='width: 200px; height: 100px; background-color: $kodeWarna; border: 2px solid black;'></div>";
    }
    ?>
</body>
</html>
