<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nidn = $_POST['nidn'];
    $nama_dosen = $_POST['nama_dosen'];
    $idprodi = $_POST['idprodi'];
    $idpendidikan = $_POST['idpendidikan'];

    $sql = "INSERT INTO dosen (nidn, nama_dosen, idprodi, idpendidikan) 
            VALUES ('$nidn', '$nama_dosen', '$idprodi', '$idpendidikan')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Data Dosen berhasil ditambahkan'); window.location='tampil_dosen.php';</script>";
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>

<form method="POST">
    <label>NIDN:</label><br>
    <input type="text" name="nidn" required><br><br>

    <label>Nama Dosen:</label><br>
    <input type="text" name="nama_dosen" required><br><br>

    <label>ID Prodi:</label><br>
    <input type="text" name="idprodi" required><br><br>

    <label>ID Pendidikan:</label><br>
    <input type="text" name="idpendidikan" required><br><br>

    <button type="submit">Simpan</button>
</form>