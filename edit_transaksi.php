<?php
include "koneksi.php";

// Pastikan ID ada di URL
if (!isset($_GET['id_transaksi'])) {
    die("❌ ID Transaksi tidak ditemukan!");
}

$id = intval($_GET['id_transaksi']);
$query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi=$id");

if (!$query || mysqli_num_rows($query) == 0) {
    die("❌ Data transaksi tidak ditemukan!");
}

$data = mysqli_fetch_assoc($query);

// Update data kalau form disubmit
if (isset($_POST['update'])) {
    $nama  = $_POST['nama_pembeli'];
    $jumlah= $_POST['jumlah'];
    $tgl   = $_POST['tanggal_transaksi'];

    $sql = "UPDATE transaksi SET nama_pembeli='$nama', jumlah='$jumlah', tanggal_transaksi='$tgl' WHERE id_transaksi=$id";
    if (mysqli_query($koneksi, $sql)) {
        header("Location: lihat_data.php");
        exit;
    } else {
        echo "❌ Error: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Transaksi</title>
</head>
<body>
    <h2>Edit Transaksi</h2>
    <form method="post">
        Nama Pembeli: <input type="text" name="nama_pembeli" value="<?= $data['nama_pembeli'] ?>"><br>
        Jumlah: <input type="number" name="jumlah" value="<?= $data['jumlah'] ?>"><br>
        Tanggal: <input type="date" name="tanggal_transaksi" value="<?= $data['tanggal_transaksi'] ?>"><br>
        <button type="submit" name="update">Update</button>
    </form>
    <a href="lihat_data.php">⬅ Kembali</a>
</body>
</html>
