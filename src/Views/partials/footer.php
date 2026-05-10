<?php
$siteName = \App\Models\Setting::get('site_name', 'Innovate');
$siteDesc = __('footer.description');
$email    = 'ventas@innovate.com.pa';
$phone    = '6538-9819';
$address  = \App\Models\Setting::get('contact_address', 'Panama City, Panama');
$facebook = \App\Models\Setting::get('social_facebook', '');
$instagram= \App\Models\Setting::get('social_instagram', '');
$linkedin = \App\Models\Setting::get('social_linkedin', '');
$twitter  = \App\Models\Setting::get('social_twitter', '');
$services = \App\Models\Service::active();
$year     = date('Y');
?>
<footer class="relative overflow-hidden bg-[#020817] border-t border-white/[0.06]">
    <!-- Top gradient -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-sky-500/30 to-transparent"></div>
    <div class="aurora absolute -bottom-20 left-1/2 -translate-x-1/2 w-[700px] h-[300px] bg-sky-500/5"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-14">

            <!-- Brand -->
            <div class="lg:col-span-2">
                <a href="/" class="flex items-center mb-6 group w-fit">
                    <img src="/assets/images/logo-dark.png" alt="<?= e($siteName) ?>" class="h-16 w-auto transition-transform group-hover:scale-105">
                </a>
                <p class="text-slate-500 text-sm leading-relaxed max-w-xs mb-7"><?= e($siteDesc) ?></p>

                <!-- Social icons -->
                <div class="flex gap-2">
                    <?php
                    $socials = [
                        [$facebook,  'fab fa-facebook-f',  'hover:bg-blue-600/20 hover:border-blue-500/30 hover:text-blue-400'],
                        [$instagram, 'fab fa-instagram',   'hover:bg-pink-600/20 hover:border-pink-500/30 hover:text-pink-400'],
                        [$linkedin,  'fab fa-linkedin-in', 'hover:bg-blue-700/20 hover:border-blue-600/30 hover:text-blue-400'],
                        [$twitter,   'fab fa-x-twitter',   'hover:bg-sky-500/20  hover:border-sky-500/30  hover:text-sky-400'],
                    ];
                    foreach ($socials as [$url, $icon, $hoverClass]):
                        if (!$url) continue;
                    ?>
                    <a href="<?= e($url) ?>" target="_blank"
                       class="w-9 h-9 glass border border-white/[0.07] rounded-xl flex items-center justify-center text-slate-500 transition-all duration-300 <?= $hoverClass ?>">
                        <i class="<?= $icon ?> text-xs"></i>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Services -->
            <?php if ($services): ?>
            <div>
                <h4 class="text-white font-semibold text-xs uppercase tracking-widest mb-5"><?= __('footer.services') ?></h4>
                <ul class="space-y-3">
                    <?php foreach (array_slice($services, 0, 6) as $s): ?>
                    <li>
                        <a href="/servicios/<?= e($s['slug']) ?>"
                           class="text-slate-500 hover:text-sky-400 text-sm transition-colors flex items-center gap-2 group">
                            <span class="w-1 h-1 bg-slate-700 group-hover:bg-sky-500 rounded-full transition-colors flex-shrink-0"></span>
                            <?= e($s['title']) ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <!-- Contact -->
            <div>
                <h4 class="text-white font-semibold text-xs uppercase tracking-widest mb-5"><?= __('footer.contact') ?></h4>
                <ul class="space-y-3.5">
                    <?php
                    $contacts = [
                        ['fas fa-envelope',       $email,   "mailto:{$email}"],
                        ['fas fa-phone',           $phone,   'tel:' . preg_replace('/\s/', '', $phone)],
                        ['fas fa-map-marker-alt',  $address, null],
                    ];
                    foreach ($contacts as [$icon, $value, $href]):
                        if (!$value) continue;
                    ?>
                    <li class="flex items-start gap-3">
                        <div class="w-7 h-7 bg-sky-500/10 border border-sky-500/15 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="<?= $icon ?> text-sky-400 text-[10px]"></i>
                        </div>
                        <?php if ($href): ?>
                        <a href="<?= e($href) ?>" class="text-slate-500 hover:text-sky-400 text-sm transition-colors leading-relaxed">
                            <?= e($value) ?>
                        </a>
                        <?php else: ?>
                        <span class="text-slate-500 text-sm leading-relaxed"><?= e($value) ?></span>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="pt-8 border-t border-white/[0.05] flex flex-col sm:flex-row justify-between items-center gap-4">
            <p class="text-slate-600 text-sm">© <?= $year ?> <?= e($siteName) ?>. <?= current_lang() === 'es' ? 'Todos los derechos reservados.' : 'All rights reserved.' ?></p>
            <p class="text-slate-700 text-xs flex items-center gap-1.5">
                <?= current_lang() === 'es' ? 'Hecho con' : 'Made with' ?> <i class="fas fa-heart text-red-500/70 text-[10px]"></i> <?= current_lang() === 'es' ? 'en Panama' : 'in Panama' ?>
            </p>
        </div>
    </div>
</footer>
