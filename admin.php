<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

// ==== TAMBAH PRODUK ====
if (isset($_POST['aksi']) && $_POST['aksi'] === 'tambah') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $harga = (int)$_POST['harga']; // pastikan harga integer
    $gambar = "";

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $targetDir = "images/";
        $fileName = basename($_FILES["gambar"]["name"]);
        $targetFile = $targetDir . time() . "_" . $fileName;

        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
            $gambar = $targetFile;
        }
    }

    if (!empty($gambar)) {
        $query = "INSERT INTO produk (nama, harga, gambar) VALUES ('$nama', $harga, '$gambar')";
        if (!mysqli_query($conn, $query)) {
            die("Gagal menambahkan produk: " . mysqli_error($conn));
        }
    }
}

// ==== HAPUS PRODUK ====
if (isset($_POST['aksi']) && $_POST['aksi'] === 'hapus') {
    $id = (int)$_POST['id'];

    // Hapus file gambar
    $result = mysqli_query($conn, "SELECT gambar FROM produk WHERE id = $id");
    if ($data = mysqli_fetch_assoc($result)) {
        if (file_exists($data['gambar'])) {
            unlink($data['gambar']);
        }
    }

    mysqli_query($conn, "DELETE FROM produk WHERE id = $id");
}

// ==== AMBIL DATA PRODUK ====
$products = mysqli_query($conn, "SELECT * FROM produk");
if (!$products) {
    die("Gagal mengambil produk: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Neko Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #ffe6eb;
            margin: 0;
        }

        header {
            background-color: #e97b84;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 { margin: 0; font-size: 1.8rem; }
        header nav a { color: white; text-decoration: none; margin-left: 15px; font-weight: 500; }

        .container {
            max-width: 900px;
            margin: 30px auto;
            background: #fff;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        h2 { text-align: center; color: #e97b84; }

        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background: #e97b84; color: white; }

        .form-section { margin-top: 25px; text-align: center; }
        input[type="text"], input[type="number"], input[type="file"] {
            padding: 8px; border: 1px solid #ccc; border-radius: 6px; width: 220px;
        }

        button {
            background: #e97b84; color: white; border: none; padding: 8px 15px;
            border-radius: 6px; cursor: pointer;
        }

        button:hover { background: #d66b76; }

        .btn-delete { background: #ff6b6b; }
        .btn-delete:hover { background: #e05656; }

        img { border-radius: 6px; }
    </style>
</head>
<body>
    <header>
        <h1>Panel Admin - Neko Store</h1>
        <nav>
            <a href="admin.php">Produk</a>
            <a href="admin_pesanan.php">Pesanan</a>
            <a href="index.php">Logout</a>
        </nav>
    </header>

    <div class="container">
        <h2>Daftar Produk</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
            <?php while ($p = mysqli_fetch_assoc($products)) : ?>
                <tr>
                    <td><?= $p['id']; ?></td>
                    <td><?= htmlspecialchars($p['nama']); ?></td>
                    <td>Rp <?= number_format($p['harga'], 0, ',', '.'); ?></td>
                    <td><img src="<?= htmlspecialchars($p['gambar']); ?>" width="80"></td>
                    <td>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $p['id']; ?>">
                            <input type="hidden" name="aksi" value="hapus">
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>

        <div class="form-section">
            <h3>Tambah Produk Baru</h3>
            <form method="post" enctype="multipart/form-data">
                <input type="text" name="nama" placeholder="Nama Produk" required>
                <input type="number" name="harga" placeholder="Harga" required>
                <input type="file" name="gambar" accept="image/*" required>
                <input type="hidden" name="aksi" value="tambah">
                <button type="submit">Tambah Produk</button>
            </form>
        </div>
    </div>
</body>
</html>
