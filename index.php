<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Parking</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #0041C2;
            --accent: #e74c3c;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/atas.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
        }
        
        .campus-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .campus-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        
        .campus-card .card-img-overlay {
            background: rgba(0,0,0,0.5);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .campus-card:hover .card-img-overlay {
            background: rgba(0,0,0,0.3);
        }
        
        .feature-icon {
            font-size: 2rem;
            color: var(--secondary);
            margin-bottom: 1rem;
        }
        
        .btn-campus {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 10px 25px;
        }
        
        .btn-campus:hover {
            background-color: var(--secondary);
        }
        
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-bottom: 5px solid orange;
        }
        
        footer {
            background-color: var(--primary);
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #0041C2;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-university me-2"></i>
                <span class="fw-bold">STTNF</span> - Park
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-light" href="form_login.php">
                            <i class="fas fa-sign-in-alt me-1"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">NURUL FIKRI PARKING</h1>
            <p class="lead mb-5">parkir lebih mudah dan aman</p>
        </div>
    </section>

    <!-- Campuses Section -->
    <section id="campuses" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Area parkir</h2>
                <p class="lead text-muted">pilih kampus mana</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card campus-card text-white h-100">
                        <img src="img/kampus_a.webp" class="card-img" alt="Campus A">
                        <div class="card-img-overlay">
                            <div class="text-center">
                                <h3 class="card-title display-6 fw-bold">Campus A</h3>
                                <p class="card-text">Main Campus - Downtown Location</p>
                                <a href="form_A.php" class="btn btn-campus mt-3">
                                    <i class="fas fa-car me-2"></i>
                                    <i class="fa-solid fa-motorcycle"></i>
                                     View Parking
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card campus-card text-white h-100">
                        <img src="img/kampus_b.jpg" class="card-img" alt="Campus B">
                        <div class="card-img-overlay">
                            <div class="text-center">
                                <h3 class="card-title display-6 fw-bold">Campus B</h3>
                                <p class="card-text">Science & Technology Campus</p>
                                <a href="form_B.php" class="btn btn-campus mt-3">
                                    <i class="fas fa-car me-2"></i> 
                                    <i class="fa-solid fa-motorcycle"></i>
                                    View Parking
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Fasilitas Parkir Kampus</h2>
                
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                            <i class="fa-solid fa-camera"></i>
                            </div>
                            <h4 class="card-title">CCTV 4K</h4>
                            <p class="card-text">Area Parkir Ini Dilengkapi CCTV 24 Jam – Untuk Keamanan Bersama</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <h4 class="card-title">Parking Box</h4>
                            <p class="card-text">Area Parkir Ini Dilengkapi marka/garis parkir sehingga rapih</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                            <i class="fa-solid fa-dungeon"></i>
                            </div>
                            <h4 class="card-title">Gate karcis</h4>
                            <p class="card-text">Area Parkir Ini Dilengkapi gate agar aman satu way out</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="fw-bold mb-4">kampus A</h2>
                    <div class="d-flex mb-4">
                        <i class="fas fa-map-marker-alt fa-2x text-secondary me-4 mt-1"></i>
                        <div>
                            <h5>Location</h5>
                            <p class="text-muted">Parking Services Building<br>JRPV+QH5, Jl. Setu Indah No.116, Tugu, Kec. Cimanggis, Kota Depok, Jawa Barat 16451</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <i class="fas fa-clock fa-2x text-secondary me-4 mt-1"></i>
                        <div>
                            <h5>Office Hours</h5>
                            <p class="text-muted">Monday-Friday: 8:00 AM - 5:00 PM</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <i class="fas fa-phone-alt fa-2x text-secondary me-4 mt-1"></i>
                        <div>
                            <h5>Contact</h5>
                            <p class="text-muted">Phone: 085777856756<br>Email: parking@universityNFSCC.id</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="fw-bold mb-4">kampus B</h2>
                    <div class="d-flex mb-4">
                        <i class="fas fa-map-marker-alt fa-2x text-secondary me-4 mt-1"></i>
                        <div>
                            <h5>Location</h5>
                            <p class="text-muted">Parking Services Building<br>Jalan Lenteng Agung Raya No.20 RT.5/RW.1 Lenteng Agung, Srengseng Sawah, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12640</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <i class="fas fa-clock fa-2x text-secondary me-4 mt-1"></i>
                        <div>
                            <h5>Office Hours</h5>
                            <p class="text-muted">Monday-Friday: 8:00 AM - 5:00 PM</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <i class="fas fa-phone-alt fa-2x text-secondary me-4 mt-1"></i>
                        <div>
                            <h5>Contact</h5>
                            <p class="text-muted">Phone: 085777856756<br>Email: parking@universityNFSCC.id</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 text-white">© 2023 University Parking Services. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="https://www.facebook.com/share/1DjyUkbqyM/" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/sttnf_official?igsh=MTh2a3FycGVobTE0cg==" class="text-white"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>