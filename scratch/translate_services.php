<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

use App\Core\Database;

$translations = [
    1 => [
        'title_en' => 'Software Development',
        'short_description_en' => 'We create custom software solutions to optimize your business processes.',
        'description_en' => '<p>We develop personalized web and desktop applications using the latest technologies. Our team of expert engineers works with you from concept to deployment.</p>'
    ],
    2 => [
        'title_en' => 'Mobile Applications',
        'short_description_en' => 'We design and develop native and hybrid apps for iOS and Android.',
        'description_en' => '<p>We create intuitive, high-performance mobile applications. We use React Native, Flutter, and native technologies to ensure the best user experience.</p>'
    ],
    3 => [
        'title_en' => 'Web Pages',
        'short_description_en' => 'Modern, fast websites optimized for SEO and conversions.',
        'description_en' => '<p>We design and develop websites that convert visitors into customers. From landing pages to complex e-commerce platforms.</p>'
    ],
    4 => [
        'title_en' => 'Cybersecurity',
        'short_description_en' => 'We protect your company with audits, pentesting, and comprehensive security strategies.',
        'description_en' => '<p>We offer complete cybersecurity services including pentesting, security audits, policy implementation, and incident response.</p>'
    ],
    5 => [
        'title_en' => 'Artificial Intelligence',
        'short_description_en' => 'We implement IA and Machine Learning solutions that automate and power your business.',
        'description_en' => '<p>We develop custom AI models, intelligent chatbots, recommendation systems, and process automation to take your company to the next level.</p>'
    ],
    6 => [
        'title_en' => 'IT Consulting',
        'short_description_en' => 'Strategic advice to align your technology with your business objectives.',
        'description_en' => '<p>Our consultants guide you through digital transformation, technology selection, system architecture, and strategic IT planning.</p>'
    ],
    7 => [
        'title_en' => 'Enterprise Technical Support',
        'short_description_en' => 'High-performance technical support: we guarantee the operational continuity of your infrastructure without interruptions.',
        'description_en' => '<p>We ensure the stability of your infrastructure through high-availability support engineering. We manage the operational continuity of your critical systems through In-House deployments and advanced remote administration, guaranteeing secure data migrations and friction-free structural integrations.</p>'
    ]
];

try {
    $db = Database::getInstance();

    foreach ($translations as $id => $data) {
        $stmt = $db->prepare("UPDATE services SET title_en = ?, short_description_en = ?, description_en = ? WHERE id = ?");
        $stmt->execute([$data['title_en'], $data['short_description_en'], $data['description_en'], $id]);
    }

    echo "Services translated in database.\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
