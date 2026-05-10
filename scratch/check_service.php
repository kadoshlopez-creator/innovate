<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

use App\Core\Database;

$db = Database::getInstance();
$stmt = $db->query("SELECT * FROM services WHERE title = 'Soporte Técnico Empresarial' OR slug = 'otros-servicios'");
$service = $stmt->fetch();

print_r($service);
