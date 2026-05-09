<!-- Hero -->
<section class="relative pt-36 pb-24 overflow-hidden bg-[#020817]">
    <div class="absolute inset-0 grid-bg opacity-30"></div>
    <div class="aurora absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-sky-600/12"></div>
    <div class="aurora aurora-slow absolute bottom-0 right-0 w-[400px] h-[400px] bg-violet-600/10"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="section-label mb-5 inline-flex">Portafolio de Servicios</div>
        <h1 class="text-5xl sm:text-6xl font-black text-white mb-5 tracking-tight">
            Nuestros <span class="gradient-text">Servicios</span>
        </h1>
        <p class="text-slate-400 text-lg max-w-xl mx-auto leading-relaxed">
            Soluciones tecnológicas diseñadas para transformar tu empresa y maximizar tu ventaja competitiva.
        </p>
    </div>
</section>

<!-- Services grid -->
<section class="pb-28 bg-[#020817] relative">
    <div class="absolute inset-0 dot-bg opacity-20"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php if (empty($services)): ?>
        <div class="glass border border-white/[0.07] rounded-3xl text-center py-24">
            <div class="w-16 h-16 bg-slate-500/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-cogs text-slate-500 text-2xl"></i>
            </div>
            <p class="text-slate-400 font-medium">No hay servicios publicados aún</p>
        </div>
        <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            <?php foreach ($services as $i => $service): ?>
            <a href="/servicios/<?= e($service['slug']) ?>"
               class="glass card-hover border border-white/[0.07] rounded-3xl p-8 flex flex-col group reveal"
               style="transition-delay:<?= ($i % 3) * 80 ?>ms">
                <div class="card-icon w-14 h-14 bg-sky-500/10 border border-sky-500/15 rounded-2xl flex items-center justify-center mb-6 transition-all">
                    <i class="<?= e($service['icon']) ?> text-sky-400 text-xl"></i>
                </div>
                <h2 class="text-xl font-bold text-white mb-3 group-hover:text-sky-100 transition-colors">
                    <?= e($service['title']) ?>
                </h2>
                <p class="text-slate-500 text-sm leading-relaxed flex-1 mb-6"><?= e($service['short_description']) ?></p>
                <div class="flex items-center gap-2 text-sky-400 text-sm font-semibold group-hover:gap-3 transition-all">
                    Ver detalle
                    <div class="w-6 h-6 bg-sky-500/15 rounded-lg flex items-center justify-center group-hover:bg-sky-500/30 transition-colors">
                        <i class="fas fa-arrow-right text-xs"></i>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- CTA -->
<section class="py-20 relative overflow-hidden border-t border-white/[0.05]">
    <div class="aurora absolute inset-0 w-full h-full bg-sky-900/10"></div>
    <div class="relative z-10 max-w-3xl mx-auto text-center px-4">
        <h2 class="text-3xl sm:text-4xl font-black text-white mb-4 tracking-tight">
            ¿Necesitas algo <span class="gradient-text">personalizado?</span>
        </h2>
        <p class="text-slate-400 mb-8 leading-relaxed">
            Cada empresa es única. Hablemos sobre tus necesidades específicas y construyamos la solución perfecta.
        </p>
        <a href="/contacto" class="btn-neon inline-flex items-center gap-2.5 text-white px-8 py-4 rounded-2xl font-bold text-sm">
            Hablar con un Experto <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>
