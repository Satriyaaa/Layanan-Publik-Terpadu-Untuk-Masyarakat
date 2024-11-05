<?php
session_start();
session_unset(); // Hapus semua data sesi
session_destroy(); // Hapus sesi
header("Location: login.php"); // Alihkan ke halaman login setelah logout
exit;
?>
