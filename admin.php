<?php
session_start();
include 'koneksi.php';

// CEK SESSION ADMIN
if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.php");
    exit;
}

// STATISTIK
$total    = mysqli_query($conn, "SELECT COUNT(*) as total FROM antrian");
$total    = mysqli_fetch_assoc($total)['total'];

$menunggu = mysqli_query($conn, "SELECT COUNT(*) as total FROM antrian WHERE status='Menunggu'");
$menunggu = mysqli_fetch_assoc($menunggu)['total'];

$dipanggil = mysqli_query($conn, "SELECT COUNT(*) as total FROM antrian WHERE status='Dipanggil'");
$dipanggil = mysqli_fetch_assoc($dipanggil)['total'];

$selesai  = mysqli_query($conn, "SELECT COUNT(*) as total FROM antrian WHERE status='Selesai'");
$selesai  = mysqli_fetch_assoc($selesai)['total'];

// DATA ANTRIAN
$data = mysqli_query(
    $conn,
    "SELECT antrian.*, nasabah.nama_nasabah, layanan.nama_layanan
FROM antrian
JOIN nasabah ON antrian.id_nasabah = nasabah.id_nasabah
JOIN layanan ON antrian.id_layanan = layanan.id_layanan
ORDER BY antrian.id_antrian DESC"
);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - AntriOne</title>

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
            background: rgba(255, 255, 255, .15);
            color: white;
        }

        .sidebar hr {
            border-color: rgba(255, 255, 255, .2);
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
            box-shadow: 0 5px 15px rgba(0, 0, 0, .07);
            transition: .3s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
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
            box-shadow: 0 5px 15px rgba(0, 0, 0, .07);
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

        .nomor-antrian {
            font-size: 1.1rem;
            font-weight: 700;
            color: #0B4EA2;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h4>AntriOne</h4>
        <p class="sub">Dashboard Admin</p>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="admin.php" class="nav-link active">
                    📊 Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="adminnasabah.php" class="nav-link">
                    👥 Data Nasabah
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

        <h3 class="fw-bold mb-1">Dashboard Admin</h3>
        <p class="text-muted mb-4">Selamat datang, <?= $_SESSION['admin'] ?> 👋</p>

        <!-- STATISTIK -->
        <div class="row g-3 mb-2">

            <div class="col-md-3">
                <div class="stat-card">
                    <h2 class="text-primary"><?= $total ?></h2>
                    <p>📋 Total Antrian</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-card">
                    <h2 class="text-warning"><?= $menunggu ?></h2>
                    <p>⏳ Menunggu</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-card">
                    <h2 class="text-primary"><?= $dipanggil ?></h2>
                    <p>📢 Dipanggil</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-card">
                    <h2 class="text-success"><?= $selesai ?></h2>
                    <p>✅ Selesai</p>
                </div>
            </div>

        </div>

        <!-- TABEL DATA ANTRIAN -->
        <div class="table-card">

            <h5 class="fw-bold mb-4">Data Semua Antrian</h5>

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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($data) > 0) {
                            $no = 1;
                            while ($d = mysqli_fetch_assoc($data)) {
                        ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td class="nomor-antrian"><?= $d['nomor_antrian'] ?></td>
                                    <td><?= $d['nama_nasabah'] ?></td>
                                    <td><?= $d['nama_layanan'] ?></td>
                                    <td><?= $d['loket'] ?? '-' ?></td>
                                    <td><?= $d['waktu_ambil'] ?></td>
                                    <td>
                                        <?php if ($d['status'] == 'Menunggu') { ?>
                                            <span class="badge bg-warning text-dark">Menunggu</span>
                                        <?php } elseif ($d['status'] == 'Dipanggil') { ?>
                                            <span class="badge bg-primary">Dipanggil</span>
                                        <?php } else { ?>
                                            <span class="badge bg-success">Selesai</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="aksi.php?hapus=<?= $d['id_antrian'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus antrian <?= $d['nomor_antrian'] ?>?')">
                                            🗑️ Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="8" class="text-muted py-4">
                                    Belum ada data antrian
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