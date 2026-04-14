<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IF Else</title>
</head>
    <?php
    $tahunSekarang = date('Y');
    ?>
    <h2>Hitung Usia </h2>
    <form action="usiaProses.php" method="POST">
        <label for="">
            Tahun Sekarang:
        </label>
  
        <input type="number" name="tahunSekarang" value="<?php echo $tahunSekarang; ?>" autofoccus>
        <br>
        <label for="">
            Tahun Lahir:
        </label>
        
        <input type="number" name="tahunLahir" autofocus>
    <br>
<button type="submit" name="aksi">Proses</button>
    </form>
</body>
</html>
