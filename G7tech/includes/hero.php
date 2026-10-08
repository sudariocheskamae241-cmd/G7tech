<section id="home" class="hero reveal">
    <div class="container hero-grid">
        <div class="hero-copy">
            <div class="eyebrow handwritten">Hey,</div>
            <h1 class="hero-title">
                <span class="intro-line">Hello, we are</span>
                <span class="brush-text">G7TECH</span>
            </h1>
            <div class="title-underline" aria-hidden="true"></div>
            <div class="speech-bubble" aria-label="Let's create something awesome">LET'S CREATE<br>SOMETHING<br>AWESOME!</div>
            <p class="subtitle">2D Animator • Motion Designer • Video Editor</p>

            <div class="hero-actions">
                <a href="manage-portfolio.php" class="btn btn-primary" aria-label="Create portfolio">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>Create Portfolio</span>
                </a>
                <a href="projects.php#featured-projects" class="btn btn-secondary">View Projects <span aria-hidden="true">↗</span></a>
            </div>

            <div class="scroll-indicator" aria-label="Scroll down">
                <span>Scroll Down</span>
                <i class="fa-solid fa-arrow-down"></i>
            </div>
        </div>

        <div class="hero-visual" aria-label="Portfolio profile image">
            <span class="orb orb-one" aria-hidden="true"></span>
            <span class="orb orb-two" aria-hidden="true"></span>
            <span class="sparkle sparkle-one" aria-hidden="true">✦</span>
            <span class="sparkle sparkle-two" aria-hidden="true">✦</span>
            <span class="doodle doodle-smile" aria-hidden="true">:)</span>
            <span class="doodle doodle-bolt" aria-hidden="true">⚡</span>
            <span class="doodle doodle-arrow" aria-hidden="true">→</span>
            <img src="<?= htmlspecialchars(!empty($portfolioProfile['profile_picture']) ? $portfolioProfile['profile_picture'] : 'assets/images/hero-character.svg', ENT_QUOTES, 'UTF-8'); ?>" alt="Portfolio profile picture" class="hero-character">
        </div>
    </div>
</section>
