<?php
// =====================================================================
// init.php: dipanggil paling awal oleh semua halaman.
// Isi: koneksi DB, penyimpanan session di DB, dan variabel path.
// =====================================================================
require_once __DIR__ . '/koneksi.php';   // menghasilkan $pdo

// ---------- 1. Session disimpan di database ----------
// Di Vercel (serverless) file session bisa hilang antar request,
// jadi session disimpan di tabel "sessions".
class DbSessionHandler implements SessionHandlerInterface
{
    public function __construct(private PDO $pdo) {}

    public function open(string $path, string $name): bool
    {
        return true;
    }

    public function close(): bool
    {
        return true;
    }

    // Dipanggil saat session_start(): ambil data session dari DB
    public function read(string $id): string|false
    {
        $stmt = $this->pdo->prepare('SELECT data FROM sessions WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetchColumn();
        return $data === false ? '' : $data;
    }

    // Dipanggil di akhir request: insert kalau baru, update kalau sudah ada
    public function write(string $id, string $data): bool
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO sessions (id, data, updated_at) VALUES (:id, :data, NOW())
             ON CONFLICT (id) DO UPDATE SET data = EXCLUDED.data, updated_at = NOW()'
        );
        return $stmt->execute([':id' => $id, ':data' => $data]);
    }

    // Dipanggil saat session_destroy() (logout)
    public function destroy(string $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM sessions WHERE id = :id');
        return $stmt->execute([':id' => $id]);
    }

    // Bersihkan session yang sudah lama nggak dipakai
    public function gc(int $max_lifetime): int|false
    {
        $stmt = $this->pdo->prepare(
            'DELETE FROM sessions WHERE updated_at < NOW() - make_interval(secs => :sec)'
        );
        $stmt->execute([':sec' => $max_lifetime]);
        return $stmt->rowCount();
    }
}

if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.gc_maxlifetime', '7200');   // login berlaku 2 jam sejak aktivitas terakhir

    session_set_save_handler(new DbSessionHandler($pdo), true);

    session_set_cookie_params([
        'lifetime' => 0,                         // hilang saat browser ditutup
        'path'     => '/',
        'secure'   => (bool) getenv('VERCEL'),   // di Vercel (HTTPS) cookie hanya lewat HTTPS
        'httponly' => true,                      // tidak bisa dibaca JavaScript
        'samesite' => 'Lax',
    ]);
    session_start();
}

// ---------- 2. Variabel path ----------
// $base  = awalan URL untuk link antar halaman (relatif ke folder api/)
// $asset = awalan URL untuk folder public/assets/ (css, js)
// $home  = URL halaman Beranda
if (getenv('VERCEL')) {
    // Di Vercel: path absolut dari root domain
    $base  = '/';
    $asset = '/assets/';
    $home  = '/';
} else {
    // Di lokal (Laragon): hitung path relatif dari folder file yang sedang dibuka.
    // $__root = folder api/ (induk dari includes/)
    $__root = dirname(__DIR__);
    $__dir  = dirname($_SERVER['SCRIPT_FILENAME']);
    $__rel  = ltrim(str_replace('\\', '/', substr($__dir, strlen($__root))), '/');
    $base   = $__rel === '' ? '' : str_repeat('../', substr_count($__rel, '/') + 1);
    $asset  = $base . '../public/assets/';   // public/ ada di luar api/, jadi naik satu folder
    $home   = $base . 'index.php';
}