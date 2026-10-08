<section id="featured-projects" class="section projects-section reveal">
    <div class="container">
        <div class="section-heading">
            <h2>FEATURED PROJECTS</h2>
            <a href="projects.php" class="heading-link">View All Projects <span aria-hidden="true">→</span></a>
        </div>

        <div class="projects-grid">
            <?php foreach ($projects as $index => $project): ?>
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
    </div>
</section>
