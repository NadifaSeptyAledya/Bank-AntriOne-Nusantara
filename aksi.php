<?php

session_start();
include 'koneksi.php';



// ====================================
// REGISTRASI NASABAH
// ====================================

if(isset($_POST['registrasi_nasabah'])){

    $nama = mysqli_real_escape_string(
        $conn,
        trim($_POST['nama_nasabah'])
    );

    $hp = mysqli_real_escape_string(
        $conn,
        trim($_POST['no_hp'])
    );

    // cek nomor hp sudah ada atau belum
    $cek = mysqli_query(
        $conn,
        "SELECT id_nasabah
         FROM nasabah
         WHERE no_hp='$hp'"
    );

    if(mysqli_num_rows($cek) > 0){

        header("Location: registrasi.php?error=exists");
        exit;

    }

    $insert = mysqli_query(
        $conn,
        "INSERT INTO nasabah
        (nama_nasabah,no_hp)
        VALUES
        ('$nama','$hp')"
    );

    if($insert){

        $_SESSION['nasabah'] = $nama;
        $_SESSION['id_nasabah'] = mysqli_insert_id($conn);

        header("Location: index.php");
        exit;

    }else{

        die("Gagal registrasi : " . mysqli_error($conn));

    }
}


// ====================================
// LOGIN ADMIN
// ====================================

if(isset($_POST['login_admin'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
    "SELECT * FROM admin
    WHERE username='$username'
    AND password='$password'");

    if(mysqli_num_rows($query) > 0){
        $_SESSION['admin'] = $username;
        header("Location: admin.php");
        exit;
    }else{
        header("Location: login_admin.php?error=1");
        exit;
    }

}



// ====================================
// LOGIN PETUGAS
// ====================================

if(isset($_POST['login_petugas'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
    "SELECT * FROM petugas
    WHERE username='$username'
    AND password='$password'");

    if(mysqli_num_rows($query) > 0){
        $_SESSION['petugas'] = $username;
        header("Location: petugas.php");
        exit;
    }else{
        header("Location: login_petugas.php?error=1");
        exit;
    }

}



// ====================================
// LOGIN NASABAH
// ====================================

if(isset($_POST['login_nasabah'])){

    $nama = trim($_POST['nama_nasabah']);
    $hp   = trim($_POST['no_hp']);

    $query = mysqli_query(
        $conn,
        "SELECT * FROM nasabah
         WHERE nama_nasabah='$nama'
         AND no_hp='$hp'"
    );

    if(mysqli_num_rows($query) > 0){

        $row = mysqli_fetch_assoc($query);

        $_SESSION['nasabah'] = $row['nama_nasabah'];
        $_SESSION['id_nasabah'] = $row['id_nasabah'];

        header("Location: ambilAntrian.php");
        exit;

    }else{

        header("Location: login_nasabah.php?error=1");
        exit;

    }
}


// ====================================
// AMBIL ANTRIAN
// ====================================

if(isset($_POST['ambil_antrian'])){

    session_start();

    if(!isset($_SESSION['nasabah']) || !isset($_SESSION['id_nasabah'])){
        header("Location: login_nasabah.php");
        exit;
    }

    $layanan    = mysqli_real_escape_string($conn, $_POST['layanan']);
    $id_nasabah = $_SESSION['id_nasabah'];

    // TENTUKAN ID LAYANAN & NAMA LOKET
    if($layanan == "Teller"){
        $id_layanan = 1;
        $nama_loket = "Teller";
    }elseif($layanan == "Customer Service"){
        $id_layanan = 2;
        $nama_loket = "Customer Service";
    }else{
        die("Layanan tidak valid.");
    }

    // HITUNG NOMOR ANTRIAN TERAKHIR
    $queryNomor = mysqli_query($conn,
        "SELECT nomor_antrian
         FROM antrian
         ORDER BY id_antrian DESC
         LIMIT 1");

    if(mysqli_num_rows($queryNomor) > 0){

        $dataTerakhir = mysqli_fetch_assoc($queryNomor);

        $angka = (int) substr($dataTerakhir['nomor_antrian'], 1);

        $angka++;

    }else{

        $angka = 1;
    }

    $nomor = "A" . str_pad($angka, 3, "0", STR_PAD_LEFT);

    // INSERT DATA ANTRIAN
    $insert = mysqli_query($conn,
        "INSERT INTO antrian (
            nomor_antrian,
            waktu_ambil,
            status,
            id_nasabah,
            id_layanan,
            loket
        ) VALUES (
            '$nomor',
            NOW(),
            'Menunggu',
            '$id_nasabah',
            '$id_layanan',
            '$nama_loket'
        )"
    );

    if(!$insert){
        die("Error MySQL: " . mysqli_error($conn));
    }

    header("Location: cekAntrian.php");
    exit;
}



// ====================================
// PANGGIL ANTRIAN
// ====================================

if(isset($_GET['panggil'])){

    $id = $_GET['panggil'];

    mysqli_query($conn,
    "UPDATE antrian
    SET status='Dipanggil'
    WHERE id_antrian='$id'");

    header("Location: petugas.php");
    exit;

}



// ====================================
// SELESAI ANTRIAN
// ====================================

if(isset($_GET['selesai'])){

    $id = $_GET['selesai'];

    mysqli_query($conn,
    "UPDATE antrian
    SET status='Selesai'
    WHERE id_antrian='$id'");

    header("Location: petugas.php");
    exit;

}



// ====================================
// HAPUS ANTRIAN (ADMIN)
// ====================================

if(isset($_GET['hapus'])){

    $id = $_GET['hapus'];

    mysqli_query($conn,
    "DELETE FROM antrian
    WHERE id_antrian='$id'");

    header("Location: admin.php");
    exit;

}