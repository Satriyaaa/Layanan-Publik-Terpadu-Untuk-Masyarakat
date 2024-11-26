<?php
include 'koneksi.php'; // Memasukkan file koneksi

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tb_berita WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
}

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $tanggal = $_POST['tanggal']; // Mengambil tanggal yang dimasukkan pengguna

    // Update query untuk mengubah data berita
    $query = "UPDATE tb_berita SET judul = '$judul', konten = '$konten', tanggal = '$tanggal' WHERE id = '$id'";
    if (mysqli_query($koneksi, $query)) {
        header("Location: berita.php"); // Redirect setelah edit
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Berita</title>
    <style>
      /* CSS yang sama seperti pada halaman lain */
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

      .form-container {
        margin-top: 20px;
      }

      label {
        font-size: 16px;
        color: #333;
      }

      input, textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 14px;
      }

      input[type="submit"] {
        background-color: #ff9900;
        border: none;
        color: white;
        cursor: pointer;
        font-size: 16px;
      }

      input[type="submit"]:hover {
        background-color: #e68a00;
      }

    </style>
</head>
<body>
    <div class="main">
        <h1>Edit Berita</h1>
        <form method="POST" class="form-container">
            <label for="judul">Judul</label>
            <input type="text" id="judul" name="judul" value="<?= $data['judul']; ?>" required>
            
            <label for="konten">Konten</label>
            <textarea id="konten" name="konten" required><?= $data['konten']; ?></textarea>

            <label for="tanggal">Tanggal Berita</label>
            <input type="date" id="tanggal" name="tanggal" value="<?= $data['tanggal']; ?>" required>

            <input type="submit" name="submit" value="Update Berita">
        </form>
    </div>
</body>
</html>
