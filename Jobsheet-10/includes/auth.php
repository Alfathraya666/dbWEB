<?php
require_once __DIR__ . '/init.php';

// True kalau user sudah login
function is_logged_in(): bool
{
    return !empty($_SESSION['user_id']);
}

// Taruh di paling atas halaman yang WAJIB login
function require_login(): void
{
    global $base;
    if (!is_logged_in()) {
        $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Silakan login dulu.'];
        header('Location: ' . $base . 'auth/login.php');
        exit;   // WAJIB: tanpa exit, sisa halaman tetap dijalankan
    }
}

// Taruh di halaman login/register: kalau sudah login, langsung ke Beranda
function require_guest(): void
{
    global $home;
    if (is_logged_in()) {
        header('Location: ' . $home);
        exit;
    }
}