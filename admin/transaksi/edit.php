<?php 
include '../config/koneksi.php';

// Ambil ID transaksi dari URL
$id = $_GET['id'] ?? null;

// Ambil data transaksi berdasarkan ID
$query = $koneksi->query("SELECT * FROM transaksi WHERE id = '$id'");
$transaksi = $query->fetch_assoc();

// Redirect jika data tidak ditemukan
if (!$transaksi) {
    echo "<script>location='index.php';</script>";
    exit();
}

// Ambil semua data kendaraan sekaligus jenis dan biaya
$kendaraanData = [];
$kendaraanOptions = '';
$kendaraan = $koneksi->query("SELECT k.id, k.nopol, k.merk, j.biaya FROM kendaraan k JOIN jenis j ON k.jenis_id = j.id ORDER BY k.nopol ASC");
while ($k = $kendaraan->fetch_assoc()) {
    $selected = ($k['id'] == $transaksi['kendaraan_id']) ? 'selected' : '';
    $kendaraanData[$k['id']] = $k['biaya'];
    $kendaraanOptions .= "<option value='{$k['id']}' $selected>{$k['nopol']} - {$k['merk']}</option>";
}

// Ambil semua data area parkir
$areaOptions = '';
$area = $koneksi->query("SELECT * FROM area_parkir ORDER BY nama ASC");
while ($a = $area->fetch_assoc()) {
    $selected = ($a['id'] == $transaksi['area_parkir_id']) ? 'selected' : '';
    $areaOptions .= "<option value='{$a['id']}' $selected>{$a['nama']}</option>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Transaksi Parkir</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    body { background-color: #f1f4f9; min-height: 100vh; padding-bottom: 80px; }
    .sidebar { width: 250px; min-height: 100vh; background-color: #212529; position: fixed; color: #fff; }
    .sidebar h4 { font-weight: bold; }
    .sidebar a { color: #adb5bd; display: block; padding: 14px 20px; text-decoration: none; }
    .sidebar a:hover, .sidebar a.active { background-color: #495057; color: #fff; }
    .content { margin-left: 250px; padding: 40px 30px; }
    .navbar { margin-left: 250px; }
    footer { position: fixed; bottom: 0; left: 250px; right: 0; background-color: #212529; color: #fff; text-align: center; padding: 16px 0; font-size: 0.9rem; }
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
    <span class="navbar-brand">Edit Transaksi Parkir</span>
  </div>
</nav>

<!-- Content -->
<div class="content">
  <h2 class="fw-bold mb-4">Edit Data Transaksi</h2>

  <div class="card shadow-sm p-4">
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="<?= $transaksi['tanggal'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Jam Masuk</label>
        <input type="time" name="mulai" class="form-control" value="<?= $transaksi['mulai'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Jam Keluar</label>
        <input type="time" name="akhir" class="form-control" value="<?= $transaksi['akhir'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Keterangan</label>
        <input type="text" name="keterangan" class="form-control" value="<?= $transaksi['keterangan'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Kendaraan</label>
        <select name="kendaraan_id" class="form-select" id="kendaraanSelect" required>
          <option value="">-- Pilih Kendaraan --</option>
          <?= $kendaraanOptions ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Biaya Parkir</label>
        <input type="text" id="biayaParkir" name="biaya" class="form-control" readonly value="Rp <?= number_format($transaksi['biaya'], 0, ',', '.') ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Area Parkir</label>
        <select name="area_parkir_id" class="form-select" required>
          <option value="">-- Pilih Area --</option>
          <?= $areaOptions ?>
        </select>
      </div>
      <button class="btn btn-success" name="update"><i class="fas fa-save me-2"></i>Update</button>
      <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $tanggal = $_POST['tanggal'];
        $mulai = $_POST['mulai'];
        $akhir = $_POST['akhir'];
        $keterangan = $_POST['keterangan'];
        $kendaraan_id = $_POST['kendaraan_id'];
        $area_parkir_id = $_POST['area_parkir_id'];
        $biaya = isset($kendaraanData[$kendaraan_id]) ? $kendaraanData[$kendaraan_id] : 0;

        $queryUpdate = "
            UPDATE transaksi SET 
              tanggal = '$tanggal', 
              mulai = '$mulai', 
              akhir = '$akhir', 
              keterangan = '$keterangan', 
              biaya = $biaya, 
              area_parkir_id = $area_parkir_id, 
              kendaraan_id = $kendaraan_id
            WHERE id = $id
        ";

        if ($koneksi->query($queryUpdate)) {
            echo "<script>location='index.php';</script>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Gagal memperbarui data: " . $koneksi->error . "</div>";
        }
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
<script>
// Data biaya kendaraan dari PHP
const biayaMap = <?php echo json_encode($kendaraanData); ?>;

document.getElementById('kendaraanSelect').addEventListener('change', function () {
  const selectedId = this.value;
  const biaya = biayaMap[selectedId] || 0;
  document.getElementById('biayaParkir').value = 'Rp ' + biaya.toLocaleString('id-ID');
});
</script>
</body>
</html>
