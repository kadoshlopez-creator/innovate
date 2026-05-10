<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

// Load .env
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

use App\Core\Database;

try {
    $db = Database::getInstance();

    $title = 'Soporte Técnico Empresarial';
    $desc  = 'Soporte técnico de alto rendimiento: garantizamos la continuidad operativa de su infraestructura sin interrupciones.';
    
    // Find service by current title or slug
    $stmt = $db->prepare("UPDATE services SET title = ?, short_description = ? WHERE title = 'Otros Servicios' OR slug = 'otros-servicios'");
    $stmt->execute([$title, $desc]);
    
    if ($stmt->rowCount() > 0) {
        echo "Updated service successfully.\n";
    } else {
        echo "Service 'Otros Servicios' not found in database.\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
