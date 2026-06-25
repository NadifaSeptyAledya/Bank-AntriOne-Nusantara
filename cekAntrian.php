<?php

include 'koneksi.php';

$query = mysqli_query(
    $conn,
    "SELECT antrian.*, layanan.nama_layanan
FROM antrian
JOIN layanan
ON antrian.id_layanan = layanan.id_layanan
ORDER BY id_antrian ASC"
);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cek Antrian</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;

            background-image:
                linear-gradient(rgba(245, 249, 255, 0.82),
                    rgba(245, 249, 255, 0.82)),
                url('image/Background halaman utama.png');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;

            min-height: 100vh;
        }

        /* CARD */

        .card-antrian {
            background: white;
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .15);
            margin: auto;
            margin-top: 80px;
            margin-bottom: 80px;
        }

        .judul {
            text-align: center;
            color: #0B4EA2;
            font-weight: 700;
        }

        .subjudul {
            text-align: center;
            color: #777;
            margin-bottom: 30px;
        }

        /* TABLE */

        .table th {
            background: #0B4EA2;
            color: white;
        }

        .table {
            border-radius: 15px;
            overflow: hidden;
        }

        /* FOOTER */

        .footer {
            background: #0B4EA2;
            color: white;
            padding: 60px 0 20px;
            margin-top: 50px;
        }

        .footer-logo {
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .footer-desc {
            color: #d7e6ff;
            line-height: 1.9;
            max-width: 330px;
        }

        .footer-title {
            font-weight: 600;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .footer-link {
            list-style: none;
            padding: 0;
        }

        .footer-link li {
            margin-bottom: 12px;
        }

        .footer-link a {
            color: #d7e6ff;
            text-decoration: none;
            transition: .3s;
        }

        .footer-link a:hover {
            color: white;
            padding-left: 6px;
        }

        .footer-line {
            border-color: rgba(255, 255, 255, .15);
            margin: 35px 0 20px;
        }

        .footer-bottom {
            text-align: center;
            color: #c7dcff;
        }

        /* =========================
   NAVBAR
========================= */

        .navbar {
            border-radius: 0 0 20px 20px;
        }

        .navbar-brand {
            font-size: 1.4rem;
        }

        .nav-link {
            font-weight: 500;
            margin: 0 8px;
            transition: .3s;
        }

        .nav-link:hover {
            color: #0d6efd;
        }





        /* BUTTON LOGIN */

        .btn-login {
            background: #0d6efd;
            color: white;
            border-radius: 12px;
            padding: 10px 20px;
            border: none;
            transition: .3s;
        }

        .btn-login:hover {
            background: #084298;
            color: white;
        }
    </style>

</head>

<body>

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

            </div>

        </div>
    </nav>

    <div class="container">

        <div class="card-antrian">

            <h2 class="judul">
                Cek Antrian
            </h2>

            <p class="subjudul">
                Daftar antrian nasabah saat ini
            </p>

            <div class="table-responsive">

                <table class="table table-bordered table-hover text-center align-middle">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Nomor Antrian</th>
                            <th>Layanan</th>
                            <th>Waktu Ambil</th>
                            <th>Status</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        if (mysqli_num_rows($query) > 0) {

                            $no = 1;

                            while ($d = mysqli_fetch_array($query)) {

                        ?>

                                <tr>

                                    <td>
                                        <?= $no++; ?>
                                    </td>

                                    <td>
                                        <?= $d['nomor_antrian']; ?>
                                    </td>

                                    <td>
                                        <?= $d['nama_layanan']; ?>
                                    </td>

                                    <td>
                                        <?= $d['waktu_ambil']; ?>
                                    </td>

                                    <td>
                                        <?= $d['status']; ?>
                                    </td>

                                </tr>

                            <?php

                            }
                        } else {

                            ?>

                            <tr>

                                <td colspan="5"
                                    class="text-center text-muted py-4">

                                    Belum ada data antrian

                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>


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

</body>

</html>