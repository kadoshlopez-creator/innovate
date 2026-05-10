<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

// Load .env
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

use App\Core\Database;

try {
    $db = Database::getInstance();

    $newDesc = '<p>Aseguramos la estabilidad de su infraestructura mediante ingeniería de soporte de alta disponibilidad. Gestionamos la continuidad operativa de sus sistemas críticos a través de despliegues In-House y administración remota avanzada, garantizando migraciones de datos seguras e integraciones estructurales sin fricciones.</p>';
    
    $stmt = $db->prepare("UPDATE services SET description = ? WHERE id = 7");
    $stmt->execute([$newDesc]);
    
    echo "Updated detailed description successfully.\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
