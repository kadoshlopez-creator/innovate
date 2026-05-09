<div class="max-w-2xl">
    <div class="mb-6">
        <a href="/admin/contactos" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-700 transition-colors">
            <i class="fas fa-arrow-left"></i> Volver a Mensajes
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <!-- Header -->
        <div class="bg-gray-50 border-b border-gray-200 px-8 py-6">
            <div class="flex items-start justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-700 font-bold text-lg">
                        <?= strtoupper(substr($contact['name'], 0, 1)) ?>
                    </div>
                    <div>
                        <h2 class="font-bold text-gray-900 text-lg"><?= e($contact['name']) ?></h2>
                        <p class="text-sm text-gray-500"><?= e($contact['email']) ?></p>
                    </div>
                </div>
                <span class="text-xs text-gray-400"><?= date('d/m/Y H:i', strtotime($contact['created_at'])) ?></span>
            </div>
        </div>

        <!-- Details -->
        <div class="px-8 py-6 space-y-5">
            <?php if ($contact['phone']): ?>
            <div class="flex items-center gap-3 text-sm">
                <i class="fas fa-phone text-gray-400 w-4"></i>
                <span class="text-gray-600 font-medium">Teléfono:</span>
                <a href="tel:<?= e($contact['phone']) ?>" class="text-blue-600 hover:underline"><?= e($contact['phone']) ?></a>
            </div>
            <?php endif; ?>

            <?php if ($contact['company']): ?>
            <div class="flex items-center gap-3 text-sm">
                <i class="fas fa-building text-gray-400 w-4"></i>
                <span class="text-gray-600 font-medium">Empresa:</span>
                <span class="text-gray-800"><?= e($contact['company']) ?></span>
            </div>
            <?php endif; ?>

            <?php if ($contact['service']): ?>
            <div class="flex items-center gap-3 text-sm">
                <i class="fas fa-cogs text-gray-400 w-4"></i>
                <span class="text-gray-600 font-medium">Servicio interesado:</span>
                <span class="bg-blue-50 text-blue-700 px-2 py-0.5 rounded-full text-xs font-medium"><?= e($contact['service']) ?></span>
            </div>
            <?php endif; ?>

            <div class="pt-2 border-t border-gray-100">
                <p class="text-sm font-medium text-gray-600 mb-3">Mensaje:</p>
                <div class="bg-gray-50 rounded-xl p-5 text-sm text-gray-700 leading-relaxed whitespace-pre-wrap">
                    <?= e($contact['message']) ?>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="px-8 py-5 border-t border-gray-100 bg-gray-50 flex items-center gap-4">
            <a href="mailto:<?= e($contact['email']) ?>"
               class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-500 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition-colors">
                <i class="fas fa-reply"></i> Responder
            </a>
            <form method="POST" action="/admin/contactos/<?= $contact['id'] ?>/eliminar"
                  onsubmit="return confirm('¿Eliminar este mensaje permanentemente?')">
                <?= csrf_field() ?>
                <button type="submit" class="inline-flex items-center gap-2 text-red-500 hover:text-red-600 text-sm font-medium transition-colors">
                    <i class="fas fa-trash"></i> Eliminar
                </button>
            </form>
        </div>
    </div>
</div>
