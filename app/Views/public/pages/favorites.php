<?= $this->extend('public/layouts/main') ?>

<?= $this->section('content') ?>

<section id="favorites" class="pt-[160px] py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">
                Liste des <span class="text-[#ff551a]">Favoris</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-base mb-6">
                Voici la liste des biens que vous avez ajoutés à vos favoris.
            </p>
            <div class="flex justify-center mb-6">
                <hr class="w-20 border-t-4 border-[#ff551a] rounded">
            </div>
        </div>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom
                            du bien</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Localisation</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if (!empty($favorites)): ?>
                        <?php foreach ($favorites as $index => $fav): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"><?= $index + 1 ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?= esc($fav['name']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?= esc($fav['location']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?= esc($fav['price']) ?> MAD</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <a href="<?= base_url('favorites/remove/' . $fav['id']) ?>"
                                        class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600 transition">
                                        Retirer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                Aucun favori trouvé.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?= $this->endSection() ?>