<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Buku & Transaksi</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; padding: 20px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { border-collapse: collapse; width: 100%; background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #343a40; color: #fff; }
        tr:nth-child(even) { background: #f2f2f2; }
        a.btn { padding: 4px 8px; border-radius: 3px; color: white; text-decoration: none; font-size: 12px; }
        .edit { background: #28a745; }
        .hapus { background: #dc3545; }
        .back { display: block; text-align: center; margin-top: 20px; text-decoration: none; color: #007bff; }
    </style>
</head>
<body>
    <h2>📋 Data Buku & Transaksi</h2>
    <table>
        <tr>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Transaksi</th>
            <th>Aksi</th>
        </tr>
        <?php
        $sql = "SELECT b.id_buku, b.judul, b.penulis, b.penerbit, b.tahun_terbit
                FROM buku b";
        $result = mysqli_query($koneksi, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['judul']."</td>";
            echo "<td>".$row['penulis']."</td>";
            echo "<td>".$row['penerbit']."</td>";
            echo "<td>".$row['tahun_terbit']."</td>";
            
            // tampilkan transaksi untuk buku ini
            $resTrans = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_buku=".$row['id_buku']);
            echo "<td>";
            if (mysqli_num_rows($resTrans) > 0) {
                while ($t = mysqli_fetch_assoc($resTrans)) {
                    echo $t['nama_pembeli']." beli ".$t['jumlah']." buah pada ".$t['tanggal_transaksi']." 
                          <a class='btn edit' href='edit_transaksi.php?id_transaksi=".$t['id_transaksi']."'>Edit</a> 
                          <a class='btn hapus' href='hapus_transaksi.php?id_transaksi=".$t['id_transaksi']."' onclick=\"return confirm('Yakin hapus transaksi?');\">Hapus</a>
                          <br>";
                }
            } else {
                echo "<i>Belum ada transaksi</i>";
            }
            echo "</td>";

            // aksi buku
            echo "<td>
                    <a class='btn edit' href='edit_buku.php?id_buku=".$row['id_buku']."'>Edit Buku</a> 
                    <a class='btn hapus' href='hapus_buku.php?id_buku=".$row['id_buku']."' onclick=\"return confirm('Yakin hapus buku ini? Semua transaksi terkait juga akan dihapus.');\">Hapus Buku</a>
                  </td>";

            echo "</tr>";
        }
        ?>
    </table>
    <a href="index.php" class="back">⬅ Kembali ke Menu Utama</a>
</body>
</html>
