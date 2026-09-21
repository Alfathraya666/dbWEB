</main>

    <footer>
        <p>&copy; 2026 AutoBekas Marketplace &mdash; Platform Jual Beli Mobil Bekas</p>
    </footer>
    <!-- Path disesuaikan dengan folder style/js/ -->
    <script src="<?php echo $base; ?>style/js/app.js"></script>
    <?php if (!empty($extra_scripts)): foreach ($extra_scripts as $src): ?>
    <script src="<?php echo $src; ?>"></script>
    <?php endforeach; endif; ?>
</body>
</html>