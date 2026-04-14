<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Keliling Bangun</title>
</head>
<body>
    <h2>Hitung Keliling Bangun Persegi Panjang</h2>
    
    <?php
    $panjang = "";
    $lebar = "";
    $keliling = "";
    
    if(isset($_POST['proses'])){
        $panjang = $_POST['panjang'];
        $lebar = $_POST['lebar'];
        $keliling = 2 * ($panjang + $lebar);
    }
    ?>
    
    <form method="POST">
        <label>Panjang:</label>
        <input type="number" name="panjang" value="<?php echo $panjang; ?>" autofocus required>
        <br><br>
        
        <label>Lebar:</label>
        <input type="number" name="lebar" value="<?php echo $lebar; ?>" required>
        <br><br>
        
        <button type="submit" name="proses">Hitung Keliling</button>
    </form>
    
    <?php
    if($keliling !== ""){
        echo "<br><p><strong>Keliling Persegi Panjang = $keliling</strong></p>";
        echo "<p>Rumus: 2 × (Panjang + Lebar) = 2 × ($panjang + $lebar) = $keliling</p>";
    }
    ?>
</body>
</html>
