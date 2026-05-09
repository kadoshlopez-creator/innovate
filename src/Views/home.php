<!-- ══════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════ -->
<section class="relative min-h-screen flex items-center overflow-hidden bg-[#020817]">

    <!-- Background -->
    <div class="absolute inset-0 grid-bg opacity-40"></div>

    <!-- Aurora orbs -->
    <div class="aurora absolute top-[-10%] left-[-5%]  w-[700px] h-[700px] bg-sky-600/20"></div>
    <div class="aurora aurora-slow absolute bottom-[-10%] right-[-5%] w-[600px] h-[600px] bg-violet-600/15"></div>
    <div class="aurora absolute top-[40%] left-[30%]   w-[400px] h-[400px] bg-cyan-500/10" style="animation-delay:4s"></div>

    <!-- Radial vignette -->
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,transparent_40%,#020817_80%)]"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-28 lg:py-0 min-h-screen flex items-center">
        <div class="grid lg:grid-cols-2 gap-16 items-center w-full">

            <!-- Left: text -->
            <div>
                <!-- Badge -->
                <div class="section-label mb-6 inline-flex border-sky-500/30 bg-sky-500/10 text-sky-400">
                    <span class="w-1.5 h-1.5 bg-sky-400 rounded-full animate-pulse"></span>
                    Innovate Web Studio
                </div>

                <h1 class="text-5xl sm:text-6xl font-black text-white leading-[1.1] tracking-tight mb-6">
                    <span class="text-pink-500">Más de 200 clientes</span> han<br>confiado en nosotros
                </h1>

                <p class="text-slate-300 text-lg leading-relaxed mb-2 max-w-lg">
                    Desarrollo Páginas Web Corporativas, Tiendas en línea, Plataformas a medidas.
                </p>
                
                <p class="text-white text-lg font-bold mb-10">
                    Creamos tu presencia online enfocado en las ventas
                </p>

                <div class="flex flex-col sm:flex-row gap-4 mb-14">
                    <a href="/contacto" class="inline-flex items-center gap-4 bg-[#1e293b] hover:bg-slate-800 border border-slate-700 text-white px-2 py-2 pr-8 rounded-full font-bold text-sm transition-all shadow-xl hover:shadow-sky-500/20 group">
                        <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center text-white group-hover:scale-110 transition-transform">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        COTIZA CON NOSOTROS
                    </a>
                </div>
            </div>

            <!-- Right: Website Mockup Slider -->
            <div class="hidden lg:flex justify-center items-center relative">
                <!-- Decorative glow -->
                <div class="absolute inset-0 bg-sky-500/20 rounded-full blur-[100px] scale-125"></div>
                
                <!-- Browser mockup window -->
                <div class="w-full max-w-lg bg-[#0f172a] border border-slate-700 rounded-xl overflow-hidden shadow-[0_0_50px_rgba(14,165,233,0.15)] relative z-10 hover:-translate-y-2 transition-transform duration-500">
                    <!-- Browser header -->
                    <div class="h-8 bg-slate-800 border-b border-slate-700 flex items-center px-4 gap-2">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        <div class="ml-4 flex-1 h-4 bg-slate-900 rounded-full"></div>
                    </div>
                    <!-- Browser content placeholder -->
                    <div class="h-64 sm:h-80 relative flex items-center justify-center overflow-hidden group">
                        <img src="https://placehold.co/800x600/1e293b/38bdf8?text=Proyecto+Innovate" alt="Proyecto Destacado" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0f172a] to-transparent opacity-80"></div>
                        
                        <div class="absolute bottom-6 left-6 text-left">
                            <span class="px-2 py-1 text-[10px] font-bold bg-sky-500 text-white rounded uppercase tracking-wider mb-2 inline-block">Destacado</span>
                            <h3 class="text-4xl font-black text-white leading-none tracking-tight">MO<br>DER<br>NO</h3>
                        </div>

                        <!-- Slider arrows -->
                        <button class="absolute left-2 top-1/2 -translate-y-1/2 w-8 h-8 flex items-center justify-center text-white/50 hover:text-white transition-colors"><i class="fas fa-chevron-left"></i></button>
                        <button class="absolute right-2 top-1/2 -translate-y-1/2 w-8 h-8 flex items-center justify-center text-white/50 hover:text-white transition-colors"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-slate-600 animate-bounce">
        <i class="fas fa-chevron-down text-sm"></i>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════
     PORTAFOLIO (NUESTROS CLIENTES)
