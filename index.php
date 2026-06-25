<?php
session_start();
include 'koneksi.php';

/* =========================
   ANTRIAN YANG DIPANGGIL
========================= */

$query = mysqli_query(
    $conn,
    "SELECT a.*, l.nama_layanan
     FROM antrian a
     JOIN layanan l
     ON a.id_layanan = l.id_layanan
     WHERE a.status='Dipanggil'
     ORDER BY a.id_antrian DESC
     LIMIT 1"
);

if(!$query){
    die(mysqli_error($conn));
}

$data = mysqli_fetch_assoc($query);

if(!$data){

    $data = [
        'nomor_antrian' => '-',
        'id_layanan' => '-',
        'nama_layanan' => '-'
    ];

}

$nomor = $data['nomor_antrian'];
$layanan = $data['nama_layanan'];

if($data['id_layanan'] == 1){
    $loket = "1";
}elseif($data['id_layanan'] == 2){
    $loket = "2";
}else{
    $loket = "-";
}

/* =========================
   TOTAL ANTRIAN
========================= */

$result_total = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total
     FROM antrian
     WHERE status != 'Selesai'"
);

$total_antrian =
mysqli_fetch_assoc($result_total)['total'] ?? 0;

/* =========================
   LOKET AKTIF
========================= */

$result_loket = mysqli_query(
    $conn,
    "SELECT COUNT(DISTINCT id_layanan) AS total
     FROM antrian
     WHERE status='Dipanggil'"
);

$loket_aktif =
mysqli_fetch_assoc($result_loket)['total'] ?? 0;

$rata_waktu = 15;
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AntriOne Nusantara</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>

<?php if(isset($_SESSION['nasabah'])){ ?>
<div class="container mt-3">
    <div class="alert alert-success">
        Selamat datang,
        <strong><?= htmlspecialchars($_SESSION['nasabah']) ?></strong>
    </div>
</div>
<?php } ?>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">

            <a class="navbar-brand fw-bold text-primary" href="#">
                AntriOne Nusantara
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="ambilAntrian.php">
                            Ambil Antrian
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="cekAntrian.php">
                            Cek Antrian
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="informasi.php">
                            Informasi
                        </a>
                    </li>

                </ul>

                <a href="login.php" class="btn btn-login">
                    Login
                </a>
            </div>

        </div>
    </nav>

    <!-- HERO -->
    <section class="hero py-5">

        <div class="container">

            <div class="row align-items-center">

                <!-- KIRI -->
                <div class="col-lg-4 mb-4">

                    <h1 class="hero-title">
                        AntriOne Nusantara
                    </h1>

                    <p class="hero-text">
                        Ambil nomor antrian dengan mudah,
                        cepat, dan tanpa antre panjang.
                    </p>
                    <a href="ambilAntrian.php"
                        class="btn btn-primary btn-lg me-2">

                        Ambil Antrian

                    </a>

                    <a href="cekAntrian.php"
                        class="btn btn-outline-primary btn-lg">

                        Cek Antrian

                    </a>

                </div>

                <!-- TENGAH -->
                <div class="col-lg-4 mb-4">

                    <div class="queue-card text-center">

                        <h5 class="badge-title">
                            NOMOR DIPANGGIL
                        </h5>

                        <h1 class="queue-number">
                            <?= $nomor ?>
                        </h1>
                        <div class="d-flex justify-content-center align-items-center gap-3">

                            <h4 class="mb-0">
                                LOKET <?= htmlspecialchars($loket) ?>
                            </h4>

                            <span class="teller-badge">
                                <?= htmlspecialchars($layanan) ?>
                            </span>

                        </div>

                        <p class="mt-3 text-muted">
                            Harap menuju loket yang disebutkan
                        </p>

                    </div>

                </div>

                <!-- KANAN -->
                <div class="col-lg-4">

                    <div class="table-card">

                        <h4 class="mb-3">
                            Antrian Saat Ini
                        </h4>

                        <table class="table">

                            <thead>
                                <tr>
                                    <th>Layanan</th>
                                    <th>Nomor</th>
                                    <th>Loket</th>
                                </tr>
                            </thead>

                            <tbody>

