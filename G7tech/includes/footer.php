    <footer class="site-footer">
        <div class="container footer-inner">
            <p>© 2026 <?= htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?>. All rights reserved.</p>
            <div class="footer-links">
                <?php foreach ($navItems as $item): ?>
                    <a href="<?= htmlspecialchars($item['url'], ENT_QUOTES, 'UTF-8'); ?>"><?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?></a>
                <?php endforeach; ?>
            </div>
            <div class="footer-social">
                <?php foreach ($socialLinks as $key => $url): ?>
                    <a href="<?= htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noreferrer" aria-label="<?= ucfirst(htmlspecialchars($key, ENT_QUOTES, 'UTF-8')); ?>">
                        <i class="fa-brands fa-<?= htmlspecialchars($key, ENT_QUOTES, 'UTF-8'); ?>"></i>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>
