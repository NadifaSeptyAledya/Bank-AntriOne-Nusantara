<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Petugas</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
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

        /* LOGIN ROLE NAVBAR */

        .btn-login-nav {
            background: #0d6efd;
            color: white !important;
            border-radius: 12px;
            padding: 10px 20px;
            text-decoration: none;
            border: none;
            transition: .3s;
            font-weight: 500;
        }

        .btn-login-nav:hover {
            background: #084298;
            color: white !important;
        }

        /* LOGIN */

        .login-wrapper {
            min-height: 90vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
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

        .btn-login {
            background: #0B4EA2;
            color: white;
            border: none;
            border-radius: 12px;
            width: 100%;
            padding: 12px;
            transition: .3s;
        }

        .btn-login:hover {
            background: #083a79;
            color: white;
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
                        <a class="nav-link"
                            href="index.php">

                            Beranda

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="ambilAntrian.php">

                            Ambil Antrian

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="cekAntrian.php">

                            Cek Antrian

                        </a>
                    </li>

                      <li class="nav-item">
                        <a class="nav-link"
                        href="informasi.php">
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

    <!-- LOGIN -->
    <div class="login-wrapper">

        <div class="login-card">

            <h2 class="logo">
                Login Petugas
            </h2>

            <p class="sub">
                AntriOne Nusantara
            </p>

            <form action="aksi.php" method="POST">


                <div class="mb-3">

                    <label>Username</label>

                    <input type="text"
                        name="username"
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label>Password</label>

                    <input type="password"
                        name="password"
                        class="form-control"
                        required>

                </div>

                <button type="submit" name="login_petugas" class="btn btn-login">
                    Login
                </button>

            </form>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>