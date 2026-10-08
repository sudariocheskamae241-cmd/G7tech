<?php
require __DIR__ . '/config.php';
$pageTitle = 'Home';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>

<main id="main-content">
    <?php include __DIR__ . '/includes/hero.php'; ?>
    <?php include __DIR__ . '/includes/showreel.php'; ?>
    <?php include __DIR__ . '/includes/projects.php'; ?>
    <?php include __DIR__ . '/includes/skills.php'; ?>
    <?php include __DIR__ . '/includes/about.php'; ?>
    <?php include __DIR__ . '/includes/contact.php'; ?>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
