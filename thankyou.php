<?php
session_start();

// produk dummy (harus sama dengan yang ada di cart.php)
$products = [
    1 => ["nama" => "Cardigan", "harga" => 60000],
    2 => ["nama" => "Basic Jeans", "harga" => 150000],
    3 => ["nama" => "Blouse Rose", "harga" => 80000],
    4 => ["nama" => "Kemeja Kotak", "harga" => 150000],
    5 => ["nama" => "Rok Jeans", "harga" => 250000],
    6 => ["nama" => "T-Shirt", "harga" => 100000],
    7 => ["nama" => "Tunik Sage", "harga" => 120000],
];

// simpan keranjang lama sebelum dihapus
$lastOrder = $_SESSION['cart'] ?? [];

// hapus keranjang
$_SESSION['cart'] = [];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Terima Kasih - Fashionista</title>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: linear-gradient(135deg, #ffecd2, #fcb69f);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .thankyou-box {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            width: 90%;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 15px;
            background: linear-gradient(90deg, #ff6f91, #ff9671, #ffc75f);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            border: 1px solid #eee;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #ff6f91;
            color: #fff;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            background: #ff6f91;
            color: #fff;
            border-radius: 25px;
            text-decoration: none;
            font-size: 1rem;
            transition: 0.3s;
        }

        .btn:hover {
            background: #ff9671;
        }
    </style>
</head>

<body>
    <div class="thankyou-box">
        <h2>🎉 Terima Kasih!</h2>
        <p>Pesananmu sudah kami terima. Berikut ringkasan belanjamu:</p>

        <?php if (!empty($lastOrder)): ?>
            <table>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
                <?php
                $grandTotal = 0;
                foreach ($lastOrder as $id => $jumlah):
                    $nama = $products[$id]['nama'];
                    $harga = $products[$id]['harga'];
                    $total = $harga * $jumlah;
                    $grandTotal += $total;
                ?>
                    <tr>
                        <td><?= $nama; ?></td>
                        <td>Rp <?= number_format($harga, 0, ',', '.'); ?></td>
                        <td><?= $jumlah; ?></td>
                        <td>Rp <?= number_format($total, 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3"><b>Total Keseluruhan</b></td>
                    <td><b>Rp <?= number_format($grandTotal, 0, ',', '.'); ?></b></td>
                </tr>
            </table>
        <?php else: ?>
            <p>Tidak ada pesanan yang diproses.</p>
        <?php endif; ?>

        <a href="products.php" class="btn">Belanja Lagi</a>
    </div>
</body>

</html>