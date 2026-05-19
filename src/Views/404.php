<section class="min-h-screen flex items-center justify-center bg-[#020817] relative overflow-hidden px-4">
    <div class="absolute inset-0 grid-bg opacity-20"></div>
    <div class="aurora absolute top-1/3 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-sky-600/10"></div>

    <div class="relative z-10 text-center max-w-lg">
        <p class="text-9xl font-black gradient-text-anim mb-6 leading-none">404</p>
        <h1 class="text-2xl font-bold text-white mb-4"><?= __('404.title', 'Página no encontrada') ?></h1>
        <p class="text-slate-400 mb-10 leading-relaxed">
            <?= __('404.desc', 'Lo sentimos, la página que buscas no existe, fue movida o está temporalmente no disponible.') ?>
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/" class="btn-neon inline-flex items-center justify-center gap-2.5 text-white px-7 py-3.5 rounded-2xl font-bold text-sm">
                <i class="fas fa-home"></i> <?= __('404.back_home', 'Volver al Inicio') ?>
            </a>
            <a href="/contacto" class="btn-ghost inline-flex items-center justify-center gap-2.5 text-slate-300 hover:text-white px-7 py-3.5 rounded-2xl font-semibold text-sm">
                <?= __('404.contact_support', 'Contactar Soporte') ?>
            </a>
        </div>
    </div>
</section>
