<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

use App\Core\Database;

$db = Database::getInstance();
$stmt = $db->query("SELECT * FROM services");
$results = $stmt->fetchAll();

echo "--- ALL SERVICES ---\n";
foreach ($results as $row) {
    echo "ID: " . $row['id'] . " | Title: " . $row['title'] . " | Slug: " . $row['slug'] . "\n";
    echo "Short Desc: " . $row['short_description'] . "\n";
    echo "Description: " . $row['description'] . "\n";
    echo "--------------------\n";
}
