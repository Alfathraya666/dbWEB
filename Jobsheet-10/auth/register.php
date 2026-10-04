<?php
require __DIR__ . '/../includes/auth.php';
require_guest();

$page_title = 'Daftar';
$hide_nav = true;
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
$old = $_SESSION['old'] ?? [];
unset($_SESSION['flash'], $_SESSION['old']);
?>
        <section class="auth-card">
            <h2>Buat akun baru</h2>
            <p class="auth-sub">Daftar dulu supaya bisa mengelola data AutoBekas.</p>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo htmlspecialchars($flash['pesan']); ?></p>
            <?php endif; ?>

            <form method="post" action="proses_register.php">
                <p>
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?php echo htmlspecialchars($old['nama_lengkap'] ?? ''); ?>" autocomplete="name" required autofocus>
                </p>
                <p>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($old['username'] ?? ''); ?>" autocomplete="username" required>
                    <small class="field-hint">3-30 karakter: huruf, angka, atau underscore (_).</small>
                </p>
                <p>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" autocomplete="new-password" required>
                    <small class="field-hint">Minimal 8 karakter.</small>
                </p>
                <p>
                    <label for="password2">Ulangi Password</label>
                    <input type="password" id="password2" name="password2" autocomplete="new-password" required>
                </p>
                <p>
                    <button type="submit">Daftar</button>
                </p>
            </form>

            <p class="auth-alt">Sudah punya akun? <a href="login.php">Login</a></p>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>