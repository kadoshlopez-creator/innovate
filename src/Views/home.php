<!-- ══════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════ -->
<section class="relative min-h-screen flex items-center overflow-hidden bg-black">

    <!-- Background -->
    <div class="absolute inset-0 grid-bg opacity-40"></div>

    <!-- Aurora orbs -->
    <div class="aurora absolute top-[-10%] left-[-5%]  w-[700px] h-[700px] bg-sky-600/20"></div>
    <div class="aurora aurora-slow absolute bottom-[-10%] right-[-5%] w-[600px] h-[600px] bg-violet-600/15"></div>
    <div class="aurora absolute top-[40%] left-[30%]   w-[400px] h-[400px] bg-cyan-500/10" style="animation-delay:4s"></div>

    <!-- Radial vignette -->
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,transparent_40%,#000000_80%)]"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-28 lg:py-0 min-h-screen flex items-center">
        <div class="grid lg:grid-cols-2 gap-16 items-start w-full">

            <!-- Left: text -->
            <div>


                <h1 class="text-5xl sm:text-6xl font-black text-white leading-[1.1] tracking-tight mb-6">
                    <span class="text-orange-500">Arquitectura robusta</span> donde otros solo ven código.
                </h1>

                <p class="text-slate-300 text-lg leading-relaxed mb-10 max-w-lg">
                    Desarrollamos los motores digitales que impulsan plataformas a medida y ecosistemas empresariales robustos. No solo creamos software; edificamos los cimientos técnicos necesarios para que su visión de negocio sea escalable, segura y eficiente.
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
            <div x-data="{ 
                    current: 0, 
                    slides: [
                        { img: '/assets/images/project-pamel.png?v=1.1', label: 'Caso de Éxito', title: 'E-Learning Personalizado' },
                        { img: '/assets/images/project-pediatria.png?v=1.1', label: 'Salud & Tecnología', title: 'Portal Médico Pro' },
                        { img: '/assets/images/project-rucma.png?v=1.1', label: 'Software a Medida', title: 'Certificación Digital RUCMA' }
                    ],
                    next() { this.current = (this.current + 1) % this.slides.length },
                    prev() { this.current = (this.current - 1 + this.slides.length) % this.slides.length }
                 }"
                 x-init="setInterval(() => next(), 6000)"
                 class="hidden lg:flex justify-center items-start relative">
                <!-- Decorative glow -->
                <div class="absolute inset-0 bg-orange-500/10 rounded-full blur-[100px] scale-125"></div>
                
                <!-- Browser mockup window -->
                <div class="w-full max-w-2xl bg-[#0a0a0a] border border-white/10 rounded-2xl overflow-hidden shadow-[0_0_50px_rgba(249,115,22,0.15)] relative z-10 hover:-translate-y-2 transition-transform duration-500">
                    <!-- Browser header -->
                    <div class="h-8 bg-white/5 border-b border-white/5 flex items-center px-4 gap-2">
                        <div class="w-2.5 h-2.5 rounded-full bg-red-500/50"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-yellow-500/50"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-green-500/50"></div>
                    </div>

                    <!-- Browser content placeholder -->
                    <div class="h-80 sm:h-[450px] relative flex items-center justify-center overflow-hidden group">
                        <!-- Slides -->
                        <template x-for="(slide, index) in slides" :key="index">
                            <div x-show="current === index"
                                 x-transition:enter="transition ease-out duration-1000"
                                 x-transition:enter-start="opacity-0 scale-110 blur-sm"
                                 x-transition:enter-end="opacity-100 scale-100 blur-0"
                                 x-transition:leave="transition ease-in duration-1000"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95 blur-sm"
                                 class="absolute inset-0">
                                <img :src="slide.img" class="w-full h-full object-cover">
                            </div>
                        </template>
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/30 to-transparent"></div>
                        
                        <div class="absolute inset-x-0 bottom-12 flex flex-col items-center justify-center text-center px-6 pointer-events-none">
                            <span x-show="current === index" 
                                  x-transition:enter="transition delay-300 duration-700"
                                  x-transition:enter-start="opacity-0 translate-y-4"
                                  x-transition:enter-end="opacity-100 translate-y-0"
                                  x-text="slides[current].label" 
                                  class="px-4 py-1.5 text-[10px] font-black bg-orange-600 text-white rounded-full uppercase tracking-[0.25em] mb-6 inline-block shadow-xl">
                            </span>
                            <h3 x-show="current === index"
                                x-transition:enter="transition delay-500 duration-700"
                                x-transition:enter-start="opacity-0 translate-y-4"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-text="slides[current].title" 
                                class="text-3xl sm:text-5xl font-black text-white leading-none tracking-tight drop-shadow-[0_10px_10px_rgba(0,0,0,0.8)]">
                            </h3>
                        </div>

                        <!-- Slider arrows -->
                        <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-black/20 hover:bg-orange-600/80 backdrop-blur-md rounded-full flex items-center justify-center text-white transition-all border border-white/10 group/btn">
                            <i class="fas fa-chevron-left text-sm group-hover/btn:-translate-x-0.5 transition-transform"></i>
                        </button>
                        <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-black/20 hover:bg-orange-600/80 backdrop-blur-md rounded-full flex items-center justify-center text-white transition-all border border-white/10 group/btn">
                            <i class="fas fa-chevron-right text-sm group-hover/btn:translate-x-0.5 transition-transform"></i>
                        </button>

                        <!-- Dots indicator -->
                        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
                            <template x-for="(slide, index) in slides" :key="index">
                                <div class="w-1.5 h-1.5 rounded-full transition-all duration-300"
                                     :class="current === index ? 'bg-orange-500 w-4' : 'bg-white/30'"></div>
                            </template>
                        </div>
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
     PLANES
