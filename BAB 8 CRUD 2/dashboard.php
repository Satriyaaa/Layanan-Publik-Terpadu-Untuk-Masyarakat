<?php
session_start();
if (!isset($_SESSION['username'])) {
    // Jika pengguna belum login, alihkan ke halaman login
    header("Location: login.html");
    exit;
}

include('koneksi.php'); // Menyertakan file koneksi

// Query untuk mengambil berita terbaru
$query = "SELECT * FROM tb_berita ORDER BY tanggal DESC LIMIT 5"; // Menampilkan 5 berita terbaru
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard - Layanan Terpadu</title>
    <style>
        /* Styling untuk widget berita terbaru */
        .news-item {
            background-color: #f9f9f9;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .news-item:hover {
            transform: translateY(-5px);
        }

        .news-item a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
            font-weight: bold;
        }

        .news-item a:hover {
            color: #ff9900;
        }

        .news-item p {
            font-size: 14px;
            color: #777;
            margin-top: 5px;
        }

        .card h2 {
            font-size: 22px;
            color: #333;
            border-bottom: 2px solid #ff9900;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .stats {
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .container {
            padding: 20px;
        }
    </style>
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="">LAYANAN TERPADU</a></div>
            <div class="menu">
                <ul>
                    <li><a href="">Beranda</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="berita.php">Berita</a></li>
                    <li><a href="pengumuman.php">Pengumuman</a></li>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="logout.php">Logout</a></li> <!-- Link Logout -->
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
    
        <div class="dashboard">
            <!-- Card untuk Berita Terbaru -->
            <div class="card">
                <h2>Berita Terbaru</h2>
                <div class="stats">
                    <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                        <div class="news-item">
                            <a href="edit_berita.php?id=<?= $data['id']; ?>">
                                <?= $data['judul']; ?>
                            </a>
                            <p><em>Diposting pada: <?= $data['tanggal']; ?></em></p>
                        </div>
                    <?php } ?>
                    <?php if (mysqli_num_rows($result) == 0) { ?>
                        <p>Tidak ada berita terbaru.</p>
                    <?php } ?>
                </div>
            </div>
            <!-- Card lainnya tetap sama -->
        </div>
    </div>
</body>
</html>
