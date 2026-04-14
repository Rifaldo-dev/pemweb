<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IF Else</title>
</head>
<body>
    <h2>Input Nilai Algoritma</h2>
    <form action="" method="POST">
        <label for="">
            Nilai MID:
        </label>
  
        <input type="number" name="mid">
        <br>
        <label for="">
            Nilai UAS:
        </label>
        
        <input type="number" name="uas">
    <br>
<button type="submit" name="aksi">Proses</button>
    </form>
</body>
</html>




<?php

if(isset($_POST['aksi'])){
  // echo"Tombol Aktif";
    // var_dump($_POST);
}
$mid = $_POST['mid'];
$uas = $_POST['uas'];

if ($mid > 65 || $uas > 65)
{
    echo "lulus";
}else{
    echo "gagal";
}

?>