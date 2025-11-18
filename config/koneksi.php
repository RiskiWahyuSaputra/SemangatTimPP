<?php
// Konfigurasi Database
$host       = 'localhost';
$db         = 'praktikum_pengganti_db'; // PASTIKAN NAMA INI SAMA DENGAN DI PHPMYADMIN
$user       = 'root';
$password   = '';                       // Kosongkan jika tidak ada password (default XAMPP/WAMP)
$charset    = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Agar error ditampilkan
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $password, $options);
     // Variabel $pdo siap digunakan

} catch (\PDOException $e) {
     // Ini akan menampilkan pesan error koneksi jika gagal
     die("Koneksi Gagal! Cek XAMPP/Nama DB di koneksi.php: " . $e->getMessage());
}
?>