<?php

$query = mysqli_query(
    $conn,
    "SELECT
        a.nomor_antrian,
        a.id_layanan,
        l.nama_layanan
     FROM antrian a
     JOIN layanan l
     ON a.id_layanan = l.id_layanan
     ORDER BY a.id_antrian DESC"
);

while($row = mysqli_fetch_assoc($query)){

?>

<tr>

    <td>
        <?= htmlspecialchars($row['nama_layanan']) ?>
    </td>

    <td>
        <?= htmlspecialchars($row['nomor_antrian']) ?>
    </td>

    <td>
        <?php
        if($row['id_layanan'] == 1){
            echo "Loket 1";
        }elseif($row['id_layanan'] == 2){
            echo "Loket 2";
        }else{
            echo "-";
        }
        ?>
    </td>

</tr>

<?php } ?>

</tbody>

                        </table>

                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- LAYANAN -->
    <section class="pb-5">

        <div class="container">

            <h3 class="text-center fw-bold mb-4">
                Pilih Jenis Layanan
            </h3>

            <div class="row">

                <div class="col-md-6 mb-4">

                    <div class="service-card">

                        <h2>
                            💰 Teller
                        </h2>

                        <p>
                            Setor tunai, tarik tunai,
                            transfer dan pembayaran.
                        </p>

                        <button class="btn btn-primary">
                            Ambil Nomor
                        </button>

                    </div>

                </div>

                <div class="col-md-6 mb-4">

                    <div class="service-card">

                        <h2>
                            👩‍💼 Customer Service
                        </h2>

                        <p>
                            Pembukaan rekening,
                            kartu ATM dan informasi produk.
                        </p>

                        <button class="btn btn-primary">
                            Ambil Nomor
                        </button>

                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- STATISTIK -->
    <section class="pb-5">

        <div class="container">

            <div class="row">

                <div class="col-md-4 mb-3">
                    <div class="stats-card text-center">
                        <h5>Sisa Antrian</h5>
                        <h1><?= $total_antrian ?></h1>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="stats-card text-center">
                        <h5>Loket Aktif</h5>
                        <h1><?= $loket_aktif ?></h1>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="stats-card text-center">
                        <h5>Rata-rata Tunggu</h5>
                        <h1><?= $rata_waktu ?> Menit</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">

        <div class="container">

            <div class="row gy-4 justify-content-between">

                <!-- BRAND -->
                <div class="col-lg-5 col-md-12">

                    <h3 class="footer-logo">
                        AntriOne Nusantara
                    </h3>

                    <p class="footer-desc">
                        Sistem antrian digital bank yang membantu
                        nasabah mendapatkan layanan lebih cepat,
                        nyaman, dan efisien.
                    </p>

                </div>

                <!-- LAYANAN -->
                <div class="col-lg-3 col-md-6">

                    <h6 class="footer-title">
                        Layanan
                    </h6>

                    <ul class="footer-link">

                        <li>• Teller</li>
                        <li>• Customer Service</li>
                        <li>• Ambil Antrian</li>
                        <li>• Cek Antrian</li>

                    </ul>

                </div>

                <!-- INFORMASI -->
                <div class="col-lg-4 col-md-6">

                    <h6 class="footer-title">
                        Informasi
                    </h6>

                    <ul class="footer-link">

                        <li>Jam Operasional : Senin - Jum'at 07.00 - 15.00</li>
                        <li>Lokasi Bank : Surabaya</li>
                        <li>Kontak : 0000-0000</li>

                    </ul>

                </div>

            </div>

            <hr class="footer-line">

            <div class="footer-bottom">

                <p>
                    © 2026 AntriOne Nusantara | Bank Nusantara
                </p>

            </div>

        </div>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>