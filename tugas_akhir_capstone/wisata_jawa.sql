-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2025 pada 17.49
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata_jawa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `paket_wisata` varchar(50) NOT NULL,
  `durasi_wisata` int(11) NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `layanan_penginapan` tinyint(1) DEFAULT 0,
  `layanan_transport` tinyint(1) DEFAULT 0,
  `layanan_makan` tinyint(1) DEFAULT 0,
  `harga_paket` decimal(15,2) NOT NULL,
  `total_tagihan` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama_pemesan`, `nomor_hp`, `tanggal_pesan`, `paket_wisata`, `durasi_wisata`, `jumlah_peserta`, `layanan_penginapan`, `layanan_transport`, `layanan_makan`, `harga_paket`, `total_tagihan`) VALUES
(3, 'riska', '123456', '2025-12-25', 'Honeymoon Trip', 4, 2, 1, 1, 1, 2700000.00, 21600000.00),
(4, 'rania', '231324', '2025-12-17', 'Regular Backpack', 2, 1, 1, 1, 0, 2200000.00, 4400000.00),
(5, 'rasya', '3243243', '2025-12-31', 'Family Adventure', 1, 5, 1, 0, 1, 1500000.00, 7500000.00);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
