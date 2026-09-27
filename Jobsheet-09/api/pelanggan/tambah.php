<?php
//proses_tambah
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

//tambah
$page_title = "Tambah Pelanggan";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>
        <section>
            <h2>Tambah Pelanggan Baru</h2>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
            <?php endif; ?>

            <form id="form-tambah" method="post" action="tambah.php">
                <p>
                    <label for="nama">Nama Lengkap</label><br>
                    <input type="text" id="nama" name="nama" required>
                </p>
                <p>
                    <label for="no_ktp">No. KTP</label><br>
                    <input type="text" id="no_ktp" name="no_ktp" required>
                </p>
                <p>
                    <label for="alamat">Alamat</label><br>
                    <input type="text" id="alamat" name="alamat">
                </p>
                <p>
                    <label for="no_hp">No. HP / WhatsApp</label><br>
                    <input type="text" id="no_hp" name="no_hp">
                </p>
                <p>
                    <button type="submit">Simpan Pelanggan</button>
                </p>
            </form>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>