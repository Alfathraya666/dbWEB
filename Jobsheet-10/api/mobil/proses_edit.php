<?php
require __DIR__ . '/../includes/auth.php';
require_login();

$id        = $_POST['id'] ?? null;
$merk      = trim($_POST['merk'] ?? '');
$model     = trim($_POST['model'] ?? '');
$tahun     = $_POST['tahun'] ?? '';
$harga     = $_POST['harga'] ?? '';
$kilometer = $_POST['kilometer'] ?? '';
$kondisi   = trim($_POST['kondisi'] ?? '');

if (!$id) {
    header('Location: list.php');
    exit;
}

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
    header('Location: edit.php?id=' . urlencode($id));
    exit;
}

try {
    $stmt = $pdo->prepare(
        "UPDATE mobil
         SET merk = :merk, model = :model, tahun = :tahun,
             harga = :harga, kilometer = :kilometer, kondisi = :kondisi
         WHERE id = :id"
    );
    $stmt->execute([
        ':merk'      => $merk,
        ':model'     => $model,
        ':tahun'     => (int) $tahun,
        ':harga'     => (int) $harga,
        ':kilometer' => (int) $kilometer,
        ':kondisi'   => $kondisi,
        ':id'        => $id,
    ]);

    $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Mobil berhasil diperbarui.'];
    header('Location: list.php');
    exit;
} catch (PDOException $e) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Gagal memperbarui: ' . $e->getMessage()];
    header('Location: edit.php?id=' . urlencode($id));
    exit;
}