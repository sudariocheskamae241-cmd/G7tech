<section id="about" class="section about-section reveal">
    <div class="container about-card">
        <div class="about-visual">
            <img src="<?= htmlspecialchars(!empty($portfolioProfile['profile_picture']) ? $portfolioProfile['profile_picture'] : 'assets/images/about-character.svg', ENT_QUOTES, 'UTF-8'); ?>" alt="Portfolio profile picture">
        </div>

        <div class="about-copy">
            <p class="section-kicker">ABOUT US</p>
            <h2>we are G7tech, a 2D Animator and Motion Designer who loves turning ideas into playful, impactful visuals.</h2>
            <p>
                We enjoy telling stories that entertain, connect and leave a lasting impression.
                Our creative process blends storytelling, motion, and energetic visual design to build work that feels fresh, expressive, and memorable.
            </p>
            <a href="about.php" class="btn btn-secondary inline-btn">Know More About Us <span aria-hidden="true">→</span></a>
        </div>
    </div>
</section>
