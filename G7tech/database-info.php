<?php
require __DIR__ . '/config.php';
$pageTitle = 'Database Information';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>

<main id="main-content">
    <section class="page-banner reveal">
        <div class="container">
            <p class="section-kicker">ONLINE DATABASE</p>
            <h1>Database Information</h1>
        </div>
    </section>

    <section class="section reveal">
        <div class="container" style="max-width: 760px;">
            <div class="card" style="padding: 2rem; border-radius: 20px;">
                <p><strong>Database:</strong> MySQL</p>
                <p><strong>Database Project:</strong> G7tech Portfolio</p>
                <p><strong>Database Type:</strong> Local relational database</p>
                <p><strong>Status:</strong> Ready for XAMPP / WAMP / local MySQL connection.</p>
                <p><strong>Default Setup:</strong> Database name: g7tech_db | Host: 127.0.0.1 | Username: root | Password: empty</p>
                <p><strong>How to connect:</strong> Start MySQL in XAMPP, create the database, and import the SQL from schema.sql.</p>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
