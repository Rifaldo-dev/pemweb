<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaji Pokok</title>
</head>
<body>
    <fieldset>
        <h2>SLIP GAJI KARYAWAN</h2>
        <form action="" method="POST">
            <label for="">Nama Karyawan:</label>
            <input type="text" name="namakar" id="namakar" placeholder="ketik nama karyawan">
            <br><br>
            
            <label for="">Pendidikan:</label>
            <select name="pdd" id="pdd" onchange="CARI_GP()">
                <option value="SD">SD</option>
                <option value="SLTP">SLTP</option>
                <option value="SLTA">SLTA</option>
                <option value="D3">D3</option>
                <option value="S1">S1</option>
            </select>
            <br><br>
            
            <label for="">Jenis Kelamin:</label>
            <select name="jk" id="jk" onchange="CARI_JK()">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <br><br>
            
            <label for="">Masa Kerja (tahun):</label>
            <input type="number" name="mk" id="mk" onchange="CARI_TT()" placeholder="masa kerja">
            <br><br>
            
            <label for="">Gaji Pokok Karyawan Rp.</label>
            <input type="text" id="gp" name="gp" readonly>
            <br><br>
            
            <label for="">Tunjangan Keluarga Rp.</label>
            <input type="text" id="tjk" name="tjk" readonly>
            <br><br>
            
            <label for="">Tunjangan Transport Rp.</label>
            <input type="text" id="tt" name="tt" readonly>
            <br><br>
            
            <label for="">Gaji Bersih Rp.</label>
            <input type="text" id="gajibersih" name="gajibersih" readonly>
            <br><br>
            
            <button type="submit" name="aksi">Hitung Slip Gaji</button>
        </form>
    </fieldset>
</body>

<script>
function CARI_GP() {
    let pdd = document.getElementById("pdd").value;
    let gp;
    
    if (pdd === "SD") {
        gp = 1500000;
    } else if (pdd === "SLTP") {
        gp = 1700000;
    } else if (pdd === "SLTA") {
        gp = 2000000;
    } else if (pdd === "D3") {
        gp = 2300000;
    } else if (pdd === "S1") {
        gp = 2000000;
    }
    
    document.getElementById("gp").value = gp.toLocaleString('id-ID');
    CARI_JK(); // Otomatis hitung tunjangan keluarga
}

function CARI_JK() {
    let jk = document.getElementById("jk").value;
    let gpText = document.getElementById("gp").value;
    
    if (gpText) {
        let gp = parseInt(gpText.replace(/[^0-9]/g, ''));
        let tjk;
        
        if (jk === "Laki-Laki") {
            tjk = gp * 0.2; // 20% untuk laki-laki (2.000.000 * 20% = 400.000)
        } else {
            tjk = gp * 0.1; // 10% untuk perempuan (2.000.000 * 10% = 200.000)
        }
        
        document.getElementById("tjk").value = tjk.toLocaleString('id-ID');
        CARI_TT(); // Otomatis hitung tunjangan transport
    }
}

function CARI_TT() {
    let mk = parseInt(document.getElementById("mk").value) || 0;
    let tt = 0;
    
    if (mk >= 1 && mk <= 5) {
        tt = 100000; // Syfa (3 tahun) = 100.000
    } else if (mk >= 6 && mk <= 10) {
        tt = 150000; // Muhammad Amrin (kemungkinan 6-10 tahun) = 150.000
    } else if (mk > 10) {
        tt = 200000;
    }
    
    if (mk > 0) {
        document.getElementById("tt").value = tt.toLocaleString('id-ID');
        hitungGajiBersih(); // Otomatis hitung gaji bersih
    }
}

function hitungGajiBersih() {
    let gpText = document.getElementById("gp").value;
    let tjkText = document.getElementById("tjk").value;
    let ttText = document.getElementById("tt").value;
    
    if (gpText && tjkText && ttText) {
        let gp = parseInt(gpText.replace(/[^0-9]/g, ''));
        let tjk = parseInt(tjkText.replace(/[^0-9]/g, ''));
        let tt = parseInt(ttText.replace(/[^0-9]/g, ''));
        
        let gajiBersih = gp + tjk + tt;
        document.getElementById("gajibersih").value = gajiBersih.toLocaleString('id-ID');
    }
}

// Inisialisasi saat halaman dimuat
window.onload = function() {
    CARI_GP();
}
</script>
</html>

<?php
if(isset($_POST['aksi'])){
    $nama = $_POST['namakar'];
    $pendidikan = $_POST['pdd'];
    $jenisKelamin = $_POST['jk'];
    $masaKerja = $_POST['mk'];
    
    $gp = CARI_GP($pendidikan);
    $tjk = CARI_JK($jenisKelamin, $gp);
    $tt = CARI_TT($masaKerja);
    $gajiBersih = $gp + $tjk + $tt;
    
    echo "<br><br>";
    echo "<fieldset>";
    echo "<h3>SLIP GAJI KARYAWAN</h3>";
    echo "<p>Periode: April 2026</p>";
    echo "<hr>";
    echo "<p><strong>Nama Karyawan: ".$nama."</strong></p>";
    echo "<hr>";
    echo "<table border='1' style='width: 100%; border-collapse: collapse;'>";
    echo "<tr>";
    echo "<td style='padding: 8px;'><strong>Keterangan</strong></td>";
    echo "<td style='padding: 8px; text-align: right;'><strong>Jumlah</strong></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td style='padding: 8px;'>Gaji Pokok</td>";
    echo "<td style='padding: 8px; text-align: right;'>Rp ".number_format($gp, 0, ',', '.')."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td style='padding: 8px;'>Tunjangan Keluarga</td>";
    echo "<td style='padding: 8px; text-align: right;'>Rp ".number_format($tjk, 0, ',', '.')."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td style='padding: 8px;'>Tunjangan Transport</td>";
    echo "<td style='padding: 8px; text-align: right;'>Rp ".number_format($tt, 0, ',', '.')."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td style='padding: 8px; font-weight: bold;'>Gaji Bersih</td>";
    echo "<td style='padding: 8px; text-align: right; font-weight: bold;'>Rp ".number_format($gajiBersih, 0, ',', '.')."</td>";
    echo "</tr>";
    echo "</table>";
    echo "<br>";
    echo "<p style='text-align: right;'>";
    echo "Padang, 21/4/2026<br>";
    echo "HRD / Keuangan<br><br><br>";
    echo "_________________";
    echo "</p>";
    echo "</fieldset>";
}

function CARI_GP($pdd){
    if ($pdd == "SD") {
        return 1500000;
    } else if ($pdd == "SLTP") {
        return 1700000;
    } else if ($pdd == "SLTA") {
        return 2000000;
    } else if ($pdd == "D3") {
        return 2300000;
    } else if ($pdd == "S1") {
        return 2000000;
    }
}

function CARI_JK($jk, $gp){
    if ($jk == "Laki-Laki") {
        return $gp * 0.2; // 20% untuk laki-laki (2.000.000 * 20% = 400.000)
    } else {
        return $gp * 0.1; // 10% untuk perempuan (2.000.000 * 10% = 200.000)
    }
}

function CARI_TT($mk){
    if ($mk >= 1 && $mk <= 5) {
        return 100000;
    } else if ($mk >= 6 && $mk <= 10) {
        return 150000;
    } else if ($mk > 10) {
        return 200000;
    } else {
        return 0;
    }
}
?>