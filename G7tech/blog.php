<?php
require __DIR__ . '/config.php';
$pageTitle = 'Blog';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>

<main id="main-content">
    <section class="page-banner reveal">
        <div class="container">
            <p class="section-kicker">THOUGHTS & NOTES</p>
            <h1>Blog</h1>
        </div>
    </section>

    <section class="section reveal">
        <div class="container blog-grid">
            <?php foreach ($blogPosts as $post): ?>
                <article class="blog-card">
                    <div class="blog-meta">
                        <span><?= htmlspecialchars($post['category'], ENT_QUOTES, 'UTF-8'); ?></span>
                        <span><?= htmlspecialchars($post['date'], ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>
                    <h2><?= htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    <p><?= htmlspecialchars($post['excerpt'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <a href="#" class="inline-link">Read More <span aria-hidden="true">→</span></a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
