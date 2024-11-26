<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION - Layanan Terpadu</title> 
    <link rel="stylesheet" href="register.css">
    <style>
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
   </head>
<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form action="proses-register.php" method="POST" name="registerForm">
      <div class="input-box">
        <input type="text" name="name" placeholder="Enter your name" required>
      </div>
      <div class="input-box">
        <input type="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Create password" required>
      </div>
      <div class="input-box">
        <input type="password" name="confirmPassword" placeholder="Confirm password" required>
      </div>
      <div class="policy">
        <input type="checkbox" name="terms" required>
        <h3>I accept all terms & conditions</h3>
      </div>
      <div class="input-box button">
        <button type="submit" class="tombol_register">Register Now</button>
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
    </form>
  </div>

  <!-- Toast Notification -->
  <div id="toast"></div>
</body>
</html>