<?php
// Memulai sesi
session_start();

// Sertakan file koneksi
$koneksi_file = 'koneksi.php';
if (file_exists($koneksi_file)) {
    include($koneksi_file);
} else {
    die("Error: File koneksi.php tidak ditemukan.");
}

// Periksa koneksi ke database
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Menangani penambahan data berita
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $tanggal = $_POST['tanggal']; 
    
    $query = "INSERT INTO tb_berita (judul, konten, tanggal) VALUES ('$judul', '$konten', '$tanggal')";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Berita berhasil ditambahkan!'); window.location = 'berita.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

// Menangani penghapusan data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $query = "DELETE FROM tb_berita WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Berita berhasil dihapus!'); window.location = 'berita.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>
    <style>
        /* CSS untuk styling */
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #ff9900;
            padding: 20px;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .main {
            max-width: 1000px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header button {
            background-color: #ff9900;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .header button:hover {
            background-color: #ff7700;
        }

        h1, h2 {
            text-align: center;
            color: #4a4a4a;
        }

        h1 {
            font-size: 50px;
            word-break: break-word;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 30px;
            margin-bottom: 20px;
        }

        hr {
            border: 1px solid #ddd;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            display: block;
            margin: 10px 0 5px;
        }

        .form-container input, .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-container button {
            background-color: #ff9900;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #ff7700;
        }

        .data-container {
            margin-top: 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .data-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-container table, th, td {
            border: 1px solid #ddd;
        }

        .data-container th, .data-container td {
            padding: 10px;
            text-align: left;
        }

        .data-container th {
            background-color: #f4f4f4;
        }

        .btn {
            background-color: #ff9900;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #ff7700;
        }
    </style>
</head>
<body>

<div class="main">
    <div class="header">
        <h1>Tambah Berita</h1>
        <a href="dashboard.php">
            <button>Kembali ke Dashboard</button>
        </a>
    </div>
    <hr>
    <h2>Form Tambah Berita</h2>

    <div class="form-container">
        <form method="POST">
            <label for="judul">Judul Berita</label>
            <input type="text" id="judul" name="judul" required>

            <label for="konten">Konten Berita</label>
            <textarea id="konten" name="konten" rows="5" required></textarea>

            <label for="tanggal">Tanggal Berita</label>
            <input type="date" id="tanggal" name="tanggal" required>

            <button type="submit">Tambah Berita</button>
        </form>
        </br>
        <div class="button-group">
        <a href="cetak-berita.php" target="_blank" class="btn">Cetak PDF</a>
    </div>
    </div>
    <div class="data-container">
        <h2>Data Berita yang Telah Ditambahkan</h2>
        <?php
        $query = "SELECT * FROM tb_berita ORDER BY tanggal DESC";
        $result = mysqli_query($koneksi, $query);
        
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Judul</th><th>Konten</th><th>Tanggal</th><th>Aksi</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['judul'] . "</td>";
                echo "<td>" . $row['konten'] . "</td>";
                echo "<td>" . $row['tanggal'] . "</td>";
                echo "<td>
                        <a href='edit_berita.php?id=" . $row['id'] . "' class='btn'>Edit</a> | 
                        <a href='?hapus=" . $row['id'] . "' class='btn' onclick='return confirm(\"Apakah Anda yakin ingin menghapus berita ini?\")'>Hapus</a>
                    </td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Belum ada berita yang ditambahkan.";
        }
        ?>
    </div>
</div>

</body>
</html>
