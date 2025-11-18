<?php
// --------------------------------------------------------
<<<<<<< HEAD
// 1. TAMBAHAN BARU: Mulai Sesi untuk menyimpan status login
session_start(); 
// --------------------------------------------------------

=======
// TAMBAHAN BARU: Mulai Sesi untuk menyimpan status login
session_start(); 
// --------------------------------------------------------
>>>>>>> 22d2d1577fa4810f60fe3f77ce234e92518b793d
// TAMPILKAN SEMUA ERROR (HAPUS KODE INI JIKA SUDAH DEPLOY)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// --------------------------------------------------------

// 1. Sertakan file koneksi database. Path sudah disesuaikan ke folder 'config'
require_once 'config/koneksi.php'; 

$pesan_error = '';
$pesan_sukses = '';

// 2. Cek apakah formulir login telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Ambil data dari formulir
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validasi sederhana
    if (empty($username) || empty($password)) {
        $pesan_error = "Username dan password wajib diisi.";
    } else {
        try {
            // 3. Persiapkan Query
            // TAMBAHAN BARU: Menarik kolom 'role' untuk kebutuhan sesi/hak akses
            $sql = "SELECT username, password_hash, role FROM users WHERE username = :username"; 
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch();

            // 4. Verifikasi Password
            if ($user && password_verify($password, $user['password_hash'])) {
                // Login Berhasil!
                $pesan_sukses = "Login berhasil! Selamat datang, " . htmlspecialchars($user['username']) . ".";
                
                // --- Bagian Sesi dan Redirect (Dibuka komentarnya) ---
                // TAMBAHAN BARU: Blok Sesi Diaktifkan
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role']; // Simpan role di sesi
                header("Location: dashboard.php"); 
                exit();
                
            } else {
                $pesan_error = "Username atau password salah.";
            }

        } catch (PDOException $e) {
            // Ini akan menangkap error SQL (misal: tabel 'users' belum ada)
            $pesan_error = "Kesalahan Database: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Login Praktikum</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 300px; }
        h2 { text-align: center; color: #333; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input[type="text"], .form-group input[type="password"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn-login { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; width: 100%; }
        .btn-login:hover { background-color: #0056b3; }
        .message { padding: 10px; margin-bottom: 15px; border-radius: 4px; text-align: center; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        /* TAMBAHAN BARU: Style untuk Footer */
        .footer-text { text-align: center; margin-top: 15px; font-size: 0.8em; color: #777; }
    </style>
</head>
<body>
    <div class="login-container">
<<<<<<< HEAD
        <h3>Login Praktikum Aja</h3>

=======
                          <h2>Login Sistem Pelaksanaan</h2>
>>>>>>> 22d2d1577fa4810f60fe3f77ce234e92518b793d
        <?php 
        if ($pesan_error) {
            echo "<div class='message error'>$pesan_error</div>";
        } elseif ($pesan_sukses) {
            echo "<div class='message success'>$pesan_sukses</div>";
        }
        ?>

        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-login">Login</button>
            <button type="submit" class="btn-login">Registrasi</button>
        </form>
        
        <p class="footer-text">&copy; <?php echo date("Y"); ?> Praktikum Tim Semangat. Versi 1.1</p>
    </div>
</body>
</html>
