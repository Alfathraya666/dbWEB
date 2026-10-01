<?php
session_start();
require __DIR__ . '/../includes/koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: list.php');
    exit;
}

try {
    $stmt = $pdo->prepare("DELETE FROM pelanggan WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Pelanggan berhasil dihapus.'];
} catch (PDOException $e) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Gagal menghapus: ' . $e->getMessage()];
}

header('Location: list.php');
exit;