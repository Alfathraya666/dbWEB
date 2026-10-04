<?php
require __DIR__ . '/../includes/auth.php';

$_SESSION = [];   // kosongkan data session

// Hapus cookie session di browser
$p = session_get_cookie_params();
setcookie(session_name(), '', time() - 3600, $p['path'], $p['domain'], $p['secure'], $p['httponly']);

session_destroy();   // hapus baris session di tabel "sessions"

header('Location: login.php?status=logout');
exit;