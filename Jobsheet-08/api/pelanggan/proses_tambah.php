<?php
session_start();
require_once __DIR__ . '/../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $no_ktp = trim($_POST['no_ktp'] ?? '');
    $nama   = trim($_POST['nama'] ?? '');
    $alamat = trim($_POST['alamat'] ?? '');
    $no_hp  = trim($_POST['no_hp'] ?? '');

    try {
        $query = "INSERT INTO pelanggan (no_ktp, nama, alamat, no_hp) VALUES (:no_ktp, :nama, :alamat, :no_hp)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':no_ktp' => $no_ktp,
            ':nama'   => $nama,
            ':alamat' => $alamat,
            ':no_hp'  => $no_hp
        ]);

        $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Pelanggan berhasil ditambahkan.'];
        header('Location: list.php');
        exit;

    } catch (PDOException $e) {
        $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Gagal menyimpan: ' . $e->getMessage()];
        header('Location: tambah.php');
        exit;
    }
} else {
    header('Location: tambah.php');
    exit;
}