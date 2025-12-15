<?php
include 'koneksi.php';

// Tangkap data dari form
$nama     = $_POST['nama'];
$hp       = $_POST['hp'];
$tanggal  = $_POST['tanggal'];
$paket    = $_POST['paket_wisata']; // PAKAI NAMA INI
$durasi   = $_POST['durasi'];
$peserta  = $_POST['peserta'];

$inap  = isset($_POST['inap']) ? 1 : 0;
$trans = isset($_POST['trans']) ? 1 : 0;
$makan = isset($_POST['makan']) ? 1 : 0;

$harga = $_POST['harga_paket'];
$total = $_POST['total_tagihan'];

// Query INSERT (URUTAN SESUAI STRUKTUR TABEL)
$query = "INSERT INTO pesanan (
    nama_pemesan,
    nomor_hp,
    tanggal_pesan,
    paket_wisata,
    durasi_wisata,
    jumlah_peserta,
    layanan_penginapan,
    layanan_transport,
    layanan_makan,
    harga_paket,
    total_tagihan
) VALUES (
    '$nama',
    '$hp',
    '$tanggal',
    '$paket',
    '$durasi',
    '$peserta',
    '$inap',
    '$trans',
    '$makan',
    '$harga',
    '$total'
)";

// Eksekusi
if (mysqli_query($koneksi, $query)) {
    echo "<script>
        alert('Booking Berhasil! Terima kasih.');
        window.location='index.php';
    </script>";
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