══════════════════════════════════════════════════════ -->
<section id="planes" class="py-28 relative overflow-hidden">
    <hr class="line-gradient mb-28 max-w-4xl mx-auto">
    <div class="absolute inset-0 dot-bg opacity-30"></div>
    <div class="aurora absolute top-0 left-0 w-[500px] h-[500px] bg-orange-600/10" style="animation-delay:1s"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
            <div class="section-label mb-4 inline-flex border-orange-500/30 bg-orange-500/10 text-orange-400">Planes transparentes</div>
            <h2 class="text-4xl sm:text-5xl font-black text-white mb-4 tracking-tight">
                Elige tu <span class="gradient-text">Plan</span>
            </h2>
            <p class="text-slate-400 max-w-lg mx-auto">
                Sin cargos ocultos. Escalables a medida que tu negocio crece.
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8 items-start">
            <!-- Basic Plan -->
            <div class="glass border border-white/[0.07] rounded-3xl p-8 flex flex-col group reveal" style="transition-delay: 0ms;">
                <h3 class="text-xl font-bold text-white mb-2">Básico</h3>
                <p class="text-slate-400 text-sm mb-6">Ideal para empezar con una presencia sólida en línea.</p>
                <div class="mb-8">
                    <span class="text-4xl font-black text-white">$499</span>
                    <span class="text-slate-500 text-sm">/pago único</span>
                </div>
                <a href="/contacto?plan=basico" class="w-full text-center glass border border-white/[0.1] hover:border-sky-500/50 hover:bg-sky-500/10 text-white font-semibold py-3 rounded-xl transition-all duration-300 mb-8">Elegir Plan</a>
                <div class="space-y-4 flex-1">
                    <div class="flex items-start gap-3"><i class="fas fa-check text-sky-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm">Diseño One-Page</span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-sky-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm">Dominio por 1 año</span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-sky-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm">Hosting básico incluido</span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-sky-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm">Formulario de contacto</span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-times text-slate-600 mt-1 text-sm"></i><span class="text-slate-500 text-sm">Mantenimiento mensual</span></div>
                </div>
            </div>

            <!-- Pro Plan (Highlighted) -->
            <div class="glass border border-orange-500/30 bg-orange-500/5 rounded-3xl p-8 flex flex-col group reveal relative scale-100 lg:scale-105 z-10 shadow-[0_0_40px_rgba(249,115,22,0.15)]" style="transition-delay: 100ms;">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-orange-500 text-white text-xs font-bold uppercase tracking-wider py-1 px-4 rounded-full">Recomendado</div>
                <h3 class="text-xl font-bold text-white mb-2">Profesional</h3>
                <p class="text-slate-400 text-sm mb-6">Para negocios establecidos que buscan captar más clientes.</p>
                <div class="mb-8">
                    <span class="text-4xl font-black text-white">$999</span>
                    <span class="text-slate-500 text-sm">/pago único</span>
                </div>
                <a href="/contacto?plan=profesional" class="w-full text-center btn-neon text-white font-semibold py-3 rounded-xl transition-all duration-300 mb-8">Elegir Plan</a>
                <div class="space-y-4 flex-1">
                    <div class="flex items-start gap-3"><i class="fas fa-check text-orange-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm">Diseño Multi-Página (hasta 5)</span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-orange-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm">Dominio y Hosting (1 año)</span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-orange-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm">Optimización SEO Básico</span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-orange-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm">Integración con WhatsApp</span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-orange-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm">1 mes de mantenimiento gratis</span></div>
                </div>
            </div>

            <!-- Enterprise Plan -->
            <div class="glass border border-white/[0.07] rounded-3xl p-8 flex flex-col group reveal" style="transition-delay: 200ms;">
                <h3 class="text-xl font-bold text-white mb-2">Corporativo</h3>
                <p class="text-slate-400 text-sm mb-6">Soluciones avanzadas para empresas con grandes demandas.</p>
                <div class="mb-8">
                    <span class="text-4xl font-black text-white">$1999+</span>
                    <span class="text-slate-500 text-sm">/proyecto</span>
                </div>
                <a href="/contacto?plan=corporativo" class="w-full text-center glass border border-white/[0.1] hover:border-sky-500/50 hover:bg-sky-500/10 text-white font-semibold py-3 rounded-xl transition-all duration-300 mb-8">Cotizar a Medida</a>
                <div class="space-y-4 flex-1">
                    <div class="flex items-start gap-3"><i class="fas fa-check text-sky-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm">Diseño UI/UX a medida</span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-sky-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm">Tienda en Línea o Panel Admin</span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-sky-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm">Integración con APIs externas</span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-sky-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm">Arquitectura Cloud Escalable</span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-sky-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm">Soporte técnico prioritario</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════
     PORTAFOLIO (NUESTROS CLIENTES)
