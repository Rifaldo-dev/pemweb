
<?php

if(isset($_POST['aksi'])){
    $tahunSekarang = $_POST['tahunSekarang'];
    $tahunLahir = $_POST['tahunLahir'];
    
    $usia = $tahunSekarang - $tahunLahir;
    
    if ($usia >= 0 && $usia <= 5) {
        $kategori = "Balita";
    } elseif ($usia >= 6 && $usia <= 10) {
        $kategori = "Anak-anak";
    } elseif ($usia >= 11 && $usia <= 17) {
        $kategori = "Remaja";
    } elseif ($usia >= 18) {
        $kategori = "Dewasa";
    } else {
        $kategori = "Data salah, silahkan perbaiki...!";
    }
    
    echo "Usia Anda: " . $usia . " tahun<br>";
    echo "Kategori: " . $kategori;
}

?>
