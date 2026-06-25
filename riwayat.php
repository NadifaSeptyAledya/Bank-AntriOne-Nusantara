<?php
session_start();
include 'koneksi.php';

// CEK SESSION PETUGAS
if(!isset($_SESSION['petugas'])){
    header("Location: login_petugas.php");
    exit;
}

// AMBIL DATA RIWAYAT (STATUS SELESAI)
$query = mysqli_query($conn,
"SELECT antrian.*, nasabah.nama_nasabah, layanan.nama_layanan
FROM antrian
JOIN nasabah ON antrian.id_nasabah = nasabah.id_nasabah
JOIN layanan ON antrian.id_layanan = layanan.id_layanan
WHERE antrian.status = 'Selesai'
ORDER BY antrian.id_antrian DESC");

// HITUNG STATISTIK
$total_selesai = mysqli_query($conn,
"SELECT COUNT(*) as total FROM antrian WHERE status='Selesai'");
$total_selesai = mysqli_fetch_assoc($total_selesai)['total'];

$total_menunggu = mysqli_query($conn,
"SELECT COUNT(*) as total FROM antrian WHERE status='Menunggu'");
$total_menunggu = mysqli_fetch_assoc($total_menunggu)['total'];

$total_dipanggil = mysqli_query($conn,
"SELECT COUNT(*) as total FROM antrian WHERE status='Dipanggil'");
$total_dipanggil = mysqli_fetch_assoc($total_dipanggil)['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Antrian - AntriOne Nusantara</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: #eef2f7;
            font-family: 'Poppins', sans-serif;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            height: 100vh;
            background: #0B4EA2;
            position: fixed;
            top: 0;
            left: 0;
            padding: 30px 20px;
            color: white;
            z-index: 100;
        }

        .sidebar h4 {
            font-weight: 700;
            margin-bottom: 5px;
        }

        .sidebar .sub {
            font-size: 0.8rem;
            color: #d7e6ff;
            margin-bottom: 30px;
        }

        .sidebar .nav-link {
            color: #d7e6ff;
            border-radius: 12px;
            padding: 10px 15px;
            margin-bottom: 5px;
            font-weight: 500;
            transition: .3s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,.15);
            color: white;
        }

        .sidebar hr {
            border-color: rgba(255,255,255,.2);
        }

        /* CONTENT */
        .content {
            margin-left: 240px;
            padding: 30px;
        }

        /* STAT CARD */
        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,.07);
        }

        .stat-card h2 {
            font-weight: 700;
            font-size: 2.5rem;
            margin: 0;
        }

        .stat-card p {
            color: #777;
            margin: 5px 0 0;
            font-size: 0.9rem;
        }

        /* TABLE CARD */
        .table-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,.07);
            margin-top: 25px;
        }

        .table thead th {
            background: #0B4EA2;
            color: white;
            font-weight: 500;
        }

        .table {
            border-radius: 12px;
            overflow: hidden;
        }

        .badge-selesai {
            background: #198754;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h4>AntriOne</h4>
        <p class="sub">Dashboard Petugas</p>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="petugas.php" class="nav-link">
                    📋 Kelola Antrian
                </a>
            </li>
            <li class="nav-item">
                <a href="riwayat.php" class="nav-link active">
                    📜 Riwayat Antrian
                </a>
            </li>
            <li class="nav-item mt-3">
                <a href="logout.php" class="nav-link text-warning">
                    🚪 Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <h3 class="fw-bold mb-1">Riwayat Antrian</h3>
        <p class="text-muted mb-4">Data seluruh antrian yang telah selesai dilayani</p>

        <!-- STATISTIK -->
        <div class="row g-3 mb-4">

            <div class="col-md-4">
                <div class="stat-card">
                    <h2 class="text-success"><?= $total_selesai ?></h2>
                    <p>✅ Total Selesai</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-card">
                    <h2 class="text-warning"><?= $total_menunggu ?></h2>
                    <p>⏳ Masih Menunggu</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-card">
                    <h2 class="text-primary"><?= $total_dipanggil ?></h2>
                    <p>📢 Sedang Dipanggil</p>
                </div>
            </div>

        </div>

        <!-- TABEL RIWAYAT -->
        <div class="table-card">

            <h5 class="fw-bold mb-4">Daftar Antrian Selesai</h5>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Antrian</th>
                            <th>Nama Nasabah</th>
                            <th>Layanan</th>
                            <th>Loket</th>
                            <th>Waktu Ambil</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query) > 0){
                            $no = 1;
                            while($d = mysqli_fetch_assoc($query)){
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><strong><?= $d['nomor_antrian'] ?></strong></td>
                                <td><?= $d['nama_nasabah'] ?></td>
                                <td><?= $d['nama_layanan'] ?></td>
                                <td><?= $d['loket'] ?? '-' ?></td>
                                <td><?= $d['waktu_ambil'] ?></td>
                                <td><span class="badge-selesai">Selesai</span></td>
                            </tr>
                        <?php
                            }
                        }else{
                        ?>
                            <tr>
                                <td colspan="7" class="text-muted py-4">
                                    Belum ada antrian yang selesai
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>