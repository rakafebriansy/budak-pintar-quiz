-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 12:41 PM
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
(21, 7),
(22, 8),
(23, 8),
(24, 8),
(25, 8),
(26, 8),
(27, 8),
(28, 8),
(29, 8),
(30, 8),
(31, 9),
(32, 9),
(33, 9),
(34, 9),
(35, 9),
(36, 9),
(37, 9),
(38, 9),
(39, 10),
(40, 10),
(41, 10),
(42, 10),
(43, 10),
(44, 10),
(45, 10),
(46, 10),
(47, 11),
(48, 11),
(49, 12),
(50, 12),
(51, 13),
(52, 13),
(53, 14),
(54, 14),
(55, 15),
(56, 15),
(57, 16),
(58, 16),
(59, 17),
(60, 17),
(61, 18),
(62, 18),
(63, 19),
(64, 19),
(65, 20),
(66, 20),
(67, 20),
(68, 21),
(69, 21),
(70, 22),
(71, 22),
(72, 23),
(73, 23),
(74, 24),
(75, 24);

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
(4, 4, 'Self Introduction', 'GAK BISA BAHASA ENGGRESSSSS......'),
(5, 2, 'landmark terkenal', 'mengasah pengetahuan tentang negara-negara asing dan tempat populer yang dimilikinya.'),
(6, 2, 'soal pas ips kelas 8', 'kumpulan soal pas ips kelas 8'),
(7, 1, 'soal trigonometri kelas 10', 'contoh-contoh soal trigonometri untuk siswa kelas 10'),
(8, 3, 'aku cinta sains', 'pengetahuan umum untuk belajar sains'),
(9, 1, 'Barisan Aritmetika', 'Ayo belajar barisan deret aritmetika'),
(10, 2, 'Zaman Pra-Aksara', 'Memahami sejarah zaman pra-aksara'),
(11, 2, 'ASEAN', 'Mempelajari tentang ASEAN'),
(12, 2, 'Kegiatan Ekonomi', 'Soal-soal kegiatan ekonomi'),
(13, 2, 'Interaksi Sosial', 'Ayo berinteraksi'),
(14, 2, 'Letak Geografis Indonesia', 'Mengetahui letak geografis di Indonesia'),
(15, 3, 'Perkembangbiakan Tumbuhan', 'Tentang perkembanganbiakan tumbuhan'),
(16, 3, 'Tata Surya', 'Mempelajari tata surya kita'),
(17, 3, 'Ekosistem', 'Mempelajari ekosistem di sekitar kita'),
(18, 3, 'Bunyi', 'Mempelajari Bunyi'),
(19, 3, 'Cahaya dan Alat Optik', 'Bab tentang cahaya dan alat-alat optik'),
(20, 4, 'Expressing Ability', 'Ekpresi yang menyakatakan kemampuan seseorang terhadap suatu hal atau suatu pekerjaan'),
(21, 4, 'Offering Help', 'Seperti apa contoh asking and offering help? Yuk, pelajari'),
(22, 4, 'Agreement and Disagreement', 'Bagaimana cara mengungkapkan setuju dan tidak setuju'),
(23, 4, 'Asking and Giving Opinion', 'Asking and giving opinion adalah cara yang dilakukan seseorang untuk meminta dan memberi pendapat kepada orang lain'),
(24, 4, 'Short Message', 'Segala tentang pesan singkat');

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
(21, 'nilai dari sin2 600 – cos2 600  adalah...', 'single', '', '0', '1', '2', '1/2', 'd'),
(22, 'siapakah penemu bola lampu?', 'single', '', 'thomas and friends', 'alexander graham bell', 'alexandra daddario', 'thomas alva edison', 'd'),
(23, 'siapakah manusia yang pertama kali mendarat di bulan?', 'multiple', '', 'buzz aldrin', 'elon musk', 'yuri gagarin', 'neil armstrong', 'ad'),
(24, 'siapakah manusia yang pertama ke luar angkasa?', 'single', '', 'yuri gagarin', 'neil armstrong', 'buzz lightyear', 'buzz aldrin', 'a'),
(25, 'siapakah nama dari tokoh diatas?', 'single', '64e425c5683e1.jpg', 'al-khwarizmi', 'avicenna', 'salahuddin al ayyubi', 'ibn al-haytam', 'b'),
(26, 'yang mana dari pernyataan berikut yang merupakan hukum 1 termodinamika', 'single', '', '“suatu benda yang dicelupkan sebagian atau seluruhnya ke dalam fluida, akan mengalami gaya ke atas yang besarnya sama dengan berat fluida yang dipindahkan oleh benda tersebut.”', '&quot;kalor mengalir secara spontan dari benda bertemperatur lebih tinggi ke benda bertemperatur lebih rendah, tetapi tidak sebaliknya, kecuali pada kedua benda tersebut dilakukan pemaksaan dengan usaha luar.&quot;', '“energi tidak dapat diciptakan ataupun dimusnahkan, namun dapat diubah dari suatu bentuk ke bentuk lainnya.”', '“untuk setiap aksi ada reaksi yang sama dan berlawanan arah”.', 'c'),
(27, 'ukuran kelembaman suatu benda untuk berotasi terhadap porosnya merupakan definisi dari...', 'single', '', 'neutron', 'torsi', 'momen inersia', 'sentrifugal', 'c'),
(28, 'berikut merupakan makanan hasil fermentasi, kecuali...', 'multiple', '', 'tape', 'kerupuk', 'marshmallow', 'yoghurt', 'bc'),
(29, 'planet pada gambar di atas merupakan planet...', 'single', '64e425c5762ca.jpg', 'saturnus', 'uranus', 'neptunus', 'mars', 'c'),
(30, 'penyakit pada sistem saraf yang mengganggu kemampuan tubuh dalam mengontrol gerakan dan keseimbangan adalah penyakit...', 'single', '', 'stroke', 'skizofrenia', 'gila', 'parkinson', 'd'),
(31, 'Pada barisan aritmatika 7, 5, 3, 1, suku ke 20-nya adalah …', 'single', '', '-31', '31', '38', '45', 'a'),
(32, 'Rumus suku ke-n dari barisan 3, -2, -7, -12, … adalah …', 'single', '', '4an + 1', '5an - 8', '-5an +8', '-2an² -1', 'c'),
(33, 'Pada suatu ruangan rapat, disusun kursi dengan baris depan 12 kursi, baris kedua 14 kursi, baris ketiga 16 kursi. Maka banyaknya kursi di baris 	ke 5 adalah …', 'single', '', '18', '20', '22', '24', 'b'),
(34, 'Pada suatu barisan aritmatika 10, 6, 2, -2, -6, -10. Berapakah beda barisan tersebut?', 'single', '', '-4', '4', '-6', '6', 'a'),
(35, 'Suku keempat dan kesepuluh dari suatu barisan aritmatika berturut-turut adalah 21 dan 51. Rumus suku ke-n barisan aritmatika yaitu:', 'single', '', '1 + 5n', '6 + 5n', '6 + 5n - 5', '5n + 1', 'd'),
(36, 'Suku ke 8 suatu baris aritmatika yaitu 125. Apabila suku pertama adalah 20, maka beda nilai antar suku adalah …', 'single', '', '0', '5', '10', '15', 'd'),
(37, 'Suku ke-n pada barisan 5, 9, 13, 17, … adalah:', 'single', '', 'n + 4', '2n + 	1', '4n + 1', '2n² + 1', 'c'),
(38, 'Suku ke-24 dari barisan aritmetika 6, 9, 12, 15, ... adalah...', 'single', '', '65', '75', '85', '95', 'b'),
(39, 'Masa dimana manusia belum mengenal aksara atau tulisan disebut', 'single', '', 'masa pra-aksara', 'masa hindu- budha', 'masa Islam', 'masa pengenalan budaya', 'a'),
(40, 'Para arkeolog telah menemukan fosil tengkorak manusia serta peralatannya. Fosil manusia menunjukan adanya perbedaan bentuk tubuh manusia saat 	itu dengan masa sekarang. Perbedaannya yang paling menonjol adalah', 'single', '', 'perbedaan tinggi badan', 'perbedaan bentuk tangan', 'perbedaan 	bentuk tubuh', 'perbedaan bentuk tengkorak dan volume otak', 'd'),
(41, 'Pada masa pembabakan zaman praaksara kehidupan manusia pada masa 60 juta tahun lalu sampai kini disebut', 'single', '', 'Arkaikum', 'Palaezoikum', 'Mesozoikum', 'Neozoikum', 'a'),
(42, 'Masyarakat pada masa Praaksara mendapatkan makanan dari alam sekitar tempat tinggal mereka. Apabila mereka berada di gunung, mereka berburu 	hewan di hutan sebagai bahan makanan mereka. Apabila mereka tinggal di tepi sungai/perairan, mereka memanfaatkan i', 'single', '', 'penemuan kubur batu yang 	berfungsi sebagai makam di wilayah Bali', 'penemuan Kjokkenmoddinger di sepanjang Pantai Timur Sumatera', 'lukisan cap telapak tangan di dinding goa 	leang-leang Sulawesi', 'wilayah Pacitan sebagai sumber ditemukannya peralatan batu', 'b'),
(43, 'Penemuan manusia prasejarah Pithecanthropus mojokertensis ditemukan oleh Koenigswald pada tahun 1939 di daerah', 'single', '', 'Wajak,Tulungagung', 'Sangiran, Bengawan Solo', 'Mojokerto, Jawa Timur', 'Trinil, Bengawan Solo', 'c'),
(44, 'Pada masa peralihan mesolitikum menuju neolitikum terjadi revolusi kebudayaan manusia. Proses peralihan tersebut adalah', 'single', '', 'berburu makanan', 'mengumpulkan makanan', 'bergantung pada alam', 'memproduksi makanan', 'd'),
(45, 'Bangunan yang disusun secara bertingkat untuk pemujaan terhadap roh nenek moyang disebut', 'single', '', 'Kubur batu', 'Sarkofagus', 'Punden 	Berundak', 'Dolmen', 'c'),
(46, 'zaman yang disebut dengan zaman Dinosaurus adalah ?', 'single', '', 'Palaeozoikum', 'Neolitikum', 'Mesozoikum', 'Arkaikum', 'c'),
(47, 'Apa singkatan dari ASEAN?', 'single', '', 'Association of South East Asian Nations', 'Alliance of South East Asian Nations', 'Association of 	South East African Nations', 'Association of South East American Nations', 'a'),
(48, 'Berapa jumlah negara anggota ASEAN saat ini?', 'single', '', '9 negara', '10 negara', '11 negara', '12 negara', 'b'),
(49, 'Nama dari kegiatan yang dilakukan dengan upaya untuk menyalurkan barang dan jasa dari produsen kepada konsumen disebut dengan...', 'single', '', 'Distribusi', 'Investasi', 'Produksi', 'Konsumsi', 'a'),
(50, 'Nilai manfaat yang didapatkan dari penggunaan sebuah barang dan jasa dinamakan dengan…', 'single', '', 'Nilai barang', 'Nilai uang', 'Nilai 	harga', 'Nilai guna', 'd'),
(51, 'Interaksi sosial adalah suatu proses dimana terjadi kontak sosial saling mempengaruhi. Yang paling penting dalam interaksi sosial itu 	adalah…', 'single', '', 'Berkaitan dengan untung/rugi', 'Saling mengalah', 'Saling tergantung', 'Bersifat timbal-balik', 'd'),
(52, 'Pertandingan sepak bola antara dua kesebelasan menunjukkan bentuk hubungan sosial…', 'single', '', 'Kelompok dengan individu', 'Individu 	dengan individu', 'Kelompok dengan kelompok', 'Individu dengan kelompok', 'c'),
(53, 'Pada masa awal kemerdekaan Kepulauan Nusa Tenggara disebut Provinsi….', 'single', '', 'Sunda Kecil', 'Sunda Besar', 'Nusa Tenggara Barat', 'Nusa Tenggara Timur', 'a'),
(54, 'Provinsi Bangka Belitung merupakan pemekaran dari provinsi ....', 'single', '', 'Lampung', 'Sumatera Selatan', 'Bengkulu', 'Riau', 'b'),
(55, 'Tumbuhan cocor bebek berkembang biak dengan …', 'single', '', 'Stek', 'Tunas daun', 'Okulasi', 'Umbi lapis', 'b'),
(56, 'Berikut adalah bagian-bagian yang terdapat pada bunga …', 'multiple', '', 'Kepala sari', 'Akar', 'Mahkota bunga', 'Putik', 'acd'),
(57, 'Kedudukan bulan pada saat terjadinya gerhana bulan total adalah...', 'single', '', 'dalam umbra bumi', 'tegak lurus dengan bumi', 'sejajar 	dengan bumi dan matahari', 'dalam penumbra bumi', 'a'),
(58, 'Ketika posisi bulan tegak lurus dengan bumi maka akan terjadi...', 'single', '', 'pasang perbani', 'pasang maksimum', 'gerhana matahari', 'gerhana 	bulan', 'a'),
(59, 'Peristiwa yang terjadi pada komponen penyusun ekosistem tersebut jika populasi tikus menurun akibat petani melakukan pembasmian adalah ….', 'single', 'Gambar1.jpg', 'populasi tumbuhan dan rubah meningkat', 'populasi tumbuhan dan burung elang meningkat', 'populasi tumbuhan meningkat dan 	kelinci menurun', 'populasi burung pemakan biji-bijian meningkat dan laba-laba menurun', 'c'),
(60, 'Karnivora menduduki taraf tropik …', 'single', 'Gambar2', '1 dan 2', '2 dan 3', '3 dan 4', '4 dan 1', 'c'),
(61, 'Berikut ini 3 syarat terjadinya bunyi…', 'multiple', '', 'adanya medium', 'adanya sumber bunyi', 'adanya pendengar/penerima', 'adanya sirine', 'abc'),
(62, 'Bunyi merupakan salah satu contoh dari gelombang ...', 'single', '', 'mekanik', 'elektromagnetik', 'longitudinal', 'transversal', 'c'),
(63, 'Berikut ini yang merupakan sifat dari cahaya adalah ...', 'multiple', '', 'memerlukan zat perantara untuk merambat', 'dapat dipantulkan', 'dapat dibiaskan', 'termasuk gelombang elektromagnetik', 'bcd'),
(64, 'Mata merupakan alat optik. Hal tersebut dikarenakan ...', 'single', '', 'memiliki lensa', 'memiliki saraf', 'menggunakan kacamata', 'memiliki 	otot', 'a'),
(65, 'Aprilia : Can you help me to do my English home work? Jodi : ...English is my favorite subject. Aprilia : Thank you.', 'single', '', 'Let’s 	go', 'I’m sorry, I can’t', 'I’d love to, but I dislike English', 'With pleasure', 'd'),
(66, 'Fani : Can you help me, Andi? Andi : Sorry,...', 'single', '', 'you’re welcome', 'you look very busy', 'I’m busy myself', 'I’m happy you are 	busy', 'c'),
(67, 'Marry :...to Lina’s birthday party? Putri : Of course. I’ll go there with Raka Marry : Thanks a lot', 'single', '', 'Will you come', 'Can you 	come', 'May you come', 'Don’t you come', 'a'),
(68, 'Ronaldo: Sir, would you like me to close the window for you? Mr. Adi: Yes, please. It’s very cold inside. \"would you like me to close the 	window for you?\" express:', 'single', ' ', 'Asking help', 'Offering help', 'Refusing something', 'Accepting an offer', 'b'),
(69, 'Ela: Mom, do you need some help? You look so busy this morning. Mom: Of course, dear. I need another pair of hands to wash the dish. \"Of 	course, dear\" expresses ……', 'single', '', 'Accepting help', 'Offering help', 'Refusing help', 'Looking for something', 'a'),
(70, 'A: I feel that children should explore more outdoor activities. B: … Outdoor activity can help develop motoric sensory. It is also beneficial 	for children.', 'single', '', 'I agree', 'I’m not sure', 'I disagree', 'I totally disagree', 'a'),
(71, 'Chika: I’m sure this food will end up in the trash.\r\n	Sasa : Well, I totally disagree with you. The beggar has waited for the leftovers. It won’t end in the trash.', 'single', '', 'Sasa is doubtful 	about it', 'Sasa has the same opinion with Chika', 'Sasa totally cannot accept Chika’s opinion', 'Sasa doesn’t know what to say', 'c'),
(72, 'Ada : we will have a long holiday in the next semester, what are you going to do? Ida : ……………. Ada : I do hope you have a nice trip.', 'single', '', 'I Don’t know', 'I am Busy', 'I am Thinking of going to the Beach', 'The beach is not clean', 'c'),
(73, 'Indah : Look at the Views. what do you think about the river?\r\n	Andil : I Think ………', 'single', '', 'It is amazing', 'I can Do Nothing', 'Yes. good', 'I can swim', 'a'),
(74, 'Feby, i really sorry i cannot join you and Sekar to visit the new bookstore as we have planned this morning. i sprained my ankle. i’d better 	have a rest at home. Received: 2 p.m 23/11/2020 From : Vandra. What is the message about?', 'single', '', 'Arranging a plan', 'Having an accident', 'Visiting a bookstore', 'Cancelling an appointment', 'd'),
(75, 'What is Vandra doing that afternoon?', 'single', '', 'Meeting Sekar', 'Calling Feby', 'Staying at home', 'Visiting the bookstore', 'c');

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
(3, 'bobi', '$2y$10$Epw88Cvr6JcJdtmPIjYIe.Z2wsH62/74uz1YXrZMa/bu0ToUB187y', 'bobibola@gmail.com', ''),
(4, 'ilyas', '$2y$10$xlNevKUkiNfsCKft5hC6Sub5JfQ/IhajXOLi6ivPvsUHIdqnR9fvK', 'ilyas@gmail.com', '');

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
(3, 2, 75),
(2, 8, 56),
(4, 16, 50),
(2, 16, 0);

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
  MODIFY `id_kuis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kumpulan_soal`
--
ALTER TABLE `kumpulan_soal`
  MODIFY `id_kumpulan_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
