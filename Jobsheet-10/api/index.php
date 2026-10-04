<?php

// ============================================================
// AutoBekas — Single Vercel Serverless Function Router
// Semua request PHP diarahkan ke file yang sesuai.
// ============================================================

$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);

// Hilangkan query string dan trailing slash
$uri = '/' . trim($uri, '/');

if ($uri === '//') {
    $uri = '/';
}

// ============================================================
// ROUTING
// ============================================================

$routes = [

    // =========================
    // HOME
    // =========================
    '/' => __DIR__ . '/../index.php',

    // =========================
    // AUTH
    // =========================
    '/auth/login.php' =>
        __DIR__ . '/../auth/login.php',

    '/auth/logout.php' =>
        __DIR__ . '/../auth/logout.php',

    '/auth/proses_login.php' =>
        __DIR__ . '/../auth/proses_login.php',

    '/auth/register.php' =>
        __DIR__ . '/../auth/register.php',

    '/auth/proses_register.php' =>
        __DIR__ . '/../auth/proses_register.php',

    // =========================
    // MOBIL
    // =========================
    '/mobil/list.php' =>
        __DIR__ . '/../mobil/list.php',

    '/mobil/tambah.php' =>
        __DIR__ . '/../mobil/tambah.php',

    '/mobil/edit.php' =>
        __DIR__ . '/../mobil/edit.php',

    '/mobil/hapus.php' =>
        __DIR__ . '/../mobil/hapus.php',

    '/mobil/proses_edit.php' =>
        __DIR__ . '/../mobil/proses_edit.php',

    // =========================
    // PELANGGAN
    // =========================
    '/pelanggan/list.php' =>
        __DIR__ . '/../pelanggan/list.php',

    '/pelanggan/tambah.php' =>
        __DIR__ . '/../pelanggan/tambah.php',

    '/pelanggan/edit.php' =>
        __DIR__ . '/../pelanggan/edit.php',

    '/pelanggan/hapus.php' =>
        __DIR__ . '/../pelanggan/hapus.php',

    '/pelanggan/proses_edit.php' =>
        __DIR__ . '/../pelanggan/proses_edit.php',
];

// ============================================================
// CEK ROUTE
// ============================================================

if (!isset($routes[$uri])) {
    http_response_code(404);

    echo '<!DOCTYPE html>';
    echo '<html lang="id">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<title>404 - AutoBekas</title>';
    echo '</head>';
    echo '<body>';
    echo '<h1>404</h1>';
    echo '<p>Halaman tidak ditemukan.</p>';
    echo '<p><a href="/">Kembali ke Beranda</a></p>';
    echo '</body>';
    echo '</html>';

    exit;
}

// ============================================================
// JALANKAN FILE
// ============================================================

require $routes[$uri];