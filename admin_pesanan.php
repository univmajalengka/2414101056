<?php
include 'koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM pesanan ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Pesanan - Admin</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f9f9f9, #ffe0e9);
            padding: 40px;
        }

        h2 {
            text-align: center;
            color: #ff6f91;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        th,
        td {
            border: 1px solid #eee;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #ff6f91;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #fff6f9;
        }
    </style>
</head>

<body>
    <h2>📦 Daftar Pesanan Masuk</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Produk</th>
            <th>Total</th>
            <th>Tanggal</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)):
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nama_pelanggan']); ?></td>
                <td><?= htmlspecialchars($row['alamat']); ?></td>
                <td><?= htmlspecialchars($row['no_hp']); ?></td>
                <td><?= htmlspecialchars($row['produk']); ?></td>
                <td>Rp <?= number_format($row['total'], 0, ',', '.'); ?></td>
                <td><?= $row['tanggal']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>