<div class="max-w-3xl">
<form method="POST" action="/admin/configuracion" class="space-y-6">
    <?= csrf_field() ?>

    <!-- General -->
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
            <h2 class="font-semibold text-gray-900 flex items-center gap-2">
                <i class="fas fa-globe text-blue-500 text-sm"></i> General
            </h2>
        </div>
        <div class="p-6 space-y-5">
            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nombre del sitio</label>
                    <input type="text" name="site_name" value="<?= e($settings['general']['site_name'] ?? '') ?>"
                           class="w-full border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 rounded-lg px-3.5 py-2.5 text-sm outline-none transition-all">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Eslogan</label>
                    <input type="text" name="site_tagline" value="<?= e($settings['general']['site_tagline'] ?? '') ?>"
                           class="w-full border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 rounded-lg px-3.5 py-2.5 text-sm outline-none transition-all">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Descripción del sitio</label>
                <textarea name="site_description" rows="2"
                          class="w-full border border-gray-300 focus:border-blue-500 rounded-lg px-3.5 py-2.5 text-sm outline-none resize-none transition-all"><?= e($settings['general']['site_description'] ?? '') ?></textarea>
                <p class="text-xs text-gray-400 mt-1">Aparece en el footer y en meta description</p>
            </div>
        </div>
    </div>

    <!-- Contact -->
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
            <h2 class="font-semibold text-gray-900 flex items-center gap-2">
                <i class="fas fa-address-card text-green-500 text-sm"></i> Información de Contacto
            </h2>
        </div>
        <div class="p-6 grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Email de contacto</label>
                <input type="email" name="contact_email" value="<?= e($settings['contact']['contact_email'] ?? '') ?>"
                       class="w-full border border-gray-300 focus:border-blue-500 rounded-lg px-3.5 py-2.5 text-sm outline-none transition-all">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Teléfono</label>
                <input type="text" name="contact_phone" value="<?= e($settings['contact']['contact_phone'] ?? '') ?>"
                       class="w-full border border-gray-300 focus:border-blue-500 rounded-lg px-3.5 py-2.5 text-sm outline-none transition-all">
            </div>
            <div class="sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Dirección</label>
                <input type="text" name="contact_address" value="<?= e($settings['contact']['contact_address'] ?? '') ?>"
                       class="w-full border border-gray-300 focus:border-blue-500 rounded-lg px-3.5 py-2.5 text-sm outline-none transition-all">
            </div>
        </div>
    </div>

    <!-- Social -->
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
            <h2 class="font-semibold text-gray-900 flex items-center gap-2">
                <i class="fas fa-share-alt text-purple-500 text-sm"></i> Redes Sociales
            </h2>
        </div>
        <div class="p-6 grid sm:grid-cols-2 gap-5">
            <?php
            $socials = [
                ['social_facebook',  'fab fa-facebook',  'Facebook'],
                ['social_instagram', 'fab fa-instagram', 'Instagram'],
                ['social_linkedin',  'fab fa-linkedin',  'LinkedIn'],
                ['social_twitter',   'fab fa-x-twitter', 'X / Twitter'],
            ];
            foreach ($socials as [$key, $icon, $label]):
            ?>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                    <i class="<?= $icon ?> mr-1"></i> <?= $label ?>
                </label>
                <input type="url" name="<?= $key ?>" value="<?= e($settings['social'][$key] ?? '') ?>"
                       class="w-full border border-gray-300 focus:border-blue-500 rounded-lg px-3.5 py-2.5 text-sm outline-none transition-all"
                       placeholder="https://...">
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Security -->
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
            <h2 class="font-semibold text-gray-900 flex items-center gap-2">
                <i class="fas fa-lock text-orange-500 text-sm"></i> Cambiar Contraseña
            </h2>
        </div>
        <div class="p-6">
            <div class="max-w-sm">
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Nueva contraseña <span class="text-gray-400">(opcional)</span></label>
                <input type="password" name="new_password" minlength="8"
                       class="w-full border border-gray-300 focus:border-blue-500 rounded-lg px-3.5 py-2.5 text-sm outline-none transition-all"
                       placeholder="Mínimo 8 caracteres">
                <p class="text-xs text-gray-400 mt-1">Dejar en blanco para no cambiar</p>
            </div>
        </div>
    </div>

    <!-- Submit -->
    <div class="flex items-center gap-4">
        <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-8 py-3 rounded-xl font-semibold text-sm transition-colors hover:shadow-lg hover:shadow-blue-500/30">
            <i class="fas fa-save mr-2"></i> Guardar Configuración
        </button>
    </div>
</form>
</div>
