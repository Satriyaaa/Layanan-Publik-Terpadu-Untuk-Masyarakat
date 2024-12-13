<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengumuman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffcc00;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5dc;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
            color: #8b4513;
        }
        label {
            font-size: 16px;
            color: #8b4513;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #8b4513;
            border-radius: 5px;
        }
        button {
            background-color: #8b4513;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #a0522d;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #8b4513;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Pengumuman</h1>
        <form action="/store" method="POST">
            <?php echo csrf_field(); ?>
            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" required>

            <label for="isi">Isi:</label>
            <textarea name="isi" id="isi" rows="10" required></textarea>

            <button type="submit">Tambah</button>
        </form>
        <a href="pengumuman.php" class="back-link">Kembali ke Daftar Pengumuman</a>
    </div>
</body>
</html><?php /**PATH C:\laragon\www\BAB 9\LayananTerpadu\LayananTerpadu\resources\views/pengumuman/entry.blade.php ENDPATH**/ ?>