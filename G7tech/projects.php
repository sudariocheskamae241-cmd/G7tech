<?php
require __DIR__ . '/config.php';
$pageTitle = 'Projects';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>

<main id="main-content">
    <section class="page-banner reveal">
        <div class="container">
            <p class="section-kicker">SELECTED WORK</p>
            <h1>Projects</h1>
        </div>
    </section>

    <section id="featured-projects" class="section reveal">
        <div class="container projects-grid projects-page-grid">
            <?php foreach ($projects as $project): ?>
                <?php
                $projectId = strtolower(str_replace([' ', '!', '?', '&'], '-', trim($project['title'])));
                ?>
                <article class="project-card reveal" id="<?= htmlspecialchars($projectId, ENT_QUOTES, 'UTF-8'); ?>">
                    <div class="project-image-wrap">
                        <img src="<?= htmlspecialchars($project['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?= htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8'); ?> project preview">
                    </div>
                    <div class="project-info">
                        <div>
                            <h3><?= htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                            <p><?= htmlspecialchars($project['category'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                        <a href="<?= htmlspecialchars($project['url'], ENT_QUOTES, 'UTF-8'); ?>" aria-label="View project <?= htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8'); ?>">
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
