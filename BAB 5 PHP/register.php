<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> REGISTRATION </title> 
    <link rel="stylesheet" href="register.css">
    <style>
      /* Toast Styles */
      .toast {
          visibility: hidden; /* Hidden by default */
          min-width: 250px; /* Minimum width */
          margin-left: -125px; /* Center the toast */
          background-color: #333; /* Black background */
          color: #fff; /* White text */
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
        var name = document.forms["registerForm"]["name"].value;
        var email = document.forms["registerForm"]["email"].value;
        var password = document.forms["registerForm"]["password"].value;
        var confirmPassword = document.forms["registerForm"]["confirmPassword"].value;
        var terms = document.forms["registerForm"]["terms"].checked;

        // Validasi apakah username, email, dan password sudah sesuai
        if (name !== "satriya" || email !== "satriya15" || password !== "12345" || confirmPassword !== "12345") {
          showToast("Username, email, atau password tidak valid!");
          return false; // Cegah pengiriman form
        }

        if (!terms) {
          showToast("Anda harus menerima syarat & ketentuan!");
          return false; // Cegah pengiriman form
        }

        // Jika semua validasi benar, arahkan ke dashboard.html
        window.location.href = "dashboard.php";
        return false; // Cegah pengiriman form default
      }

      function showToast(message) {
          var toast = document.getElementById("toast");
          toast.textContent = message; // Set the toast message
          toast.className = "toast show"; // Add the "show" class to DIV
          setTimeout(function() {
              toast.className = toast.className.replace("show", ""); // Remove the show class after 3 seconds
          }, 3000); // 3 seconds
      }
    </script>
   </head>
<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form name="registerForm" onsubmit="return validateForm()">
      <div class="input-box">
        <input type="text" name="name" placeholder="Enter your name" required>
      </div>
      <div class="input-box">
        <input type="text" name="email" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Create password" required>
      </div>
      <div class="input-box">
        <input type="password" name="confirmPassword" placeholder="Confirm password" required>
      </div>
      <div class="policy">
        <input type="checkbox" name="terms">
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
