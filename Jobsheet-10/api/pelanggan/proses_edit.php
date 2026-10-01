<?php
session_start();
require __DIR__ . '/../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id     = $_POST['id'] ?? null;
    $no_ktp = trim($_POST['no_ktp'] ?? '');
    $nama   = trim($_POST['nama'] ?? '');
    $alamat = trim($_POST['alamat'] ?? '');
    $no_hp  = trim($_POST['no_hp'] ?? '');

    if (!$id) {
        header('Location: list.php');
        exit;
    }

    try {
        $query = "UPDATE pelanggan SET no_ktp = :no_ktp, nama = :nama, alamat = :alamat, no_hp = :no_hp WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':no_ktp' => $no_ktp,
            ':nama'   => $nama,
            ':alamat' => $alamat,
            ':no_hp'  => $no_hp,
            ':id'     => $id,
        ]);

        $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Pelanggan berhasil diperbarui.'];
        header('Location: list.php');
        exit;

    } catch (PDOException $e) {
        $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Gagal memperbarui: ' . $e->getMessage()];
        header('Location: edit.php?id=' . urlencode($id));
        exit;
    }
} else {
    header('Location: list.php');
    exit;
}