<?php
require __DIR__ . '/../includes/auth.php';
require_login();

$page_title = "Daftar Pelanggan";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
$daftarPelanggan = $pdo->query("SELECT * FROM pelanggan ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
        <section>
            <h2>Daftar Pelanggan</h2>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo htmlspecialchars($flash['pesan']); ?></p>
            <?php endif; ?>

            <div class="search-box">
                <label for="search-input">Cari Pelanggan</label>
                <input type="text" id="search-input" placeholder="Ketik nama pelanggan...">
            </div>

            <div class="customer-grid">
                <?php if (empty($daftarPelanggan)): ?>
                    <p class="empty-state">Belum ada data pelanggan. Silakan tambah lewat menu "Tambah Pelanggan".</p>
                <?php else: ?>
                    <?php foreach ($daftarPelanggan as $p): ?>
                    <div class="customer-card">
                        <div class="avatar"><?php echo strtoupper(substr($p['nama'], 0, 1)); ?></div>
                        <div class="customer-info">
                            <h3><?php echo htmlspecialchars($p['nama']); ?></h3>
                            <p>KTP: <?php echo htmlspecialchars($p['no_ktp']); ?></p>
                            <p><?php echo htmlspecialchars($p['alamat'] ?? ''); ?></p>
                            <p><?php echo htmlspecialchars($p['no_hp'] ?? ''); ?></p>
                            <div class="customer-actions">
                                <button type="button" onclick="window.location.href='edit.php?id=<?php echo $p['id']; ?>'">Edit</button>
                                <button type="button" class="btn-hapus" data-id="<?php echo $p['id']; ?>">Hapus</button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>