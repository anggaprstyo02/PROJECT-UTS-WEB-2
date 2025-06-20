<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "dbparkir");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$konfirmasiData = null;

// Proses simpan data saat form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama   = $_POST['fullName'];
    $hp     = $_POST['phone'];
    $email  = $_POST['email'];
    $plat   = $_POST['licensePlate'];
    $merk   = $_POST['vehicleBrand'];
    $jenis  = $_POST['vehicleType'];
    $biaya  = intval($_POST['parkingCost']);
    $area_parkir_id = intval($_POST['areaParkir']);
    $tahun_beli = intval($_POST['tahunBeli']);

    // Cek jenis kendaraan
    $sql_jenis = "SELECT id FROM jenis WHERE nama = '$jenis'";
    $result_jenis = mysqli_query($koneksi, $sql_jenis);
    if (mysqli_num_rows($result_jenis) > 0) {
        $row_jenis = mysqli_fetch_assoc($result_jenis);
        $jenis_kendaraan_id = $row_jenis['id'];
    } else {
        echo "Jenis kendaraan tidak valid.";
        exit();
    }

    // Simpan ke tabel pengunjung
    $sql_pengunjung = "INSERT INTO pengunjung (nama, no_hp, email) VALUES ('$nama', '$hp', '$email')";
    mysqli_query($koneksi, $sql_pengunjung);
    $id_pengunjung = mysqli_insert_id($koneksi);

    // Simpan ke tabel kendaraan (menggunakan pemilik_id)
    $sql_kendaraan = "INSERT INTO kendaraan (nopol, merk, pemilik_id, jenis_id, pengunjung_id, thn_beli) 
                    VALUES ('$plat', '$merk', '$id_pengunjung', '$jenis_kendaraan_id', '$id_pengunjung', '$tahun_beli')";
    mysqli_query($koneksi, $sql_kendaraan);
    $id_kendaraan = mysqli_insert_id($koneksi);

    // Simpan ke tabel transaksi
    $sql_parkir = "INSERT INTO transaksi (kendaraan_id, tanggal, mulai, akhir, keterangan, biaya, area_parkir_id) 
                   VALUES ('$id_kendaraan', CURDATE(), '00:00:00', '01:00:00', 'Parkir di Kampus A', '$biaya', '$area_parkir_id')";
    mysqli_query($koneksi, $sql_parkir);

    // Ambil nama area untuk konfirmasi
    $query_area = mysqli_query($koneksi, "SELECT nama FROM area_parkir WHERE id = $area_parkir_id");
    $nama_area = ($row = mysqli_fetch_assoc($query_area)) ? $row['nama'] : "Area Tidak Diketahui";

    // Data untuk ditampilkan kembali
    $konfirmasiData = [
        "Nama" => $nama,
        "No HP" => $hp,
        "Email" => $email,
        "Plat Nomor" => $plat,
        "Merk Kendaraan" => $merk,
        "Jenis Kendaraan" => $jenis,
        "Area Parkir" => $nama_area,
        "Biaya Parkir Awal" => "Rp " . number_format($biaya, 0, ',', '.'),
        "Tahun Beli" => $tahun_beli
    ];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reservasi Parkir Kampus A</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var vehicleTypeSelect = document.getElementById('vehicleType');
            var parkingCostInput = document.getElementById('parkingCost');
            if (vehicleTypeSelect) {
                vehicleTypeSelect.addEventListener('change', function () {
                    var biaya = (this.value === 'Mobil') ? 5000 : 3000;
                    parkingCostInput.value = biaya;
                });
            }
        });
    </script>
</head>
<body>
<main class="container my-5">
    <div class="col-lg-8 mx-auto">

        <?php if ($konfirmasiData): ?>
            <h2 class="mb-4">Reservasi Berhasil!</h2>
            <div class="alert alert-success">Data berhasil disimpan ke database. Berikut detailnya:</div>
            <ul class="list-group mb-4">
                <?php foreach ($konfirmasiData as $label => $value): ?>
                    <li class="list-group-item"><strong><?= $label ?>:</strong> <?= htmlspecialchars($value) ?></li>
                <?php endforeach; ?>
            </ul>
            <a href="index.php" class="btn btn-primary">Kembali ke Home</a>
        <?php else: ?>

            <h2 class="mb-4">Form Reservasi Parkir Kampus A</h2>
            <form method="POST" action="">

                <!-- Informasi Pengunjung -->
                <fieldset class="mb-4">
                    <legend>Informasi Pengunjung</legend>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No HP</label>
                        <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{10,15}" inputmode="numeric" required>
                        <small class="form-text text-muted">Hanya angka, antara 10 hingga 15 digit.</small>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </fieldset>

                <!-- Informasi Kendaraan -->
                <fieldset class="mb-4">
                    <legend>Informasi Kendaraan</legend>
                    <div class="mb-3">
                        <label for="licensePlate" class="form-label">Plat Nomor</label>
                        <input type="text" class="form-control" id="licensePlate" name="licensePlate" required>
                    </div>
                    <div class="mb-3">
                        <label for="vehicleBrand" class="form-label">Merk Kendaraan</label>
                        <input type="text" class="form-control" id="vehicleBrand" name="vehicleBrand" required>
                    </div>
                    <div class="mb-3">
                        <label for="vehicleType" class="form-label">Jenis Kendaraan</label>
                        <select class="form-select" id="vehicleType" name="vehicleType" required>
                            <option value="" disabled selected>Pilih Jenis</option>
                            <?php
                            $jenis_result = mysqli_query($koneksi, "SELECT nama FROM jenis");
                            while ($jenis = mysqli_fetch_assoc($jenis_result)) {
                                echo "<option value='{$jenis['nama']}'>{$jenis['nama']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tahunBeli" class="form-label">Tahun Beli</label>
                        <input type="number" class="form-control" id="tahunBeli" name="tahunBeli" min="1980" max="<?= date('Y') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="areaParkir" class="form-label">Area Parkir</label>
                        <select class="form-select" id="areaParkir" name="areaParkir" required>
                            <option value="" disabled selected>Pilih Area</option>
                            <?php
                            $area_result = mysqli_query($koneksi, "SELECT id, nama FROM area_parkir WHERE kampus_id = 4");
                            while ($area = mysqli_fetch_assoc($area_result)) {
                                echo "<option value='{$area['id']}'>{$area['nama']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </fieldset>

                <!-- Biaya Parkir -->
                <fieldset class="mb-4">
                    <legend>Biaya Parkir</legend>
                    <div class="mb-3">
                        <label for="parkingCost" class="form-label">Biaya</label>
                        <input type="text" class="form-control" id="parkingCost" name="parkingCost" value="0" readonly>
                    </div>
                </fieldset>

                <button type="submit" class="btn btn-primary w-100">Reservasi</button>
            </form>

        <?php endif; ?>

    </div>
</main>
</body>
</html>
