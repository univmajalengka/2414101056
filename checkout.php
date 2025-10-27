<?php
session_start();
include 'koneksi.php'; // pastikan file ini ada dan benar

if (isset($_POST['checkout'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $produk_list = [];
    $total = 0;

    if (!empty($_SESSION['cart'])) {
        $products = [
            1 => ["nama" => "Cardigan", "harga" => 60000],
            2 => ["nama" => "Basic Jeans", "harga" => 150000],
            3 => ["nama" => "Blouse Rose", "harga" => 80000],
            4 => ["nama" => "Kemeja Kotak", "harga" => 150000],
            5 => ["nama" => "Rok Jeans", "harga" => 250000],
            6 => ["nama" => "T-Shirt", "harga" => 100000],
            7 => ["nama" => "Tunik Sage", "harga" => 120000],
        ];

        foreach ($_SESSION['cart'] as $id => $jumlah) {
            if (isset($products[$id])) {
                $produk_list[] = $products[$id]['nama'] . " x " . $jumlah;
                $total += $products[$id]['harga'] * $jumlah;
            }
        }
    }

    $produk = implode(", ", $produk_list);

    $query = "INSERT INTO pesanan (nama_pelanggan, alamat, no_hp, produk, total) 
              VALUES ('$nama', '$alamat', '$no_hp', '$produk', '$total')";
    mysqli_query($koneksi, $query);

    unset($_SESSION['cart']); // kosongkan keranjang
    echo "<script>alert('Pesanan berhasil dikirim!'); window.location='products.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Checkout - Neko Store</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ffecd2, #fcb69f);
            padding: 40px;
        }

        .checkout-box {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #ff6f91;
        }

        label {
            font-weight: 600;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        button {
            background-color: #ff6f91;
            border: none;
            padding: 12px 25px;
            color: white;
            font-weight: 600;
            border-radius: 25px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #ff9671;
        }
    </style>
</head>

<body>
    <div class="checkout-box">
        <h2>Form Checkout</h2>
        <form method="POST">
            <label>Nama Lengkap:</label>
            <input type="text" name="nama" required>

            <label>Alamat:</label>
            <textarea name="alamat" required></textarea>

            <label>No. HP:</label>
            <input type="text" name="no_hp" required>

            <button type="submit" name="checkout">Kirim Pesanan</button>
        </form>
    </div>
</body>

</html>