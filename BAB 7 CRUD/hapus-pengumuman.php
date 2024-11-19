<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM tb_pengumuman WHERE id = $id";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Pengumuman berhasil dihapus!');window.location='pengumuman.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus pengumuman!');window.location='pengumuman.php';</script>";
}
?>