══════════════════════════════════════════════════════ -->
<section class="py-24 relative overflow-hidden z-20 border-t border-white/[0.05]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Portfolio Item 1 -->
            <div class="group cursor-pointer reveal">
                <div class="rounded-3xl overflow-hidden border border-white/[0.08] shadow-[0_10px_30px_rgba(0,0,0,0.5)] mb-5 relative aspect-[4/3] bg-[#0f172a] flex items-center justify-center">
                    <img src="https://placehold.co/600x450/1e293b/38bdf8?text=Migracion" alt="Migración" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-sky-500/0 group-hover:bg-sky-500/10 transition-colors duration-300"></div>
                </div>
                <h3 class="text-xl font-bold text-white group-hover:text-sky-400 transition-colors">Servicio Nacional de Migración</h3>
                <p class="text-slate-400 text-sm mt-1">Página Web - Corporativa</p>
            </div>

            <!-- Portfolio Item 2 -->
            <div class="group cursor-pointer reveal" style="transition-delay: 100ms;">
                <div class="rounded-3xl overflow-hidden border border-white/[0.08] shadow-[0_10px_30px_rgba(0,0,0,0.5)] mb-5 relative aspect-[4/3] bg-[#0f172a] flex items-center justify-center">
                    <img src="https://placehold.co/600x450/1e293b/38bdf8?text=Centro+Industrial" alt="Centro Industrial" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-sky-500/0 group-hover:bg-sky-500/10 transition-colors duration-300"></div>
                </div>
                <h3 class="text-xl font-bold text-white group-hover:text-sky-400 transition-colors">Centro industrial</h3>
                <p class="text-slate-400 text-sm mt-1">Página Web - Tienda en línea</p>
            </div>

            <!-- Portfolio Item 3 -->
            <div class="group cursor-pointer reveal" style="transition-delay: 200ms;">
                <div class="rounded-3xl overflow-hidden border border-white/[0.08] shadow-[0_10px_30px_rgba(0,0,0,0.5)] mb-5 relative aspect-[4/3] bg-[#0f172a] flex items-center justify-center">
                    <img src="https://placehold.co/600x450/1e293b/38bdf8?text=Panasonic+Store" alt="Panasonic Store" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-sky-500/0 group-hover:bg-sky-500/10 transition-colors duration-300"></div>
                </div>
                <h3 class="text-xl font-bold text-white group-hover:text-sky-400 transition-colors">Panasonic Store</h3>
                <p class="text-slate-400 text-sm mt-1">Página Web - Tienda en línea</p>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════
     SERVICES
══════════════════════════════════════════════════════ -->
<?php if (!empty($services)): ?>
<section class="py-28 relative overflow-hidden">
    <div class="absolute inset-0 dot-bg opacity-30"></div>
    <div class="aurora absolute top-0 right-0 w-[500px] h-[500px] bg-violet-600/8" style="animation-delay:2s"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
            <div class="section-label mb-4 inline-flex">Lo que hacemos</div>
            <h2 class="text-4xl sm:text-5xl font-black text-white mb-4 tracking-tight">
                Nuestros <span class="gradient-text">Servicios</span>
            </h2>
            <p class="text-slate-400 max-w-lg mx-auto">
                Un portafolio completo de soluciones tecnológicas para llevar tu empresa al siguiente nivel.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <?php foreach ($services as $i => $service): ?>
            <a href="/servicios/<?= e($service['slug']) ?>"
               class="glass card-hover border border-white/[0.07] rounded-3xl p-8 flex flex-col group reveal"
               style="transition-delay: <?= ($i % 3) * 80 ?>ms">
                <!-- Icon -->
                <div class="card-icon w-14 h-14 bg-sky-500/10 border border-sky-500/15 rounded-2xl flex items-center justify-center mb-6 transition-all duration-300">
                    <i class="<?= e($service['icon']) ?> text-sky-400 text-xl"></i>
                </div>

                <!-- Content -->
                <h3 class="text-lg font-bold text-white mb-3 group-hover:text-sky-100 transition-colors">
                    <?= e($service['title']) ?>
                </h3>
                <p class="text-slate-500 text-sm leading-relaxed flex-1 mb-6">
                    <?= e($service['short_description']) ?>
                </p>

                <!-- Arrow -->
                <div class="flex items-center gap-2 text-sky-400 text-sm font-semibold group-hover:gap-3 transition-all duration-300">
                    Ver detalle
                    <div class="w-6 h-6 bg-sky-500/15 rounded-lg flex items-center justify-center group-hover:bg-sky-500/30 transition-colors">
                        <i class="fas fa-arrow-right text-xs"></i>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ══════════════════════════════════════════════════════
     WHY US
