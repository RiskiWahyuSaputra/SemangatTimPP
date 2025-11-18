<?php
include 'config/koneksi.php';

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    $sql = "DELETE FROM mahasiswa WHERE nim='$nim'";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
    } else {
        echo "Error menghapus data: " . $koneksi->error;
    }
} else {
    header('Location: index.php');
    exit;
}

$koneksi->close();
?>