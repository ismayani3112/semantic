<?php
include "koneksi.php";

// Pastikan ID ada di URL
if (!isset($_GET['id_buku'])) {
    die("❌ ID Buku tidak ditemukan!");
}

$id = intval($_GET['id_buku']);
$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku=$id");

if (!$query || mysqli_num_rows($query) == 0) {
    die("❌ Data buku tidak ditemukan!");
}

$data = mysqli_fetch_assoc($query);

// Update data kalau form disubmit
if (isset($_POST['update'])) {
    $judul   = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit= $_POST['penerbit'];
    $tahun   = $_POST['tahun_terbit'];

    $sql = "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun' WHERE id_buku=$id";
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
    <title>Edit Buku</title>
</head>
<body>
    <h2>Edit Buku</h2>
    <form method="post">
        Judul: <input type="text" name="judul" value="<?= $data['judul'] ?>"><br>
        Penulis: <input type="text" name="penulis" value="<?= $data['penulis'] ?>"><br>
        Penerbit: <input type="text" name="penerbit" value="<?= $data['penerbit'] ?>"><br>
        Tahun: <input type="number" name="tahun_terbit" value="<?= $data['tahun_terbit'] ?>"><br>
        <button type="submit" name="update">Update</button>
    </form>
    <a href="lihat_data.php">⬅ Kembali</a>
</body>
</html>
