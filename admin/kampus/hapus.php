<?php
$id = $_GET['id'];
include '../config/koneksi.php'; // pastikan koneksi menghasilkan variabel $koneksi

// Ambil semua area_parkir dari kampus ini
$result = $koneksi->query("SELECT id FROM area_parkir WHERE kampus_id = $id");

while ($row = $result->fetch_assoc()) {
    $area_id = $row['id'];
    // Hapus transaksi yang pakai area ini
    $koneksi->query("DELETE FROM transaksi WHERE area_parkir_id = $area_id");
}

// Hapus area parkir
$koneksi->query("DELETE FROM area_parkir WHERE kampus_id = $id");

// Hapus kampus
$koneksi->query("DELETE FROM kampus WHERE id = $id");

header("Location: index.php");
exit;
?>
