<?php
require __DIR__ . '/../includes/auth.php';
require_guest();   // sudah login? langsung ke Beranda

$page_title = 'Login';
$hide_nav = true;  // menu disembunyikan di halaman login
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
$oldUsername = $_SESSION['old_username'] ?? '';
unset($_SESSION['flash'], $_SESSION['old_username']);
$habisLogout = ($_GET['status'] ?? '') === 'logout';
?>
        <section class="auth-card">
            <h2>Masuk ke akun</h2>
            <p class="auth-sub">Login dulu untuk kelola data mobil dan pelanggan.</p>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo htmlspecialchars($flash['pesan']); ?></p>
            <?php elseif ($habisLogout): ?>
                <p class="flash flash-success">Kamu sudah logout.</p>
            <?php endif; ?>

            <form method="post" action="proses_login.php">
                <p>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($oldUsername); ?>" autocomplete="username" required autofocus>
                </p>
                <p>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" autocomplete="current-password" required>
                </p>
                <p>
                    <button type="submit">Masuk</button>
                </p>
            </form>

            <p class="auth-alt">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>