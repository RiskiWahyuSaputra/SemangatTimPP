<?php
include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Mahasiswa - Data</title>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <p><a href="tambah.php">Tambah Data Mahasiswa</a></p>

    <table border="1" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = $koneksi->query("SELECT * FROM mahasiswa ORDER BY nim ASC");
            if ($query->num_rows > 0) {
                while($data = $query->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nim']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['jurusan']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td>
                    <a href="edit.php?nim=<?php echo $data['nim']; ?>">Edit</a> |
                    <a href="hapus.php?nim=<?php echo $data['nim']; ?>" 
                       onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='6'>Data mahasiswa kosong.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
<?php $koneksi->close(); ?>