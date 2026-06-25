<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrasi Nasabah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background:
                linear-gradient(rgba(11, 78, 162, .78),
                    rgba(11, 78, 162, .78)),
                url('image/Background halaman utama.png');

            background-size: cover;
            background-position: center;
            min-height: 100vh;
            margin: 0;
        }

        /* NAVBAR */

        .navbar {
            border-radius: 0 0 20px 20px;
        }

        .nav-link {
            font-weight: 500;
            margin: 0 8px;
        }

        .nav-link:hover {
            color: #0d6efd;
        }

        .btn-login-nav {
            background: #0d6efd;
            color: white !important;
            border-radius: 12px;
            padding: 10px 20px;
            text-decoration: none;
        }

        .btn-login-nav:hover {
            background: #084298;
        }

        /* REGISTER */

        .register-wrapper {
            min-height: 90vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-card {
            width: 450px;
            background: white;
            padding: 35px;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .15);
        }

        .logo {
            text-align: center;
            color: #0B4EA2;
            font-weight: 700;
        }

        .sub {
            text-align: center;
            color: #777;
            margin-bottom: 25px;
        }

        .btn-register {
            background: #0B4EA2;
            color: white;
            border: none;
            border-radius: 12px;
            width: 100%;
            padding: 12px;
        }

        .btn-register:hover {
            background: #083a79;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">

        <div class="container">

            <a class="navbar-brand fw-bold text-primary"
                href="index.php">
                AntriOne Nusantara
            </a>

            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse"
                id="menu">

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

                <a href="login.php"
                    class="btn btn-login-nav">
                    Login Role
                </a>

            </div>

        </div>

    </nav>

    <!-- REGISTER -->
    <div class="register-wrapper">

        <div class="register-card">

            <h2 class="logo">
                Registrasi Nasabah
            </h2>

            <p class="sub">
                AntriOne Nusantara
            </p>

            <?php if(isset($_GET['error']) && $_GET['error']=="exists"){ ?>
                <div class="alert alert-danger">
                    Nomor HP sudah terdaftar.
                </div>
            <?php } ?>

            <form action="aksi.php" method="POST">

                <div class="mb-3">
                    <label>Nama Nasabah</label>

                    <input
                        type="text"
                        name="nama_nasabah"
                        class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label>No Telepon</label>

                    <input
                        type="text"
                        name="no_hp"
                        class="form-control"
                        required>
                </div>

                <button
                    type="submit"
                    name="registrasi_nasabah"
                    class="btn btn-register">

                    Registrasi

                </button>

            </form>

            <div class="text-center mt-3">

                Sudah punya akun?

                <a href="login_nasabah.php">
                    Login di sini
                </a>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>