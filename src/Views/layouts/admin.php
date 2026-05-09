<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Innovate | Arquitectura robusta. Negocios imparables.</title>
    <link rel="icon" type="image/png" href="/assets/images/logo-dark.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100 text-gray-800 antialiased" x-data="{ sidebarOpen: false }">

<?php
$currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$authUser = \App\Core\Auth::user();
$unread = $authUser ? \App\Models\Contact::unreadCount() : 0;
?>

<!-- Mobile overlay -->
<?php if ($authUser): ?>
<div x-show="sidebarOpen" @click="sidebarOpen=false"
     class="fixed inset-0 bg-black/50 z-20 lg:hidden"></div>

<!-- Sidebar -->
<aside class="fixed inset-y-0 left-0 w-64 bg-gray-900 text-white z-30 flex flex-col transition-transform duration-200"
       :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

    <!-- Logo -->
    <div class="h-16 flex items-center px-6 border-b border-gray-800">
        <a href="/admin/dashboard" class="flex items-center gap-3">
            <img src="/assets/images/logo-dark.png" alt="Innovate" class="h-12 w-auto">
        </a>
    </div>

    <!-- Nav -->
    <nav class="flex-1 px-3 py-6 space-y-1 overflow-y-auto">
        <?php
        $navItems = [
            ['/admin/dashboard',      'fas fa-chart-line',   'Dashboard'],
            ['/admin/servicios',      'fas fa-cogs',         'Servicios'],
            ['/admin/contactos',      'fas fa-envelope',     'Mensajes', $unread],
            ['/admin/configuracion',  'fas fa-sliders-h',    'Configuración'],
        ];
        foreach ($navItems as $navItem):
            [$href, $icon, $label] = $navItem;
            $badge = $navItem[3] ?? 0;
            $active = str_starts_with($currentPath, $href);
        ?>
        <a href="<?= $href ?>"
           class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors
                  <?= $active ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' ?>">
            <i class="<?= $icon ?> w-4 text-center"></i>
            <?= $label ?>
            <?php if ($badge): ?>
            <span class="ml-auto bg-red-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full"><?= $badge ?></span>
            <?php endif; ?>
        </a>
        <?php endforeach; ?>
    </nav>

    <!-- User + Logout -->
    <div class="px-3 py-4 border-t border-gray-800">
        <div class="flex items-center gap-3 px-3 mb-3">
            <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-sm font-bold">
                <?= strtoupper(substr($authUser['name'] ?? 'A', 0, 1)) ?>
            </div>
            <div class="min-w-0">
                <p class="text-sm font-medium text-white truncate"><?= e($authUser['name'] ?? '') ?></p>
                <p class="text-xs text-gray-400 truncate"><?= e($authUser['role'] ?? '') ?></p>
            </div>
        </div>
        <form method="POST" action="/admin/logout">
            <?= csrf_field() ?>
            <button type="submit" class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">
                <i class="fas fa-sign-out-alt w-4 text-center"></i> Cerrar Sesión
            </button>
        </form>
        <a href="/" target="_blank" class="mt-1 flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-gray-800 hover:text-white transition-colors">
            <i class="fas fa-external-link-alt w-4 text-center"></i> Ver Sitio
        </a>
    </div>
</aside>
<?php endif; ?>

<!-- Main content -->
<div class="<?= $authUser ? 'lg:pl-64' : '' ?> flex flex-col min-h-screen">
    <!-- Topbar -->
    <header class="h-16 bg-white border-b border-gray-200 flex items-center px-4 lg:px-8 sticky top-0 z-10">
        <?php if ($authUser): ?>
        <button @click="sidebarOpen=!sidebarOpen" class="lg:hidden text-gray-500 mr-4">
            <i class="fas fa-bars text-xl"></i>
        </button>
        <?php endif; ?>
        <h1 class="text-lg font-semibold text-gray-900"><?= e($title ?? '') ?></h1>
    </header>

    <!-- Flash messages -->
    <div class="px-4 lg:px-8 pt-4">
        <?php if (!empty($_flash_success)): ?>
        <div x-data="{show:true}" x-show="show" x-init="setTimeout(()=>show=false,4000)"
             class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4">
            <i class="fas fa-check-circle"></i>
            <?= e($_flash_success) ?>
        </div>
        <?php endif; ?>
        <?php if (!empty($_flash_error)): ?>
        <div x-data="{show:true}" x-show="show"
             class="flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4">
            <i class="fas fa-exclamation-circle"></i>
            <?= e($_flash_error) ?>
        </div>
        <?php endif; ?>
    </div>

    <!-- Page content -->
    <main class="flex-1 px-4 lg:px-8 py-4 pb-8">
        <?= $content ?>
    </main>
</div>

</body>
</html>
