<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500"><?= count($services) ?> servicio(s) registrado(s)</p>
    <a href="/admin/servicios/crear" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
        <i class="fas fa-plus"></i> Nuevo Servicio
    </a>
</div>

<?php if (empty($services)): ?>
<div class="bg-white rounded-xl border border-gray-200 py-20 text-center text-gray-400">
    <i class="fas fa-cogs text-4xl mb-4"></i>
    <p class="font-medium text-gray-500 mb-1">No hay servicios</p>
    <p class="text-sm mb-6">Empieza creando el primer servicio.</p>
    <a href="/admin/servicios/crear" class="bg-blue-600 text-white px-5 py-2 rounded-lg text-sm font-medium">Crear Servicio</a>
</div>
<?php else: ?>
<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                <th class="text-left px-6 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Servicio</th>
                <th class="text-left px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider hidden sm:table-cell">Slug</th>
                <th class="text-center px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Estado</th>
                <th class="text-center px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider hidden md:table-cell">Orden</th>
                <th class="text-right px-6 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <?php foreach ($services as $service): ?>
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="<?= e($service['icon']) ?> text-blue-500 text-sm"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900"><?= e($service['title']) ?></p>
                            <p class="text-xs text-gray-400 mt-0.5 hidden lg:block"><?= e(mb_substr($service['short_description'], 0, 60)) ?>...</p>
                        </div>
                    </div>
                </td>
                <td class="px-4 py-4 text-gray-500 font-mono text-xs hidden sm:table-cell"><?= e($service['slug']) ?></td>
                <td class="px-4 py-4 text-center">
                    <?php if ($service['active']): ?>
                    <span class="inline-flex items-center gap-1 bg-green-50 text-green-700 text-xs font-medium px-2.5 py-1 rounded-full">
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Activo
                    </span>
                    <?php else: ?>
                    <span class="inline-flex items-center gap-1 bg-gray-100 text-gray-500 text-xs font-medium px-2.5 py-1 rounded-full">
                        <span class="w-1.5 h-1.5 bg-gray-400 rounded-full"></span> Inactivo
                    </span>
                    <?php endif; ?>
                </td>
                <td class="px-4 py-4 text-center text-gray-500 hidden md:table-cell"><?= $service['order_index'] ?></td>
                <td class="px-6 py-4">
                    <div class="flex items-center justify-end gap-2">
                        <a href="/servicios/<?= e($service['slug']) ?>" target="_blank"
                           class="w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center justify-center text-gray-500 hover:text-gray-700 transition-colors" title="Ver en sitio">
                            <i class="fas fa-external-link-alt text-xs"></i>
                        </a>
                        <a href="/admin/servicios/<?= $service['id'] ?>/editar"
                           class="w-8 h-8 bg-blue-50 hover:bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 hover:text-blue-700 transition-colors" title="Editar">
                            <i class="fas fa-edit text-xs"></i>
                        </a>
                        <form method="POST" action="/admin/servicios/<?= $service['id'] ?>/eliminar"
                              onsubmit="return confirm('¿Eliminar este servicio?')">
                            <?= csrf_field() ?>
                            <button type="submit"
                                    class="w-8 h-8 bg-red-50 hover:bg-red-100 rounded-lg flex items-center justify-center text-red-500 hover:text-red-600 transition-colors" title="Eliminar">
                                <i class="fas fa-trash text-xs"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>
