<?php
$page_title = "Beranda";
include __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/koneksi.php';

$totalMobil = (int) $pdo->query("SELECT COUNT(*) FROM mobil")->fetchColumn();
$totalPelanggan = (int) $pdo->query("SELECT COUNT(*) FROM pelanggan")->fetchColumn();
?>
        <section>
            <h2>Selamat Datang di AutoBekas Marketplace</h2>
            <p>Platform terpercaya untuk mencari dan menjual mobil bekas berkualitas.</p>
        </section>

        <section>
            <h2>Ringkasan Dashboard</h2>
            <article>
                <h3>Total Mobil Tersedia</h3>
                <p><?php echo $totalMobil; ?></p>
            </article>
            <article>
                <h3>Total Pelanggan</h3>
                <p><?php echo $totalPelanggan; ?></p>
            </article>
            <article>
                <h3>Mobil Terjual</h3>
                <p>0</p>
            </article>
        </section>
<?php include __DIR__ . '/includes/footer.php'; ?>