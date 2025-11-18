<?php
include 'config/koneksi.php';

if (isset($_GET['nim'])) {
    $nim_lama = $_GET['nim'];
    $query = $koneksi->query("SELECT * FROM mahasiswa WHERE nim='$nim_lama'");
    if ($query->num_rows > 0) {
        $data = $query->fetch_assoc();
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location='index.php';</script>";
        exit;
    }
}

if (isset($_POST['update'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $nim_lama_post = $_POST['nim_lama']; 

    $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan', alamat='$alamat' WHERE nim='$nim_lama_post'";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil diupdate!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Mahasiswa - Edit</title>
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>
    <p><a href="index.php">Kembali</a></p>

    <form method="POST" action="">
        <input type="hidden" name="nim_lama" value="<?php echo $data['nim']; ?>"> 
        
        <label>NIM:</label><br>
        <input type="text" name="nim" value="<?php echo $data['nim']; ?>" required><br><br>

        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required><br><br>

        <label>Jurusan:</label><br>
        <input type="text" name="jurusan" value="<?php echo $data['jurusan']; ?>" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat"><?php echo $data['alamat']; ?></textarea><br><br>

        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
<?php $koneksi->close(); ?>