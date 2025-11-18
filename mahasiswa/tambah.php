<?php
include 'config/koneksi.php';

if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $cek_nim = $koneksi->query("SELECT nim FROM mahasiswa WHERE nim='$nim'");
    
    if ($cek_nim->num_rows > 0) {
        echo "<script>alert('NIM sudah terdaftar!'); window.location='tambah.php';</script>";
    } else {
        $sql = "INSERT INTO mahasiswa (nim, nama, jurusan, alamat) VALUES ('$nim', '$nama', '$jurusan', '$alamat')";
        
        if ($koneksi->query($sql) === TRUE) {
            echo "<script>alert('Data berhasil ditambahkan!'); window.location='index.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Mahasiswa - Tambah</title>
</head>
<body>
    <h2>Tambah Data Mahasiswa</h2>
    <p><a href="index.php">Kembali</a></p>

    <form method="POST" action="">
        <label>NIM:</label><br>
        <input type="text" name="nim" required><br><br>

        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat"></textarea><br><br>

        <input type="submit" name="submit" value="Simpan">
    </form>
</body>
</html>
<?php $koneksi->close(); ?>