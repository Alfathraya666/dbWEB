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

            <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Tahun</th>
                        <th>Harga (Rp)</th>
                        <th>Kilometer</th>
                        <th>Kondisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($daftarMobil)): ?>
                    <tr>
                        <td colspan="7">Belum ada data mobil. Silakan tambah lewat menu "Tambah Mobil".</td>
                    </tr>
                    <?php else: ?>
                        <?php foreach ($daftarMobil as $mobil): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($mobil['merk']); ?></td>
                            <td><?php echo htmlspecialchars($mobil['model']); ?></td>
                            <td><?php echo $mobil['tahun']; ?></td>
                            <td>Rp <?php echo number_format($mobil['harga'], 0, ',', '.'); ?></td>
                            <td><?php echo number_format($mobil['kilometer'], 0, ',', '.'); ?> km</td>
                            <td><?php echo htmlspecialchars($mobil['kondisi']); ?></td>
                            <td>
                                <button type="button">Edit</button>
                                <button type="button" class="btn-hapus">Hapus</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            </div>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>