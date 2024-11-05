<?php
session_start();

// Cek apakah form login telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data username dan password dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Data login yang valid
    $valid_username = "admin";
    $valid_password = "admin123";

    // Cek apakah username dan password cocok
    if ($username == $valid_username && $password == $valid_password) {
        // Login berhasil, simpan username dalam session
        $_SESSION['username'] = $username;
        
        // Alihkan ke dashboard.php
        header("Location: dashboard.php");
        exit;
    } else {
        // Login gagal, tampilkan pesan kesalahan
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <style>
        /* Toast Styles */
        .toast {
            visibility: hidden; /* Hidden by default. Visible on click */
            min-width: 250px; /* Min width */
            margin-left: -125px; /* Center the toast */
            background-color: #333; /* Black background color */
            color: #fff; /* White text color */
            text-align: center; /* Centered text */
            border-radius: 2px; /* Rounded corners */
            padding: 16px; /* Padding */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 50%; /* Center the toast horizontally */
            top: 20px; /* 20px from the top */
            font-size: 17px; /* Font size */
            transition: visibility 0s, opacity 0.5s linear; /* Fade in and out */
            opacity: 0; /* Initial opacity */
        }

        .toast.show {
            visibility: visible; /* Show the toast */
            opacity: 1; /* Fade in the toast */
        }
    </style>
    <script>
        function validateForm() {
            var username = document.forms["loginForm"]["username"].value;
            var password = document.forms["loginForm"]["password"].value;
            var toast = document.getElementById("toast");

            if (username == "" || password == "") {
                toast.textContent = "Username dan Password harus diisi!";
                showToast();
                return false; // Mencegah form dari pengiriman jika tidak valid
            }
            return true; // Lanjutkan ke login.php jika form valid
        }

        function showToast() {
            var toast = document.getElementById("toast");
            toast.className = "toast show"; // Add the "show" class to DIV
            setTimeout(function() { toast.className = toast.className.replace("show", ""); }, 3000); // After 3 seconds, remove the show class
        }
    </script>
</head>
<body>
 
    <h1>LOGIN<br/> LAYANAN TERPADU<br/> UNTUK MASYARAKAT</h1>
 
    <div class="kotak_login">
        <p class="tulisan_login">Silahkan login</p>

        <?php
        // Tampilkan pesan kesalahan jika login gagal
        if (isset($error)) {
            echo '<div id="toast" class="toast show">' . $error . '</div>';
            echo '<script>setTimeout(function() { document.getElementById("toast").className = "toast"; }, 3000);</script>';
        }
        ?>

        <form name="loginForm" action="login.php" method="POST" onsubmit="return validateForm()">
            <label>Username</label>
            <input type="text" name="username" class="form_login" placeholder="Username atau email ..">
 
            <label>Password</label>
            <input type="password" name="password" class="form_login" placeholder="Password ..">
            
            <button type="submit" class="tombol_login">Login</button>
        </form>
        <p class="link">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>

    <!-- Toast Notification -->
    <div id="toast"></div>
 
</body>
</html>
