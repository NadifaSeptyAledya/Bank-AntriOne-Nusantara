<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Informasi - AntriOne Nusantara</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        /* =========================
   BODY
========================= */

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;

            background-image:
                linear-gradient(rgba(245, 249, 255, 0.82),
                    rgba(245, 249, 255, 0.82)),
                url('image/Background halaman utama.png');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* =========================
   NAVBAR
========================= */

        .navbar {
            border-radius: 0 0 20px 20px;
        }

        .nav-link {
            font-weight: 500;
            margin: 0 8px;
        }

        .nav-link:hover {
            color: #084298;
        }

        .btn-login {
            background: #084298;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
        }

        .btn-login:hover {
            background: #062c5f;
            color: white;
        }

        /* =========================
   HERO
========================= */

        .hero {
            padding: 80px 0 50px;
            text-align: center;
        }

        .hero h1 {
            color: #084298;
            font-weight: 700;
            font-size: 3rem;
        }

        .hero p {
            color: #666;
            max-width: 700px;
            margin: auto;
        }

        /* =========================
   CARD
========================= */

        .info-card {
            background: white;
            border-radius: 25px;
            padding: 35px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
            height: 100%;
            transition: .3s;
        }

        .info-card:hover {
            transform: translateY(-5px);
        }

        .info-card h3 {
            color: #084298;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .info-card ul {
            padding-left: 18px;
        }

        /* =========================
   FOOTER
========================= */

        .footer {
            background: #083a79;
            color: white;
            padding: 60px 0 20px;
            margin-top: 60px;
        }

        .footer-logo {
            font-weight: 700;
            font-size: 2rem;
        }

        .footer-desc {
            color: #d7e6ff;
        }

        .footer-title {
            font-weight: 600;
            margin-bottom: 15px;
        }

        .footer-link {
            list-style: none;
            padding: 0;
        }

        .footer-link li {
            margin-bottom: 10px;
            color: #d7e6ff;
        }

        .footer-line {
            border-color: rgba(255, 255, 255, .2);
        }

        .footer-bottom {
            text-align: center;
            color: #d7e6ff;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">

        <div class="container">

            <a class="navbar-brand fw-bold text-primary" href="index.php">

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
                        <a class="nav-link active" href="informasi.php">
                            Informasi
                        </a>
                    </li>

                </ul>


            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero">

        <div class="container">

            <h1>
                Informasi AntriOne Nusantara
            </h1>

            <p>
                Sistem antrian digital yang membantu nasabah memperoleh layanan bank secara lebih cepat, nyaman dan
                efisien.
            </p>

        </div>
    </section>

    <!-- INFORMASI -->
    <section class="pb-5">

        <div class="container">

            <div class="row g-4">

                <!-- TENTANG -->
                <div class="col-md-6">

                    <div class="info-card">

                        <h3>
                            Tentang AntriOne
                        </h3>

                        <p>
                            AntriOne Nusantara merupakan sistem antrian digital yang dirancang untuk membantu proses
                            layanan bank menjadi lebih tertata, cepat, dan efisien tanpa antre panjang.
                        </p>

                    </div>

                </div>

                <!-- JAM -->
                <div class="col-md-6">

                    <div class="info-card">

                        <h3>
                            Jam Operasional
                        </h3>

                        <ul>
                            <li>Senin – Jumat : 07.00 – 15.00</li>
                            <li>Sabtu – Minggu : Tutup</li>
                            <li>Hari Libur Nasional : Tutup</li>
                        </ul>

                    </div>

                </div>

                <!-- LAYANAN -->
                <div class="col-md-6">

                    <div class="info-card">

                        <h3>
                            Jenis Layanan
                        </h3>

                        <p><b>💰 Teller</b></p>

                        <ul>
                            <li>Setor Tunai</li>
                            <li>Tarik Tunai</li>
                            <li>Transfer</li>
                            <li>Pembayaran</li>
                        </ul>

                        <p><b>👩‍💼 Customer Service</b></p>

                        <ul>
                            <li>Pembukaan Rekening</li>
                            <li>Informasi Produk</li>
                            <li>Penggantian ATM</li>
                            <li>Keluhan Nasabah</li>
                        </ul>

                    </div>

                </div>

                <!-- CARA -->
                <div class="col-md-6">

                    <div class="info-card">

                        <h3>
                            Cara Menggunakan
                        </h3>

                        <ol>
                            <li>Login sebagai nasabah</li>
                            <li>Pilih layanan</li>
                            <li>Ambil nomor antrian</li>
                            <li>Pantau nomor dipanggil</li>
                            <li>Datang ke loket sesuai panggilan</li>
                        </ol>

                    </div>

                </div>

            </div>
        </div>

    </section>

    <!-- FOOTER -->
    <footer class="footer">

        <div class="container">

            <div class="row gy-4 justify-content-between">

                <div class="col-lg-5">

                    <h3 class="footer-logo">
                        AntriOne Nusantara
                    </h3>

                    <p class="footer-desc">
                        Sistem antrian digital bank yang membantu nasabah memperoleh layanan lebih cepat, nyaman dan
                        efisien.
                    </p>

                </div>

                <div class="col-lg-3">

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

                <div class="col-lg-4">

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