<?php
include 'koneksi.php'; // Sertakan file koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($koneksi, $_POST['name']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($koneksi, $_POST['confirmPassword']);
    $terms = isset($_POST['terms']) ? 1 : 0;

    // Validasi password dan confirm password
    if ($password !== $confirmPassword) {
        echo "<script>alert('Password dan Confirm Password tidak cocok!');window.location='register.php';</script>";
        exit();
    }

    // Enkripsi password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Periksa apakah email sudah terdaftar
    $checkEmail = "SELECT * FROM tb_user WHERE email = '$email'";
    $result = mysqli_query($koneksi, $checkEmail);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email sudah terdaftar! Silakan gunakan email lain.');window.location='register.php';</script>";
    } else {
        // Simpan data ke database
        $query = "INSERT INTO tb_user (name, email, password, terms_accepted) 
                  VALUES ('$name', '$email', '$hashedPassword', $terms)";

        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Registrasi berhasil! Silakan login.');window.location='login.php';</script>";
        } else {
            echo "<script>alert('Gagal registrasi! Silakan coba lagi.');window.location='register.php';</script>";
        }
    }
} else {
    header("Location: register.php");
    exit();
}
?>