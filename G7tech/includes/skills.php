<section id="skills" class="section skills-section reveal">
    <div class="container">
        <div class="section-heading single-line">
            <h2>LANGUAGES</h2>
        </div>

        <?php
        $defaultSkills = [
            [
                'name' => 'HTML',
                'svg' => '<svg viewBox="0 0 100 100" aria-hidden="true"><path d="M30 18h30l16 16v45c0 8-6 14-14 14H30c-8 0-14-6-14-14V32c0-8 6-14 14-14zm6 12v16h28V30H36zm30 0h10l-10-10v10z" fill="#b72a2a"/><path d="M52 20l14 14h-10c-2 0-4-2-4-4V20z" fill="#7b1a1a"/><text x="50" y="66" text-anchor="middle" font-size="18" font-weight="800" font-family="Arial, sans-serif" fill="#ffffff">&lt;/&gt;</text></svg>'
            ],
            [
                'name' => 'PHP',
                'svg' => '<svg viewBox="0 0 100 100" aria-hidden="true"><defs><linearGradient id="phpBlue" x1="0" x2="1" y1="0" y2="1"><stop offset="0%" stop-color="#5a98ff"/><stop offset="100%" stop-color="#2a5bd7"/></linearGradient></defs><path d="M16 36c0-12 9-20 24-20h19c17 0 25 9 25 20v28c0 12-8 20-25 20H40c-15 0-24-8-24-20V36zm18-8h19c10 0 15 5 15 13v4H30v-4c0-8 5-13 15-13z" fill="url(#phpBlue)" stroke="#183a9c" stroke-width="2"/><path d="M30 48h40v10H30zm0 16h28v10H30z" fill="#f4f7ff"/><text x="50" y="62" text-anchor="middle" font-size="24" font-weight="700" font-family="Arial, sans-serif" fill="#111111" letter-spacing="-1">php</text><path d="M64 30c7 0 14 4 18 12l-7 4c-2-4-6-6-11-6h-7v-10h7z" fill="#dfe9ff" opacity="0.8"/></svg>'
            ],
            [
                'name' => 'CSS',
                'svg' => '<svg viewBox="0 0 100 100" aria-hidden="true"><path d="M18 16h64l-10 58-22 10-22-10-10-58z" fill="#2b7dff"/><path d="M26 26h48l-4 30-20 8-20-8-2-14h12l1 7 9 3 9-3 1-9H34l-1-10h36l-1-8H26z" fill="#ffffff"/><path d="M50 24l18 6-4 12-14-5-14 5-4-12 18-6z" fill="#1e3fae" opacity="0.22"/><path d="M50 14l22 8-6 18-16-6-16 6-6-18 22-8z" fill="#1a56d8" opacity="0.25"/><text x="50" y="70" text-anchor="middle" font-size="32" font-weight="800" font-family="Arial, sans-serif" fill="#ffffff">3</text></svg>'
            ],
            [
                'name' => 'JAVASCRIPT',
                'svg' => '<svg viewBox="0 0 100 100" aria-hidden="true"><path d="M24 18h52l-8 60-18 10-18-10-8-60z" fill="#f2c430"/><path d="M50 26l18 6-2 19-16 7-16-7-2-19 18-6z" fill="#e6b230" opacity="0.15"/><text x="50" y="62" text-anchor="middle" font-size="20" font-weight="800" font-family="Arial, sans-serif" fill="#ffffff">&lt;/&gt;</text></svg>'
            ],
            [
                'name' => 'SQL',
                'svg' => '<svg viewBox="0 0 100 100" aria-hidden="true"><path d="M24 24c0-8 11-14 26-14s26 6 26 14v30c0 8-11 14-26 14S24 62 24 54V24zm0 14c0 8 11 14 26 14s26-6 26-14M24 38c0 8 11 14 26 14s26-6 26-14M24 52c0 8 11 14 26 14s26-6 26-14" fill="none" stroke="#1d7ec7" stroke-width="4" stroke-linecap="round"/><path d="M24 24c0 8 11 14 26 14s26-6 26-14M24 38c0 8 11 14 26 14s26-6 26-14M24 52c0 8 11 14 26 14s26-6 26-14" fill="none" stroke="#ffffff" stroke-opacity="0.2" stroke-width="2" stroke-linecap="round"/><rect x="36" y="64" width="28" height="6" rx="3" fill="#1d7ec7"/><rect x="30" y="74" width="40" height="6" rx="3" fill="#1d7ec7" opacity="0.75"/></svg>'
            ],
        ];

        if (empty($skills) || !is_array($skills)) {
            $skills = $defaultSkills;
        }
        ?>

        <div class="skills-row" aria-label="Programming languages and tools">
            <?php foreach ($skills as $skill): ?>
                <?php
                $skillName = is_array($skill) ? ($skill['name'] ?? 'Skill') : (string) $skill;
                $skillSvg = is_array($skill) ? ($skill['svg'] ?? '<svg viewBox="0 0 100 100"><circle cx="50" cy="50" r="20" fill="#b8ff00"/></svg>') : null;
                ?>
                <div class="skill-item">
                    <div class="skill-icon">
                        <?= $skillSvg ? $skillSvg : '<svg viewBox="0 0 100 100" aria-hidden="true"><circle cx="50" cy="50" r="20" fill="#b8ff00"/></svg>'; ?>
                    </div>
                    <span><?= htmlspecialchars($skillName, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
