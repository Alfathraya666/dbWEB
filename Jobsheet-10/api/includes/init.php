<?php

require_once __DIR__ . '/koneksi.php';


// ======================================================
// DATABASE SESSION HANDLER
// ======================================================

class DbSessionHandler implements SessionHandlerInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function open(string $path, string $name): bool
    {
        return true;
    }

    public function close(): bool
    {
        return true;
    }

    public function read(string $id): string|false
    {
        $stmt = $this->pdo->prepare(
            "SELECT data
             FROM sessions
             WHERE id = :id"
        );

        $stmt->execute([
            ':id' => $id
        ]);

        $data = $stmt->fetchColumn();

        return $data === false ? '' : $data;
    }

    public function write(string $id, string $data): bool
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO sessions (id, data, updated_at)
             VALUES (:id, :data, NOW())
             ON CONFLICT (id)
             DO UPDATE SET
                data = EXCLUDED.data,
                updated_at = NOW()"
        );

        return $stmt->execute([
            ':id'   => $id,
            ':data' => $data
        ]);
    }

    public function destroy(string $id): bool
    {
        $stmt = $this->pdo->prepare(
            "DELETE FROM sessions
             WHERE id = :id"
        );

        return $stmt->execute([
            ':id' => $id
        ]);
    }

    public function gc(int $max_lifetime): int|false
    {
        $stmt = $this->pdo->prepare(
            "DELETE FROM sessions
             WHERE updated_at < NOW() - make_interval(secs => :sec)"
        );

        $stmt->execute([
            ':sec' => $max_lifetime
        ]);

        return $stmt->rowCount();
    }
}


// ======================================================
// SESSION
// ======================================================

if (session_status() === PHP_SESSION_NONE) {

    ini_set('session.gc_maxlifetime', '7200');

    $handler = new DbSessionHandler($pdo);

    session_set_save_handler(
        $handler,
        true
    );

    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/',
        'secure'   => (bool) getenv('VERCEL'),
        'httponly' => true,
        'samesite' => 'Lax'
    ]);

    session_start();
}


// ======================================================
// PATH WEBSITE
// ======================================================

$base  = '/';
$asset = '/assets/';
$home  = '/';