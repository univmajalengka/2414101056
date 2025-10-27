<?php
// index.php - Landing Page dengan tombol Login Admin
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Neko Store - Toko Fashion Online</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #e97b84ff;
        }

        .logo-text {
            font-family: 'Fredoka One', cursive;
            font-size: 40px;
            color: #fff;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.2);
            letter-spacing: 3px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background: #e97b84ff;
            color: #fcfafaff;
        }

        header nav a {
            color: #faf7f8ff;
            margin: 0 10px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        header nav a:hover {
            color: #ffd6dc;
        }

        /* Tombol Login Admin */
        .admin-btn {
            background-color: #fff;
            color: #e97b84ff;
            padding: 8px 14px;
            border-radius: 6px;
            font-weight: bold;
            transition: 0.3s;
        }

        .admin-btn:hover {
            background-color: #ffd6dc;
            color: #d14a5b;
        }

        .hero {
            text-align: center;
            padding: 80px 20px;
            background: url('images/cover5.png') no-repeat center center;
            background-size: cover;
            color: white;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 10px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
        }

        .hero p {
            font-size: 20px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .hero .btn {
            display: inline-block;
            background: #e97b84ff;
            color: #fff;
            padding: 12px 25px;
            margin-top: 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .hero .btn:hover {
            background: #ff9aa2;
        }

        .highlight {
            text-align: center;
            padding: 40px 20px;
            background-color: #fff0f3;
        }

        .highlight h2 {
            color: #e97b84ff;
            font-family: 'Fredoka One', cursive;
            font-size: 32px;
            margin-bottom: 20px;
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
            padding: 15px;
            width: 220px;
            text-align: center;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .card img {
            width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        footer {
            text-align: center;
            padding: 15px;
            background: #111;
            color: #fff;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <header>
        <div class="logo">
            <h1 class="logo-text">Neko Store</h1>
        </div>
        <nav>
            <a href="index.php">Home</a>
            <a href="products.php">Produk</a>
            <a href="contact.php">Kontak</a>
            <a href="admin_login.php" class="admin-btn">Login Admin</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Selamat datang di Neko Store</h1>
        <a href="products.php" class="btn">Lihat Produk</a>
    </section>

    <!-- Highlight Produk -->
    <section class="highlight">
        <h2>Produk Unggulan</h2>
        <div class="cards">
            <div class="card">
                <img src="images/kemejabunga.png" alt="Blouse Rose">
                <h3>Blouse Rose</h3>
                <p>Rp 80.000</p>
            </div>
            <div class="card">
                <img src="images/cardigan.png" alt="Cardigan">
                <h3>Cardigan</h3>
                <p>Rp 60.000</p>
            </div>
            <div class="card">
                <img src="images/jeans.png" alt="Basic Jeans">
                <h3>Basic Jeans</h3>
                <p>Rp 150.000</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; <?= date('Y'); ?> Neko Store. All rights reserved.</p>
    </footer>

</body>

</html>