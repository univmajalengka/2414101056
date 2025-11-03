<?php
session_start();
include 'koneksi.php'; // sambungkan ke database

// Tambah ke keranjang
if (isset($_GET['action']) && $_GET['action'] == "add") {
    $id = intval($_GET['id']);
    $result = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");
    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
    }
    header("Location: cart.php");
    exit;
}

// Hapus item dari keranjang
if (isset($_GET['action']) && $_GET['action'] == "remove") {
    $id = intval($_GET['id']);
    unset($_SESSION['cart'][$id]);
    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Keranjang - Neko Store</title>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: linear-gradient(135deg, #fceabb, #f8b500);
            margin: 0;
            padding: 0;
        }

        .cart-container {
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .cart-container h2 {
            text-align: center;
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(90deg, #ff6f91, #ff9671, #ffc75f);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #eee;
            padding: 12px;
            text-align: center;
            font-size: 1rem;
        }

        th {
            background: #ff6f91;
            color: #fff;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
            transition: 0.3s;
            margin: 5px;
            font-weight: 500;
        }

        .btn-pink {
            background: #ff6f91;
        }

        .btn-pink:hover {
            background: #ff9671;
        }

        .btn-green {
            background: #4CAF50;
        }

        .btn-green:hover {
            background: #45a049;
        }

        .btn-red {
            background: #f44336;
        }

        .btn-red:hover {
            background: #d32f2f;
        }

        .empty-cart {
            text-align: center;
            font-size: 1.1rem;
            color: #666;
        }

        .empty-cart a {
            margin-top: 15px;
            display: inline-block;
            padding: 10px 20px;
            background: #ff6f91;
            color: #fff;
            border-radius: 25px;
            text-decoration: none;
        }

        .empty-cart a:hover {
            background: #ff9671;
        }

        .actions {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="cart-container">
        <h2>Keranjang Belanja</h2>
        <?php if (!empty($_SESSION['cart'])): ?>
            <table>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $grandTotal = 0;
                foreach ($_SESSION['cart'] as $id => $jumlah):
                    $result = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");
                    if ($result && mysqli_num_rows($result) > 0):
                        $p = mysqli_fetch_assoc($result);
                        $nama = $p['nama'];
                        $harga = $p['harga'];
                        $total = $harga * $jumlah;
                        $grandTotal += $total;
                ?>
                        <tr>
                            <td><?= htmlspecialchars($nama); ?></td>
                            <td>Rp <?= number_format($harga, 0, ',', '.'); ?></td>
                            <td><?= $jumlah; ?></td>
                            <td>Rp <?= number_format($total, 0, ',', '.'); ?></td>
                            <td><a href="cart.php?action=remove&id=<?= $id; ?>" class="btn btn-red">Hapus</a></td>
                        </tr>
                <?php endif;
                endforeach; ?>
                <tr>
                    <td colspan="3"><b>Total Keseluruhan</b></td>
                    <td colspan="2"><b>Rp <?= number_format($grandTotal, 0, ',', '.'); ?></b></td>
                </tr>
            </table>
            <div class="actions">
                <a href="products.php" class="btn btn-green">⬅ Kembali ke Produk</a>
                <a href="checkout.php" class="btn btn-pink">Checkout</a>
            </div>
        <?php else: ?>
            <div class="empty-cart">
                <p>Keranjang masih kosong 😿</p>
                <a href="products.php">Belanja Sekarang</a>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
