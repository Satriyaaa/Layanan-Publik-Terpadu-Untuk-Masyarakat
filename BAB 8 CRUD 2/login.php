<?php
session_start();

// Periksa apakah pengguna sudah login, jika ya, arahkan ke dashboard
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - Layanan Terpadu</title>
    <link rel="stylesheet" href="login.css">
    <style>
        /* Toast Styles */
        .toast {
            visibility: hidden;
            min-width: 250px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            top: 20px;
            font-size: 17px;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .toast.show {
            visibility: visible;
            opacity: 1;
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
                return false;
            }
            return true;
        }

        function showToast() {
            var toast = document.getElementById("toast");
            toast.className = "toast show";
            setTimeout(function() { toast.className = toast.className.replace("show", ""); }, 3000);
        }
    </script>
</head>
<body>
    <h1>LOGIN<br/> LAYANAN TERPADU<br/> UNTUK MASYARAKAT</h1>
 
    <div class="kotak_login">
        <p class="tulisan_login">Silahkan login</p>

        <?php
        if (isset($_GET['error'])) {
            echo '<div id="toast" class="toast show">' . htmlspecialchars($_GET['error']) . '</div>';
            echo '<script>setTimeout(function() { document.getElementById("toast").className = "toast"; }, 3000);</script>';
        }
        ?>

        <form name="loginForm" action="proses-login.php" method="POST" onsubmit="return validateForm()">
            <label>Username atau Email</label>
            <input type="text" name="username" class="form_login" placeholder="Username atau email .." required>
 
            <label>Password</label>
            <input type="password" name="password" class="form_login" placeholder="Password .." required>
            
            <button type="submit" class="tombol_login">Login</button>
        </form>
        <p class="link">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>

    <div id="toast"></div>
</body>
</html>