<?php
// Extracted data: $title, $services, $config
$siteName = $config['site_name'] ?? 'Innovate';
$tagline  = $config['site_tagline'] ?? 'Soluciones Tecnológicas';
$desc     = $config['site_description'] ?? '';
$email    = $config['contact_email'] ?? '';
$phone    = $config['contact_phone'] ?? '';
$address  = $config['contact_address'] ?? 'Panamá';

// Configuración de botones sociales
$socials = [
    'linkedin'  => ['url' => $config['social_linkedin'] ?? '',  'icon' => 'fab fa-linkedin-in'],
    'instagram' => ['url' => $config['social_instagram'] ?? '', 'icon' => 'fab fa-instagram'],
    'facebook'  => ['url' => $config['social_facebook'] ?? '',  'icon' => 'fab fa-facebook-f'],
    'twitter'   => ['url' => $config['social_twitter'] ?? '',   'icon' => 'fab fa-twitter'],
    'whatsapp'  => ['url' => $phone ? 'https://wa.me/'.preg_replace('/[^0-9]/', '', $phone) : '', 'icon' => 'fab fa-whatsapp'],
    'email'     => ['url' => $email ? 'mailto:'.$email : '', 'icon' => 'fas fa-envelope'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Innovate | Arquitectura robusta. Negocios imparables.</title>
    <link rel="icon" type="image/png" href="/assets/images/logo-dark.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            transition: all 0.3s ease;
        }
        .glass-card:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(56, 189, 248, 0.3);
            transform: translateY(-2px);
        }
        .social-btn {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            transition: all 0.3s ease;
        }
        .social-btn:hover {
            background: rgba(56, 189, 248, 0.1);
            border-color: rgba(56, 189, 248, 0.4);
            color: #38bdf8;
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(56, 189, 248, 0.15);
        }
        /* Efecto halo animado para el logo */
        @keyframes pulse-ring {
            0% { transform: scale(0.9); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.2; }
            100% { transform: scale(0.9); opacity: 0.5; }
        }
        .ring-anim { animation: pulse-ring 4s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
    </style>
</head>
<body class="bg-black text-gray-100 min-h-screen py-10 px-4 antialiased selection:bg-blue-500/30 relative overflow-x-hidden">

    <!-- Gota de luz de fondo -->
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-blue-600/10 rounded-full blur-[100px] pointer-events-none z-0"></div>

    <div class="max-w-xl mx-auto relative z-10">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <!-- Contenedor del Logo (Estilo Anillos como CHT) -->
            <div class="relative inline-flex items-center justify-center mb-6 mt-4">
                <div class="absolute inset-0 bg-blue-500/20 rounded-full blur-xl ring-anim"></div>
                <div class="absolute inset-[-15px] border border-blue-500/20 rounded-3xl"></div>
                <div class="absolute inset-[-30px] border border-orange-500/30 rounded-3xl"></div>
                <div class="w-auto px-8 h-28 rounded-2xl bg-[#0a1128] border border-gray-700/60 flex items-center justify-center relative shadow-2xl">
                    <img src="/assets/images/logo-dark.png" alt="<?= e($siteName) ?>" class="h-16 w-auto drop-shadow-md">
                </div>
            </div>

            <!-- Título y Subtítulo -->
            <h1 class="text-3xl font-bold tracking-tight text-white mb-2"><?= e($siteName) ?></h1>
            <p class="text-[11px] tracking-[0.2em] text-gray-400 uppercase font-semibold mb-4">
                <?= e($tagline) ?> · <?= e($address) ?>
            </p>
            
            <?php if ($desc): ?>
            <p class="text-sm text-gray-400 max-w-sm mx-auto leading-relaxed">
                <?= e($desc) ?>
            </p>
            <?php endif; ?>

            <!-- Badge (Check) -->
            <div class="mt-6 inline-flex items-center justify-center w-7 h-7 rounded-full bg-blue-900/40 text-blue-400 border border-blue-500/30 shadow-[0_0_15px_rgba(56,189,248,0.2)]">
                <i class="fas fa-check text-[10px]"></i>
            </div>
        </div>

        <!-- Social Icons Row -->
        <div class="flex flex-wrap justify-center gap-3 mb-10">
            <?php foreach ($socials as $key => $data): if (empty($data['url'])) continue; ?>
                <a href="<?= e($data['url']) ?>" target="_blank" rel="noopener noreferrer" 
                   class="social-btn w-12 h-12 rounded-xl flex items-center justify-center text-gray-300 text-lg">
                    <i class="<?= e($data['icon']) ?>"></i>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Divider Line con Texto -->
        <div class="relative flex py-5 items-center mb-6">
            <div class="flex-grow border-t border-gray-800"></div>
            <span class="flex-shrink-0 mx-4 text-gray-500 text-[10px] font-bold tracking-[0.15em] uppercase">Nuestros Servicios</span>
            <div class="flex-grow border-t border-gray-800"></div>
        </div>

        <!-- Links/Services Cards -->
        <div class="space-y-4">
            
            <!-- Card Principal (Destacado) -->
            <a href="/" class="glass-card block rounded-2xl p-1 relative overflow-hidden group">
                <div class="absolute top-3 right-3 bg-blue-500/10 border border-blue-500/30 text-blue-400 text-[9px] font-bold px-2 py-0.5 rounded-full flex items-center gap-1">
                    <i class="fas fa-star text-[7px]"></i> DESTACADO
                </div>
                <div class="flex items-center gap-4 p-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-600/20 text-blue-400 flex items-center justify-center text-xl flex-shrink-0 group-hover:bg-blue-500 group-hover:text-white transition-colors">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="flex-1 pr-16">
                        <h3 class="font-semibold text-white group-hover:text-blue-400 transition-colors">Página Web</h3>
                        <p class="text-xs text-gray-400 mt-1">Conócenos · innovate.com.pa</p>
                    </div>
                    <i class="fas fa-chevron-right text-gray-600 group-hover:text-blue-400 transition-colors"></i>
                </div>
            </a>

            <!-- Servicios Dinámicos -->
            <?php foreach ($services as $service): ?>
                <a href="/servicios/<?= e($service['slug']) ?>" class="glass-card block rounded-2xl p-1 relative group">
                    <div class="flex items-center gap-4 p-4">
                        <div class="w-12 h-12 rounded-xl bg-gray-800/40 border border-gray-700/50 text-gray-400 flex items-center justify-center text-xl flex-shrink-0 group-hover:bg-blue-500/20 group-hover:text-blue-400 group-hover:border-blue-500/30 transition-all">
                            <i class="<?= e($service['icon']) ?>"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-200 group-hover:text-blue-400 transition-colors"><?= e($service['title']) ?></h3>
                            <p class="text-[11px] text-gray-500 mt-1 line-clamp-1"><?= e($service['short_description']) ?></p>
                        </div>
                        <i class="fas fa-chevron-right text-gray-700 group-hover:text-blue-400 transition-colors"></i>
                    </div>
                </a>
            <?php endforeach; ?>
            
            <!-- Card de Contacto (WhatsApp) -->
            <?php if ($phone): ?>
            <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $phone) ?>" target="_blank" rel="noopener noreferrer" class="glass-card block rounded-2xl p-1 relative group mt-6">
                <div class="flex items-center gap-4 p-4">
                    <div class="w-12 h-12 rounded-xl bg-green-500/10 border border-green-500/20 text-green-500 flex items-center justify-center text-xl flex-shrink-0 group-hover:bg-green-500 group-hover:text-white transition-all">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-200 group-hover:text-green-400 transition-colors">Agenda tu asesoría</h3>
                        <p class="text-[11px] text-gray-500 mt-1">Escríbenos directamente</p>
                    </div>
                    <i class="fas fa-chevron-right text-gray-700 group-hover:text-green-400 transition-colors"></i>
                </div>
            </a>
            <?php endif; ?>
        </div>

        <!-- Footer -->
        <div class="mt-14 text-center pb-6">
            <p class="text-[10px] text-gray-600 font-medium tracking-widest uppercase">
                &copy; <?= date('Y') ?> <?= e($siteName) ?>.
            </p>
        </div>
    </div>
</body>
</html>
