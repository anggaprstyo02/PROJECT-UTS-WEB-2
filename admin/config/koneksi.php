<?php
// Konfigurasi database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "dbparkir";

// Membuat koneksi
$koneksi = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
