<?php
include 'KoneksiDatabase.php';

// Ambil semua data pembayaran mahasiswa
$query = "SELECT m.id_mahasiswa, m.nama, p.status, p.jumlah
          FROM mahasiswa m
          LEFT JOIN pembayaran p ON m.id_mahasiswa = p.id_mahasiswa
          ORDER BY m.nama ASC";
$result = mysqli_query($conn, $query);

// Hitung total pembayaran dan jumlah mahasiswa
$totalPembayaran = 0;
$totalMahasiswa = mysqli_num_rows($result);
$dataMahasiswa = [];
while($row = mysqli_fetch_assoc($result)) {
    $totalPembayaran += $row['jumlah'] ?? 0;
    $dataMahasiswa[] = $row;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Dashboard</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <h1>Admin Panel - Dashboard</h1>
    
    <p>Total Mahasiswa: <?= $totalMahasiswa; ?></p>
    <p>Total Pembayaran: Rp <?= number_format($totalPembayaran, 0, ',', '.'); ?></p>
    
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID Mahasiswa</th>
            <th>Nama Mahasiswa</th>
            <th>Status Pembayaran</th>
            <th>Jumlah (Rp)</th>
        </tr>
        <?php foreach($dataMahasiswa as $row) { ?>
        <tr>
            <td><?= $row['id_mahasiswa']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['status'] ?? 'Belum Bayar'; ?></td>
            <td><?= number_format($row['jumlah'] ?? 0, 0, ',', '.'); ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
