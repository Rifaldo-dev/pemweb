// Data biaya administrasi berdasarkan tahun angkatan
const biayaAdministrasi = {
    2020: 500000,
    2021: 500000,
    2022: 700000,
    2023: 700000,
    2024: 900000,
    2025: 9000000
};

// Biaya per SKS
const biayaPerSks = 200000;

document.getElementById('hitungBtn').addEventListener('click', hitungBiayaKuliah);

// Event listener untuk onKeyDown (Enter key)
document.getElementById('nama').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        hitungBiayaKuliah();
    }
});

document.getElementById('nobp').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        hitungBiayaKuliah();
    }
});

document.getElementById('jumlahSks').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        hitungBiayaKuliah();
    }
});

function hitungBiayaKuliah() {
    // Ambil nilai input
    const nama = document.getElementById('nama').value;
    const nobp = document.getElementById('nobp').value;
    const tahunAngkatan = document.getElementById('tahunAngkatan').value;
    const jumlahSks = parseInt(document.getElementById('jumlahSks').value);

    // Validasi input
    if (!nama || !nobp || !tahunAngkatan || isNaN(jumlahSks) || jumlahSks <= 0 || jumlahSks > 24) {
        alert('Mohon isi semua field dengan benar! (SKS maksimal 24)');
        return;
    }

    // Ambil biaya administrasi berdasarkan tahun angkatan
    const biayaAdm = biayaAdministrasi[tahunAngkatan];

    // Hitung biaya SKS
    const biayaSks = jumlahSks * biayaPerSks;

    // Hitung total uang kuliah
    const totalUangKuliah = biayaAdm + biayaSks;

    // Format ke Rupiah
    const formatBiayaAdm = formatRupiah(biayaAdm);
    const formatBiayaSks = formatRupiah(biayaSks);
    const formatTotal = formatRupiah(totalUangKuliah);

    // Tampilkan hasil
    document.getElementById('hasilNama').textContent = nama;
    document.getElementById('hasilNobp').textContent = nobp;
    document.getElementById('hasilTahun').textContent = tahunAngkatan;
    document.getElementById('hasilSks').textContent = jumlahSks;
    document.getElementById('hasilBiayaAdm').textContent = formatBiayaAdm;
    document.getElementById('hasilBiayaSks').textContent = formatBiayaSks;
    document.getElementById('hasilTotal').textContent = formatTotal;

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
