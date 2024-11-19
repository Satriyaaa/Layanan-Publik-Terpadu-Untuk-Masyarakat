<?php
session_start();
if (!isset($_SESSION['username'])) {
    // Jika pengguna belum login, alihkan ke halaman login
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard - Layanan Terpadu</title>
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="">LAYANAN TERPADU</a></div>
            <div class="menu">
            <ul>
                <li><a href="">Beranda</a></li>
                <li><a href="profile.php">profile</a></li>
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
            <div class="card">
                <h2>Statistik Pengguna</h2>
                <div class="stats">
                    <p><strong>Pengguna Terdaftar:</strong> 5.320 orang</p>
                    <p><strong>Pengguna Aktif Bulanan:</strong> 2.740 orang</p>
                    <p><strong>Pengajuan Baru Minggu Ini:</strong> 120 pengajuan</p>
                </div>
            </div>
    
            <div class="card">
                <h2>Layanan Populer</h2>
                <div class="stats">
                    <p><strong>Pembuatan KTP:</strong> 320 permohonan</p>
                    <p><strong>Perpanjangan SIM:</strong> 210 permohonan</p>
                    <p><strong>Pendaftaran BPJS Kesehatan:</strong> 150 permohonan</p>
                </div>
            </div>
    
            <div class="card">
                <h2>Status Permohonan</h2>
                <div class="stats">
                    <p><strong>Menunggu Verifikasi:</strong> 65 permohonan</p>
                    <p><strong>Dalam Proses:</strong> 45 permohonan</p>
                    <p><strong>Selesai:</strong> 10 permohonan</p>
                </div>
            </div>
    
            <div class="card">
                <h2>Pengaduan Masyarakat</h2>
                <div class="stats">
                    <p><strong>Total Pengaduan:</strong> 85 pengaduan</p>
                    <p><strong>Pengaduan Ditanggapi:</strong> 75 pengaduan</p>
                    <p><strong>Pengaduan Belum Ditanggapi:</strong> 10 pengaduan</p>
                </div>
            </div>
    
            <div class="card">
                <h2>Agenda Terdekat</h2>
                <div class="agenda-item"><strong>Vaksinasi Massal:</strong> 12 Oktober 2024</div>
                <div class="agenda-item"><strong>Bantuan Sosial BLT:</strong> 15 Oktober 2024</div>
                <div class="agenda-item"><strong>Pendaftaran Sekolah:</strong> 20 Oktober 2024</div>
            </div>
    
            <div class="card">
                <h2>Notifikasi</h2>
                <div class="notification-item">3 permohonan KTP Anda sudah diproses.</div>
                <div class="notification-item">2 pengaduan baru diterima.</div>
                <div class="notification-item">Jadwal pembayaran pajak kendaraan akan segera berakhir.</div>
            </div>
    
            <div class="card">
                <h2>Layanan Terbaru</h2>
                <div class="stats">
                    <p><strong>Sistem E-Learning untuk Sekolah:</strong> Baru tersedia!</p>
                    <p><strong>Pengajuan Izin Usaha Online (OSS):</strong> Kini lebih cepat.</p>
                </div>
            </div>
    
            <div class="card">
                <h2>Peta Layanan Terdekat</h2>
                <div class="stats">
                    <p><a href="#" class="map-link"><strong>Kantor Kecamatan:</strong> 2 km dari lokasi Anda</a></p>
                    <p><a href="#" class="map-link"><strong>Rumah Sakit Umum Daerah (RSUD):</strong> 5 km dari lokasi Anda</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>