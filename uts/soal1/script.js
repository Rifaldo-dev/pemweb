document.getElementById('hitungBtn').addEventListener('click', hitungBungaCicilan);

// Event listener untuk onKeyDown (Enter key)
document.getElementById('nama').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        hitungBungaCicilan();
    }
});

document.getElementById('plafon').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        hitungBungaCicilan();
    }
});

document.getElementById('jangka').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        hitungBungaCicilan();
    }
});

function hitungBungaCicilan() {
    // Ambil nilai input
    const nama = document.getElementById('nama').value;
    const plafon = parseFloat(document.getElementById('plafon').value);
    const jangka = parseInt(document.getElementById('jangka').value);

    // Validasi input
    if (!nama || isNaN(plafon) || isNaN(jangka) || plafon <= 0 || jangka <= 0) {
        alert('Mohon isi semua field dengan benar!');
        return;
    }

    // Hitung bunga per bulan (1% dari plafon)
    const bungaPerBulan = plafon * 0.01;

    // Hitung cicilan per bulan
    // Cicilan per bulan = (plafon / jangka waktu) + bunga
    const cicilanPerBulan = (plafon / jangka) + bungaPerBulan;

    // Format ke Rupiah
    const formatPlafon = formatRupiah(plafon);
    const formatBunga = formatRupiah(bungaPerBulan);
    const formatCicilan = formatRupiah(cicilanPerBulan);

    // Tampilkan hasil
    document.getElementById('hasilNama').textContent = nama;
    document.getElementById('hasilPlafon').textContent = formatPlafon;
    document.getElementById('hasilJangka').textContent = jangka;
    document.getElementById('hasilBunga').textContent = formatBunga;
    document.getElementById('hasilCicilan').textContent = formatCicilan;

    // Tampilkan div hasil
    document.getElementById('hasil').style.display = 'block';
}

function formatRupiah(angka) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(angka);
}
