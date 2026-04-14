<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Warna - CheckBox</title>
</head>
<body>
    <h2>Pilih Warna (CheckBox)</h2>
    
    <?php
    $warnaDipilih = [];
    
    if(isset($_POST['proses'])){
        if(isset($_POST['warna'])){
            $warnaDipilih = $_POST['warna'];
        }
    }
    ?>
    
    <form method="POST">
        <label>Pilih Warna:</label><br>
        <input type="checkbox" name="warna[]" value="Merah" <?php if(in_array("Merah", $warnaDipilih)) echo "checked"; ?>> Merah<br>
        <input type="checkbox" name="warna[]" value="Biru" <?php if(in_array("Biru", $warnaDipilih)) echo "checked"; ?>> Biru<br>
        <input type="checkbox" name="warna[]" value="Kuning" <?php if(in_array("Kuning", $warnaDipilih)) echo "checked"; ?>> Kuning<br>
        <input type="checkbox" name="warna[]" value="Hitam" <?php if(in_array("Hitam", $warnaDipilih)) echo "checked"; ?>> Hitam<br>
        <br>
        
        <button type="submit" name="proses">Proses</button>
    </form>
    
    <?php
    if(!empty($warnaDipilih)){
        echo "<br><p>Warna yang dipilih: <strong>" . implode(", ", $warnaDipilih) . "</strong></p>";
        echo "<div style='display: flex; gap: 10px;'>";
        foreach($warnaDipilih as $warna){
            $kodeWarna = "";
            if($warna == "Merah") $kodeWarna = "red";
            elseif($warna == "Biru") $kodeWarna = "blue";
            elseif($warna == "Kuning") $kodeWarna = "yellow";
            elseif($warna == "Hitam") $kodeWarna = "black";
            
            echo "<div style='width: 100px; height: 100px; background-color: $kodeWarna; border: 2px solid black;'></div>";
        }
        echo "</div>";
    }
    ?>
</body>
</html>
