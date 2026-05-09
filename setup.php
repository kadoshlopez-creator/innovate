<?php
/**
 * Innovate CMS — Installation Wizard
 * Run this once: http://innovate.test/setup.php?token=YOUR_SETUP_TOKEN
 * DELETE this file after setup is complete.
 */

// ── Security: require a secret token from .env ────────────────────────────────
require __DIR__ . '/vendor/autoload.php';
$dotenvSetup = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenvSetup->safeLoad();

$setupToken = $_ENV['SETUP_TOKEN'] ?? '';
if ($setupToken === '' || ($_GET['token'] ?? '') !== $setupToken) {
    http_response_code(403);
    die('<h2 style="font-family:sans-serif;color:#dc2626">403 — Acceso denegado.</h2>'
      . '<p style="font-family:sans-serif;color:#6b7280">Agrega <code>SETUP_TOKEN=tu_clave</code> a tu <code>.env</code> y accede con <code>?token=tu_clave</code>.</p>');
}

// ── Already installed guard ───────────────────────────────────────────────────
if (file_exists(__DIR__ . '/.installed')) {
    die('<h2>Ya instalado.</h2><p>Elimina el archivo <code>.installed</code> si deseas reinstalar.</p>');
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // autoload & .env already loaded above for token check

    $host     = $_ENV['DB_HOST']     ?? '127.0.0.1';
    $port     = $_ENV['DB_PORT']     ?? '3306';
    $database = $_ENV['DB_DATABASE'] ?? 'innovate_cms';
    $username = $_ENV['DB_USERNAME'] ?? 'root';
    $password = $_ENV['DB_PASSWORD'] ?? '';

    $adminName  = trim($_POST['admin_name']  ?? '');
    $adminEmail = trim($_POST['admin_email'] ?? '');
    $adminPass  = $_POST['admin_password'] ?? '';

    if (!$adminName || !$adminEmail || !$adminPass) {
        $error = 'Todos los campos son requeridos.';
    } elseif (!filter_var($adminEmail, FILTER_VALIDATE_EMAIL)) {
        $error = 'Email inválido.';
    } elseif (strlen($adminPass) < 8) {
        $error = 'La contraseña debe tener al menos 8 caracteres.';
    } else {
        try {
            $dsn = "mysql:host={$host};port={$port};charset=utf8mb4";
            $pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

            // Create database
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$database}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            $pdo->exec("USE `{$database}`");

            // Run schema
            $schema = file_get_contents(__DIR__ . '/database/schema.sql');
            foreach (array_filter(array_map('trim', explode(';', $schema))) as $stmt) {
                if ($stmt) $pdo->exec($stmt);
            }

            // Admin user
            $hash = password_hash($adminPass, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'admin')");
            $stmt->execute([$adminName, $adminEmail, $hash]);

            // Default settings
            $settings = [
                ['site_name',        'Innovate',                             'general'],
                ['site_tagline',     'Soluciones Tecnológicas de Vanguardia','general'],
                ['site_description', 'Transformamos ideas en soluciones tecnológicas de alto impacto.', 'general'],
                ['contact_email',    $adminEmail,                            'contact'],
                ['contact_phone',    '+507 6633-3262',                       'contact'],
                ['contact_address',  'Panama City, Panama',                  'contact'],
                ['social_facebook',  '',                                     'social'],
                ['social_instagram', '',                                     'social'],
                ['social_linkedin',  '',                                     'social'],
                ['social_twitter',   '',                                     'social'],
            ];
            $ins = $pdo->prepare("INSERT IGNORE INTO settings (`key`, value, `group`) VALUES (?, ?, ?)");
            foreach ($settings as $s) $ins->execute($s);

            // Default services
            $services = [
                ['Desarrollo de Software', 'desarrollo-de-software', 'fas fa-code',        'Creamos soluciones de software a medida para optimizar tus procesos empresariales.',           '<p>Desarrollamos aplicaciones web y de escritorio personalizadas usando las últimas tecnologías. Nuestro equipo de ingenieros expertos trabaja contigo desde el concepto hasta el despliegue.</p>', 1],
                ['Aplicaciones Móviles',   'aplicaciones-moviles',   'fas fa-mobile-alt',   'Diseñamos y desarrollamos apps nativas e híbridas para iOS y Android.',                          '<p>Creamos aplicaciones móviles intuitivas y de alto rendimiento. Usamos React Native, Flutter y tecnologías nativas para garantizar la mejor experiencia de usuario.</p>',                  2],
                ['Páginas Web',            'paginas-web',            'fas fa-globe',        'Sitios web modernos, rápidos y optimizados para SEO y conversiones.',                             '<p>Diseñamos y desarrollamos sitios web que convierten visitantes en clientes. Desde landing pages hasta plataformas e-commerce complejas.</p>',                                              3],
                ['Ciberseguridad',         'ciberseguridad',         'fas fa-shield-alt',   'Protegemos tu empresa con auditorías, pentesting y estrategias de seguridad integrales.',        '<p>Ofrecemos servicios completos de ciberseguridad incluyendo pentesting, auditorías de seguridad, implementación de políticas y respuesta a incidentes.</p>',                               4],
                ['Inteligencia Artificial','inteligencia-artificial', 'fas fa-brain',        'Implementamos soluciones de IA y Machine Learning que automatizan y potencian tu negocio.',     '<p>Desarrollamos modelos de IA personalizados, chatbots inteligentes, sistemas de recomendación y automatización de procesos para llevar tu empresa al siguiente nivel.</p>',               5],
                ['Consultoría IT',         'consultoria-it',         'fas fa-lightbulb',    'Asesoramiento estratégico para alinear tu tecnología con los objetivos de tu empresa.',          '<p>Nuestros consultores te guían en la transformación digital, selección de tecnologías, arquitectura de sistemas y planificación estratégica de TI.</p>',                                    6],
                ['Otros Servicios',        'otros-servicios',        'fas fa-cogs',         'Soluciones tecnológicas adicionales adaptadas a las necesidades únicas de tu empresa.',          '<p>Ofrecemos una amplia gama de servicios adicionales incluyendo soporte técnico, migración de datos, integración de sistemas y mantenimiento de infraestructura.</p>',                      7],
            ];
            $ins2 = $pdo->prepare("INSERT IGNORE INTO services (title, slug, icon, short_description, description, active, order_index) VALUES (?,?,?,?,?,1,?)");
            foreach ($services as $svc) $ins2->execute($svc);

            // Mark as installed
            file_put_contents(__DIR__ . '/.installed', date('Y-m-d H:i:s'));

            $success = 'Instalación completada. <a href="/admin/login" style="color:#3b82f6">Ir al panel admin →</a>';
        } catch (Exception $e) {
            $error = 'Error: ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Instalación — Innovate CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-gray-100 min-h-screen flex items-center justify-center p-4">
<div class="w-full max-w-md">
    <div class="text-center mb-8">
        <img src="/assets/images/logo-dark.png" alt="Innovate" class="h-16 w-auto mx-auto mb-4 drop-shadow-xl">
        <h1 class="text-3xl font-bold text-white">Innovate CMS</h1>
        <p class="text-gray-400 mt-1">Asistente de instalación</p>
    </div>

    <?php if ($error): ?>
    <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-lg mb-4"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if ($success): ?>
    <div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-lg mb-4"><?= $success ?></div>
    <?php else: ?>

    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
        <p class="text-gray-400 text-sm mb-6">
            Asegúrate de haber creado el archivo <code class="text-blue-400">.env</code> con los datos de tu base de datos antes de continuar.
        </p>
        <form method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Nombre del administrador</label>
                <input type="text" name="admin_name" required class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white focus:border-blue-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Email del administrador</label>
                <input type="email" name="admin_email" required class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white focus:border-blue-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Contraseña (mín. 8 caracteres)</label>
                <input type="password" name="admin_password" required minlength="8" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white focus:border-blue-500 focus:outline-none">
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-semibold py-3 rounded-lg transition-colors">
                Instalar CMS
            </button>
        </form>
    </div>
    <?php endif; ?>
</div>
</body>
</html>
