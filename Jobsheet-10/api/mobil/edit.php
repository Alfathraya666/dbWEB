<?php
session_start();
require __DIR__ . '/../includes/koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('location: list.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM mobil WHERE id = :id");
$stmt->execute([':id' => $id]);
$mobil = $stmt ->fetch(PDO :: FETCH_ASSOC);

if (!$mobil) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Data mobil tidak ditemukan. '];
    header('Location: list.php');
    exit;
}

$page_tittle = "Edit Mobil";
include __DIR__ . './../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>
        <section>
            <h2>Edit Data Mobil</h2>

            <?php if ($flash): ?>
                <p class="flash flash-<php echo $flash['type]; ?>"><?php echo $flash['pesan']; ?></p>
                <?php endif; ?>

                <form id="form-tambah" method="post" action="proses_edit.php">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($mobil['id']); ?>">
                <p>
                    <label for="merk">Merk Mobil</label><br>
                    <input type="text" id="Merk" name="merk" value="<?php echo htmlspecialchars($mobil['merk']); ?>" required>
                </p>
                <p>
                    <label for="model">Model / Tipe</label><br>
                    <input type="text" id="model" name="model" value="<?php echo htmlspecialchars($mobil['model']); ?>" required>
                </p>
                <p>
                    <label for="tahun">Tahun Pembuatan</label><br>
                    <input type="number" id="tahun" name="tahun" min="1990" max="2026" value="<?php echo htmlspecialchars($mobil['tahun']); ?>" required>
                </p>
                <p>
                    <label for="harga">Harga (Rp)</label><br>
                    <input type="number" id="harga" name="harga" min="0" value="<?php echo htmlspecialchars($mobil['harga']); ?>" required>
                </p>
                <p>
                    <label for="kilometer">Kilometer (KM)</label><br>
                    <input type="number" id="kilometer" name="kilometer" min="0" value="<?php echo htmlspecialchars($mobil['kilometer']); ?>" required>
                </p>
                <p>
                    <label for="kondisi">Kondisi Kendaraan</label><br>
                    <select id="kondisi" name="kondisi">
                        <?php foreach (["Sangat Baik", "Baik", "Butuh Perbaikan"] as $opsi): ?>
                        <option value="<?php echo $opsi; ?>" <?php echo ($mobil['kondisi'] === $opsi) ? 'selected' : ''; ?>><?php echo $opsi; ?></option>
                        <?php endforeach; ?>
                    </select>
                </p> 
                <p>
                   <button type="submit">Update Data Mobil</button>
                </p>
            </form>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?> 