<?php
$paket_dipilih = isset($_GET['paket']) ? $_GET['paket'] : '';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pemesanan Paket Wisata</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-blue">

    <div class="form-container">
        <div class="form-header">
            <h2>Pemesanan Paket Wisata</h2>
            <p>Lengkapi data pemesanan Anda</p>
        </div>

        <form action="proses_simpan.php" method="POST" onsubmit="return validasi()">

            <label>Nama Pemesan</label>
            <input type="text" name="nama" id="nama">

            <label>Nomor HP / Telp</label>
            <input type="text" name="hp" id="hp">

            <label>Paket Wisata</label>
            <select name="paket_wisata" id="paket_wisata" onchange="hitung()">
                <option value="Regular Backpack" <?= $paket_dipilih == 'Regular' ? 'selected' : '' ?>>Regular Backpack</option>
                <option value="Honeymoon Trip" <?= $paket_dipilih == 'Honeymoon' ? 'selected' : '' ?>>Honeymoon Trip</option>
                <option value="Family Adventure" <?= $paket_dipilih == 'Family' ? 'selected' : '' ?>>Family Adventure</option>
            </select>

            <label>Tanggal Pesan</label>
            <input type="date" name="tanggal">

            <div class="row">
                <div class="col">
                    <label>Durasi Wisata (Hari)</label>
                    <input type="number" name="durasi" id="durasi" value="1" min="1" oninput="hitung()">
                </div>
                <div class="col">
                    <label>Jumlah Peserta</label>
                    <input type="number" name="peserta" id="peserta" value="1" min="1" oninput="hitung()">
                </div>
            </div>

            <div class="service-box">
                <p>Pelayanan</p>
                <label class="check-item">
                    <input type="checkbox" name="inap" id="inap" onclick="hitung()">
                    Penginapan (Rp 1.000.000)
                </label>
                <label class="check-item">
                    <input type="checkbox" name="trans" id="trans" onclick="hitung()">
                    Transportasi (Rp 1.200.000)
                </label>
                <label class="check-item">
                    <input type="checkbox" name="makan" id="makan" onclick="hitung()">
                    Service / Makan (Rp 500.000)
                </label>
            </div>

            <label>Harga Paket Perjalanan</label>
            <input type="text" id="view_harga" class="input-display" readonly>
            <input type="hidden" name="harga_paket" id="harga_paket">

            <label>Jumlah Tagihan</label>
            <input type="text" id="view_total" class="input-display total" readonly>
            <input type="hidden" name="total_tagihan" id="total_tagihan">

            <div class="btn-area">
                <button type="submit" class="btn-submit">Simpan Pesanan</button>
                <a href="index.php" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>

    <script>
        function hitung() {
            let durasi = parseInt(document.getElementById('durasi').value) || 0;
            let peserta = parseInt(document.getElementById('peserta').value) || 0;

            let penginapan = document.getElementById('inap').checked ? 1000000 : 0;
            let transport = document.getElementById('trans').checked ? 1200000 : 0;
            let makan = document.getElementById('makan').checked ? 500000 : 0;

            let hargaPaket = penginapan + transport + makan;
            let total = hargaPaket * durasi * peserta;

            document.getElementById('harga_paket').value = hargaPaket;
            document.getElementById('view_harga').value = "Rp " + hargaPaket.toLocaleString('id-ID');

            document.getElementById('total_tagihan').value = total;
            document.getElementById('view_total').value = "Rp " + total.toLocaleString('id-ID');
        }

        function validasi() {
            if (nama.value == "" || hp.value == "") {
                alert("Data harus diisi!");
                return false;
            }
            if (harga_paket.value == 0) {
                alert("Pilih minimal satu layanan!");
                return false;
            }
            return true;
        }

        window.onload = hitung;
    </script>

</body>

</html>