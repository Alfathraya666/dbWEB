<?php
session_start();
require __DIR__ . '/../includes/koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: list.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM pelanggan WHERE id = :id");
$stmt->execute([':id' => $id]);
$pelanggan = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$pelanggan) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Data pelanggan tidak ditemukan.'];
    header('Location: list.php');
    exit;
}

$page_title = "Edit Pelanggan";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>
        <section>
            <h2>Edit Data Pelanggan</h2>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
            <?php endif; ?>

            <form id="form-tambah" method="post" action="proses_edit.php">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($pelanggan['id']); ?>">
                <p>
                    <label for="nama">Nama Lengkap</label><br>
                    <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($pelanggan['nama']); ?>" required>
                </p>
                <p>
                    <label for="no_ktp">No. KTP</label><br>
                    <input type="text" id="no_ktp" name="no_ktp" value="<?php echo htmlspecialchars($pelanggan['no_ktp']); ?>" required>
                </p>
                <p>
                    <label for="alamat">Alamat</label><br>
                    <input type="text" id="alamat" name="alamat" value="<?php echo htmlspecialchars($pelanggan['alamat']); ?>">
                </p>
                <p>
                    <label for="no_hp">No. HP / WhatsApp</label><br>
                    <input type="text" id="no_hp" name="no_hp" value="<?php echo htmlspecialchars($pelanggan['no_hp']); ?>">
                </p>
                <p>
                    <button type="submit">Update Pelanggan</button>
                </p>
            </form>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>