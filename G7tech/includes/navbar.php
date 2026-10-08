<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<header class="site-header">
    <nav class="main-nav container" aria-label="Main navigation">
        <a href="index.php" class="brand" aria-label="G7tech home page">G7TECH</a>

        <button class="nav-toggle" aria-label="Toggle navigation" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="nav-menu">
            <?php foreach ($navItems as $item): ?>
                <?php
                $linkClass = 'nav-link';
                if (basename($item['url']) === $currentPage) {
                    $linkClass .= ' active';
                }
                ?>
                <a href="<?= htmlspecialchars($item['url'], ENT_QUOTES, 'UTF-8'); ?>" class="<?= $linkClass; ?>"><?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?></a>
            <?php endforeach; ?>
        </div>
    </nav>
</header>
