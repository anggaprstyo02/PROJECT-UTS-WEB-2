<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$koneksi->query("DELETE FROM area_parkir WHERE id=$id");
header("Location: index.php");
