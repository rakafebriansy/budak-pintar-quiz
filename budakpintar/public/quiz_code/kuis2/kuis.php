<!-- kuis.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Online</title>
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Montserrat:ital,wght@0,400;0,700;1,400;1,700&family=Lato:ital,wght@0,400;0,700;1,400;1,700&family=Raleway:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
</head>

<body class="bg-gray-100">
    <nav class="bg-blue-500 p-4 flex justify-between items-center">
        <div class="text-white font-semibold kuis-font-roboto">Skor: <span id="skor">0</span></div>
        <div class="text-white font-semibold kuis-font-roboto">Waktu Tersisa: <span id="waktuKuis">10:00</span></div>
    </nav>

    <div class="container mx-auto mt-8 p-4 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-4 kuis-font-montserrat">Pertanyaan</h1>
        <?php
        // Menggunakan koneksi database yang telah dibuat
        require 'includes/koneksi.php';

        // Query untuk mengambil data soal dari tabel
        $sql = "SELECT * FROM tabel_soal"; // Ganti "tabel_soal" dengan nama tabel yang sesuai
        
        $result = $conn->query($sql);

        // Tampilkan data soal dalam format HTML
        if ($result->num_rows > 0) {
            // Tampilkan pertanyaan dari database
            while ($row = $result->fetch_assoc()) {
                echo "<p class='text-lg mb-6 kuis-font-open-sans'>Pertanyaan: " . $row["pertanyaan"] . "</p>";
                // Tampilkan opsi jawaban di sini, sesuai kebutuhan
            }
        } else {
            // Tampilkan pertanyaan default jika tidak ada data dari database
            echo "<p class='text-lg mb-6 kuis-font-open-sans'>Pertanyaan: Kamu siapa?</p>";
        }

        $conn->close();
        ?>

        <div class="grid grid-cols-2 gap-4">
            <button
                class="kategori1 text-white px-4 py-2 rounded-full bg-yellow-400 hover:bg-yellow-500 kuis-font-lato">Pilihan
                1</button>
            <button
                class="kategori2 text-white px-4 py-2 rounded-full bg-green-400 hover:bg-green-500 kuis-font-lato">Pilihan
                2</button>
            <button
                class="kategori3 text-white px-4 py-2 rounded-full bg-blue-400 hover:bg-blue-500 kuis-font-lato">Pilihan
                3</button>
            <button
                class="kategori4 text-white px-4 py-2 rounded-full bg-pink-400 hover:bg-pink-500 kuis-font-lato">Pilihan
                4</button>
        </div>
    </div>

    <script src="js/models/kuisModel.js"></script>
    <script src="js/views/kuisView.js"></script>
    <script src="js/controllers/kuisController.js"></script>
    <script src="js/main.js"></script>
    <script src="js/pages/kuis.js"></script>
</body>
</html>