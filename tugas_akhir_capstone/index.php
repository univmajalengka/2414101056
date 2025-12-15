<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karimunjawa Paradise</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <nav>
        <div class="logo">KARIMUN PARADISE</div>
        <ul class="nav-links">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="#paket">Pilihan Paket</a></li>
            <li><a href="kelola_pesanan.php" class="btn-login">Admin</a></li>
        </ul>
    </nav>

    <header class="hero">
        <div class="hero-content">
            <h3>THE HIDDEN GEM OF JAVA</h3>
            <h1>Explore Karimunjawa <br> National Park</h1>
            <p>Rasakan pengalaman liburan tak terlupakan dengan air jernih kristal dan pasir putih lembut.</p>
            <a href="#paket" class="btn-utama">Lihat Paket</a>
        </div>
    </header>
    <section class="video-section">
        <div class="container">
            <div class="title-section">
                <h2>Video Promosi Wisata</h2>
                <p>Rasakan pengalaman wisata terbaik bersama kami</p>
            </div>

            <div class="video-wrapper">
                <iframe
                    src="https://www.youtube.com/embed/HZVuxztLDwI?si=imbmqQksHsMdQBRt"
                    title="Video Promosi Wisata"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    <section id="paket" class="container">
        <div class="title-section">
            <h2>Pilih Paket Liburanmu</h2>
            <p>Sesuaikan dengan budget dan gaya liburan Anda</p>
        </div>

        <div class="grid-paket">
            <div class="card">
                <div class="card-img">
                    <img src="images/photo1.jpg" alt="Backpacker">
                    <span class="badge">Hemat</span>
                </div>
                <div class="card-body">
                    <h3>Regular Backpack</h3>
                    <p>Paket hemat untuk kamu yang berjiwa petualang.</p>
                    <ul class="features">
                        <li><i class="fas fa-check"></i> Homestay Fan</li>
                        <li><i class="fas fa-check"></i> Tiket Kapal Feri</li>
                    </ul>
                    <a href="form_pemesanan.php?paket=Regular" class="btn-book">Pilih Paket Ini</a>
                </div>
            </div>

            <div class="card">
                <div class="card-img">
                    <img src="images/photo6.png" alt="Honeymoon">
                    <span class="badge" style="background: pink; color: black;">Romantis</span>
                </div>
                <div class="card-body">
                    <h3>Honeymoon Trip</h3>
                    <p>Nikmati momen romantis berdua dengan fasilitas privat.</p>
                    <ul class="features">
                        <li><i class="fas fa-heart"></i> Private AC Villa</li>
                        <li><i class="fas fa-heart"></i> Romantic Dinner</li>
                    </ul>
                    <a href="form_pemesanan.php?paket=Honeymoon" class="btn-book">Pilih Paket Ini</a>
                </div>
            </div>

            <div class="card">
                <div class="card-img">
                    <img src="images/photo3.jpg" alt="Family">
                </div>
                <div class="card-body">
                    <h3>Family Adventure</h3>
                    <p>Liburan seru aman untuk keluarga tercinta.</p>
                    <ul class="features">
                        <li><i class="fas fa-users"></i> Hotel Bintang 3</li>
                        <li><i class="fas fa-car"></i> Antar Jemput</li>
                    </ul>
                    <a href="form_pemesanan.php?paket=Family" class="btn-book">Pilih Paket Ini</a>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Wisata Karimunjawa</p>
    </footer>

</body>

</html>