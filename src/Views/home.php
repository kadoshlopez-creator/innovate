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

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-16 lg:py-0 min-h-screen flex items-center">
        <div class="grid lg:grid-cols-2 gap-16 items-start w-full">

            <!-- Left: text -->
            <div>


                <h1 class="text-5xl sm:text-6xl font-black text-white leading-[1.1] tracking-tight mb-6">
                    <span class="text-orange-500"><?= __('hero.title.part1', 'Arquitectura robusta') ?></span> <?= __('hero.title.part2', 'donde otros solo ven código.') ?>
                </h1>

                <p class="text-slate-300 text-lg leading-relaxed mb-10 max-w-lg">
                    <?= __('hero.desc') ?>
                </p>

                <div class="flex flex-col sm:flex-row gap-4 mb-14">
                    <a href="/contacto" class="inline-flex items-center gap-4 bg-[#1e293b] hover:bg-slate-800 border border-slate-700 text-white px-2 py-2 pr-8 rounded-full font-bold text-sm transition-all shadow-xl hover:shadow-sky-500/20 group">
                        <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center text-white group-hover:scale-110 transition-transform">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <?= strtoupper(__('hero.cta.start')) ?>
                    </a>
                </div>
            </div>

            <!-- Right: Website Mockup Slider -->
            <div x-data="{ 
                    current: 0, 
                    slides: [
                        { img: '/assets/images/project-pamel.png?v=1.6', color: '#0f172a', label: '<?= __('home.hero.s1.label') ?>', title: '<?= __('home.hero.s1.title') ?>', desc: '<?= __('home.hero.s1.desc') ?>' },
                        { img: '/assets/images/project-pamel.png?v=1.6', color: '#0c4a6e', label: '<?= __('home.hero.s2.label') ?>', title: '<?= __('home.hero.s2.title') ?>', desc: '<?= __('home.hero.s2.desc') ?>' },
                        { img: '/assets/images/project-rucma.png?v=1.6', color: '#1e293b', label: '<?= __('home.hero.s3.label') ?>', title: '<?= __('home.hero.s3.title') ?>', desc: '<?= __('home.hero.s3.desc') ?>' },
                        { img: '/assets/images/project-pediatria.png?v=1.6', color: '#0369a1', label: '<?= __('home.hero.s4.label') ?>', title: '<?= __('home.hero.s4.title') ?>', desc: '<?= __('home.hero.s4.desc') ?>' },
                        { img: '/assets/images/project-chinabox507.png?v=1.6', color: '#7c2d12', label: '<?= __('home.hero.s5.label') ?>', title: '<?= __('home.hero.s5.title') ?>', desc: '<?= __('home.hero.s5.desc') ?>' }
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
                    <div class="h-80 sm:h-[450px] relative flex items-start justify-center overflow-hidden group transition-colors duration-700"
                         :style="{ backgroundColor: slides[current].color }">
                        <!-- Slides -->
                        <template x-for="(slide, index) in slides" :key="index">
                            <div x-show="current === index"
                                 x-transition:enter="transition ease-out duration-1000"
                                 x-transition:enter-start="opacity-0 scale-105 blur-sm"
                                 x-transition:enter-end="opacity-100 scale-100 blur-0"
                                 x-transition:leave="transition ease-in duration-1000"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95 blur-sm"
                                 class="absolute inset-0 px-4 pt-8">
                                
                                <img :src="slide.img" class="w-full h-4/5 object-contain">
                                
                                <!-- Text Overlay for each slide -->
                                <div class="absolute inset-x-0 bottom-10 flex flex-col items-center justify-center text-center px-6 pointer-events-none">
                                    <span x-transition:enter="transition delay-300 duration-700"
                                          x-transition:enter-start="opacity-0 translate-y-4"
                                          x-transition:enter-end="opacity-100 translate-y-0"
                                          x-text="slide.label" 
                                          class="px-4 py-1.5 text-[10px] font-black bg-orange-600 text-white rounded-full uppercase tracking-[0.25em] mb-4 inline-block shadow-xl">
                                    </span>
                                    <h3 x-transition:enter="transition delay-500 duration-700"
                                        x-transition:enter-start="opacity-0 translate-y-4"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-text="slide.title" 
                                        class="text-3xl sm:text-4xl font-black text-white leading-none tracking-tight mb-2 drop-shadow-[0_10px_10px_rgba(0,0,0,0.8)]">
                                    </h3>
                                    <p x-transition:enter="transition delay-700 duration-700"
                                       x-transition:enter-start="opacity-0 translate-y-4"
                                       x-transition:enter-end="opacity-100 translate-y-0"
                                       x-text="slide.desc"
                                       class="text-slate-200 text-sm font-semibold drop-shadow-lg max-w-md">
                                    </p>
                                </div>
                            </div>
                        </template>
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent pointer-events-none"></div>

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
<section id="planes" class="py-16 relative overflow-hidden">
    <hr class="line-gradient mb-16 max-w-4xl mx-auto">
    <div class="absolute inset-0 dot-bg opacity-30"></div>
    <div class="aurora absolute top-0 left-0 w-[500px] h-[500px] bg-orange-600/10" style="animation-delay:1s"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
            <div class="section-label mb-4 inline-flex border-orange-500/30 bg-orange-500/10 text-orange-400"><?= __('home.plans.label') ?></div>
            <h2 class="text-4xl sm:text-5xl font-black text-white mb-4 tracking-tight">
                <?= __('home.plans.title.part1') ?> <span class="gradient-text"><?= __('home.plans.title.part2') ?></span>
            </h2>
            <p class="text-slate-400 max-w-lg mx-auto">
                <?= __('home.plans.desc') ?>
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8 items-start">
            <!-- Basic Plan -->
            <div class="glass border border-white/[0.07] rounded-3xl p-8 flex flex-col group reveal" style="transition-delay: 0ms;">
                <h3 class="text-xl font-bold text-white mb-2"><?= __('home.plans.basic.title') ?></h3>
                <p class="text-slate-400 text-sm mb-6"><?= __('home.plans.basic.desc') ?></p>

                <a href="/contacto?plan=basico" class="w-full text-center glass border border-white/[0.1] hover:border-sky-500/50 hover:bg-sky-500/10 text-white font-semibold py-3 rounded-xl transition-all duration-300 mb-8"><?= __('home.plans.cta') ?></a>
                <div class="space-y-4 flex-1">
                    <div class="flex items-start gap-3"><i class="fas fa-check text-sky-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm"><?= __('home.plans.basic.f1') ?></span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-sky-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm"><?= __('home.plans.basic.f2') ?></span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-sky-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm"><?= __('home.plans.basic.f3') ?></span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-sky-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm"><?= __('home.plans.basic.f4') ?></span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-times text-slate-600 mt-1 text-sm"></i><span class="text-slate-500 text-sm"><?= __('home.plans.basic.f5') ?></span></div>
                </div>
            </div>

            <!-- Pro Plan (Highlighted) -->
            <div class="glass border border-orange-500/30 bg-orange-500/5 rounded-3xl p-8 flex flex-col group reveal relative scale-100 lg:scale-105 z-10 shadow-[0_0_40px_rgba(249,115,22,0.15)]" style="transition-delay: 100ms;">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-orange-500 text-white text-xs font-bold uppercase tracking-wider py-1 px-4 rounded-full"><?= __('home.plans.recommended') ?></div>
                <h3 class="text-xl font-bold text-white mb-2"><?= __('home.plans.pro.title') ?></h3>
                <p class="text-slate-400 text-sm mb-6"><?= __('home.plans.pro.desc') ?></p>

                <a href="/contacto?plan=profesional" class="w-full text-center btn-neon text-white font-semibold py-3 rounded-xl transition-all duration-300 mb-8"><?= __('home.plans.cta') ?></a>
                <div class="space-y-4 flex-1">
                    <div class="flex items-start gap-3"><i class="fas fa-check text-orange-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm"><?= __('home.plans.pro.f1') ?></span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-orange-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm"><?= __('home.plans.pro.f2') ?></span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-orange-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm"><?= __('home.plans.pro.f3') ?></span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-orange-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm"><?= __('home.plans.pro.f4') ?></span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-orange-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm"><?= __('home.plans.pro.f5') ?></span></div>
                </div>
            </div>

            <!-- Enterprise Plan -->
            <div class="glass border border-white/[0.07] rounded-3xl p-8 flex flex-col group reveal" style="transition-delay: 200ms;">
                <h3 class="text-xl font-bold text-white mb-2"><?= __('home.plans.enterprise.title') ?></h3>
                <p class="text-slate-400 text-sm mb-6"><?= __('home.plans.enterprise.desc') ?></p>

                <a href="/contacto?plan=corporativo" class="w-full text-center glass border border-white/[0.1] hover:border-sky-500/50 hover:bg-sky-500/10 text-white font-semibold py-3 rounded-xl transition-all duration-300 mb-8"><?= __('home.plans.cta_enterprise') ?></a>
                <div class="space-y-4 flex-1">
                    <div class="flex items-start gap-3"><i class="fas fa-check text-sky-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm"><?= __('home.plans.enterprise.f1') ?></span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-sky-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm"><?= __('home.plans.enterprise.f2') ?></span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-sky-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm"><?= __('home.plans.enterprise.f3') ?></span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-sky-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm"><?= __('home.plans.enterprise.f4') ?></span></div>
                    <div class="flex items-start gap-3"><i class="fas fa-check text-sky-400 mt-1 text-sm"></i><span class="text-slate-300 text-sm"><?= __('home.plans.enterprise.f5') ?></span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════
     PORTAFOLIO (NUESTROS CLIENTES)
══════════════════════════════════════════════════════ -->
<section id="portafolio" class="py-16 relative overflow-hidden z-20 border-t border-white/[0.05]" style="display: block !important; opacity: 1 !important;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header: Forced Visibility -->
        <div class="text-center mb-12" style="opacity: 1 !important; transform: none !important;">
            <div class="section-label mb-4 inline-flex border-orange-500/30 bg-orange-500/10 text-orange-400"><?= __('home.portfolio.label') ?></div>
            <h2 class="text-4xl sm:text-5xl font-black text-white mb-4 tracking-tight">
                <?= __('home.portfolio.title.part1') ?> <span class="gradient-text"><?= __('home.portfolio.title.part2') ?></span>
            </h2>
            <p class="text-slate-400 max-w-lg mx-auto">
                <?= __('home.portfolio.desc') ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-10 max-w-5xl mx-auto">
            <!-- Project 1: PAMEL -->
            <div class="group cursor-pointer">
                <div class="rounded-3xl overflow-hidden border border-white/[0.08] shadow-2xl mb-6 relative aspect-video bg-[#0a0a0a]">
                    <img src="/assets/images/project-pamel.png?v=1.1" alt="PAMEL" class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                </div>
                <h3 class="text-xl font-bold text-white group-hover:text-orange-400 transition-colors"><?= __('home.portfolio.p1.title') ?></h3>
                <p class="text-slate-500 text-sm font-medium uppercase tracking-wider"><?= __('home.portfolio.p1.desc') ?></p>
            </div>

            <!-- Project 2: RUCMA -->
            <div class="group cursor-pointer">
                <div class="rounded-3xl overflow-hidden border border-white/[0.08] shadow-2xl mb-6 relative aspect-video bg-[#0a0a0a]">
                    <img src="/assets/images/project-rucma.png?v=1.1" alt="RUCMA" class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                </div>
                <h3 class="text-xl font-bold text-white group-hover:text-orange-400 transition-colors"><?= __('home.portfolio.p2.title') ?></h3>
                <p class="text-slate-500 text-sm font-medium uppercase tracking-wider"><?= __('home.portfolio.p2.desc') ?></p>
            </div>

            <!-- Project 3: SPP (Pediatría) -->
            <div class="group cursor-pointer">
                <div class="rounded-3xl overflow-hidden border border-white/[0.08] shadow-2xl mb-6 relative aspect-video bg-[#0a0a0a]">
                    <img src="/assets/images/project-pediatria.png?v=1.1" alt="SPP" class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                </div>
                <h3 class="text-xl font-bold text-white group-hover:text-orange-400 transition-colors"><?= __('home.portfolio.p3.title') ?></h3>
                <p class="text-slate-500 text-sm font-medium uppercase tracking-wider"><?= __('home.portfolio.p3.desc') ?></p>
            </div>

            <!-- Project 4: CHINABOX507 -->
            <div class="group cursor-pointer">
                <div class="rounded-3xl overflow-hidden border border-white/[0.08] shadow-2xl mb-6 relative aspect-video bg-[#0a0a0a]">
                    <img src="/assets/images/project-chinabox507.png?v=1.5" alt="CHINABOX507" class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                </div>
                <h3 class="text-xl font-bold text-white group-hover:text-orange-400 transition-colors"><?= __('home.portfolio.p4.title') ?></h3>
                <p class="text-slate-500 text-sm font-medium uppercase tracking-wider"><?= __('home.portfolio.p4.desc') ?></p>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════
     SERVICES
══════════════════════════════════════════════════════ -->
<?php if (!empty($services)): ?>
<section class="py-16 relative overflow-hidden">
    <div class="absolute inset-0 dot-bg opacity-30"></div>
    <div class="aurora absolute top-0 right-0 w-[500px] h-[500px] bg-violet-600/8" style="animation-delay:2s"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 reveal">
            <div class="section-label mb-4 inline-flex"><?= __('home.services.label') ?></div>
            <h2 class="text-4xl sm:text-5xl font-black text-white mb-4 tracking-tight">
                <?= __('home.services.title.part1') ?> <span class="gradient-text"><?= __('home.services.title.part2') ?></span>
            </h2>
            <p class="text-slate-400 max-w-lg mx-auto">
                <?= __('home.services.desc') ?>
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
                    <?= __('home.services.view_detail') ?>
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
<section class="py-16 relative overflow-hidden">
    <hr class="line-gradient mb-16 max-w-4xl mx-auto">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-20 items-center">

            <!-- Left: headline + features -->
            <div class="reveal">
                <div class="section-label mb-6 inline-flex"><?= __('home.why.label') ?></div>
                <h2 class="text-4xl sm:text-5xl font-black text-white mb-6 leading-tight tracking-tight">
                    <?= __('home.why.title.part1') ?><br><span class="gradient-text"><?= __('home.why.title.part2') ?></span>
                </h2>
                <p class="text-slate-400 leading-relaxed mb-10">
                    <?= __('home.why.desc') ?>
                </p>

                <div class="space-y-4">
                    <?php
                    $features = [
                        ['fas fa-bolt',        '#38bdf8', 'bg-sky-500/10 border-sky-500/15',    __('home.why.f1.title'), __('home.why.f1.desc')],
                        ['fas fa-shield-alt',  '#a78bfa', 'bg-violet-500/10 border-violet-500/15', __('home.why.f2.title'), __('home.why.f2.desc')],
                        ['fas fa-headset',     '#34d399', 'bg-green-500/10 border-green-500/15', __('home.why.f3.title'), __('home.why.f3.desc')],
                        ['fas fa-chart-line',  '#fb923c', 'bg-orange-500/10 border-orange-500/15', __('home.why.f4.title'), __('home.why.f4.desc')],
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
                    ['99.9%', __('home.stats.uptime'),   'fas fa-server',         '#38bdf8', 'from-sky-900/30 to-sky-900/10 border-sky-500/15'],
                    ['SECURE', __('home.stats.secure'),   'fas fa-shield-halved',  '#f472b6', 'from-pink-900/30 to-pink-900/10 border-pink-500/15'],
                    ['<500ms', __('home.stats.latency'),  'fas fa-bolt-lightning', '#34d399', 'from-green-900/30 to-green-900/10 border-green-500/15'],
                    ['SCALABLE', __('home.stats.scalable'), 'fas fa-layer-group',    '#fb923c', 'from-orange-900/30 to-orange-900/10 border-orange-500/15'],
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
<section id="proceso" class="py-16 relative overflow-hidden">
    <hr class="line-gradient mb-16 max-w-4xl mx-auto">
    <div class="aurora absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] bg-sky-500/5"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 reveal">
            <div class="section-label mb-4 inline-flex"><?= __('home.process.label') ?></div>
            <h2 class="text-4xl sm:text-5xl font-black text-white tracking-tight">
                <?= __('home.process.title.part1') ?> <span class="gradient-text"><?= __('home.process.title.part2') ?></span>
            </h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 relative">
            <!-- Connecting line (desktop) -->
            <div class="hidden lg:block absolute top-8 left-[12.5%] right-[12.5%] h-px bg-gradient-to-r from-transparent via-sky-500/30 to-transparent z-0"></div>

            <?php
            $steps = [
                ['01', 'fas fa-search',       '#38bdf8', __('home.process.s1.title'),  __('home.process.s1.desc')],
                ['02', 'fas fa-pencil-ruler',  '#a78bfa', __('home.process.s2.title'),  __('home.process.s2.desc')],
                ['03', 'fas fa-code',          '#34d399', __('home.process.s3.title'),  __('home.process.s3.desc')],
                ['04', 'fas fa-rocket',        '#fb923c', __('home.process.s4.title'),  __('home.process.s4.desc')],
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
<section class="py-16 relative overflow-hidden">
    <hr class="line-gradient mb-16 max-w-4xl mx-auto">

    <!-- Aurora bg -->
    <div class="absolute inset-0 bg-gradient-to-br from-sky-950/20 via-black to-violet-950/20"></div>
    <div class="aurora absolute top-0 left-1/4  w-[600px] h-[600px] bg-sky-600/15"></div>
    <div class="aurora aurora-slow absolute bottom-0 right-1/4 w-[600px] h-[600px] bg-violet-600/12"></div>
    <div class="absolute inset-0 grid-bg opacity-20"></div>

    <div class="relative z-10 max-w-4xl mx-auto text-center px-4 reveal">
        <div class="glass border border-white/[0.08] rounded-[2rem] p-12 sm:p-16">
            <div class="section-label mb-6 inline-flex"><?= __('home.cta.label') ?></div>
            <h2 class="text-4xl sm:text-5xl font-black text-white mb-6 leading-tight tracking-tight">
                <?= __('home.cta.title.part1') ?><br><span class="gradient-text-anim"><?= __('home.cta.title.part2') ?></span> <?= __('home.cta.title.part3') ?>
            </h2>
            <p class="text-slate-400 text-lg mb-10 max-w-lg mx-auto">
                <?= __('home.cta.desc') ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/contacto" class="btn-neon inline-flex items-center justify-center gap-2.5 text-white px-10 py-4 rounded-2xl font-bold text-base">
                    <?= __('home.cta.btn_main') ?> <i class="fas fa-arrow-right"></i>
                </a>
                <a href="/servicios" class="btn-ghost inline-flex items-center justify-center gap-2.5 text-slate-300 hover:text-white px-10 py-4 rounded-2xl font-semibold text-base">
                    <?= __('home.cta.btn_sec') ?>
                </a>
            </div>
        </div>
    </div>
</section>
