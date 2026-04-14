<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
</head>
<body>
    <h2>KALKULATOR SEDERHANA</h2>
    
    <?php
    $hasil = "";
    $angka1 = "";
    $angka2 = "";
    
    if(isset($_POST['operasi'])){
        $angka1 = $_POST['angka1'];
        $angka2 = $_POST['angka2'];
        $operasi = $_POST['operasi'];
        
        if ($operasi == "kali") {
            $hasil = $angka1 * $angka2;
        } elseif ($operasi == "kurang") {
            $hasil = $angka1 - $angka2;
        } elseif ($operasi == "bagi") {
            if ($angka2 != 0) {
                $hasil = $angka1 / $angka2;
            } else {
                $hasil = "Error";
            }
        } elseif ($operasi == "tambah") {
            $hasil = $angka1 + $angka2;
        }
    }
    ?>
    
    <form method="POST">
        <label>Angka 1:</label>
        <input type="number" name="angka1" value="<?php echo $angka1; ?>" autofocus required>
        
        <label>Angka 2:</label>
        <input type="number" name="angka2" value="<?php echo $angka2; ?>" required>
        
        <label>Hasil:</label>
        <label><?php echo $hasil; ?></label>
        <br><br>
        
        <button type="submit" name="operasi" value="kali">×</button>
        <button type="submit" name="operasi" value="kurang">-</button>
        <button type="submit" name="operasi" value="bagi">/</button>
        <button type="submit" name="operasi" value="tambah">+</button>
    </form>
</body>
</html>
