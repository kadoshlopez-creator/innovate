<?php
$siteName   = \App\Models\Setting::get('site_name', 'Innovate');
$currentUri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$navLinks   = ['/' => 'Inicio', '/servicios' => 'Servicios', '/contacto' => 'Contacto'];
?>
<header x-data="{ open:false, scrolled:false }"
        x-init="window.addEventListener('scroll', ()=> scrolled = window.scrollY > 40)"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-500"
        :class="scrolled
            ? 'bg-[#020817]/90 backdrop-blur-xl border-b border-white/[0.06] shadow-2xl shadow-black/30'
            : 'bg-transparent border-b border-transparent'">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-18">

            <!-- Logo -->
            <a href="/" class="flex items-center gap-3 group">
                <img src="/assets/images/logo-dark.png" alt="Innovate" class="h-10 w-auto drop-shadow-md transition-transform group-hover:scale-105">
            </a>

            <!-- Desktop nav -->
            <nav class="hidden md:flex items-center gap-1">
                <?php foreach ($navLinks as $href => $label):
                    $active = ($href === '/') ? ($currentUri === '/') : str_starts_with($currentUri, $href);
                ?>
                <a href="<?= $href ?>"
                   class="relative px-4 py-2 text-sm font-medium rounded-xl transition-all duration-200 group
                          <?= $active ? 'text-white' : 'text-slate-400 hover:text-white' ?>">
                    <?php if ($active): ?>
                    <span class="absolute inset-0 bg-white/[0.06] rounded-xl border border-white/[0.08]"></span>
                    <?php endif; ?>
                    <span class="relative"><?= $label ?></span>
                </a>
                <?php endforeach; ?>
            </nav>

            <!-- CTA + hamburger -->
            <div class="flex items-center gap-3">
                <a href="/contacto"
                   class="hidden md:inline-flex items-center gap-2 btn-neon text-white px-5 py-2.5 rounded-xl text-sm font-semibold">
                    Empezar <i class="fas fa-arrow-right text-xs"></i>
                </a>
                <button @click="open = !open"
                        class="md:hidden w-9 h-9 glass rounded-xl flex items-center justify-center text-slate-400 hover:text-white transition-colors border border-white/[0.07]">
                    <i class="fas text-sm" :class="open ? 'fa-times' : 'fa-bars'"></i>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="open" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-3"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-end="opacity-0 -translate-y-3"
             class="md:hidden pb-4">
            <div class="glass rounded-2xl border border-white/[0.07] p-2 mt-2 space-y-1">
                <?php foreach ($navLinks as $href => $label):
                    $active = ($href === '/') ? ($currentUri === '/') : str_starts_with($currentUri, $href);
                ?>
                <a href="<?= $href ?>"
                   class="flex items-center px-4 py-2.5 rounded-xl text-sm font-medium transition-colors
                          <?= $active ? 'text-white bg-white/[0.07]' : 'text-slate-400 hover:text-white hover:bg-white/[0.04]' ?>">
                    <?= $label ?>
                </a>
                <?php endforeach; ?>
                <div class="pt-1 px-1">
                    <a href="/contacto" class="block text-center btn-neon text-white py-2.5 rounded-xl text-sm font-semibold">
                        Empezar Proyecto
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
