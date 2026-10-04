<?php
require_once __DIR__ . '/auth.php';   // sudah memuat init.php ($pdo, session, $base, $asset, $home)
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AutoBekas<?php echo isset($page_title) ? ' | ' . htmlspecialchars($page_title) : ''; ?></title>
    <link rel="stylesheet" href="<?php echo $asset; ?>css/style.css">
</head>
<body class="<?php echo !empty($hide_nav) ? 'auth-page' : ''; ?>">
    <header>
        <h1>AutoBekas Marketplace</h1>
        <?php if (empty($hide_nav)): ?>
        <nav>
            <ul>
                <li><a href="<?php echo $home; ?>">Beranda</a></li>
                <li><a href="<?php echo $base; ?>mobil/list.php">Daftar Mobil</a></li>
                <li><a href="<?php echo $base; ?>mobil/tambah.php">Tambah Mobil</a></li>
                <li><a href="<?php echo $base; ?>pelanggan/list.php">Daftar Pelanggan</a></li>
                <li><a href="<?php echo $base; ?>pelanggan/tambah.php">Tambah Pelanggan</a></li>
                <?php if (is_logged_in()): ?>
                <li class="nav-user">Halo, <?php echo htmlspecialchars($_SESSION['nama'] ?? ''); ?></li>
                <li><a class="nav-logout" href="<?php echo $base; ?>auth/logout.php">Logout</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <?php endif; ?>
    </header>

    <main>