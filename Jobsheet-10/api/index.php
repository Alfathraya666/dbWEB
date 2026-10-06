<?php
// ===== PINTU MASUK TUNGGAL =====
// vercel.json mengirim semua URL ke file ini, jadi di sini kita
// tentukan file mana yang harus dijalankan sesuai URL yang dibuka.
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$path = '/' . trim(rawurldecode((string) $path), '/');   // contoh: /auth/login.php

if ($path !== '/') {
    // /mobil dan /pelanggan tanpa nama file -> arahkan ke halaman list
    if ($path === '/mobil' || $path === '/pelanggan') {
        header('Location: ' . $path . '/list.php');
        exit;
    }

    // hanya file .php di dalam 3 folder ini yang boleh dibuka
    if (preg_match('#^/(auth|mobil|pelanggan)/([A-Za-z0-9_]+)\.php$#', $path, $m)) {
        $target = __DIR__ . '/' . $m[1] . '/' . $m[2] . '.php';
        if (is_file($target)) {
            require $target;
            exit;
        }
    }

    http_response_code(404);
    echo '404 - Halaman tidak ditemukan';
    exit;
}

// ===== BERANDA (URL: /) =====
require __DIR__ . '/includes/auth.php';
require_login();

$page_title = "Beranda";
include __DIR__ . '/includes/header.php';

$totalMobil     = (int) $pdo->query("SELECT COUNT(*) FROM mobil")->fetchColumn();
$totalPelanggan = (int) $pdo->query("SELECT COUNT(*) FROM pelanggan")->fetchColumn();
$rataHarga      = (int) $pdo->query("SELECT COALESCE(AVG(harga), 0) FROM mobil")->fetchColumn();
?>
        <section>
            <h2>Beranda</h2>

            <article>
                <h3>Total Mobil</h3>
                <p><?php echo $totalMobil; ?></p>
            </article>

            <article>
                <h3>Total Pelanggan</h3>
                <p><?php echo $totalPelanggan; ?></p>
            </article>

            <article>
                <h3>Rata-rata Harga</h3>
                <p>Rp <?php echo number_format($rataHarga, 0, ',', '.'); ?></p>
            </article>
        </section>
<?php include __DIR__ . '/includes/footer.php'; ?>