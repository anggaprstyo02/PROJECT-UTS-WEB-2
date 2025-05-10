<?php include '../config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tambah Kendaraan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background-color: #f1f4f9;
      min-height: 100vh;
      padding-bottom: 80px;
      position: relative;
    }
    .sidebar {
      width: 250px;
      min-height: 100vh;
      background-color: #212529;
      position: fixed;
      color: #fff;
    }
    .sidebar h4 {
      font-weight: bold;
    }
    .sidebar a {
      color: #adb5bd;
      display: block;
      padding: 14px 20px;
      text-decoration: none;
      transition: all 0.2s;
    }
    .sidebar a:hover, .sidebar a.active {
      background-color: #495057;
      color: #fff;
    }
    .content {
      margin-left: 250px;
      padding: 40px 30px;
      padding-bottom: 100px;
    }
    .navbar {
      margin-left: 250px;
    }
    footer {
      position: fixed;
      bottom: 0;
      left: 250px;
      right: 0;
      background-color: #212529;
      color: #fff;
      text-align: center;
      padding: 16px 0;
      font-size: 0.9rem;
      z-index: 1;
    }
  </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
  <div class="p-4 text-center border-bottom border-secondary">
    <h4><i class="fas fa-parking me-2"></i>Parkir Kampus</h4>
  </div>
  <a href="../adminlte/admin.php"><i class="fas fa-home me-2"></i>Dashboard</a>
  <a href="../pengunjung/index.php"><i class="fas fa-users me-2"></i>Pengunjung</a>
  <a href="index.php" class="active"><i class="fas fa-car me-2"></i>Kendaraan</a>
  <a href="../jenis/index.php"><i class="fas fa-tags me-2"></i>Jenis Kendaraan</a>
  <a href="../kampus/index.php"><i class="fas fa-university me-2"></i>Kampus</a>
  <a href="../area_parkir/index.php"><i class="fas fa-map-marker-alt me-2"></i>Area Parkir</a>
  <a href="../transaksi/index.php"><i class="fas fa-receipt me-2"></i>Transaksi</a>
  <a href="../logout/index.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
  <div class="container-fluid">
    <span class="navbar-brand">Tambah Kendaraan</span>
  </div>
</nav>

<!-- Content -->
<div class="content">
  <h2 class="fw-bold mb-4">Tambah Kendaraan</h2>

  <div class="card shadow-sm p-4">
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Merk</label>
        <input type="text" name="merk" class="form-control" required>
      </div>
      
      <div class="mb-3">
        <label class="form-label">Pemilik</label>
        <select name="pemilik_id" class="form-select" required>
          <option value="">-- Pilih Pemilik --</option>
          <?php
          // Menampilkan daftar pengunjung dari database
          $pengunjung = $koneksi->query("SELECT * FROM pengunjung");
          while ($p = $pengunjung->fetch_assoc()) {
              echo "<option value='{$p['id']}'>{$p['nama']}</option>";
          }
          ?>
        </select>
      </div>
      
      <div class="mb-3">
        <label class="form-label">Nomor Polisi</label>
        <input type="text" name="nopol" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Tahun Beli</label>
        <input type="number" name="thn_beli" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <input type="text" name="deskripsi" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Jenis Kendaraan</label>
        <select name="jenis_kendaraan_id" class="form-select" required>
          <option value="">-- Pilih Jenis --</option>
          <?php
          $jenis = $koneksi->query("SELECT * FROM jenis");
          while ($j = $jenis->fetch_assoc()) {
              echo "<option value='{$j['id']}'>{$j['nama']}</option>";
          }
          ?>
        </select>
      </div>
      <button class="btn btn-primary" name="simpan"><i class="fas fa-plus me-2"></i>Simpan</button>
      <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $merk = $_POST['merk'];
        $pemilik_id = $_POST['pemilik_id']; // Menggunakan ID pengunjung
        $nopol = $_POST['nopol'];
        $thn_beli = $_POST['thn_beli'];
        $deskripsi = $_POST['deskripsi'];
        $jenis_kendaraan_id = $_POST['jenis_kendaraan_id'];

        // Menyimpan data kendaraan dengan mengaitkan pemiliknya melalui ID
        $koneksi->query("INSERT INTO kendaraan (merk, pemilik_id, nopol, thn_beli, deskripsi, jenis_kendaraan_id) 
                         VALUES ('$merk', '$pemilik_id', '$nopol', '$thn_beli', '$deskripsi', '$jenis_kendaraan_id')");
        echo "<script>location='index.php';</script>";
    }
    ?>
  </div>
</div>

<!-- Footer -->
<footer>
  <div class="container">
    <span>&copy; <?= date('Y') ?> Parkir Kampus | Sistem Informasi Parkir Terintegrasi</span>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
