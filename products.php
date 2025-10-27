<?php
session_start();
include 'koneksi.php'; // koneksi ke database

// Ambil semua produk dari database
$result = mysqli_query($conn, "SELECT * FROM produk");

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Produk - Neko Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Raleway:wght@700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e2a7acff;
            margin: 0;
        }

        header {
            display: flex;
            justify-content: space-between;
            padding: 15px 30px;
            background: #e97b84ff;
            color: #fff;
            align-items: center;
        }

        header nav a {
            color: #fff;
            margin: 0 12px;
            text-decoration: none;
            font-family: 'Raleway', sans-serif;
            font-weight: 700;
            font-size: 1.1rem;
            position: relative;
            transition: all 0.3s ease;
        }

        header nav a::after {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            left: 0;
            bottom: -4px;
            background: #fff;
            transition: width 0.3s ease;
        }

        header nav a:hover::after {
            width: 100%;
        }

        header nav a:hover {
            color: #ffd1dc;
            transform: scale(1.05);
        }

        .judul-produk {
            text-align: center;
            margin: 20px 0;
        }

        .judul-produk h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(90deg, #faf8f9ff, #ff9671, #ffc75f, #0a0609ff);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradientMove 5s ease infinite;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }

        .card {
            border: 1px solid #ddd;
            background: #fff;
            padding: 15px;
            width: 220px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(58, 53, 53, 0.54);
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            background: #e97b84ff;
            color: #fff;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #c75d64;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <h1 class="logo-text">Neko Store</h1>
        </div>
        <nav>
            <a href="index.php">Home</a>
            <a href="products.php">Produk</a>
            <a href="cart.php">Keranjang</a>
        </nav>
    </header>

    <div class="judul-produk">
        <h1>Daftar Produk</h1>
    </div>

    <div class="cards">
        <?php while ($p = mysqli_fetch_assoc($result)): ?>
            <div class="card">
                <img src="<?= htmlspecialchars($p['gambar']); ?>" alt="<?= htmlspecialchars($p['nama']); ?>">
                <h3><?= htmlspecialchars($p['nama']); ?></h3>
                <p>Rp <?= number_format($p['harga'], 0, ',', '.'); ?></p>
                <a href="cart.php?action=add&id=<?= urlencode($p['id']); ?>" class="btn">Beli</a>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