══════════════════════════════════════════════════════ -->
<section class="py-28 relative overflow-hidden">
    <hr class="line-gradient mb-28 max-w-4xl mx-auto">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-20 items-center">

            <!-- Left: headline + features -->
            <div class="reveal">
                <div class="section-label mb-6 inline-flex">Por qué elegirnos</div>
                <h2 class="text-4xl sm:text-5xl font-black text-white mb-6 leading-tight tracking-tight">
                    Tu éxito es nuestra<br><span class="gradient-text">prioridad absoluta</span>
                </h2>
                <p class="text-slate-400 leading-relaxed mb-10">
                    Combinamos profundidad técnica con visión de negocio para entregar soluciones que generan resultados medibles desde el primer día.
                </p>

                <div class="space-y-4">
                    <?php
                    $features = [
                        ['fas fa-bolt',        '#38bdf8', 'bg-sky-500/10 border-sky-500/15',    'Entrega Ágil',       'Sprints cortos, feedback continuo y lanzamientos rápidos sin sacrificar calidad.'],
                        ['fas fa-shield-alt',  '#a78bfa', 'bg-violet-500/10 border-violet-500/15','Seguridad Nativa',  'Prácticas de seguridad integradas desde la arquitectura, no como un añadido.'],
                        ['fas fa-headset',     '#34d399', 'bg-green-500/10 border-green-500/15', 'Soporte 24/7',      'Tu negocio nunca duerme, nosotros tampoco. Respuesta garantizada en minutos.'],
                        ['fas fa-chart-line',  '#fb923c', 'bg-orange-500/10 border-orange-500/15','ROI Medible',       'Métricas claras y KPIs alineados a tus objetivos desde el día uno.'],
                    ];
                    foreach ($features as [$icon, $color, $bg, $title, $desc]):
                    ?>
                    <div class="flex items-start gap-4 glass border border-white/[0.06] rounded-2xl p-4 hover:border-white/[0.12] transition-colors">
                        <div class="w-10 h-10 <?= $bg ?> border rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="<?= $icon ?> text-sm" style="color:<?= $color ?>"></i>
                        </div>
                        <div>
                            <p class="text-white font-semibold text-sm mb-0.5"><?= $title ?></p>
                            <p class="text-slate-500 text-xs leading-relaxed"><?= $desc ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Right: big stat cards -->
            <div class="grid grid-cols-2 gap-4 reveal" style="transition-delay:150ms">
                <?php
                $bigStats = [
                    ['50+',   'Proyectos\nCompletados', 'fas fa-check-circle', '#38bdf8', 'from-sky-900/30 to-sky-900/10 border-sky-500/15'],
                    ['98%',   'Clientes\nSatisfechos',  'fas fa-heart',        '#f472b6', 'from-pink-900/30 to-pink-900/10 border-pink-500/15'],
                    ['<24h',  'Tiempo de\nRespuesta',   'fas fa-clock',        '#34d399', 'from-green-900/30 to-green-900/10 border-green-500/15'],
                    ['5+',    'Países\nAtendidos',      'fas fa-globe',        '#fb923c', 'from-orange-900/30 to-orange-900/10 border-orange-500/15'],
                ];
                foreach ($bigStats as [$val, $label, $icon, $color, $gradient]):
                ?>
                <div class="border bg-gradient-to-br <?= $gradient ?> rounded-3xl p-6 flex flex-col gap-3 hover:scale-[1.02] transition-transform duration-300">
                    <div class="w-10 h-10 bg-white/[0.06] rounded-xl flex items-center justify-center">
                        <i class="<?= $icon ?> text-sm" style="color:<?= $color ?>"></i>
                    </div>
                    <p class="text-4xl font-black text-white"><?= $val ?></p>
                    <p class="text-slate-400 text-xs leading-tight"><?= nl2br($label) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════
     PROCESS
