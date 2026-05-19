<!DOCTYPE html>
<html lang="<?= current_lang() ?>" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? "Innovate | " . e($title) : "Innovate | " . __('site.tagline', 'Arquitectura robusta. Negocios imparables.') ?></title>
    <meta name="description" content="<?= e(\App\Models\Setting::get('site_description', '')) ?>">
    <link rel="icon" type="image/png" href="/assets/images/favicon.png?v=1.1">
    <link rel="shortcut icon" type="image/png" href="/assets/images/favicon.png?v=1.1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        brand: { DEFAULT: '#0ea5e9', dark: '#0284c7' },
                    },
                    animation: {
                        'aurora':       'auroraDrift 10s ease-in-out infinite',
                        'aurora-slow':  'auroraDrift 14s ease-in-out infinite reverse',
                        'float':        'float 7s ease-in-out infinite',
                        'float-delay':  'float 7s ease-in-out 1.5s infinite',
                        'gradient':     'gradientShift 6s ease infinite',
                        'marquee':      'marquee 28s linear infinite',
                        'spin-slow':    'spin 12s linear infinite',
                    },
                    keyframes: {
                        auroraDrift:  { '0%,100%': { transform: 'translate(0,0) scale(1)', opacity:'0.5' }, '33%': { transform: 'translate(50px,-70px) scale(1.2)', opacity:'0.7' }, '66%': { transform: 'translate(-35px,40px) scale(0.85)', opacity:'0.35' } },
                        float:        { '0%,100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-14px)' } },
                        gradientShift:{ '0%,100%': { backgroundPosition: '0% 50%' }, '50%': { backgroundPosition: '100% 50%' } },
                        marquee:      { '0%': { transform: 'translateX(0)' }, '100%': { transform: 'translateX(-50%)' } },
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        :root {
            --bg:      #000000;
            --surface: rgba(255,255,255,0.015);
            --border:  rgba(255,255,255,0.05);
            --sky:     #38bdf8;
            --violet:  #a78bfa;
        }

        body { font-family:'Inter',sans-serif; background:var(--bg); color:#e2e8f0; }

        /* ── Scrollbar ─────────────────────────────────────────── */
        ::-webkit-scrollbar          { width:5px; }
        ::-webkit-scrollbar-track    { background:var(--bg); }
        ::-webkit-scrollbar-thumb    { background:#1e3a5f; border-radius:99px; }
        ::-webkit-scrollbar-thumb:hover { background:var(--sky); }

        /* ── Gradient text ─────────────────────────────────────── */
        .gradient-text {
            background: linear-gradient(135deg, #38bdf8 0%, #fb923c 50%, #f97316 100%);
            -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
        }
        .gradient-text-anim {
            background: linear-gradient(135deg, #38bdf8, #fb923c, #f97316, #38bdf8);
            background-size: 300% 300%;
            -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
            animation: gradientShift 5s ease infinite;
        }
        @keyframes gradientShift { 0%,100%{background-position:0% 50%} 50%{background-position:100% 50%} }

        /* ── Glass card ────────────────────────────────────────── */
        .glass {
            background: var(--surface);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid var(--border);
        }

        /* ── Card hover ────────────────────────────────────────── */
        .card-hover { transition: all .3s cubic-bezier(.4,0,.2,1); }
        .card-hover:hover {
            border-color: rgba(56,189,248,.25) !important;
            box-shadow: 0 0 40px rgba(56,189,248,.07), 0 24px 48px rgba(0,0,0,.4);
            transform: translateY(-3px);
        }
        .card-hover:hover .card-icon { background: rgba(56,189,248,.15) !important; }

        /* ── Grid bg ───────────────────────────────────────────── */
        .grid-bg {
            background-image:
                linear-gradient(rgba(255,255,255,.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.025) 1px, transparent 1px);
            background-size: 56px 56px;
        }

        /* ── Dot bg ────────────────────────────────────────────── */
        .dot-bg {
            background-image: radial-gradient(rgba(255,255,255,.06) 1px, transparent 1px);
            background-size: 28px 28px;
        }

        /* ── Aurora orb ────────────────────────────────────────── */
        @keyframes auroraDrift {
            0%,100%{transform:translate(0,0) scale(1); opacity:.25}
            33%{transform:translate(50px,-70px) scale(1.2); opacity:.4}
            66%{transform:translate(-35px,40px) scale(.85); opacity:.15}
        }
        .aurora { animation: auroraDrift 10s ease-in-out infinite; border-radius:50%; filter:blur(90px); pointer-events:none; }
        .aurora-slow { animation: auroraDrift 14s ease-in-out infinite reverse; }

        /* ── Float ─────────────────────────────────────────────── */
        @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-14px)} }
        .float-anim            { animation: float 7s ease-in-out infinite; }
        .float-anim-delay      { animation: float 7s ease-in-out 1.5s infinite; }
        .float-anim-delay-2    { animation: float 7s ease-in-out 3s infinite; }

        /* ── Marquee ───────────────────────────────────────────── */
        @keyframes marquee { 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }
        .marquee-inner { animation: marquee 28s linear infinite; }
        .marquee-inner:hover { animation-play-state: paused; }

        /* ── Fade in on scroll ─────────────────────────────────── */
        .reveal { opacity:0; transform:translateY(24px); transition:opacity .7s ease, transform .7s ease; }
        .reveal.visible { opacity:1; transform:none; }

        /* ── Line gradient ─────────────────────────────────────── */
        .line-gradient {
            height:1px; border:none;
            background: linear-gradient(90deg, transparent, rgba(56,189,248,.4), transparent);
        }

        /* ── Neon border btn ───────────────────────────────────── */
        .btn-neon {
            position:relative; overflow:hidden;
            background: linear-gradient(135deg, #0ea5e9, #f97316);
            transition: all .3s ease;
        }
        .btn-neon::before {
            content:''; position:absolute; inset:-1px; border-radius:inherit;
            background: linear-gradient(135deg, #38bdf8, #fb923c, #f97316);
            z-index:-1; opacity:0; transition:opacity .3s;
        }
        .btn-neon:hover::before { opacity:1; }
        .btn-neon:hover { box-shadow: 0 0 30px rgba(56,189,248,.4), 0 0 60px rgba(249,115,22,.2); transform:translateY(-1px); }

        .btn-ghost {
            background: rgba(255,255,255,.04);
            border: 1px solid rgba(255,255,255,.1);
            transition: all .3s ease;
        }
        .btn-ghost:hover {
            background: rgba(255,255,255,.08);
            border-color: rgba(56,189,248,.3);
            box-shadow: 0 0 20px rgba(56,189,248,.1);
        }

        /* ── Section label ─────────────────────────────────────── */
        .section-label {
            display:inline-flex; align-items:center; gap:.5rem;
            background: rgba(56,189,248,.07);
            border: 1px solid rgba(56,189,248,.15);
            color: #38bdf8;
            font-size:.75rem; font-weight:600; letter-spacing:.1em; text-transform:uppercase;
            padding:.35rem 1rem; border-radius:999px;
        }

        /* ── Number counter ────────────────────────────────────── */
        .stat-num {
            background: linear-gradient(135deg, #f8fafc, #94a3b8);
            -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
        }
    </style>
</head>
<body class="bg-black antialiased overflow-x-hidden">

    <?php include ROOT . '/src/Views/partials/nav.php'; ?>

    <!-- Toasts -->
    <?php if (!empty($_flash_success)): ?>
    <div x-data="{show:true}" x-show="show" x-init="setTimeout(()=>show=false,5000)"
         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-200" x-transition:leave-end="opacity-0 scale-95"
         class="fixed top-20 right-4 z-50 flex items-center gap-3 glass border border-green-500/20 text-green-400 px-5 py-3.5 rounded-2xl shadow-2xl shadow-black/40">
        <div class="w-6 h-6 bg-green-500/20 rounded-full flex items-center justify-center flex-shrink-0">
            <i class="fas fa-check text-xs"></i>
        </div>
        <span class="text-sm font-medium"><?= e($_flash_success) ?></span>
        <button @click="show=false" class="ml-1 text-green-400/50 hover:text-green-400 transition-colors"><i class="fas fa-times text-xs"></i></button>
    </div>
    <?php endif; ?>

    <?php if (!empty($_flash_error)): ?>
    <div x-data="{show:true}" x-show="show" x-init="setTimeout(()=>show=false,6000)"
         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-200" x-transition:leave-end="opacity-0 scale-95"
         class="fixed top-20 right-4 z-50 flex items-center gap-3 glass border border-red-500/20 text-red-400 px-5 py-3.5 rounded-2xl shadow-2xl shadow-black/40">
        <div class="w-6 h-6 bg-red-500/20 rounded-full flex items-center justify-center flex-shrink-0">
            <i class="fas fa-exclamation text-xs"></i>
        </div>
        <span class="text-sm font-medium"><?= e($_flash_error) ?></span>
        <button @click="show=false" class="ml-1 text-red-400/50 hover:text-red-400 transition-colors"><i class="fas fa-times text-xs"></i></button>
    </div>
    <?php endif; ?>

    <?= $content ?>

    <?php include ROOT . '/src/Views/partials/footer.php'; ?>

    <script src="/assets/js/main.js"></script>
    <script>
        // Reveal on scroll
        const revealEls = document.querySelectorAll('.reveal');
        const revealObs = new IntersectionObserver(entries => {
            entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); } });
        }, { threshold: 0.1 });
        revealEls.forEach(el => revealObs.observe(el));
    </script>

    <!-- Floating WhatsApp Button -->
    <?php 
    $waPhone = '65389819';
    if ($waPhone): 
    ?>
    <a href="https://wa.me/<?= $waPhone ?>" target="_blank" rel="noopener noreferrer"
       class="fixed bottom-6 right-6 z-50 flex items-center gap-2 bg-[#25d366] hover:bg-[#1ebe57] text-white px-5 py-3 rounded-full shadow-lg hover:shadow-2xl transition-all hover:-translate-y-1 group">
        <i class="fab fa-whatsapp text-2xl"></i>
        <span class="font-medium text-[15px] hidden md:inline-block pr-1"><?= __('whatsapp.text') ?></span>
    </a>
    <?php endif; ?>
</body>
</html>
