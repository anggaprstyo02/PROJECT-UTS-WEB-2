<?php
// Proses login
$error = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['user'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'admin123') {
        $success = true;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #3498db;
            --secondary-orange: #f39c12;
        }

        body {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7));
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
        }

        .login-card {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: 2px solid orange;
            overflow: hidden;
        }

        .card-header {
            background-color: var(--primary-blue);
            color: white;
            text-align: center;
            padding: 20px;
        }

        .card-body {
            padding: 30px;
            background-color: white;
        }

        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }

        .btn-login {
            background-color: var(--secondary-orange);
            border: none;
            width: 100%;
            padding: 12px;
            font-weight: 600;
        }

        .btn-login:hover {
            background-color: #e67e22;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="login-card card">
            <div class="card-header">
                <h3>STTNF PARK LOG</h3>
                <p class="mb-0">Silahkan Isi Form Berikut</p>
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="user" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="user" name="user" placeholder="Enter your user" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-login btn-primary mb-3">Login</button>
                    <a href="coba.php" class="btn btn-login btn-primary mb-3">Back</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Error -->
    <div class="modal fade" id="loginErrorModal" tabindex="-1" aria-labelledby="loginErrorModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-danger">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title"><i class="bi bi-x-circle-fill"></i> Login Gagal</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-danger">
            <?php echo $error; ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Success -->
    <div class="modal fade" id="loginSuccessModal" tabindex="-1" aria-labelledby="loginSuccessModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-success">
          <div class="modal-header bg-success text-white">
            <h5 class="modal-title"><i class="bi bi-check-circle-fill"></i> Login Berhasil</h5>
          </div>
          <div class="modal-body text-success">
            Selamat datang, admin! Mengarahkan ke dashboard...
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        <?php if (!empty($error)): ?>
            const errorModal = new bootstrap.Modal(document.getElementById('loginErrorModal'));
            errorModal.show();
        <?php elseif ($success): ?>
            const successModal = new bootstrap.Modal(document.getElementById('loginSuccessModal'));
            successModal.show();
            // Redirect after 2 seconds
            setTimeout(() => {
                window.location.href = "./admin/adminlte/admin.php";
            }, 2000);
        <?php endif; ?>
    </script>

</body>
</html>
