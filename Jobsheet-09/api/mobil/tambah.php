<?php
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

            <form id="form-tambah" method="post" action="proses_tambah.php">
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