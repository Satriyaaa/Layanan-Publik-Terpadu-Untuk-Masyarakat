<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ffe602, #ff9900);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            text-align: center;
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
            font-size: 32px;
            color: #333;
        }

        p {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }

        .btn {
            padding: 12px 20px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #ff9900;
            color: white;
        }

        .btn-secondary {
            background-color: #f5f5f5;
            color: #333;
        }

        .btn-primary:hover {
            background-color: #ffe602;
        }

        .btn-secondary:hover {
            background-color: #ffe602;
        }

        .button-group {
            display: flex;
            justify-content: center;
        }

        .button-group .btn {
            flex: 1;
            margin: 0 10px;
            max-width: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>SELAMAT DATANG</h1>
        <p>DI LAYANAN TERPADU</p>
        <div class="button-group">
            <!-- Button to direct to register page -->
            <a href="register.php" class="btn btn-secondary">Daftar</a>

            <!-- Button for users who already have an account -->
            <a href="login.php" class="btn btn-primary">Sudah Punya Akun?</a>
        </div>
    </div>
</body>
</html>
