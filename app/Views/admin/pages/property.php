<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<section id="contact" class="pt-[120px] py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="title text-center mb-12">
            <h2 class="text-2xl font-bold mb-2">
                Gestion des <span class="text-[#ff551a]">Biens</span>
            </h2>
            <div class="flex justify-center mb-6">
                <hr class="w-20 border-t-4 border-[#ff551a] rounded">
            </div>
        </div>

        <div class="flex justify-end mb-6">
            <a href="/admin/biens/create"
                class="bg-[#ff551a] text-white px-6 py-2 rounded-full hover:bg-orange-600 transition">
                <i class="fa-solid fa-plus"></i>
                Ajouter un bien
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Image
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Titre
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Type
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Prix
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                            Transaction</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Ville
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if (!empty($properties)): ?>
                        <?php foreach ($properties as $property): ?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php if ($property['image']): ?>
                                        <img src="<?= base_url('uploads/properties/' . $property['image']) ?>"
                                            alt="<?= esc($property['title']) ?>" class="h-16 w-16 object-cover rounded">
                                    <?php else: ?>
                                        <div class="h-16 w-16 bg-gray-200 rounded flex items-center justify-center">
                                            <i class="fa-solid fa-image text-gray-400"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        <?= esc($property['title']) ?>
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        <?= $property['rooms'] ?> pièces • <?= $property['surface'] ?> m²
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        <?= esc($property['type_name']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-[#ff551a]">
                                        <?= number_format($property['price'], 0, ',', ' ') ?> DH
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        <?= $property['transaction_type'] === 'vente' ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800' ?>">
                                        <?= ucfirst($property['transaction_type']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?= esc($property['city']) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="/admin/property/edit/<?= $property['id'] ?>"
                                            class="text-blue-600 hover:text-blue-900">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <a href="/admin/property/delete/<?= $property['id'] ?>"
                                            class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bien ?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                <i class="fa-solid fa-inbox text-4xl mb-2"></i>
                                <p>Aucun bien trouvé</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?= $this->endSection() ?>