══════════════════════════════════════════════════════ -->
<section class="py-28 relative overflow-hidden">
    <hr class="line-gradient mb-28 max-w-4xl mx-auto">
    <div class="aurora absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] bg-sky-500/5"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
            <div class="section-label mb-4 inline-flex">Cómo trabajamos</div>
            <h2 class="text-4xl sm:text-5xl font-black text-white tracking-tight">
                Proceso <span class="gradient-text">transparente</span>
            </h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 relative">
            <!-- Connecting line (desktop) -->
            <div class="hidden lg:block absolute top-8 left-[12.5%] right-[12.5%] h-px bg-gradient-to-r from-transparent via-sky-500/30 to-transparent z-0"></div>

            <?php
            $steps = [
                ['01', 'fas fa-search',       '#38bdf8', 'Descubrimiento',  'Analizamos tu negocio, objetivos y requerimientos técnicos en profundidad.'],
                ['02', 'fas fa-pencil-ruler',  '#a78bfa', 'Diseño',          'Arquitectamos la solución y creamos prototipos que validan la idea antes de construir.'],
                ['03', 'fas fa-code',          '#34d399', 'Desarrollo',      'Implementamos con metodología ágil, entregas iterativas y código de calidad.'],
                ['04', 'fas fa-rocket',        '#fb923c', 'Lanzamiento',     'Desplegamos, monitorizamos y te acompañamos en el crecimiento continuo.'],
            ];
            foreach ($steps as $i => [$num, $icon, $color, $title, $desc]):
            ?>
            <div class="relative z-10 reveal" style="transition-delay: <?= $i * 100 ?>ms">
                <div class="glass border border-white/[0.07] rounded-3xl p-6 hover:border-sky-500/20 transition-all duration-300 h-full">
                    <div class="flex items-center justify-between mb-5">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center border"
                             style="background:<?= $color ?>18; border-color:<?= $color ?>30">
                            <i class="<?= $icon ?> text-base" style="color:<?= $color ?>"></i>
                        </div>
                        <span class="text-4xl font-black text-white/[0.05] tabular-nums"><?= $num ?></span>
                    </div>
                    <h3 class="text-white font-bold mb-2"><?= $title ?></h3>
                    <p class="text-slate-500 text-sm leading-relaxed"><?= $desc ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════
     CTA
══════════════════════════════════════════════════════ -->
<section class="py-28 relative overflow-hidden">
    <hr class="line-gradient mb-28 max-w-4xl mx-auto">

    <!-- Aurora bg -->
    <div class="absolute inset-0 bg-gradient-to-br from-sky-950/40 via-[#020817] to-violet-950/40"></div>
    <div class="aurora absolute top-0 left-1/4  w-[600px] h-[600px] bg-sky-600/15"></div>
    <div class="aurora aurora-slow absolute bottom-0 right-1/4 w-[600px] h-[600px] bg-violet-600/12"></div>
    <div class="absolute inset-0 grid-bg opacity-20"></div>

    <div class="relative z-10 max-w-4xl mx-auto text-center px-4 reveal">
        <div class="glass border border-white/[0.08] rounded-[2rem] p-12 sm:p-16">
            <div class="section-label mb-6 inline-flex">¿Tienes un proyecto?</div>
            <h2 class="text-4xl sm:text-5xl font-black text-white mb-6 leading-tight tracking-tight">
                Hagamos algo<br><span class="gradient-text-anim">extraordinario</span> juntos
            </h2>
            <p class="text-slate-400 text-lg mb-10 max-w-lg mx-auto">
                Consultoría gratuita. Sin compromisos. Cuéntanos tu idea y te respondemos en menos de 24 horas.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contacto" class="btn-neon inline-flex items-center justify-center gap-2.5 text-white px-10 py-4 rounded-2xl font-bold text-base">
                    Contactar Ahora <i class="fas fa-arrow-right"></i>
                </a>
                <a href="/servicios" class="btn-ghost inline-flex items-center justify-center gap-2.5 text-slate-300 hover:text-white px-10 py-4 rounded-2xl font-semibold text-base">
                    Ver Servicios
                </a>
            </div>
        </div>
    </div>
</section>
