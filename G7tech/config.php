<?php
require __DIR__ . '/database.php';

$fallbackProfile = [
    'full_name' => 'G7tech',
    'email' => 'hello@g7tech.com',
    'phone' => '+63 912 345 6789',
    'address' => 'Philippines',
    'about_me' => 'We are G7tech, a creative studio focused on turning ideas into playful, impactful digital experiences.',
    'profile_picture' => 'assets/images/hero-character.svg',
    'social_links' => [
        'instagram' => 'https://instagram.com',
        'youtube' => 'https://youtube.com',
        'google' => 'https://google.com',
        'facebook' => 'https://facebook.com',
    ],
    'skills' => [
        ['name' => 'Toon Boom Harmony', 'icon' => 'fa-solid fa-film'],
        ['name' => 'Adobe After Effects', 'icon' => 'fa-solid fa-wand-magic-sparkles'],
        ['name' => 'Adobe Animate', 'icon' => 'fa-solid fa-palette'],
        ['name' => 'Adobe Photoshop', 'icon' => 'fa-solid fa-pen-ruler'],
        ['name' => 'Blender', 'icon' => 'fa-solid fa-cubes'],
        ['name' => 'Premiere Pro', 'icon' => 'fa-solid fa-video'],
    ],
];

$portfolioProfile = getPortfolioProfile($fallbackProfile);

$siteName = 'G7tech';
$siteTitle = 'G7tech | 2D Animator • Motion Designer • Video Editor';
$siteDescription = 'Creative portfolio and motion design studio website for G7tech, a 2D animator, motion designer, and video editor.';
$siteUrl = 'http://www.g7tech.com';
$siteEmail = $portfolioProfile['email'];
$siteLocation = $portfolioProfile['address'];

$socialLinks = $portfolioProfile['social_links'];

$navItems = [
    ['label' => 'Home', 'url' => 'index.php'],
    ['label' => 'Projects', 'url' => 'projects.php'],
    ['label' => 'About', 'url' => 'about.php'],
    ['label' => 'Blog', 'url' => 'blog.php'],
    ['label' => 'Contact', 'url' => 'contact.php'],
    ['label' => 'Database Info', 'url' => 'database-info.php'],
    ['label' => 'Manage', 'url' => 'manage-portfolio.php'],
];

$projects = [
    [
        'title' => 'RUN!',
        'category' => '2D Animation',
        'image' => 'assets/images/project1.svg',
        'url' => 'projects.php#run',
    ],
    [
        'title' => 'DAYDREAMS',
        'category' => 'Motion Graphics',
        'image' => 'assets/images/project2.svg',
        'url' => 'projects.php#daydreams',
    ],
    [
        'title' => 'LOST SIGNAL',
        'category' => 'Animated Short',
        'image' => 'assets/images/project3.svg',
        'url' => 'projects.php#lost-signal',
    ],
    [
        'title' => 'GROOVY TUNES',
        'category' => 'Music Video',
        'image' => 'assets/images/project4.svg',
        'url' => 'projects.php#groovy-tunes',
    ],
];

$skills = $portfolioProfile['skills'];

$blogPosts = [
    [
        'title' => 'Designing Character Energy Through Motion',
        'category' => 'Animation',
        'date' => 'May 12, 2026',
        'excerpt' => 'A look into how timing, gesture, and emotional beats shape unforgettable character animation.',
    ],
    [
        'title' => 'Why Story-Driven Motion Makes Brands Memorable',
        'category' => 'Marketing',
        'date' => 'April 02, 2026',
        'excerpt' => 'Creative strategy can elevate a simple product story into an experience people connect with.',
    ],
    [
        'title' => 'The Art of Building Playful Visual Systems',
        'category' => 'Creative Direction',
        'date' => 'March 18, 2026',
        'excerpt' => 'How consistent color, pacing, and shape language create a distinct visual identity across motion work.',
    ],
];

$portfolioFacts = [
    ['label' => 'Years Experience', 'value' => '6+'],
    ['label' => 'Projects Delivered', 'value' => '100+'],
    ['label' => 'Client Satisfaction', 'value' => '96%'],
];
