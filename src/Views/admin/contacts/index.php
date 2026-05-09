<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500"><?= $total ?> mensaje(s) en total</p>
</div>

<?php if (empty($contacts)): ?>
<div class="bg-white rounded-xl border border-gray-200 py-20 text-center text-gray-400">
    <i class="fas fa-inbox text-4xl mb-4"></i>
    <p class="text-sm">No hay mensajes todavía</p>
</div>
<?php else: ?>
<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                <th class="text-left px-6 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Remitente</th>
                <th class="text-left px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider hidden md:table-cell">Servicio</th>
                <th class="text-left px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider hidden lg:table-cell">Mensaje</th>
                <th class="text-center px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Fecha</th>
                <th class="text-right px-6 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <?php foreach ($contacts as $contact): ?>
            <tr class="hover:bg-gray-50 transition-colors <?= !$contact['read_at'] ? 'font-semibold' : '' ?>">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <?php if (!$contact['read_at']): ?>
                        <span class="w-2 h-2 bg-blue-500 rounded-full flex-shrink-0"></span>
                        <?php endif; ?>
                        <div>
                            <p class="text-gray-900 text-sm"><?= e($contact['name']) ?></p>
                            <p class="text-xs text-gray-400"><?= e($contact['email']) ?></p>
                        </div>
                    </div>
                </td>
                <td class="px-4 py-4 text-gray-500 hidden md:table-cell">
                    <?= $contact['service'] ? e($contact['service']) : '<span class="text-gray-300">—</span>' ?>
                </td>
                <td class="px-4 py-4 text-gray-400 text-xs hidden lg:table-cell max-w-xs">
                    <p class="truncate"><?= e(mb_substr($contact['message'], 0, 80)) ?>...</p>
                </td>
                <td class="px-4 py-4 text-center text-xs text-gray-400">
                    <?= date('d/m/Y', strtotime($contact['created_at'])) ?><br>
                    <span class="text-gray-300"><?= date('H:i', strtotime($contact['created_at'])) ?></span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center justify-end gap-2">
                        <a href="/admin/contactos/<?= $contact['id'] ?>"
                           class="w-8 h-8 bg-blue-50 hover:bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 transition-colors" title="Ver mensaje">
                            <i class="fas fa-eye text-xs"></i>
                        </a>
                        <form method="POST" action="/admin/contactos/<?= $contact['id'] ?>/eliminar"
                              onsubmit="return confirm('¿Eliminar este mensaje?')">
                            <?= csrf_field() ?>
                            <button type="submit"
                                    class="w-8 h-8 bg-red-50 hover:bg-red-100 rounded-lg flex items-center justify-center text-red-500 transition-colors" title="Eliminar">
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

<!-- Pagination -->
<?php if ($pages > 1): ?>
<div class="flex justify-center gap-2 mt-6">
    <?php for ($i = 1; $i <= $pages; $i++): ?>
    <a href="?page=<?= $i ?>"
       class="w-9 h-9 flex items-center justify-center rounded-lg text-sm font-medium transition-colors
              <?= $i === $page ? 'bg-blue-600 text-white' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50' ?>">
        <?= $i ?>
    </a>
    <?php endfor; ?>
</div>
<?php endif; ?>
<?php endif; ?>
