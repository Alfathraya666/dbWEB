<?php
session_start();

if (getenv('VERCEL')) {
    // Di Vercel: path absolut dari root domain
    $base = '/';
} else {
    // Di lokal (Laragon): rumus relatif yang lama
    $__jobsheetRoot = dirname(__DIR__);
    $__scriptDir = dirname($_SERVER['SCRIPT_FILENAME']);
    $__rel = ltrim(str_replace('\\', '/', substr($__scriptDir, strlen($__jobsheetRoot))), '/');
    $base = $__rel === '' ? '' : str_repeat('../', substr_count($__rel, '/') + 1);
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AutoBekas<?php echo isset($page_title) ? ' | ' . $page_title : ''; ?></title>
    <!-- Path disesuaikan dengan folder style/css/ -->
    <link rel="stylesheet" href="<?php echo $base; ?>style/css/style.css">
</head>
<body>
    <header>
        <h1>AutoBekas Marketplace</h1>
        <button type="button" id="nav-toggle-btn" class="nav-toggle-label" aria-label="Menu">&#9776;</button>
        <nav>
            <ul>
                <li><a href="<?php echo $base; ?>index.php">Beranda</a></li>
                <li><a href="<?php echo $base; ?>mobil/list.php">Daftar Mobil</a></li>
                <li><a href="<?php echo $base; ?>mobil/tambah.php">Tambah Mobil</a></li>
                <li><a href="<?php echo $base; ?>pelanggan/list.php">Daftar Pelanggan</a></li>
                <li><a href="<?php echo $base; ?>pelanggan/tambah.php">Tambah Pelanggan</a></li>
            </ul>
        </nav>
    </header>

    <main>