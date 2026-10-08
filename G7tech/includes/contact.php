<section id="contact" class="section cta-section reveal">
    <div class="container cta-grid">
        <div class="cta-copy">
            <h2 class="handwritten large-title">LIFE IS ABOUT<br>CREATING<br><span class="outline-text">YOURSELF</span></h2>
        </div>

        <div class="cta-details">
            <div class="contact-item">
                <span class="label">Email</span>
                <a href="mailto:<?= htmlspecialchars($siteEmail, ENT_QUOTES, 'UTF-8'); ?>"><?= htmlspecialchars($siteEmail, ENT_QUOTES, 'UTF-8'); ?></a>
            </div>
            <div class="contact-item">
                <span class="label">Location</span>
                <p><?= htmlspecialchars($siteLocation, ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div class="social-row" aria-label="Social media links">
                <?php foreach ($socialLinks as $key => $url): ?>
                    <a href="<?= htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noreferrer" aria-label="<?= ucfirst(htmlspecialchars($key, ENT_QUOTES, 'UTF-8')); ?>">
                        <i class="fa-brands fa-<?= htmlspecialchars($key, ENT_QUOTES, 'UTF-8'); ?>"></i>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
