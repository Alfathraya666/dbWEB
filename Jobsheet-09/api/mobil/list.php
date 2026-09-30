<?php
$page_title = "Daftar Mobil";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
$daftarMobil = $pdo->query("SELECT * FROM mobil ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
        <section>
            <h2>Daftar Mobil Bekas</h2>

            <?php if ($flash): ?> 
                <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
            <?php endif; ?>

            <div class="search-box">
                <label for="search-input">Cari Mobil</label>
                <input type="text" id="search-input" placeholder="Ketik merk atau model mobil...">
            </div>

                        <div class="car-grid">
                <?php if (empty($daftarMobil)): ?>
                    <p class="empty-state">Belum ada data mobil. Silakan tambah lewat menu "Tambah Mobil".</p>
                <?php else: ?>
                    <?php foreach ($daftarMobil as $i => $mobil):
                        $fotoClass = ['car-photo-a', 'car-photo-b', 'car-photo-c'][$i % 3];
                        $badgeClass = match($mobil['kondisi']) {
                            'Sangat Baik' => 'badge-baik',
                            'Baik' => 'badge-cukup',
                            default => 'badge-rusak',
                        };
                    ?>
                    <div class="car-card">
                        <div class="car-photo <?php echo $fotoClass; ?>">
                            <span><?php echo htmlspecialchars($mobil['merk']); ?></span>
                            <div class="price-tag">Rp <?php echo number_format($mobil['harga'], 0, ',', '.'); ?></div>
                        </div>
                        <div class="car-body">
                            <h3><?php echo htmlspecialchars($mobil['merk'] . ' ' . $mobil['model']); ?></h3>
                            <div class="car-stats">
                                <span><?php echo $mobil['tahun']; ?></span>
                                <span>&middot;</span>
                                <span><?php echo number_format($mobil['kilometer'], 0, ',', '.'); ?> km</span>
                            </div>
                            <span class="badge <?php echo $badgeClass; ?>"><?php echo htmlspecialchars($mobil['kondisi']); ?></span>
                            <div class="car-actions">
                                <button type="button" onclick="window.location.href='edit.php?id=<?php echo $mobil['id']; ?>'">Edit</button>
                                <button type="button" class="btn-hapus" data-id="<?php echo $mobil['id']; ?>">Hapus</button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>