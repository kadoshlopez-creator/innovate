<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

use App\Core\Database;

try {
    $db = Database::getInstance();

    // Add columns to services
    $db->exec("ALTER TABLE services ADD COLUMN title_en VARCHAR(255) AFTER title");
    $db->exec("ALTER TABLE services ADD COLUMN short_description_en TEXT AFTER short_description");
    $db->exec("ALTER TABLE services ADD COLUMN description_en TEXT AFTER description");

    echo "Database schema updated for services translation.\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
