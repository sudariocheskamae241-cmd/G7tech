<?php

$dbConfig = [
    'type' => getenv('DB_TYPE') ?: 'mysql',
    'host' => getenv('DB_HOST') ?: '127.0.0.1',
    'port' => (int) (getenv('DB_PORT') ?: 3306),
    'database' => getenv('DB_NAME') ?: 'g7tech_db',
    'username' => getenv('DB_USERNAME') ?: 'root',
    'password' => getenv('DB_PASSWORD') ?: '',
    'charset' => 'utf8mb4',
    'supabase_url' => getenv('SUPABASE_URL') ?: '',
    'supabase_service_role_key' => getenv('SUPABASE_SERVICE_ROLE_KEY') ?: getenv('SUPABASE_ANON_KEY') ?: '',
];

function isSupabaseConfigured(): bool
{
    return !empty($GLOBALS['dbConfig']['supabase_url']) && !empty($GLOBALS['dbConfig']['supabase_service_role_key']);
}

function getDatabaseType(): string
{
    return isSupabaseConfigured() ? 'Supabase' : 'MySQL';
}

function callSupabase(string $method, string $endpoint, ?array $payload = null): array
{
    if (!isSupabaseConfigured()) {
        return [];
    }

    if (!function_exists('curl_init')) {
        return [];
    }

    $url = rtrim($GLOBALS['dbConfig']['supabase_url'], '/') . '/rest/v1/' . ltrim($endpoint, '/');
    $apiKey = $GLOBALS['dbConfig']['supabase_service_role_key'];

    $headers = [
        'apikey: ' . $apiKey,
        'Authorization: Bearer ' . $apiKey,
        'Content-Type: application/json',
        'Accept: application/json',
    ];

    if ($method === 'POST' || $method === 'PATCH' || $method === 'PUT' || $method === 'DELETE') {
        $headers[] = 'Prefer: return=representation';
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    if ($payload !== null) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    }

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode >= 400 || $response === false) {
        return [];
    }

    $decoded = json_decode($response, true);
    return is_array($decoded) ? $decoded : [];
}

