<?php
$contactEmail = \App\Models\Setting::get('contact_email', 'info@innovate.com');
$contactPhone = \App\Models\Setting::get('contact_phone', '+507 6633-3262');
$contactAddr  = \App\Models\Setting::get('contact_address', 'Panama City, Panama');
?>
<!-- Hero -->
<section class="relative pt-36 pb-16 overflow-hidden bg-[#020817]">
    <div class="absolute inset-0 grid-bg opacity-25"></div>
    <div class="aurora absolute top-0 right-0 w-[500px] h-[400px] bg-violet-600/10"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="section-label mb-5 inline-flex">Hablemos</div>
        <h1 class="text-5xl sm:text-6xl font-black text-white mb-5 tracking-tight">
            Inicia tu <span class="gradient-text">proyecto</span>
        </h1>
        <p class="text-slate-400 text-lg max-w-lg mx-auto">
            Cuéntanos tu idea. Te respondemos en menos de 24 horas con un plan de acción sin costo.
        </p>
    </div>
</section>

<!-- Content -->
<section class="pb-28 bg-[#020817] relative">
    <div class="aurora absolute bottom-0 left-0 w-[500px] h-[400px] bg-sky-600/8"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-5 gap-10">

            <!-- Left: info -->
            <div class="lg:col-span-2 space-y-5">
                <!-- Info cards -->
                <?php
                $infoItems = [
                    ['fas fa-envelope',       '#38bdf8', 'bg-sky-500/10 border-sky-500/15',     'Email',     $contactEmail, "mailto:{$contactEmail}"],
                    ['fas fa-phone',          '#a78bfa', 'bg-violet-500/10 border-violet-500/15','Teléfono',  $contactPhone, 'tel:' . preg_replace('/\s/', '', $contactPhone)],
                    ['fas fa-map-marker-alt', '#34d399', 'bg-green-500/10 border-green-500/15',  'Ubicación', $contactAddr,  null],
                ];
                foreach ($infoItems as [$icon, $color, $bg, $label, $value, $href]):
                    if (!$value) continue;
                ?>
                <div class="glass border border-white/[0.07] rounded-2xl p-5 flex items-center gap-4 hover:border-white/[0.12] transition-colors">
                    <div class="w-11 h-11 <?= $bg ?> border rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="<?= $icon ?> text-sm" style="color:<?= $color ?>"></i>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-600 uppercase tracking-widest mb-0.5"><?= $label ?></p>
                        <?php if ($href): ?>
                        <a href="<?= e($href) ?>" class="text-slate-300 hover:text-sky-400 transition-colors text-sm font-medium"><?= e($value) ?></a>
                        <?php else: ?>
                        <p class="text-slate-300 text-sm font-medium"><?= e($value) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- Response time card -->
                <div class="glass border border-white/[0.07] rounded-2xl p-6 mt-2">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-2.5 h-2.5 bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-green-400 text-sm font-semibold">Disponibles ahora</span>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        Tiempo de respuesta promedio: <span class="text-white font-semibold">&lt; 24 horas</span>. Para urgencias, escríbenos directamente por teléfono o WhatsApp.
                    </p>
                </div>
            </div>

            <!-- Right: form -->
            <div class="lg:col-span-3">
                <div class="glass border border-white/[0.07] rounded-3xl p-8 sm:p-10">
                    <h2 class="text-xl font-bold text-white mb-7">Cuéntanos sobre tu proyecto</h2>

                    <form method="POST" action="/contacto" class="space-y-5">
                        <?= csrf_field() ?>

                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">
                                    Nombre <span class="text-red-400 normal-case text-sm">*</span>
                                </label>
                                <input type="text" name="name" value="<?= old('name') ?>" required
                                       class="w-full bg-white/[0.04] border border-white/[0.08] focus:border-sky-500/50 focus:bg-sky-500/[0.03] rounded-xl px-4 py-3 text-white placeholder-slate-600 text-sm outline-none transition-all"
                                       placeholder="Tu nombre completo">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">
                                    Email <span class="text-red-400 normal-case text-sm">*</span>
                                </label>
                                <input type="email" name="email" value="<?= old('email') ?>" required
                                       class="w-full bg-white/[0.04] border border-white/[0.08] focus:border-sky-500/50 focus:bg-sky-500/[0.03] rounded-xl px-4 py-3 text-white placeholder-slate-600 text-sm outline-none transition-all"
                                       placeholder="tu@email.com">
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Teléfono</label>
                                <input type="tel" name="phone" value="<?= old('phone') ?>"
                                       class="w-full bg-white/[0.04] border border-white/[0.08] focus:border-sky-500/50 focus:bg-sky-500/[0.03] rounded-xl px-4 py-3 text-white placeholder-slate-600 text-sm outline-none transition-all"
                                       placeholder="+507 0000-0000">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Empresa</label>
                                <input type="text" name="company" value="<?= old('company') ?>"
                                       class="w-full bg-white/[0.04] border border-white/[0.08] focus:border-sky-500/50 focus:bg-sky-500/[0.03] rounded-xl px-4 py-3 text-white placeholder-slate-600 text-sm outline-none transition-all"
                                       placeholder="Tu empresa (opcional)">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Servicio de interés</label>
                            <select name="service"
                                    class="w-full bg-white/[0.04] border border-white/[0.08] focus:border-sky-500/50 rounded-xl px-4 py-3 text-sm outline-none transition-all
                                           text-slate-400 [&>option]:bg-[#0f172a] [&>option]:text-white">
                                <option value="">— Selecciona un servicio —</option>
                                <?php foreach ($services as $s): ?>
                                <option value="<?= e($s['title']) ?>"
                                    <?= (old('service') === $s['title'] || ($_GET['service'] ?? '') === $s['title']) ? 'selected' : '' ?>>
                                    <?= e($s['title']) ?>
                                </option>
                                <?php endforeach; ?>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">
                                Mensaje <span class="text-red-400 normal-case text-sm">*</span>
                            </label>
                            <textarea name="message" required rows="5"
                                      class="w-full bg-white/[0.04] border border-white/[0.08] focus:border-sky-500/50 focus:bg-sky-500/[0.03] rounded-xl px-4 py-3 text-white placeholder-slate-600 text-sm outline-none transition-all resize-none"
                                      placeholder="Describe tu proyecto, objetivos o preguntas..."><?= old('message') ?></textarea>
                        </div>

                        <button type="submit"
                                class="btn-neon w-full text-white font-bold py-4 rounded-2xl text-sm flex items-center justify-center gap-2.5">
                            <i class="fas fa-paper-plane"></i> Enviar Mensaje
                        </button>

                        <p class="text-center text-slate-600 text-xs">
                            Al enviar, aceptas que nos pongamos en contacto contigo. Sin spam.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
