<?php
// Konfigurasi database
$host = "localhost";       // Nama host, biasanya localhost
$username = "root";        // Username database (default: root)
$password = "";            // Password database (default: kosong untuk XAMPP)
$database = "db_layananterpadu"; // Nama database

// Membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>