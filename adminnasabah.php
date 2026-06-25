<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['admin'])){
    header("Location: login_admin.php");
    exit;
}

$data = mysqli_query($conn,
"SELECT * FROM nasabah ORDER BY id_nasabah DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nasabah - AntriOne</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { background: #eef2f7; font-family: 'Poppins', sans-serif; }

        .sidebar {
            width: 240px;
            height: 100vh;
            background: #0B4EA2;
            position: fixed;
            top: 0; left: 0;
            padding: 30px 20px;
            color: white;
            z-index: 100;
        }

        .sidebar h4 { font-weight: 700; margin-bottom: 5px; }
        .sidebar .sub { font-size: 0.8rem; color: #d7e6ff; margin-bottom: 30px; }

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

        .sidebar hr { border-color: rgba(255,255,255,.2); }

        .content { margin-left: 240px; padding: 30px; }

        .table-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,.07);
        }

        .table thead th {
            background: #0B4EA2;
            color: white;
            font-weight: 500;
        }

        .table { border-radius: 12px; overflow: hidden; }
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
                <a href="admin.php" class="nav-link">
                    📊 Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="admin_nasabah.php" class="nav-link active">
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

        <h3 class="fw-bold mb-1">Data Nasabah</h3>
        <p class="text-muted mb-4">Daftar seluruh nasabah terdaftar</p>

        <div class="table-card">

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Nasabah</th>
                            <th>No HP</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($data) > 0){
                            $no = 1;
                            while($d = mysqli_fetch_assoc($data)){
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $d['nama_nasabah'] ?></td>
                                <td><?= $d['no_hp'] ?></td>
                            
                            </tr>
                        <?php
                            }
                        }else{
                        ?>
                            <tr>
                                <td colspan="4" class="text-muted py-4">
                                    Belum ada data nasabah
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