<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$koneksi->query("DELETE FROM kendaraan WHERE id=$id");
header("Location: index.php");
