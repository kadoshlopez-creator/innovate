<?php
/**
 * Seed script: populate title_zh, short_description_zh, description_zh
 * Run once: php database/seed_zh.php
 */

// ── Bootstrap mínimo ─────────────────────────────────────────────────────────
$root = dirname(__DIR__);
$env  = parse_ini_file($root . '/.env');

$dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4',
    $env['DB_HOST'] ?? '127.0.0.1',
    $env['DB_PORT'] ?? '3306',
    $env['DB_DATABASE']
);

try {
    $pdo = new PDO($dsn, $env['DB_USERNAME'], $env['DB_PASSWORD'], [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci",
    ]);
} catch (PDOException $e) {
    die("❌ Conexión fallida: " . $e->getMessage() . "\n");
}

// ── Traducciones ──────────────────────────────────────────────────────────────
$services = [
    1 => [
        'title_zh'             => '软件开发',
        'short_description_zh' => '我们打造定制化的软件解决方案，以优化您的业务流程。',
        'description_zh'       => '<p>我们采用最新技术开发个性化的网页与桌面应用。我们的专家工程师团队将从概念到部署全程与您携手合作。</p>',
    ],
    2 => [
        'title_zh'             => '移动应用',
        'short_description_zh' => '我们设计并开发 iOS 与 Android 的原生及混合应用。',
        'description_zh'       => '<p>我们打造直观、高性能的移动应用，结合 React Native、Flutter 与原生技术，确保卓越用户体验。</p>',
    ],
    3 => [
        'title_zh'             => '网页设计',
        'short_description_zh' => '现代化、极速的网站，专注于 SEO 优化与转化率提升。',
        'description_zh'       => '<p>从着陆页到复杂电商平台，我们设计并开发能将访客转化为客户的网站。</p>',
    ],
    4 => [
        'title_zh'             => '网络安全',
        'short_description_zh' => '我们通过审计、渗透测试与综合安全策略，为您的企业保驾护航。',
        'description_zh'       => '<p>我们提供全面的网络安全服务，包括渗透测试、安全审计、政策实施和事件响应。</p>',
    ],
    5 => [
        'title_zh'             => '人工智能',
        'short_description_zh' => '我们实施人工智能与机器学习解决方案，实现业务自动化并提升效能。',
        'description_zh'       => '<p>我们开发定制化的人工智能模型、智能聊天机器人、推荐系统和流程自动化，助力您的企业迈向新高度。</p>',
    ],
    6 => [
        'title_zh'             => 'IT 咨询',
        'short_description_zh' => '我们提供战略性咨询服务，使您的技术与企业目标保持一致。',
        'description_zh'       => '<p>我们的顾问将引导您完成数字化转型、技术选择、系统架构设计和 IT 战略规划。</p>',
    ],
    7 => [
        'title_zh'             => '企业技术支持',
        'short_description_zh' => '高性能技术支持：保障您的基础设施持续运作不中断。',
        'description_zh'       => '<p>我们通过高可用性支持工程，确保您的基础设施始终稳定可靠。结合内部部署与先进的远程管理，我们保障关键系统的持续运行，确保数据迁移安全无忧，架构集成顺畅无缝。</p>',
    ],
];

$stmt = $pdo->prepare(
    "UPDATE services SET title_zh=?, short_description_zh=?, description_zh=? WHERE id=?"
);

foreach ($services as $id => $data) {
    $stmt->execute([
        $data['title_zh'],
        $data['short_description_zh'],
        $data['description_zh'],
        $id,
    ]);
    echo "✓ Servicio #$id ({$data['title_zh']}) actualizado.\n";
}

echo "\n✅ Todas las traducciones chinas fueron guardadas correctamente.\n";
