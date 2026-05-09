<?php
$statCards = [
    ['fas fa-cogs',    'Servicios',        $total_services,  'text-blue-600',   'bg-blue-50'],
    ['fas fa-envelope','Total Mensajes',   $total_contacts,  'text-green-600',  'bg-green-50'],
    ['fas fa-bell',    'No Leídos',        $unread_contacts, 'text-orange-600', 'bg-orange-50'],
];
?>
<!-- Stats -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">
    <?php foreach ($statCards as [$icon, $label, $value, $iconColor, $iconBg]): ?>
    <div class="bg-white rounded-xl border border-gray-200 p-6 flex items-center gap-5">
        <div class="w-12 h-12 <?= $iconBg ?> rounded-xl flex items-center justify-center flex-shrink-0">
            <i class="<?= $icon ?> <?= $iconColor ?>"></i>
        </div>
        <div>
            <p class="text-2xl font-bold text-gray-900"><?= number_format($value) ?></p>
            <p class="text-sm text-gray-500"><?= $label ?></p>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- Quick actions -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
    <?php
    $actions = [
        ['/admin/servicios/crear', 'fas fa-plus', 'Nuevo Servicio',   'bg-blue-600 text-white'],
        ['/admin/contactos',       'fas fa-inbox', 'Ver Mensajes',    'bg-white border border-gray-200 text-gray-700'],
        ['/admin/servicios',       'fas fa-list',  'Servicios',       'bg-white border border-gray-200 text-gray-700'],
        ['/admin/configuracion',   'fas fa-sliders-h', 'Configuración','bg-white border border-gray-200 text-gray-700'],
    ];
    foreach ($actions as [$href, $icon, $label, $classes]):
    ?>
    <a href="<?= $href ?>" class="<?= $classes ?> rounded-xl p-4 flex flex-col items-center gap-2 text-sm font-medium hover:shadow-md transition-all text-center">
        <i class="<?= $icon ?> text-xl"></i>
        <?= $label ?>
    </a>
    <?php endforeach; ?>
</div>

<!-- Recent messages -->
<div class="bg-white rounded-xl border border-gray-200">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
        <h2 class="font-semibold text-gray-900">Mensajes Recientes</h2>
        <a href="/admin/contactos" class="text-blue-600 hover:text-blue-700 text-sm font-medium">Ver todos →</a>
    </div>

    <?php if (empty($recent_contacts)): ?>
    <div class="text-center py-12 text-gray-400">
        <i class="fas fa-inbox text-3xl mb-3"></i>
        <p class="text-sm">No hay mensajes todavía</p>
    </div>
    <?php else: ?>
    <div class="divide-y divide-gray-100">
        <?php foreach ($recent_contacts as $contact): ?>
        <a href="/admin/contactos/<?= $contact['id'] ?>" class="flex items-start gap-4 px-6 py-4 hover:bg-gray-50 transition-colors">
            <div class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center flex-shrink-0 text-sm font-bold text-gray-600">
                <?= strtoupper(substr($contact['name'], 0, 1)) ?>
            </div>
            <div class="flex-1 min-w-0">
                <div class="flex items-center justify-between gap-2">
                    <p class="font-medium text-gray-900 text-sm truncate">
                        <?= e($contact['name']) ?>
                        <?php if (!$contact['read_at']): ?>
                        <span class="ml-2 inline-block w-2 h-2 bg-blue-500 rounded-full"></span>
                        <?php endif; ?>
                    </p>
                    <time class="text-xs text-gray-400 flex-shrink-0">
                        <?= date('d/m/Y', strtotime($contact['created_at'])) ?>
                    </time>
                </div>
                <p class="text-xs text-gray-500 truncate"><?= e($contact['email']) ?></p>
                <p class="text-xs text-gray-400 truncate mt-0.5"><?= e(mb_substr($contact['message'], 0, 80)) ?>...</p>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
