<?php
include 'koneksi.php'; // Memasukkan file koneksi

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM tb_berita WHERE id = '$id'";
    mysqli_query($koneksi, $query);
    header("Location: berita.php"); // Redirect setelah hapus
}
?>
