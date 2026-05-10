<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

use App\Core\Database;

$db = Database::getInstance();
$stmt = $db->query("SELECT * FROM settings");
$results = $stmt->fetchAll();

echo "--- ALL SETTINGS ---\n";
foreach ($results as $row) {
    echo "ID: " . $row['id'] . " | Key: " . $row['key'] . " | Value: " . $row['value'] . "\n";
}
