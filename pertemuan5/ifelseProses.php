
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