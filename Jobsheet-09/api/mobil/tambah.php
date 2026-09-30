<?php
//proses tambah
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
}

//tambah
$page_title = "Tambah Mobil";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>
        <section>
            <h2>Tambah Data Mobil Bekas</h2>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
            <?php endif; ?>

            <form id="form-tambah" method="post" action="tambah.php">
                <p>
                    <label for="merk">Merk Mobil</label><br>
                    <input type="text" id="merk" name="merk" placeholder="misal: Toyota, Honda" required>
                </p>
                <p>
                    <label for="model">Model / Tipe</label><br>
                    <input type="text" id="model" name="model" placeholder="misal: Avanza Tioe G, Civic Turbo" required>
                </p>
                <p>
                    <label for="tahun">Tahun Pembuatan</label><br>
                    <input type="number" id="tahun" name="tahun" min="1990" max="2026" required>
                </p>
                <p>
                    <label for="harga">Harga (Rp)</label><br>
                    <input type="number" id="harga" name="harga" min="0" required>
                </p>
                <p>
                    <label for="kilometer">Kilometer (KM)</label><br>
                    <input type="number" id="kilometer" name="kilometer" min="0" required>
                </p>
                <p>
                    <label for="kondisi">Kondisi Kendaraan</label><br>
                    <select id="kondisi" name="kondisi">
                        <option value="Sangat Baik">Sangat Baik (Istimewa)</option>
                        <option value="Baik">Baik (Dipakai Harian)</option>
                        <option value="Butuh Perbaikan">Butuh Perbaikan</option>
                    </select>
                </p>
                <p>
                    <button type="submit">Simpan Data Mobil</button>
                </p>
            </form>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>