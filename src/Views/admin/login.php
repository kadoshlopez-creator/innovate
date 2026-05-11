<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Innovate | Arquitectura robusta. Negocios imparables.</title>
    <link rel="icon" type="image/png" href="/assets/images/favicon.png?v=1.1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-950 min-h-screen flex items-center justify-center p-4">

<div class="w-full max-w-sm">
    <!-- Logo -->
    <div class="text-center mb-8">
        <img src="/assets/images/logo-dark.png" alt="Innovate" class="h-20 w-auto mx-auto mb-4 drop-shadow-xl">
        <h1 class="text-2xl font-bold text-white">Panel Admin</h1>
        <p class="text-gray-500 text-sm mt-1">Ingresa tus credenciales para continuar</p>
    </div>

    <?php if (!empty($_flash_error)): ?>
    <div x-data="{show:true}" x-show="show" class="flex items-center gap-3 bg-red-500/10 border border-red-500/20 text-red-400 px-4 py-3 rounded-xl mb-6 text-sm">
        <i class="fas fa-exclamation-circle flex-shrink-0"></i>
        <?= e($_flash_error) ?>
    </div>
    <?php endif; ?>

    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
        <form method="POST" action="/admin/login" class="space-y-5">
            <?= csrf_field() ?>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">Email</label>
                <div class="relative">
                    <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 text-sm"></i>
                    <input type="email" name="email" required autofocus
                           class="w-full bg-gray-800 border border-gray-700 focus:border-blue-500 rounded-xl pl-11 pr-4 py-3 text-white placeholder-gray-500 text-sm outline-none transition-colors"
                           placeholder="admin@empresa.com">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">Contraseña</label>
                <div class="relative" x-data="{ show: false }">
                    <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 text-sm"></i>
                    <input :type="show ? 'text' : 'password'" name="password" required
                           class="w-full bg-gray-800 border border-gray-700 focus:border-blue-500 rounded-xl pl-11 pr-11 py-3 text-white placeholder-gray-500 text-sm outline-none transition-colors"
                           placeholder="••••••••">
                    <button type="button" @click="show = !show"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-300 transition-colors">
                        <i :class="show ? 'fas fa-eye-slash' : 'fas fa-eye'" class="text-sm"></i>
                    </button>
                </div>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-500 text-white font-semibold py-3.5 rounded-xl text-sm transition-all hover:shadow-lg hover:shadow-blue-500/30 mt-2">
                Iniciar Sesión
            </button>
        </form>
    </div>

    <p class="text-center text-gray-600 text-xs mt-6">
        <a href="/" class="hover:text-gray-400 transition-colors">← Volver al sitio</a>
    </p>
</div>

</body>
</html>
