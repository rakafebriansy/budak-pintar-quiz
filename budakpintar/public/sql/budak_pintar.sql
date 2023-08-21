-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 06:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `detail_kuis`
--

CREATE TABLE `detail_kuis` (
  `kumpulan_soal_id_kumpulan_soal` int(11) NOT NULL,
  `kuis_id_kuis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_kuis`
--

INSERT INTO `detail_kuis` (`kumpulan_soal_id_kumpulan_soal`, `kuis_id_kuis`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 4),
(14, 4),
(15, 4),
(16, 5),
(17, 5),
(18, 6),
(19, 6),
(20, 7),
(21, 7);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `nama_genre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `nama_genre`) VALUES
(1, 'Matematika'),
(2, 'Sosial'),
(3, 'Sains'),
(4, 'Bahasa');

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE `kuis` (
  `id_kuis` int(11) NOT NULL,
  `genre_id_genre` int(11) NOT NULL,
  `nama_kuis` varchar(60) NOT NULL,
  `deksripsi_kuis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kuis`
--

INSERT INTO `kuis` (`id_kuis`, `genre_id_genre`, `nama_kuis`, `deksripsi_kuis`) VALUES
(1, 1, 'Peluang', 'Mencari tau seberapa besar peluangku tuk mendapatkan hatimu'),
(2, 2, 'Sejarah kelas X', 'Kumpulan soal-soal mata pelajaran sejarah kelas X untuk persiapan ujian sekolah'),
(3, 3, 'Sistem Pernapasan Manusia', 'Belajar cara manusia bernapas'),
(4, 4, 'Self Introduction', 'GAK BISA BAHASA ENGGRESSSSS...........'),
(5, 2, 'landmark terkenal', 'mengasah pengetahuan tentang negara-negara asing dan tempat populer yang dimilikinya.'),
(6, 2, 'soal pas ips kelas 8', 'kumpulan soal pas ips kelas 8'),
(7, 1, 'soal trigonometri kelas 10', 'contoh-contoh soal trigonometri untuk siswa kelas 10');

-- --------------------------------------------------------

--
-- Table structure for table `kumpulan_soal`
--

CREATE TABLE `kumpulan_soal` (
  `id_kumpulan_soal` int(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `tipe_soal` varchar(255) NOT NULL,
  `gambar_pendukung` varchar(20) DEFAULT NULL,
  `opsi_a` varchar(255) NOT NULL,
  `opsi_b` varchar(255) NOT NULL,
  `opsi_c` varchar(255) NOT NULL,
  `opsi_d` varchar(255) NOT NULL,
  `opsi_benar` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kumpulan_soal`
--

INSERT INTO `kumpulan_soal` (`id_kumpulan_soal`, `pertanyaan`, `tipe_soal`, `gambar_pendukung`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_benar`) VALUES
(1, 'Sebuah dadu lalu dilempar satu kali, berapa peluang munculnya mata dadu 5?', 'single', '', '1/2', '1/4', '1/6', '1/8', 'c'),
(2, 'Rudi memiliki dua buah koin 1000 rupiah, lalu melempar kedua koin tersebut bersamaan. Berapa peluang muncul gambar pada kedua koin?', 'single', '', '1/2', '1/4', '1/16', '1/8', 'b'),
(3, 'Dua buah dadu dilempar secara bersamaan. Berapakah peluang kejadian muncul jumlah kedua mata dadu = 6?', 'single', '', '5/36', '1/9', '1/6', '7/36', 'a'),
(4, 'Perhatikan beberapa kejadian/peristiwa berikut.\r\n1. Munculnya mata dadu dari hasil pelemparan sebuah dadu.\r\n2. Kelahiran seorang bayi laki-laki.\r\n3. Munculnya api di kedalaman lautan.\r\n4. Seekor kucing dapat berbahasa Indonesia.\r\nDari kejadian/peristiwa d', 'multiple', '', '1,3', '2,3', '1,2', '3,4', 'ad'),
(5, 'Seni menulis huruf Arab yang indah disebut....', 'single', '', 'kaligrafi', 'kartografi', 'karikatur', 'Biografi', 'a'),
(6, 'Penyebaran Islam di daerah pesisir pertama kali melalui....', 'single', '', 'perdagangan', 'politik', 'pendidikan', 'perkawinan', 'a'),
(7, 'Kitab Nitisruti dan Nitisastra adalah karya....', 'single', '', 'Ronggowarsito', 'Hamzah Fansuri', 'Sultan Agung', 'Hamengkubuwono', 'c'),
(8, 'Istilah Bahasa Arab yang terpengaruh dari negara Turki adalah ....', 'multiple', '', 'Jeer', 'pees', 'jabar', 'Hijr', 'abc'),
(9, 'Peristiwa menghirup oksigen dan mengeluarkan karbondioksida beserta uap air disebut …', 'single', '', 'Respirasi', 'Inspirasi', 'Transpirasi', 'Ventilasi', 'a'),
(10, 'Proses respirasi yang terjadi di dalam sel disebut …', 'single', '', 'Respirasi internal', 'Respirasi', 'Respirasi Seluler', 'Respirasi eksternal', 'c'),
(11, 'Proses pertukaran gas-gas antara alveolus paru-paru dengan darah di dalam pembuluh kapiler paru-paru disebut …', 'single', '', 'Respirasi eksternal', 'Respirasi internal', 'Ventilasi paru-paru', 'Ventilasi jantung', 'a'),
(12, 'Perhatikan pernyataan di bawah ini:\r\n1) Memakai masker\r\n2) Merokok\r\n3) Rajin berolahraga\r\n4) Makan makanan bergizi\r\nUpaya menjaga sistem pernafasan kita antara lain ditunjukkan nomor...', 'multiple', '', '1', '2', '3', '4', 'acd'),
(13, '. Peter : Excuse me; are you here for first day at this English course?\r\nRuth : Yes, I am.\r\nPeter : Can I take your name, please?\r\nRuth : ______\r\nPeter : Good morning Ruth, my name’s Peter Smith and welcome to Ruang English Course.\r\n', 'single', '', 'My name is Ruth Goldilocks.', 'Your name is Ruth Goldilocks.', 'Her name is Ruth Goldilocks.', 'His name is Ruth Goldilocks.', 'a'),
(14, 'Sally : Hi Andrew, how are you?\r\nAndrew : Fine, thanks. And yourself?\r\nSally : I’m very well, thanks. I appreciate you coming to the first meeting of English  Club today. Andrew, let me introduce you to Claire. She’s our chairperson of this amazing club.\r', 'single', '', 'introducing yourself', 'introducing themselves', 'introducing someone', 'introducing ourself', 'c'),
(15, 'Victor : Hello. My name is Victor. What’s your name?\r\nJanet : Janet.\r\nVictor : ______, Janet?\r\nJanet : I’m from Surabaya. Where are you from?\r\nVictor : I’m from Malang.', 'single', '', 'where do you live', 'where do you come from', 'what is your name', 'How old are you', 'b'),
(16, 'berikut adalah nama-nama ibukota negara-negara eropa, kecuali...', 'multiple', '', 'paris', 'munich', 'berlin', 'dunkirk', 'bd'),
(17, 'gambar diatas merupakan sebuah potret landmark terkenal bernama...', 'single', '64dedfc9ad337.jpg', 'burj khalifa', 'barcelona tower', 'burj al-arab', 'mia khalifa', 'c'),
(18, 'analisis tentang mengapa mayoritas penduduk asean bekerja di bidang pertanian jika dihubungkan dengan letak geografis adalah ....', 'single', '', 'tingkat curah hujan asean yang cukup tinggi ditambah dengan dilalui angin muson cocok untuk', 'asean beriklim tropis dan subtropis yang dilalui oleh angin muson yang sangat bagus untuk bidang pertanian', 'iklim asean tropis, maka sinar matahari akan terus menyinari negara-negara asean. hal ini dimanfaatkan penduduk untuk bertani dan bercocok tanam', 'tingkat kelembaban udara asean rendah. hal ini disebabkan adanya penguapan tinggi pada akhirnya dapat menyebabkan terjadinya hujan yang cocok untuk bertanam', 'c'),
(19, 'sda selain bahan tambang terdapat di asean adalah hutan dan laut. kedua sumber daya alam tersebut terkadang diambil secara berlebihan sehingga mengalami kerusakan. berikut ini kegiatan yang bisa dilaksanakan untuk mengatasi dan mencegah kerusakan laut dan', 'single', '', 'jenis kerusakan hutan dengan bentuk kerusakan kebakaran hutan maka cara menanggulangi dengan melarang menyalakan api di hutan.', 'jenis kerusakan hutan dengan bentuk kerusakan penebangan liar maka cara menanggulanginya dengan sosialisasi dampak penebangan liar', 'jenis kerusakan laut dengan bentuk kerusakan biota laut maka cara menanggulangi dengan tidak menggunakan jaring pukat harimau saat menangkap ikan', 'jenis kerusakan laut dengan bentuk kerusakan pencemaran laut, cara menanggulangi dengan memberikan sanksi yang tegas pelaku membuang sampah di laut', 'c'),
(20, 'jika sin x = 1/3 dan x adalah sudut lancip, maka cos x sama dengan...', 'single', '', '½ √2', '1/6 √2', '1/4 √2', '2/3 √2', 'd'),
(21, 'nilai dari sin2 600 – cos2 600  adalah...', 'single', '', '0', '1', '2', '1/2', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(60) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `alamat_email` varchar(60) NOT NULL,
  `gambar_profil` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `kata_sandi`, `alamat_email`, `gambar_profil`) VALUES
(2, 'raka', '$2y$10$n9eZrul6pMozvif3TvdvFeqNEUJ0OOY5B6jUaGjeyzQd7G6pogIE6', 'kerenr445@gmail.com', '64dee39ca7caf.jpg'),
(3, 'bobi', '$2y$10$Epw88Cvr6JcJdtmPIjYIe.Z2wsH62/74uz1YXrZMa/bu0ToUB187y', 'bobibola@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `peringkat`
--

CREATE TABLE `peringkat` (
  `pengguna_id_pengguna` int(11) NOT NULL,
  `kuis_id_kuis` int(11) NOT NULL,
  `total_skor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peringkat`
--

INSERT INTO `peringkat` (`pengguna_id_pengguna`, `kuis_id_kuis`, `total_skor`) VALUES
(2, 5, 100),
(2, 1, 0),
(2, 2, 25),
(2, 7, 100),
(3, 5, 50),
(3, 2, 75);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_kuis`
--
ALTER TABLE `detail_kuis`
  ADD PRIMARY KEY (`kumpulan_soal_id_kumpulan_soal`),
  ADD KEY `detail_kuis_kuis_fk` (`kuis_id_kuis`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id_kuis`),
  ADD KEY `kuis_genre_fk` (`genre_id_genre`);

--
-- Indexes for table `kumpulan_soal`
--
ALTER TABLE `kumpulan_soal`
  ADD PRIMARY KEY (`id_kumpulan_soal`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `nama_pengguna` (`nama_pengguna`);

--
-- Indexes for table `peringkat`
--
ALTER TABLE `peringkat`
  ADD KEY `peringkat_kuis_fk` (`kuis_id_kuis`),
  ADD KEY `peringkat_pengguna_fk` (`pengguna_id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id_kuis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kumpulan_soal`
--
ALTER TABLE `kumpulan_soal`
  MODIFY `id_kumpulan_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_kuis`
--
ALTER TABLE `detail_kuis`
  ADD CONSTRAINT `detail_kuis_kuis_fk` FOREIGN KEY (`kuis_id_kuis`) REFERENCES `kuis` (`id_kuis`),
  ADD CONSTRAINT `detail_kuis_kumpulan_soal_fk` FOREIGN KEY (`kumpulan_soal_id_kumpulan_soal`) REFERENCES `kumpulan_soal` (`id_kumpulan_soal`);

--
-- Constraints for table `kuis`
--
ALTER TABLE `kuis`
  ADD CONSTRAINT `kuis_genre_fk` FOREIGN KEY (`genre_id_genre`) REFERENCES `genre` (`id_genre`);

--
-- Constraints for table `peringkat`
--
ALTER TABLE `peringkat`
  ADD CONSTRAINT `peringkat_kuis_fk` FOREIGN KEY (`kuis_id_kuis`) REFERENCES `kuis` (`id_kuis`),
  ADD CONSTRAINT `peringkat_pengguna_fk` FOREIGN KEY (`pengguna_id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;