══════════════════════════════════════════════════════ -->
<section id="portafolio" class="py-28 relative overflow-hidden z-20 border-t border-white/[0.05]" style="display: block !important; opacity: 1 !important;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header: Forced Visibility -->
        <div class="text-center mb-20" style="opacity: 1 !important; transform: none !important;">
            <div class="section-label mb-4 inline-flex border-orange-500/30 bg-orange-500/10 text-orange-400">Nuestros Casos de Éxito</div>
            <h2 class="text-4xl sm:text-5xl font-black text-white mb-4 tracking-tight">
                Portafolio de <span class="gradient-text">Diseño Web</span>
            </h2>
            <p class="text-slate-400 max-w-lg mx-auto">
                Soluciones digitales robustas que transforman la visión de nuestros clientes en realidad.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Project 1: PAMEL Capacitación -->
            <div class="group cursor-pointer">
                <div class="rounded-3xl overflow-hidden border border-white/[0.08] shadow-2xl mb-6 relative aspect-video bg-[#0a0a0a]">
                    <img src="/assets/images/project-pamel.png?v=1.1" alt="PAMEL" class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                </div>
                <h3 class="text-xl font-bold text-white group-hover:text-orange-400 transition-colors">PAMEL</h3>
                <p class="text-slate-500 text-sm font-medium uppercase tracking-wider">Centro de Capacitación Marítima</p>
            </div>

            <!-- Project 2: PAMEL E-Learning -->
            <div class="group cursor-pointer">
                <div class="rounded-3xl overflow-hidden border border-white/[0.08] shadow-2xl mb-6 relative aspect-video bg-[#0a0a0a]">
                    <img src="/assets/images/project-pamel.png?v=1.1" alt="PAMEL E-Learning" class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-60"></div>
                </div>
                <h3 class="text-xl font-bold text-white group-hover:text-orange-400 transition-colors">PAMEL</h3>
                <p class="text-slate-500 text-sm font-medium uppercase tracking-wider">Plataforma E-Learning</p>
            </div>

            <!-- Project 3: RUCMA -->
            <div class="group cursor-pointer">
                <div class="rounded-3xl overflow-hidden border border-white/[0.08] shadow-2xl mb-6 relative aspect-video bg-[#0a0a0a]">
                    <img src="/assets/images/project-rucma.png?v=1.1" alt="RUCMA" class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                </div>
                <h3 class="text-xl font-bold text-white group-hover:text-orange-400 transition-colors">RUCMA</h3>
                <p class="text-slate-500 text-sm font-medium uppercase tracking-wider">Sistema de Certificación Digital</p>
            </div>

            <!-- Project 4: SPP -->
            <div class="group cursor-pointer">
                <div class="rounded-3xl overflow-hidden border border-white/[0.08] shadow-2xl mb-6 relative aspect-video bg-[#0a0a0a]">
                    <img src="/assets/images/project-pediatria.png?v=1.1" alt="SPP" class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                </div>
                <h3 class="text-xl font-bold text-white group-hover:text-orange-400 transition-colors">SPP</h3>
                <p class="text-slate-500 text-sm font-medium uppercase tracking-wider">Sociedad Panameña de Pediatría</p>
            </div>

            <!-- Project 5: CHINABOX507 -->
            <div class="group cursor-pointer">
                <div class="rounded-3xl overflow-hidden border border-white/[0.08] shadow-2xl mb-6 relative aspect-video bg-[#0a0a0a]">
                    <img src="/assets/images/project-chinabox507.png?v=1.5" alt="CHINABOX507" class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                </div>
                <h3 class="text-xl font-bold text-white group-hover:text-orange-400 transition-colors">CHINABOX507</h3>
                <p class="text-slate-500 text-sm font-medium uppercase tracking-wider">Manejo de carga y paquetería</p>
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
                        ['fas fa-shield-alt',  '#a78bfa', 'bg-violet-500/10 border-violet-500/15', 'Seguridad Nativa',  'Prácticas de seguridad integradas desde la arquitectura, no como un añadido.'],
                        ['fas fa-headset',     '#34d399', 'bg-green-500/10 border-green-500/15', 'Soporte 24/7',      'Tu negocio nunca duerme, nosotros tampoco. Respuesta garantizada en minutos.'],
                        ['fas fa-chart-line',  '#fb923c', 'bg-orange-500/10 border-orange-500/15', 'ROI Medible',       'Métricas claras y KPIs alineados a tus objetivos desde el día uno.'],
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
    <div class="absolute inset-0 bg-gradient-to-br from-sky-950/20 via-black to-violet-950/20"></div>
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
