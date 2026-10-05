<?php
require __DIR__ . '/includes/auth.php';
require_login();

$page_title = "Beranda";
include __DIR__ . '/includes/header.php';

$totalMobil     = (int) $pdo->query("SELECT COUNT(*) FROM mobil")->fetchColumn();
$totalPelanggan = (int) $pdo->query("SELECT COUNT(*) FROM pelanggan")->fetchColumn();
$rataHarga      = (int) $pdo->query("SELECT COALESCE(AVG(harga), 0) FROM mobil")->fetchColumn();
?>
        <section>
            <h2>Beranda</h2>

            <article>
                <h3>Total Mobil</h3>
                <p><?php echo $totalMobil; ?></p>
            </article>

            <article>
                <h3>Total Pelanggan</h3>
                <p><?php echo $totalPelanggan; ?></p>
            </article>

            <article>
                <h3>Rata-rata Harga</h3>
                <p>Rp <?php echo number_format($rataHarga, 0, ',', '.'); ?></p>
            </article>
        </section>
<?php include __DIR__ . '/includes/footer.php'; ?>