-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2023 pada 09.17
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budak_pintar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kuis`
--

CREATE TABLE `detail_kuis` (
  `kuis_id_kuis` int(11) NOT NULL,
  `kumpulan_soal_id_kumpulan_soal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `nama_genre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuis`
--

CREATE TABLE `kuis` (
  `id_kuis` int(11) NOT NULL,
  `pengguna_id_pengguna` int(11) NOT NULL,
  `genre_id_genre` int(11) NOT NULL,
  `nama_kuis` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kumpulan_soal`
--

CREATE TABLE `kumpulan_soal` (
  `id_kumpulan_soal` int(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `tipe_soal` varchar(255) NOT NULL,
  `opsi_a` varchar(255) NOT NULL,
  `opsi_b` varchar(255) NOT NULL,
  `opsi_c` varchar(255) NOT NULL,
  `opsi_d` varchar(255) NOT NULL,
  `opsi_benar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(60) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `alamat_email` varchar(60) NOT NULL,
  `gambar` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `kata_sandi`, `alamat_email`, `gambar`) VALUES
(1, 'arief', '$2y$10$YjVTggeSgaqgT0tYGCaKReVdJ3hTSTAIOvPh341UGEYhk/PjuhKMK', 'arief@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_kuis`
--
ALTER TABLE `detail_kuis`
  ADD PRIMARY KEY (`kuis_id_kuis`),
  ADD KEY `detail_kuis_kumpulan_soal_fk` (`kumpulan_soal_id_kumpulan_soal`);

--
-- Indeks untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indeks untuk tabel `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id_kuis`),
  ADD KEY `kuis_genre_fk` (`genre_id_genre`),
  ADD KEY `kuis_pengguna_fk` (`pengguna_id_pengguna`);

--
-- Indeks untuk tabel `kumpulan_soal`
--
ALTER TABLE `kumpulan_soal`
  ADD PRIMARY KEY (`id_kumpulan_soal`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `nama_pengguna` (`nama_pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id_kuis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kumpulan_soal`
--
ALTER TABLE `kumpulan_soal`
  MODIFY `id_kumpulan_soal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_kuis`
--
ALTER TABLE `detail_kuis`
  ADD CONSTRAINT `detail_kuis_kuis_fk` FOREIGN KEY (`kuis_id_kuis`) REFERENCES `kuis` (`id_kuis`),
  ADD CONSTRAINT `detail_kuis_kumpulan_soal_fk` FOREIGN KEY (`kumpulan_soal_id_kumpulan_soal`) REFERENCES `kumpulan_soal` (`id_kumpulan_soal`);

--
-- Ketidakleluasaan untuk tabel `kuis`
--
ALTER TABLE `kuis`
  ADD CONSTRAINT `kuis_genre_fk` FOREIGN KEY (`genre_id_genre`) REFERENCES `genre` (`id_genre`),
  ADD CONSTRAINT `kuis_pengguna_fk` FOREIGN KEY (`pengguna_id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
