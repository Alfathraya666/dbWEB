<?php
require __DIR__ . '/../includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

$nama      = trim($_POST['nama_lengkap'] ?? '');
$username  = strtolower(trim($_POST['username'] ?? ''));
$password  = $_POST['password'] ?? '';
$password2 = $_POST['password2'] ?? '';

// ---- Validasi ----
$errors = [];
if ($nama === '' || strlen($nama) > 100) {
    $errors[] = "Nama lengkap wajib diisi (maksimal 100 karakter).";
}
if (!preg_match('/^[a-z0-9_]{3,30}$/', $username)) {
    $errors[] = "Username 3-30 karakter, hanya huruf, angka, dan underscore.";
}
if (strlen($password) < 8) {
    $errors[] = "Password minimal 8 karakter.";
}
if (strlen($password) > 72) {
    $errors[] = "Password maksimal 72 karakter.";   // batas bcrypt
}
if ($password !== $password2) {
    $errors[] = "Konfirmasi password tidak sama.";
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => implode(' ', $errors)];
    $_SESSION['old'] = ['nama_lengkap' => $nama, 'username' => $username];   // password tidak disimpan
    header('Location: register.php');
    exit;
}

// ---- Simpan ----
try {
    $hash = password_hash($password, PASSWORD_DEFAULT);   // JANGAN simpan password polos

    $stmt = $pdo->prepare(
        'INSERT INTO users (username, password_hash, nama_lengkap) VALUES (:u, :h, :n)'
    );
    $stmt->execute([':u' => $username, ':h' => $hash, ':n' => $nama]);

    $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Akun berhasil dibuat. Silakan login.'];
    header('Location: login.php');
    exit;
} catch (PDOException $e) {
    if ($e->getCode() === '23505') {   // kode Postgres: unique violation (username sudah ada)
        $pesan = 'Username sudah dipakai, pilih yang lain.';
    } else {
        error_log('Register error: ' . $e->getMessage());
        $pesan = 'Terjadi kesalahan pada server. Coba lagi.';
    }
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => $pesan];
    $_SESSION['old'] = ['nama_lengkap' => $nama, 'username' => $username];
    header('Location: register.php');
    exit;
}