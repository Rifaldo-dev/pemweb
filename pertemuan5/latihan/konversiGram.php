<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Gram ke Kilogram</title>
</head>
<body>
    <h2>Konversi Gram ke Kilogram</h2>
    
    <?php
    $gram = "";
    $kg = "";
    
    if(isset($_POST['proses'])){
        $gram = $_POST['gram'];
        $kg = $gram / 1000;
    }
    ?>
    
    <form method="POST">
        <label>Masukkan Berat (gram):</label>
        <input type="number" name="gram" value="<?php echo $gram; ?>" autofocus required>
        <br><br>
        
        <button type="submit" name="proses">Konversi</button>
    </form>
    
    <?php
    if($kg !== ""){
        echo "<br><p><strong>$gram gram = $kg kg</strong></p>";
    }
    ?>
</body>
</html>
