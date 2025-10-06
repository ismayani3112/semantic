<?php
include "koneksi.php";
if (isset($_GET['id_buku'])) {
    $id = intval($_GET['id_buku']);
    $sql = "DELETE FROM buku WHERE id_buku=$id";
    if (mysqli_query($koneksi, $sql)) {
        header("Location: lihat_data.php");
        exit;
    } else {
        echo "❌ Error: " . mysqli_error($koneksi);
    }
} else {
    echo "❌ ID Buku tidak ditemukan!";
}
?>
