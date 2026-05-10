<?php
$isEdit  = $service !== null;
$v       = fn(string $k, string $d = '') => e($service[$k] ?? $d);
$icons   = [
    'fas fa-code'        => 'Código (Desarrollo)',
    'fas fa-mobile-alt'  => 'Móvil (Apps)',
    'fas fa-globe'       => 'Globe (Web)',
    'fas fa-shield-alt'  => 'Escudo (Seguridad)',
    'fas fa-brain'       => 'Cerebro (IA)',
    'fas fa-lightbulb'   => 'Bombilla (Consultoría)',
    'fas fa-cogs'        => 'Engranajes (General)',
    'fas fa-database'    => 'Base de Datos',
    'fas fa-cloud'       => 'Nube',
    'fas fa-chart-line'  => 'Gráfico',
    'fas fa-robot'       => 'Robot',
    'fas fa-lock'        => 'Candado',
];
?>
<div class="max-w-3xl">
    <div class="mb-6">
        <a href="/admin/servicios" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-700 transition-colors">
            <i class="fas fa-arrow-left"></i> Volver a Servicios
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 p-8">
        <form method="POST" action="<?= e($action) ?>" class="space-y-6" x-data="{
            title: '<?= $v('title') ?>',
            slug: '<?= $v('slug') ?>',
            autoSlug: <?= $isEdit ? 'false' : 'true' ?>,
            updateSlug() {
                if (this.autoSlug) {
                    this.slug = this.title.toLowerCase()
                        .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                        .replace(/[^a-z0-9\s-]/g, '')
                        .replace(/[\s-]+/g, '-')
                        .replace(/^-+|-+$/g, '');
                }
            }
        }">
            <?= csrf_field() ?>

            <div class="grid sm:grid-cols-2 gap-6">
                <!-- Title ES -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Título (ES) <span class="text-red-500">*</span></label>
                    <input type="text" name="title" required
                           x-model="title" @input="updateSlug()"
                           class="w-full border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 rounded-lg px-3.5 py-2.5 text-sm outline-none transition-all"
                           placeholder="Ej. Desarrollo de Software">
                </div>

                <!-- Title EN -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Título (EN)</label>
                    <input type="text" name="title_en"
                           value="<?= $v('title_en') ?>"
                           class="w-full border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 rounded-lg px-3.5 py-2.5 text-sm outline-none transition-all"
                           placeholder="Ej. Software Development">
                </div>

            </div>

            <div class="grid sm:grid-cols-1 gap-6">
                <!-- Slug -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Slug (URL)</label>
                    <input type="text" name="slug"
                           x-model="slug" @focus="autoSlug = false"
                           class="w-full border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 rounded-lg px-3.5 py-2.5 text-sm font-mono outline-none transition-all"
                           placeholder="desarrollo-de-software">
                    <p class="text-xs text-gray-400 mt-1">Se genera automáticamente desde el título en español</p>
                </div>
            </div>

            <!-- Icon -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Icono (Font Awesome)</label>
                <div class="flex gap-3 items-center">
                    <select name="icon" class="flex-1 border border-gray-300 focus:border-blue-500 rounded-lg px-3.5 py-2.5 text-sm outline-none transition-all" x-data x-ref="iconSel">
                        <?php foreach ($icons as $cls => $lbl): ?>
                        <option value="<?= e($cls) ?>" <?= $v('icon', 'fas fa-cogs') === $cls ? 'selected' : '' ?>>
                            <?= e($lbl) ?> (<?= e($cls) ?>)
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center text-blue-500">
                        <i class="<?= $v('icon', 'fas fa-cogs') ?> text-lg" id="iconPreview"></i>
                    </div>
                </div>
                <script>
                document.querySelector('[name="icon"]').addEventListener('change', function() {
                    const preview = document.getElementById('iconPreview');
                    preview.className = this.value + ' text-lg';
                });
                </script>
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                <!-- Short description ES -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Descripción corta (ES)</label>
                    <textarea name="short_description" rows="3"
                              class="w-full border border-gray-300 focus:border-blue-500 rounded-lg px-3.5 py-2.5 text-sm outline-none transition-all resize-none"
                              placeholder="Resumen breve en español"><?= $v('short_description') ?></textarea>
                </div>
                <!-- Short description EN -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Descripción corta (EN)</label>
                    <textarea name="short_description_en" rows="3"
                              class="w-full border border-gray-300 focus:border-blue-500 rounded-lg px-3.5 py-2.5 text-sm outline-none transition-all resize-none"
                              placeholder="Short summary in English"><?= $v('short_description_en') ?></textarea>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                <!-- Full description ES -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Descripción completa (ES)</label>
                    <textarea name="description" rows="10"
                              class="w-full border border-gray-300 focus:border-blue-500 rounded-lg px-3.5 py-2.5 text-sm outline-none transition-all font-mono resize-y"
                              placeholder="Contenido en español..."><?= $v('description') ?></textarea>
                </div>
                <!-- Full description EN -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Descripción completa (EN)</label>
                    <textarea name="description_en" rows="10"
                              class="w-full border border-gray-300 focus:border-blue-500 rounded-lg px-3.5 py-2.5 text-sm outline-none transition-all font-mono resize-y"
                              placeholder="English content..."><?= $v('description_en') ?></textarea>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Estado</label>
                    <select name="active" class="w-full border border-gray-300 focus:border-blue-500 rounded-lg px-3.5 py-2.5 text-sm outline-none">
                        <option value="1" <?= ($service['active'] ?? 1) == 1 ? 'selected' : '' ?>>Activo</option>
                        <option value="0" <?= ($service['active'] ?? 1) == 0 ? 'selected' : '' ?>>Inactivo</option>
                    </select>
                </div>

                <!-- Order -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Orden de aparición</label>
                    <input type="number" name="order_index" min="0"
                           value="<?= $v('order_index', '0') ?>"
                           class="w-full border border-gray-300 focus:border-blue-500 rounded-lg px-3.5 py-2.5 text-sm outline-none">
                    <p class="text-xs text-gray-400 mt-1">Menor número = aparece primero</p>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-3 pt-2 border-t border-gray-100">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-2.5 rounded-lg text-sm font-semibold transition-colors">
                    <i class="fas <?= $isEdit ? 'fa-save' : 'fa-plus' ?> mr-2"></i>
                    <?= $isEdit ? 'Guardar Cambios' : 'Crear Servicio' ?>
                </button>
                <a href="/admin/servicios" class="text-gray-500 hover:text-gray-700 text-sm font-medium transition-colors">Cancelar</a>
            </div>
        </form>
    </div>
</div>
