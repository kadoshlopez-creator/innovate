<!-- Hero -->
<section class="relative pt-32 pb-16 bg-[#020817] overflow-hidden">
    <div class="absolute inset-0 grid-bg opacity-25"></div>
    <div class="aurora absolute top-0 left-0 w-[600px] h-[400px] bg-sky-600/10"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-xs text-slate-600 mb-10">
            <a href="/" class="hover:text-slate-400 transition-colors">Inicio</a>
            <i class="fas fa-chevron-right text-[10px]"></i>
            <a href="/servicios" class="hover:text-slate-400 transition-colors">Servicios</a>
            <i class="fas fa-chevron-right text-[10px]"></i>
            <span class="text-slate-400"><?= e($service['title']) ?></span>
        </nav>

        <div class="max-w-3xl">
            <div class="w-16 h-16 bg-sky-500/10 border border-sky-500/15 rounded-2xl flex items-center justify-center mb-8">
                <i class="<?= e($service['icon']) ?> text-sky-400 text-2xl"></i>
            </div>
            <h1 class="text-4xl sm:text-5xl font-black text-white mb-5 leading-tight tracking-tight">
                <?= e($service['title']) ?>
            </h1>
            <p class="text-xl text-slate-400 leading-relaxed"><?= e($service['short_description']) ?></p>
        </div>
    </div>
</section>

<!-- Content -->
<section class="py-16 bg-[#020817]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-10">

            <!-- Main content -->
            <div class="lg:col-span-2">
                <div class="glass border border-white/[0.07] rounded-3xl p-8 sm:p-10
                            prose prose-invert max-w-none
                            prose-p:text-slate-400 prose-p:leading-relaxed
                            prose-h2:text-white prose-h2:font-bold prose-h2:tracking-tight
                            prose-h3:text-slate-200 prose-h3:font-semibold
                            prose-li:text-slate-400 prose-strong:text-slate-200
                            prose-a:text-sky-400 prose-a:no-underline hover:prose-a:underline">
                    <?= $service['description'] ?: '<p>Descripción próximamente.</p>' ?>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-5">
                <!-- CTA Card -->
                <div class="relative overflow-hidden rounded-3xl p-7 text-white"
                     style="background:linear-gradient(135deg,#0c4a6e,#1e1b4b)">
                    <div class="aurora absolute -top-10 -right-10 w-32 h-32 bg-sky-400/20" style="filter:blur(30px)"></div>
                    <div class="relative z-10">
                        <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-comments text-sky-300 text-sm"></i>
                        </div>
                        <h3 class="font-bold text-lg mb-2">¿Interesado?</h3>
                        <p class="text-sky-200/70 text-sm mb-5 leading-relaxed">
                            Consultoría gratuita — sin compromisos. Te respondemos en menos de 24h.
                        </p>
                        <a href="/contacto?service=<?= urlencode($service['title']) ?>"
                           class="block text-center bg-white text-slate-900 font-bold py-3 rounded-xl text-sm hover:bg-sky-50 transition-colors">
                            Solicitar Consultoría
                        </a>
                    </div>
                </div>

                <!-- Other services -->
                <?php if (!empty($others)): ?>
                <div class="glass border border-white/[0.07] rounded-3xl p-6">
                    <h3 class="text-xs font-semibold text-slate-500 uppercase tracking-widest mb-5">Otros Servicios</h3>
                    <ul class="space-y-2">
                        <?php foreach (array_slice(array_values($others), 0, 5) as $other): ?>
                        <li>
                            <a href="/servicios/<?= e($other['slug']) ?>"
                               class="flex items-center gap-3 p-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-white/[0.04] transition-all group">
                                <div class="w-8 h-8 bg-white/[0.04] group-hover:bg-sky-500/15 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors border border-white/[0.05] group-hover:border-sky-500/20">
                                    <i class="<?= e($other['icon']) ?> text-[10px] text-slate-600 group-hover:text-sky-400 transition-colors"></i>
                                </div>
                                <span class="text-sm font-medium"><?= e($other['title']) ?></span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <!-- Quick facts -->
                <div class="glass border border-white/[0.07] rounded-3xl p-6">
                    <h3 class="text-xs font-semibold text-slate-500 uppercase tracking-widest mb-5">¿Por qué nosotros?</h3>
                    <ul class="space-y-3">
                        <?php
                        $facts = ['Equipo certificado y con experiencia', 'Entrega en tiempo y forma garantizada', 'Soporte post-lanzamiento incluido', 'Código limpio y documentado'];
                        foreach ($facts as $fact):
                        ?>
                        <li class="flex items-center gap-2.5 text-sm text-slate-400">
                            <div class="w-5 h-5 bg-sky-500/15 border border-sky-500/20 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-check text-sky-400" style="font-size:8px"></i>
                            </div>
                            <?= $fact ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
