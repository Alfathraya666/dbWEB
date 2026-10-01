<?php
require __DIR__ . '/../includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$username = strtolower(trim($_POST['username'] ?? ''));   // username disimpan huruf kecil
$password = $_POST['password'] ?? '';                     // password jangan di-trim

if ($username === '' || $password === '') {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Username dan password wajib diisi.'];
    $_SESSION['old_username'] = $username;
    header('Location: login.php');
    exit;
}

try {
    // 1. Cari user (prepared statement = aman dari SQL injection)
    $stmt = $pdo->prepare(
        'SELECT id, username, nama_lengkap, password_hash FROM users WHERE username = :u'
    );
    $stmt->execute([':u' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log('Login error: ' . $e->getMessage());   // detailnya cek di Vercel → Logs
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Terjadi kesalahan pada server. Coba lagi.'];
    header('Location: login.php');
    exit;
}

// 2. Cocokkan password dengan hash di database
if ($user && password_verify($password, $user['password_hash'])) {
    session_regenerate_id(true);   // ganti ID session (anti session fixation)
    $_SESSION['user_id']  = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['nama']     = $user['nama_lengkap'] ?: $user['username'];

    header('Location: ' . $home);
    exit;
}

// Pesan sengaja dibuat sama supaya orang nggak tahu username-nya ada atau nggak
$_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Username atau password salah.'];
$_SESSION['old_username'] = $username;
header('Location: login.php');
exit;