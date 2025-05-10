<?php include '../config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard Admin</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background-color: #f1f4f9;
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
    }
    .navbar {
      margin-left: 250px;
    }
    .card {
      border: none;
      border-radius: 15px;
      transition: transform 0.2s;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .card .card-footer a {
      font-weight: 500;
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
    }
  </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
  <div class="p-4 text-center border-bottom border-secondary">
    <h4><i class="fas fa-parking me-2"></i>Parkir Kampus</h4>
  </div>
  <a href="admin.php" class="active"><i class="fas fa-home me-2"></i>Dashboard</a>
  <a href="../pengunjung/index.php"><i class="fas fa-users me-2"></i>Pengunjung</a>
  <a href="../kendaraan/index.php"><i class="fas fa-car me-2"></i>Kendaraan</a>
  <a href="../jenis/index.php"><i class="fas fa-tags me-2"></i>Jenis Kendaraan</a>
  <a href="../Kampus/index.php"><i class="fas fa-university me-2"></i>Kampus</a>
  <a href="../area_parkir/index.php"><i class="fas fa-map-marker-alt me-2"></i>Area Parkir</a>
  <a href="../transaksi/index.php"><i class="fas fa-receipt me-2"></i>Transaksi</a>
  <a href="../logout/index.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>

</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
  <div class="container-fluid">
    <span class="navbar-brand">Dashboard Admin</span>
  </div>
</nav>

<!-- Content -->
<div class="content">
  <h2 class="fw-bold mb-4">Selamat Datang, Admin!</h2>

  <div class="row g-4">
    <!-- Total Kendaraan -->
    <div class="col-xl-4 col-md-6">
      <div class="card text-white bg-primary shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <h3>
              <?php
              $result = $koneksi->query("SELECT COUNT(*) as total FROM kendaraan");
              $data = $result->fetch_assoc();
              echo $data['total'];
              ?>
            </h3>
            <p class="mb-0">Total Kendaraan</p>
          </div>
          <i class="fas fa-car fa-2x"></i>
        </div>
        <div class="card-footer bg-transparent border-top-0 text-end">
          <a href="../kendaraan/index.php" class="text-white text-decoration-none">Lihat Detail <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
    </div>

    <!-- Total Jenis -->
    <div class="col-xl-4 col-md-6">
      <div class="card text-white bg-success shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <h3>
              <?php
              $result = $koneksi->query("SELECT COUNT(*) as total FROM jenis");
              $data = $result->fetch_assoc();
              echo $data['total'];
              ?>
            </h3>
            <p class="mb-0">Total Jenis Kendaraan</p>
          </div>
          <i class="fas fa-tags fa-2x"></i>
        </div>
        <div class="card-footer bg-transparent border-top-0 text-end">
          <a href="../jenis/index.php" class="text-white text-decoration-none">Lihat Detail <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
    </div>

    <!-- Total Transaksi -->
    <div class="col-xl-4 col-md-6">
      <div class="card text-white bg-danger shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <h3>
              <?php
              $result = $koneksi->query("SELECT COUNT(*) as total FROM transaksi");
              $data = $result->fetch_assoc();
              echo $data['total'];
              ?>
            </h3>
            <p class="mb-0">Total Transaksi</p>
          </div>
          <i class="fas fa-receipt fa-2x"></i>
        </div>
        <div class="card-footer bg-transparent border-top-0 text-end">
          <a href="../transaksi/index.php" class="text-white text-decoration-none">Lihat Detail <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer>
  <div class="container">
    <span>&copy; <?= date('Y') ?> Parkir Kampus | Sistem Informasi Parkir Terintegrasi</span>
  </div>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
