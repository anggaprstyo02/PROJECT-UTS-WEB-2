<?php
$id = $_GET['id'];
include '../koneksi.php';

// Ambil semua area_parkir dari kampus ini
$result = $mysqli->query("SELECT id FROM area_parkir WHERE kampus_id = $id");

while ($row = $result->fetch_assoc()) {
    $area_id = $row['id'];
    // Hapus transaksi yang pakai area ini
    $mysqli->query("DELETE FROM transaksi WHERE area_parkir_id = $area_id");
}

// Hapus area parkir
$mysqli->query("DELETE FROM area_parkir WHERE kampus_id = $id");

// Hapus kampus
$mysqli->query("DELETE FROM kampus WHERE id = $id");

header("Location: index.php");
?>
