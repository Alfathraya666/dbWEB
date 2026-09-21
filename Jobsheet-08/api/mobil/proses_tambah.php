<?php
session_start();
require __DIR__ . '/../includes/koneksi.php';

$merk = trim($_POST['merk'] ?? '');
$model = trim($_POST['model'] ?? '');
$tahun = $_POST['tahun'] ?? '';
$harga = $_POST['harga'] ?? '';
$kilometer = $_POST['kilometer'] ?? '';
$kondisi = trim($_POST['kondisi'] ?? '');

$errors = [];
if ($merk === '') {
    $errors[] = "Merk mobil wajib diisi.";
}
if ($model === '') {
    $errors[] = "Model mobil wajib diisi.";
}
if (!is_numeric($tahun) || $tahun < 1990 || $tahun > 2026) {
    $errors[] = "Tahun harus di antara 1990-2026.";
}
if (!is_numeric($harga) || $harga < 0) {
    $errors[] = "Harga tidak boleh negatif.";
}
if (!is_numeric($kilometer) || $kilometer < 0) {
    $errors[] = "Kilometer tidak boleh negatif.";
}

if (!empty($errors)) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => implode(' ', $errors)];
    header('Location: tambah.php');
    exit;
}

try {
    $stmt = $pdo->prepare(
        "INSERT INTO mobil (merk, model, tahun, harga, kilometer, kondisi)
         VALUES (:merk, :model, :tahun, :harga, :kilometer, :kondisi)"
    );
    $stmt->execute([
        ':merk'      => $merk,
        ':model'     => $model,
        ':tahun'     => (int) $tahun,
        ':harga'     => (int) $harga,
        ':kilometer' => (int) $kilometer,
        ':kondisi'   => $kondisi,
    ]);

    $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Mobil berhasil ditambahkan.'];
    header('Location: list.php');
    exit;
} catch (PDOException $e) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Gagal menyimpan: ' . $e->getMessage()];
    header('Location: tambah.php');
    exit;
}