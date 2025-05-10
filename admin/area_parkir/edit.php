<?php include '../config/koneksi.php'; ?>

<?php
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM area_parkir WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Area Parkir</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background-color: #f1f4f9;
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
  <a href="../Kampus/index.php"><i class="fas fa-university me-2"></i>Kampus</a>
  <a href="index.php" class="active"><i class="fas fa-map-marker-alt me-2"></i>Area Parkir</a>
  <a href="../transaksi/index.php"><i class="fas fa-receipt me-2"></i>Transaksi</a>
  <a href="../logout/index.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
  <div class="container-fluid">
    <span class="navbar-brand">Edit Area Parkir</span>
  </div>
</nav>

<!-- Content -->
<div class="content">
  <h2 class="fw-bold mb-4">Edit Area Parkir</h2>

  <div class="card shadow-sm p-4">
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Nama Area</label>
        <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Kapasitas</label>
        <input type="number" name="kapasitas" class="form-control" value="<?= $data['kapasitas'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Keterangan</label>
        <input type="text" name="keterangan" class="form-control" value="<?= $data['keterangan'] ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Kampus</label>
        <select name="kampus_id" class="form-select" required>
          <?php
          $kampus = $koneksi->query("SELECT * FROM kampus");
          while ($k = $kampus->fetch_assoc()) {
              $selected = ($k['id'] == $data['kampus_id']) ? "selected" : "";
              echo "<option value='{$k['id']}' $selected>{$k['nama']}</option>";
          }
          ?>
        </select>
      </div>
      <button class="btn btn-success" name="update"><i class="fas fa-save me-2"></i>Update</button>
      <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $kapasitas = $_POST['kapasitas'];
        $keterangan = $_POST['keterangan'];
        $kampus_id = $_POST['kampus_id'];

        $koneksi->query("UPDATE area_parkir SET 
                            nama='$nama', 
                            kapasitas='$kapasitas', 
                            keterangan='$keterangan', 
                            kampus_id='$kampus_id' 
                         WHERE id=$id");
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
