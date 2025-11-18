<?php
include 'koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM dosen WHERE iddosen='$id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>alert('Data Dosen berhasil dihapus'); window.location='tampil_dosen.php';</script>";
} else {
    echo "Gagal menghapus data: " . mysqli_error($conn);
}
?>
