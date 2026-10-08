<?php
require __DIR__ . '/config.php';
$pageTitle = 'About';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>

<main id="main-content">
    <section class="page-banner reveal">
        <div class="container">
            <p class="section-kicker">WHO I AM</p>
            <h1>About</h1>
        </div>
    </section>

    <section class="section reveal">
        <div class="container about-detail-grid">
            <div class="about-detail-visual">
                <img src="<?= htmlspecialchars(!empty($portfolioProfile['profile_picture']) ? $portfolioProfile['profile_picture'] : 'assets/images/about-character.svg', ENT_QUOTES, 'UTF-8'); ?>" alt="Profile photograph for the portfolio">
            </div>

            <div class="about-detail-copy">
                <h2>Creative storyteller with a love for expressive motion.</h2>
                <p>
                    We are Boragay Bj, Bahag Renan Jade, Baricuatro Marven, Layos Joshua, Savior Stephen Marburry and Sudario Cheska Mae, we are 2D Animator and Motion Designer who loves turning ideas into playful, impactful visuals. we are enjoy telling stories that entertain, connect and leave a lasting impression.
                </p>
                <p>
                    This work sits at the intersection of character animation, motion graphics, and visual storytelling. Whether it's a cinematic short, a bold brand animation, or a vibrant social campaign, we are focus on creating emotional clarity and visual energy.
                </p>

                <div class="stats-grid">
                    <?php foreach ($portfolioFacts as $fact): ?>
                        <div class="stat-item">
                            <span class="stat-value"><?= htmlspecialchars($fact['value'], ENT_QUOTES, 'UTF-8'); ?></span>
                            <span class="stat-label"><?= htmlspecialchars($fact['label'], ENT_QUOTES, 'UTF-8'); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
