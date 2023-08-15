    <!-- includes/koneksi.php -->
<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "nama_database"; // Ganti dengan nama database Anda

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
