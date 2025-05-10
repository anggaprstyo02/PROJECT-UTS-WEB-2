<?php include '../config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Data Transaksi Parkir</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background-color: #f1f4f9;
      position: relative;
      min-height: 100vh;
      padding-bottom: 80px;
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
    .table thead {
      background-color: #343a40;
      color: #fff;
    }
    .table-hover tbody tr:hover {
      background-color: #f8f9fa;
    }
    .card {
      border: none;
      border-radius: 12px;
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
  <a href="../adminlte/admin.php"><i class="fas fa-home me-2"></i>Dashboard</a>
  <a href="../pengunjung/index.php"><i class="fas fa-users me-2"></i>Pengunjung</a>
  <a href="../kendaraan/index.php"><i class="fas fa-car me-2"></i>Kendaraan</a>
  <a href="../jenis/index.php"><i class="fas fa-tags me-2"></i>Jenis Kendaraan</a>
  <a href="../kampus/index.php"><i class="fas fa-university me-2"></i>Kampus</a>
  <a href="../area_parkir/index.php"><i class="fas fa-map-marker-alt me-2"></i>Area Parkir</a>
  <a href="index.php" class="active"><i class="fas fa-receipt me-2"></i>Transaksi</a>
  <a href="../logout/index.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
  <div class="container-fluid">
    <span class="navbar-brand">Data Transaksi Parkir</span>
  </div>
</nav>

<!-- Content -->
<div class="content">
  <h2 class="fw-bold mb-4">Transaksi Parkir</h2>
  <a href="tambah.php" class="btn btn-primary mb-4"><i class="fas fa-plus me-2"></i>Tambah Transaksi</a>

  <div class="card shadow-sm p-4">
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped align-middle text-center">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Mulai</th>
            <th>Akhir</th>
            <th>Kendaraan</th>
            <th>Area Parkir</th>
            <th>Biaya</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT t.*, k.nopol, a.nama AS area 
                    FROM transaksi t 
                    JOIN kendaraan k ON t.kendaraan_id = k.id 
                    JOIN area_parkir a ON t.area_parkir_id = a.id";
          $result = $koneksi->query($query);
          if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>
                  <td class='text-center'>" . htmlspecialchars($row['id']) . "</td>
                  <td class='text-center'>" . htmlspecialchars($row['tanggal']) . "</td>
                  <td class='text-center'>" . htmlspecialchars($row['mulai']) . "</td>
                  <td class='text-center'>" . htmlspecialchars($row['akhir']) . "</td>
                  <td class='text-center'>" . htmlspecialchars($row['nopol']) . "</td>
                  <td class='text-center'>" . htmlspecialchars($row['area']) . "</td>
                  <td class='text-center'>Rp " . number_format($row['biaya'], 0, ',', '.') . "</td>
                  <td class='text-center'>
                    <a href='edit.php?id=" . urlencode($row['id']) . "' class='btn btn-warning btn-sm me-1'><i class='fas fa-edit'></i></a>
                    <a href='hapus.php?id=" . urlencode($row['id']) . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus data ini?');\"><i class='fas fa-trash-alt'></i></a>
                  </td>
                </tr>";
            }
          } else {
            echo "<tr><td colspan='8' class='text-center text-muted'>Belum ada data transaksi.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Footer -->
<footer>
  <div class="container">
    <span>&copy; <?= date('Y') ?> Parkir Kampus | Sistem Informasi Parkir Terintegrasi</span>
  </div>
</footer>

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
