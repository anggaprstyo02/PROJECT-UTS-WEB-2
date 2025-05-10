<?php
include '../config/koneksi.php';
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Logout - Parkir Kampus</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .logout-card {
      max-width: 450px;
      margin: 80px auto;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      background: #fff;
      text-align: center;
    }
    .logout-card h3 {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="logout-card">
  <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
  <h3>Anda telah berhasil logout</h3>
  <p class="text-muted">Terima kasih telah menggunakan sistem parkir kampus.</p>
  <a href="../../index.php" class="btn btn-secondary w-100">
    <i class="fas fa-arrow-left me-2"></i>Kembali ke Home
  </a>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
