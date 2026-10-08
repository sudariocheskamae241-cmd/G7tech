<?php
require __DIR__ . '/config.php';
$pageTitle = 'Manage Portfolio';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadPath = '';
    $uploadDir = __DIR__ . '/uploads/profile';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!empty($_FILES['profile_picture_file']['name'])) {
        $fileName = time() . '_' . preg_replace('/[^A-Za-z0-9_.-]/', '_', basename($_FILES['profile_picture_file']['name']));
        $targetFile = $uploadDir . '/' . $fileName;

        if (move_uploaded_file($_FILES['profile_picture_file']['tmp_name'], $targetFile)) {
            $uploadPath = 'uploads/profile/' . $fileName;
        }
    }

    $payload = [
        'full_name' => trim($_POST['full_name'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'phone' => trim($_POST['phone'] ?? ''),
        'address' => trim($_POST['address'] ?? ''),
        'about_me' => trim($_POST['about_me'] ?? ''),
        'profile_picture' => $uploadPath ?: trim($_POST['profile_picture'] ?? ''),
        'skills' => array_values(array_filter(array_map('trim', preg_split('/\r\n|\n|,/', (string) ($_POST['skills'] ?? ''))))),
        'social_links' => [
            'instagram' => trim($_POST['instagram'] ?? ''),
            'youtube' => trim($_POST['youtube'] ?? ''),
            'google' => trim($_POST['google'] ?? ''),
            'facebook' => trim($_POST['facebook'] ?? ''),
        ],
    ];

    $saved = savePortfolioProfile($payload);
    $databaseLabel = getDatabaseType();
    $message = $saved
        ? 'Portfolio information saved successfully to the ' . $databaseLabel . ' online database.'
        : 'No database connection is active yet. Configure your Supabase credentials in your environment or update the local MySQL settings in database.php.';
    $portfolioProfile = getPortfolioProfile($payload);
}
?>

<main id="main-content">
    <section class="page-banner reveal">
        <div class="container">
            <p class="section-kicker">PORTFOLIO DATABASE</p>
            <h1>Manage Portfolio</h1>
        </div>
    </section>

    <section class="section reveal">
        <div class="container manage-layout">
            <form class="portfolio-form" method="post" action="manage-portfolio.php" enctype="multipart/form-data">
                <?php if ($message): ?>
                    <div class="form-message"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div>
                <?php endif; ?>

                <?php if (!empty($portfolioProfile['profile_picture'])): ?>
                    <div class="profile-preview-box">
                        <img src="<?= htmlspecialchars($portfolioProfile['profile_picture'], ENT_QUOTES, 'UTF-8'); ?>" alt="Current profile picture" class="profile-preview-image">
                    </div>
                <?php endif; ?>

                <div class="form-grid">
                    <label>
                        Full Name
                        <input type="text" name="full_name" value="<?= htmlspecialchars($portfolioProfile['full_name'], ENT_QUOTES, 'UTF-8'); ?>">
                    </label>
                    <label>
                        Email
                        <input type="email" name="email" value="<?= htmlspecialchars($portfolioProfile['email'], ENT_QUOTES, 'UTF-8'); ?>">
                    </label>
                    <label>
                        Contact Number
                        <input type="text" name="phone" value="<?= htmlspecialchars($portfolioProfile['phone'], ENT_QUOTES, 'UTF-8'); ?>">
                    </label>
                    <label>
                        Address
                        <input type="text" name="address" value="<?= htmlspecialchars($portfolioProfile['address'], ENT_QUOTES, 'UTF-8'); ?>">
                    </label>
                    <label>
                        Profile Picture Upload
                        <input type="file" name="profile_picture_file" accept="image/*">
                    </label>
                    <label>
                        Profile Picture URL
                        <input type="text" name="profile_picture" value="<?= htmlspecialchars($portfolioProfile['profile_picture'], ENT_QUOTES, 'UTF-8'); ?>">
                    </label>
                    <label class="full-span">
                        About Me
                        <textarea name="about_me" rows="5"><?= htmlspecialchars($portfolioProfile['about_me'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </label>
                    <label class="full-span">
                        Skills (one per line or comma separated)
                        <textarea name="skills" rows="5"><?= htmlspecialchars(implode("\n", array_map(fn($item) => is_array($item) ? $item['name'] : $item, $portfolioProfile['skills'] ?? [])), ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </label>
                    <label>
                        Instagram
                        <input type="url" name="instagram" value="<?= htmlspecialchars($portfolioProfile['social_links']['instagram'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    </label>
                    <label>
                        YouTube
                        <input type="url" name="youtube" value="<?= htmlspecialchars($portfolioProfile['social_links']['youtube'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    </label>
                    <label>
                        Google
                        <input type="url" name="google" value="<?= htmlspecialchars($portfolioProfile['social_links']['google'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    </label>
                    <label>
                        Facebook
                        <input type="url" name="facebook" value="<?= htmlspecialchars($portfolioProfile['social_links']['facebook'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    </label>
                </div>

                <div class="form-actions">
                    <button class="btn btn-primary" type="submit">Save Portfolio</button>
                </div>
            </form>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
