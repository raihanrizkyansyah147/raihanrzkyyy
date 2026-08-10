<?php
$host = "localhost";
$user = "nama_db_cpanel"; // Sesuaikan dengan database cPanel
$pass = "password_db_cpanel"; // Sesuaikan password database
$db   = "keuangan_keluarga";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
session_start();
?>