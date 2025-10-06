<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; padding: 20px; }
        form { max-width: 400px; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        input { width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ddd; border-radius: 5px; }
        button { width: 100%; padding: 10px; background: #28a745; color: white; border: none; border-radius: 5px; }
        button:hover { background: #218838; }
        .back { display: block; margin-top: 15px; text-align: center; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Tambah Buku</h2>
    <form method="post">
        <input type="text" name="judul" placeholder="Judul Buku" required>
        <input type="text" name="penulis" placeholder="Penulis" required>
        <input type="text" name="penerbit" placeholder="Penerbit" required>
        <input type="number" name="tahun_terbit" placeholder="Tahun Terbit (YYYY)" required>
        <button type="submit" name="simpan">Simpan</button>
    </form>
    <a href="index.php" class="back">⬅ Kembali ke Menu Utama</a>

    <?php
    if (isset($_POST['simpan'])) {
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun_terbit'];

        $sql = "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit) 
                VALUES ('$judul','$penulis','$penerbit','$tahun')";
        if (mysqli_query($koneksi, $sql)) {
            echo "<p style='color:green;text-align:center;'>✅ Buku berhasil ditambahkan!</p>";
        } else {
            echo "<p style='color:red;text-align:center;'>❌ Error: " . mysqli_error($koneksi) . "</p>";
        }
    }
    ?>
</body>
</html>
