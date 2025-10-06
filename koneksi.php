<?php
$host = "127.0.0.1"; 
$user = "root"; 
$pass = ""; 
$db   = "toko_buku"; // nama database
$port = 3306; // sesuaikan dengan port MySQL kamu

$koneksi = mysqli_connect($host, $user, $pass, $db, $port);

if (!$koneksi) {
    die("❌ Koneksi gagal: " . mysqli_connect_error());
}
?>
