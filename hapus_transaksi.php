<?php
include "koneksi.php";
if (isset($_GET['id_transaksi'])) {
    $id = intval($_GET['id_transaksi']);
    $sql = "DELETE FROM transaksi WHERE id_transaksi=$id";
    if (mysqli_query($koneksi, $sql)) {
        header("Location: lihat_data.php");
        exit;
    } else {
        echo "❌ Error: " . mysqli_error($koneksi);
    }
} else {
    echo "❌ ID Transaksi tidak ditemukan!";
}
?>
