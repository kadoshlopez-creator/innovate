<?php

declare(strict_types=1);

define('ROOT', dirname(__DIR__));
define('START_TIME', microtime(true));

// Error reporting (overridden by .env)
ini_set('display_errors', '0');
error_reporting(E_ALL);

require ROOT . '/vendor/autoload.php';

// Load .env
$dotenv = Dotenv\Dotenv::createImmutable(ROOT);
$dotenv->safeLoad();

require ROOT . '/src/Helpers/lang.php';

$debug = ($_ENV['APP_DEBUG'] ?? 'false') === 'true';

if ($debug) {
    ini_set('display_errors', '1');
}

// ── Global exception & error handlers ────────────────────────────────────────
set_exception_handler(function (Throwable $e) use ($debug): void {
    http_response_code(500);
    if ($debug) {
        echo '<style>body{font-family:monospace;background:#0f172a;color:#e2e8f0;padding:2rem}'
           . 'h1{color:#f87171}pre{background:#1e293b;padding:1rem;border-radius:.5rem;overflow:auto}</style>';
        echo '<h1>⚠ ' . htmlspecialchars(get_class($e)) . '</h1>';
        echo '<p>' . htmlspecialchars($e->getMessage()) . '</p>';
        echo '<pre>' . htmlspecialchars($e->getTraceAsString()) . '</pre>';
    } else {
        echo '<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">'
           . '<title>Error del servidor</title></head><body style="font-family:sans-serif;'
           . 'background:#020817;color:#e2e8f0;display:flex;align-items:center;justify-content:center;'
           . 'min-height:100vh;margin:0;text-align:center">'
           . '<div><h1 style="font-size:4rem;margin:0;color:#38bdf8">500</h1>'
           . '<p style="color:#94a3b8">Ocurrió un error interno. Por favor intenta de nuevo más tarde.</p>'
           . '<a href="/" style="color:#38bdf8">← Volver al inicio</a></div></body></html>';
    }
    exit;
});

set_error_handler(function (int $severity, string $message, string $file, int $line) use ($debug): bool {
    if (!(error_reporting() & $severity)) {
        return false; // respect error_reporting level
    }
    throw new \ErrorException($message, 0, $severity, $file, $line);
});

// ─────────────────────────────────────────────────────────────────────────────

use App\Core\Session;
use App\Core\Router;
use App\Core\Request;
use App\Core\View;

Session::start();

$router = new Router();
require ROOT . '/config/routes.php';

$request = new Request();
$router->dispatch($request);
