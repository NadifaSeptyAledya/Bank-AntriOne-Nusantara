<?php

include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,
"UPDATE antrian
SET status='Dipanggil'
WHERE id_antrian='$id'");

header("Location: petugas.php");

?>