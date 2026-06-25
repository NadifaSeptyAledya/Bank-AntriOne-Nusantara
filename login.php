<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login AntriOne</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            color: #333;

            background-image:
                linear-gradient(rgba(11, 78, 162, .72),
                    rgba(11, 78, 162, .72)),
                url('image/Background halaman utama.png');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* NAVBAR */

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

        .btn-login-nav {
            background: #0d6efd;
            color: white !important;
            border-radius: 12px;
            padding: 10px 22px;
            text-decoration: none;
            border: none;
        }

        .btn-login-nav:hover {
            background: #084298;
            color: white !important;
        }

        /* LOGIN AREA */

        .login-wrapper {
            min-height: 85vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        /* BOX */

        .login-box {
            background: white;
            width: 950px;
            max-width: 95%;
            padding: 45px;
            border-radius: 35px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .15);
        }

        .logo {
            color: #0B4EA2;
            font-weight: 700;
            font-size: 3rem;
            text-align: center;
        }

        .sub {
            color: #777;
            text-align: center;
            margin-bottom: 35px;
            font-size: 1.1rem;
        }

        /* CARD ROLE */

        .role-card {
            border: 2px solid #e6eefc;
            border-radius: 25px;
            padding: 30px;
            text-align: center;
            height: 100%;
            transition: .3s;
        }

        .role-card:hover {
            border-color: #0B4EA2;
            transform: translateY(-6px);
        }

        .role-card h4 {
            color: #0B4EA2;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .role-card p {
            color: #666;
            min-height: 90px;
        }

        .btn-role {
            background: #0B4EA2;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 10px 30px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
            transition: .3s;
        }

        .btn-role:hover {
            background: #083a79;
            color: white;
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

            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">

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

                <a href="login.php" class="btn-login-nav">
                    Login Role
                </a>

            </div>

        </div>

    </nav>

    <!-- LOGIN -->
    <div class="login-wrapper">

        <div class="login-box">

            <h2 class="logo">
                AntriOne Nusantara
            </h2>

            <p class="sub">
                Pilih jenis login sesuai dengan kebutuhan anda
            </p>

            <div class="row g-4">

                <!-- NASABAH -->
                <div class="col-md-4">
                    <div class="role-card">

                        <h4>Nasabah</h4>

                        <p>
                            Login untuk mengambil dan mengecek antrian.
                        </p>

                        <a href="login_nasabah.php"
                            class="btn-role">
                            Login
                        </a>

                    </div>
                </div>

                <!-- PETUGAS -->
                <div class="col-md-4">
                    <div class="role-card">

                        <h4>Petugas</h4>

                        <p>
                            Login untuk memanggil dan mengelola antrian.
                        </p>

                        <a href="login_petugas.php"
                            class="btn-role">
                            Login
                        </a>

                    </div>
                </div>

                <!-- ADMIN -->
                <div class="col-md-4">
                    <div class="role-card">

                        <h4>Admin</h4>

                        <p>
                            Login untuk mengatur sistem dan data.
                        </p>

                        <a href="login_admin.php"
                            class="btn-role">
                            Login
                        </a>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>