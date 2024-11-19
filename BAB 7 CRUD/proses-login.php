<?php
session_start();
include 'koneksi.php'; // Sertakan koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernameOrEmail = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Query untuk mencari pengguna berdasarkan username atau email
    $query = "SELECT * FROM tb_user WHERE name = '$usernameOrEmail' OR email = '$usernameOrEmail'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Login berhasil, simpan informasi ke session
            $_SESSION['username'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            // Alihkan ke dashboard
            header("Location: dashboard.php");
            exit;
        } else {
            // Password salah
            header("Location: login.php?error=Password salah!");
            exit;
        }
    } else {
        // Pengguna tidak ditemukan
        header("Location: login.php?error=Username atau Email tidak ditemukan!");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
?>