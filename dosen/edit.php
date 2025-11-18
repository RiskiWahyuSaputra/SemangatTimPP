<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM dosen WHERE iddosen='$id'");
$row = mysqli_fetch_assoc($data);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nidn = $_POST['nidn'];
    $nama_dosen = $_POST['nama_dosen'];
    $idprodi = $_POST['idprodi'];
    $idpendidikan = $_POST['idpendidikan'];

    $sql = "UPDATE dosen 
            SET nidn='$nidn', nama_dosen='$nama_dosen', idprodi='$idprodi', idpendidikan='$idpendidikan' 
            WHERE iddosen='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Data Dosen berhasil diupdate'); window.location='tampil_dosen.php';</script>";
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
}
?>

<form method="POST">
    <label>NIDN:</label><br>
    <input type="text" name="nidn" value="<?= $row['nidn'] ?>" required><br><br>

    <label>Nama Dosen:</label><br>
    <input type="text" name="nama_dosen" value="<?= $row['nama_dosen'] ?>" required><br><br>

    <label>ID Prodi:</label><br>
    <input type="text" name="idprodi" value="<?= $row['idprodi'] ?>" required><br><br>

    <label>ID Pendidikan:</label><br>
    <input type="text" name="idpendidikan" value="<?= $row['idpendidikan'] ?>" required><br><br>

    <button type="submit">Update</button>
</form>
