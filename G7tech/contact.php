<?php
require __DIR__ . '/config.php';
$pageTitle = 'Contact';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>

<main id="main-content">
    <section class="page-banner reveal">
        <div class="container">
            <p class="section-kicker">LET'S TALK</p>
            <h1>Contact</h1>
        </div>
    </section>

    <section class="section reveal">
        <div class="container contact-page-grid">
            <div class="contact-card">
                <h2>Start your next creative story.</h2>
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

            <form class="contact-form" action="#" method="post">
                <div class="form-row">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" placeholder="Your name" required>
                </div>
                <div class="form-row">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" placeholder="Your email" required>
                </div>
                <div class="form-row">
                    <label for="message">Project brief</label>
                    <textarea id="message" name="message" rows="5" placeholder="Tell me about your idea..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
