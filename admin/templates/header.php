<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Parkir Kampus</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
  <!-- Bootstrap 5 CSS via CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Navbar Custom Styling */
    .navbar-custom {
      background-color: #0d6efd; /* Biru terang */
    }

    .navbar-custom .nav-link, .navbar-custom .navbar-brand {
      color: #fff;
    }

    .navbar-custom .nav-link:hover {
      color: #ffc107; /* Kuning Oranye */
    }

    /* Customizing Sidebar */
    .main-sidebar {
      background-color: #fd7e14 !important; /* Oranye */
    }

    .brand-link {
      background-color: #ffc107 !important;
      color: #212529 !important;
      font-weight: bold;
    }

    .navbar-custom .navbar-toggler-icon {
      background-color: #fff;
    }

    /* Customizing Sidebar Nav */
    .nav-sidebar .nav-link.active {
      background-color: #ffc107 !important;
      color: #212529 !important;
    }

    .nav-sidebar .nav-link:hover {
      background-color: #ffa94d !important;
      color: white !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php">
        <i class="fas fa-parking me-2"></i> Parkir Kampus
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="../index.php"><i class="fas fa-home me-1"></i>Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../kendaraan/index.php"><i class="fas fa-car me-1"></i>Kendaraan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../transaksi/index.php"><i class="fas fa-receipt me-1"></i>Transaksi</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="../index.php" class="brand-link text-center">
      <span class="brand-text">Parkir Kampus</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
          <li class="nav-item">
            <a href="../kendaraan/index.php" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>Kendaraan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../transaksi/index.php" class="nav-link">
              <i class="nav-icon fas fa-receipt"></i>
              <p>Transaksi Parkir</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper p-4">
    <!-- Your page content here -->
    <h1>Welcome to the Parkir Kampus Dashboard</h1>
    <p>Manage your parking data with ease!</p>
  </div> <!-- /.content-wrapper -->

</div> <!-- ./wrapper -->

<!-- jQuery (still required for AdminLTE) -->
<script src="../adminlte/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 5 JS Bundle via CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE JS -->
<script src="../adminlte/dist/js/adminlte.min.js"></script>

</body>
</html>
