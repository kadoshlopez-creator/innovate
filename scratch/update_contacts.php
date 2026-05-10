<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

// Load .env
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

use App\Core\Database;

try {
    $db = Database::getInstance();

    $settings = [
        'contact_email' => 'ventas@innovate.com.pa',
        'contact_phone' => '65389819'
    ];

    foreach ($settings as $key => $value) {
        $stmt = $db->prepare("UPDATE settings SET value = ? WHERE `key` = ?");
        $stmt->execute([$value, $key]);
        echo "Updated setting '$key' to '$value'\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
