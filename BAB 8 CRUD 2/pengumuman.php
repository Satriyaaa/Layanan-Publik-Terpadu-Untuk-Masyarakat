<?php
include 'koneksi.php'; // Sertakan file koneksi database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman Layanan Terpadu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ff9900;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .announcement {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 20px;
        }
        .announcement strong {
            color: #333;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
            text-align: center;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .action-buttons {
            text-align: right;
            margin-bottom: 20px;
        }
        .action-buttons a {
            text-decoration: none;
            padding: 10px 20px;
            margin: 5px;
            color: white;
            background-color: #007bff;
            border-radius: 5px;
        }
        .action-buttons a:hover {
            background-color: #0056b3;
        }
        .edit-delete-buttons a {
            text-decoration: none;
            padding: 5px 10px;
            margin: 0 5px;
            color: white;
            border-radius: 5px;
            font-size: 14px;
        }
        .edit-button {
            background-color: #4caf50;
        }
        .edit-button:hover {
            background-color: #45a049;
        }
        .delete-button {
            background-color: #f44336;
        }
        .delete-button:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Pengumuman Layanan Terpadu</h1>
    <div class="action-buttons">
        <a href="entry-pengumuman.php">Tambah Pengumuman</a>
    </div>
    <div class="announcement">
        <?php
        $query = "SELECT * FROM tb_pengumuman ORDER BY created_at DESC";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='announcement-item'>";
                echo "<h2>" . htmlspecialchars($row['judul']) . "</h2>";
                echo "<p>" . nl2br(htmlspecialchars($row['isi'])) . "</p>";
                echo "<small><em>Diterbitkan pada: " . htmlspecialchars($row['created_at']) . "</em></small>";
                echo "<div class='edit-delete-buttons'>";
                echo "<a href='edit-pengumuman.php?id=" . $row['id'] . "' class='edit-button'>Edit</a>";
                echo "<a href='hapus-pengumuman.php?id=" . $row['id'] . "' class='delete-button' onclick='return confirm(\"Apakah Anda yakin ingin menghapus pengumuman ini?\");'>Hapus</a>";
                echo "</div>";
                echo "<hr>";
                echo "</div>";
            }
        } else {
            echo "<p>Tidak ada pengumuman saat ini.</p>";
        }
        ?>
    </div>
    <div class="footer">
        <p>Hubungi kami di <a href="mailto:layanan@terpadu.id">layanan@terpadu.id</a> atau kunjungi <a href="#">laman resmi layanan terpadu</a> untuk informasi lebih lanjut.</p>
    </div>
</div>

</body>
</html>