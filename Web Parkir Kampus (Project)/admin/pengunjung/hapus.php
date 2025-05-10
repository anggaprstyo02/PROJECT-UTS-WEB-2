<?php
include '../config/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM pengunjung WHERE id = $id";
    if ($koneksi->query($query) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        // Jika gagal, tetap arahkan kembali (bisa diarahkan ke halaman error jika diperlukan)
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>
