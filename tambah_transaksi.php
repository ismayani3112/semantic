<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Transaksi</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; padding: 20px; }
        form { max-width: 500px; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        input, select { width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ddd; border-radius: 5px; }
        button { width: 100%; padding: 10px; background: #17a2b8; color: white; border: none; border-radius: 5px; }
        button:hover { background: #138496; }
        .back { display: block; margin-top: 15px; text-align: center; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Tambah Transaksi</h2>
    <form method="post">
        <label>Buku:</label>
        <select name="id_buku" required>
            <option value="">-- Pilih Buku --</option>
            <?php
            $res = mysqli_query($koneksi, "SELECT * FROM buku");
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<option value='{$row['id_buku']}'>{$row['judul']}</option>";
            }
            ?>
        </select>
        <input type="text" name="nama_pembeli" placeholder="Nama Pembeli" required>
        <input type="number" name="jumlah" placeholder="Jumlah Beli" required>
        <input type="date" name="tanggal_transaksi" required>
        <button type="submit" name="simpan">Simpan</button>
    </form>
    <a href="index.php" class="back">⬅ Kembali ke Menu Utama</a>

    <?php
    if (isset($_POST['simpan'])) {
        $id_buku = $_POST['id_buku'];
        $nama = $_POST['nama_pembeli'];
        $jumlah = $_POST['jumlah'];
        $tanggal = $_POST['tanggal_transaksi'];

        $sql = "INSERT INTO transaksi (id_buku, nama_pembeli, jumlah, tanggal_transaksi) 
                VALUES ('$id_buku','$nama','$jumlah','$tanggal')";
        if (mysqli_query($koneksi, $sql)) {
            echo "<p style='color:green;text-align:center;'>✅ Transaksi berhasil ditambahkan!</p>";
        } else {
            echo "<p style='color:red;text-align:center;'>❌ Error: " . mysqli_error($koneksi) . "</p>";
        }
    }
    ?>
</body>
</html>
