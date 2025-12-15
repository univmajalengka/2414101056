<?php
include 'koneksi.php';
$edit_data = null;

/* =======================
   HAPUS DATA
======================= */
if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM pesanan WHERE id='$id'");
    echo "<script>alert('Data berhasil dihapus'); window.location='kelola_pesanan.php';</script>";
}

/* =======================
   AMBIL DATA EDIT
======================= */
if (isset($_GET['aksi']) && $_GET['aksi'] == 'edit') {
    $id = $_GET['id'];
    $q = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id='$id'");
    $edit_data = mysqli_fetch_assoc($q);
}

/* =======================
   UPDATE DATA
======================= */
if (isset($_POST['update'])) {
    $id      = $_POST['id'];
    $nama    = $_POST['nama'];
    $paket   = $_POST['paket_wisata'];
    $durasi  = $_POST['durasi'];
    $peserta = $_POST['peserta'];

    $inap  = isset($_POST['inap']) ? 1 : 0;
    $trans = isset($_POST['trans']) ? 1 : 0;
    $makan = isset($_POST['makan']) ? 1 : 0;

    $harga_paket = ($inap * 1000000) + ($trans * 1200000) + ($makan * 500000);
    $total = $durasi * $peserta * $harga_paket;

    $sql = "UPDATE pesanan SET
        nama_pemesan='$nama',
        paket_wisata='$paket',
        durasi_wisata='$durasi',
        jumlah_peserta='$peserta',
        layanan_penginapan='$inap',
        layanan_transport='$trans',
        layanan_makan='$makan',
        harga_paket='$harga_paket',
        total_tagihan='$total'
        WHERE id='$id'";

    mysqli_query($koneksi, $sql);
    echo "<script>alert('Data berhasil diupdate'); window.location='kelola_pesanan.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Pesanan</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="admin-page">

    <nav>
        <div class="logo">ADMIN WISATA</div>
        <ul class="nav-links">
            <li><a href="index.php">Lihat Website</a></li>
        </ul>
    </nav>

    <div class="container" style="margin-top:90px;">

        <!-- =======================
     FORM EDIT
======================= -->
        <?php if ($edit_data): ?>
            <div class="form-container" style="border:2px solid orange; margin-bottom:30px;">
                <h3>Edit Pesanan</h3>

                <form method="POST">
                    <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">

                    <label>Nama Pemesan</label>
                    <input type="text" name="nama" value="<?= $edit_data['nama_pemesan'] ?>" required>

                    <label>Paket Wisata</label>
                    <select name="paket_wisata" required>
                        <option <?= $edit_data['paket_wisata'] == 'Regular Backpack' ? 'selected' : '' ?>>Regular Backpack</option>
                        <option <?= $edit_data['paket_wisata'] == 'Honeymoon Trip' ? 'selected' : '' ?>>Honeymoon Trip</option>
                        <option <?= $edit_data['paket_wisata'] == 'Family Adventure' ? 'selected' : '' ?>>Family Adventure</option>
                    </select>

                    <div class="row">
                        <div class="col">
                            <label>Durasi (Hari)</label>
                            <input type="number" name="durasi" value="<?= $edit_data['durasi_wisata'] ?>" required>
                        </div>
                        <div class="col">
                            <label>Jumlah Peserta</label>
                            <input type="number" name="peserta" value="<?= $edit_data['jumlah_peserta'] ?>" required>
                        </div>
                    </div>

                    <div class="service-box">
                        <label><input type="checkbox" name="inap" <?= $edit_data['layanan_penginapan'] ? 'checked' : '' ?>> Penginapan</label>
                        <label><input type="checkbox" name="trans" <?= $edit_data['layanan_transport'] ? 'checked' : '' ?>> Transport</label>
                        <label><input type="checkbox" name="makan" <?= $edit_data['layanan_makan'] ? 'checked' : '' ?>> Makan</label>
                    </div>

                    <button type="submit" name="update" class="btn-submit" style="background:orange;">Update</button>
                    <a href="kelola_pesanan.php" class="btn-cancel">Batal</a>
                </form>
            </div>
        <?php endif; ?>

        <!-- =======================
     TABEL DATA
======================= -->
        <div class="table-card">
            <h2>Data Pesanan Masuk</h2>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Paket</th>
                        <th>Durasi</th>
                        <th>Layanan</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    $q = mysqli_query($koneksi, "SELECT * FROM pesanan ORDER BY id DESC");
                    while ($row = mysqli_fetch_assoc($q)) {
                        $layanan =
                            ($row['layanan_penginapan'] ? '🏨 ' : '') .
                            ($row['layanan_transport'] ? '🚗 ' : '') .
                            ($row['layanan_makan'] ? '🍽️' : '');
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama_pemesan'] ?><br><small><?= $row['nomor_hp'] ?></small></td>
                            <td><?= $row['paket_wisata'] ?></td>
                            <td><?= $row['durasi_wisata'] ?> Hari<br>(<?= $row['jumlah_peserta'] ?> Org)</td>
                            <td><?= $layanan ?></td>
                            <td><b>Rp <?= number_format($row['total_tagihan'], 0, ',', '.') ?></b></td>
                            <td>
                                <a href="?aksi=edit&id=<?= $row['id'] ?>" class="btn-mini edit">Edit</a>
                                <a href="?aksi=hapus&id=<?= $row['id'] ?>" class="btn-mini delete" onclick="return confirm('Hapus data?')">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>