function getDbConnection(): ?PDO
{
    global $dbConfig;

    if (isSupabaseConfigured()) {
        return null;
    }

    $dsn = sprintf(
        'mysql:host=%s;port=%d;dbname=%s;charset=%s',
        $dbConfig['host'],
        (int) $dbConfig['port'],
        $dbConfig['database'],
        $dbConfig['charset']
    );

    try {
        $pdo = new PDO($dsn, $dbConfig['username'], $dbConfig['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);

        return $pdo;
    } catch (PDOException $exception) {
        return null;
    }
}

function ensureDatabaseSchema(): bool
{
    if (isSupabaseConfigured()) {
        return true;
    }

    $pdo = getDbConnection();

    if (!$pdo) {
        return false;
    }

    $queries = [
        "CREATE TABLE IF NOT EXISTS portfolio_profile (
            id INT AUTO_INCREMENT PRIMARY KEY,
            full_name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phone VARCHAR(255) DEFAULT '',
            address VARCHAR(255) DEFAULT '',
            about_me TEXT DEFAULT NULL,
            profile_picture VARCHAR(255) DEFAULT '',
            skills JSON DEFAULT NULL,
            social_links JSON DEFAULT NULL,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4",
        "CREATE TABLE IF NOT EXISTS portfolio_projects (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            category VARCHAR(255) NOT NULL,
            image VARCHAR(255) NOT NULL,
            url VARCHAR(255) DEFAULT '#',
            sort_order INT DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
    ];

    try {
        foreach ($queries as $query) {
            $pdo->exec($query);
        }

        return true;
    } catch (PDOException $exception) {
        return false;
    }
}

function getPortfolioProfile(array $fallback = []): array
{
    $profile = $fallback + [
        'full_name' => 'G7tech',
        'email' => 'hello@g7tech.com',
        'phone' => '+63 912 345 6789',
        'address' => 'Philippines',
        'about_me' => 'We are G7tech, a creative studio focused on turning ideas into playful, impactful digital experiences.',
        'profile_picture' => 'assets/images/hero-character.svg',
        'social_links' => [
            'instagram' => 'https://instagram.com',
            'youtube' => 'https://youtube.com',
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

    if (isSupabaseConfigured()) {
        $rows = callSupabase('GET', 'portfolio_profile?select=*');

        if (!empty($rows)) {
            $row = $rows[0];
            $profile['full_name'] = $row['full_name'] ?? $profile['full_name'];
            $profile['email'] = $row['email'] ?? $profile['email'];
            $profile['phone'] = $row['phone'] ?? $profile['phone'];
            $profile['address'] = $row['address'] ?? $profile['address'];
            $profile['about_me'] = $row['about_me'] ?? $profile['about_me'];
            $profile['profile_picture'] = $row['profile_picture'] ?? $profile['profile_picture'];
            $profile['social_links'] = json_decode($row['social_links'] ?? '[]', true) ?: $profile['social_links'];
            $profile['skills'] = json_decode($row['skills'] ?? '[]', true) ?: $profile['skills'];
        }

        return $profile;
    }

    $pdo = getDbConnection();

    if (!$pdo) {
        return $profile;
    }

    try {
        $tableExists = $pdo->query("SHOW TABLES LIKE 'portfolio_profile'");
        if ($tableExists->rowCount() === 0) {
            ensureDatabaseSchema();
        }

        $statement = $pdo->query('SELECT * FROM portfolio_profile ORDER BY id DESC LIMIT 1');
        $row = $statement->fetch();

        if ($row) {
            $profile['full_name'] = $row['full_name'] ?: $profile['full_name'];
            $profile['email'] = $row['email'] ?: $profile['email'];
            $profile['phone'] = $row['phone'] ?: $profile['phone'];
            $profile['address'] = $row['address'] ?: $profile['address'];
            $profile['about_me'] = $row['about_me'] ?: $profile['about_me'];
            $profile['profile_picture'] = $row['profile_picture'] ?: $profile['profile_picture'];
            $profile['social_links'] = json_decode($row['social_links'] ?? '[]', true) ?: $profile['social_links'];
            $profile['skills'] = json_decode($row['skills'] ?? '[]', true) ?: $profile['skills'];
        }
    } catch (PDOException $exception) {
        return $profile;
    }

    return $profile;
}

function savePortfolioProfile(array $data): bool
{
    if (isSupabaseConfigured()) {
        $payload = [
            'full_name' => $data['full_name'] ?? 'G7tech',
            'email' => $data['email'] ?? 'hello@g7tech.com',
            'phone' => $data['phone'] ?? '',
            'address' => $data['address'] ?? '',
            'about_me' => $data['about_me'] ?? '',
            'profile_picture' => $data['profile_picture'] ?? '',
            'skills' => json_encode($data['skills'] ?? []),
            'social_links' => json_encode($data['social_links'] ?? []),
        ];

        $existing = callSupabase('GET', 'portfolio_profile?select=id&order=id.desc&limit=1');
        if (!empty($existing)) {
            $response = callSupabase('PATCH', 'portfolio_profile?id=eq.' . (int) $existing[0]['id'], $payload);
            return !empty($response);
        }

        $response = callSupabase('POST', 'portfolio_profile', $payload);
        return !empty($response);
    }

    $pdo = getDbConnection();

    if (!$pdo) {
        return false;
    }

    if (!ensureDatabaseSchema()) {
        return false;
    }

    $payload = [
        'full_name' => $data['full_name'] ?? 'Dikshant',
        'email' => $data['email'] ?? 'hello@g7tech.com',
        'phone' => $data['phone'] ?? '',
        'address' => $data['address'] ?? '',
        'about_me' => $data['about_me'] ?? '',
        'profile_picture' => $data['profile_picture'] ?? '',
        'skills' => json_encode($data['skills'] ?? []),
        'social_links' => json_encode($data['social_links'] ?? []),
    ];

    try {
        $existing = $pdo->query('SELECT id FROM portfolio_profile ORDER BY id DESC LIMIT 1')->fetch();

        if ($existing) {
            $payload['id'] = (int) $existing['id'];
            $query = "UPDATE portfolio_profile
                      SET full_name = :full_name,
                          email = :email,
                          phone = :phone,
                          address = :address,
                          about_me = :about_me,
                          profile_picture = :profile_picture,
                          skills = :skills,
                          social_links = :social_links
                      WHERE id = :id";
        } else {
            $query = "INSERT INTO portfolio_profile (full_name, email, phone, address, about_me, profile_picture, skills, social_links)
                      VALUES (:full_name, :email, :phone, :address, :about_me, :profile_picture, :skills, :social_links)";
        }

        $statement = $pdo->prepare($query);
        return $statement->execute($payload);
    } catch (PDOException $exception) {
        return false;
    }
}
