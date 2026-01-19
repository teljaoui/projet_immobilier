<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<section id="contact" class="pt-[120px] py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="title text-center mb-12">
            <h2 class="text-2xl font-bold mb-2">
                Gestion des <span class="text-[#ff551a]">Utilisateur</span>
            </h2>
            <div class="flex justify-center mb-6">
                <hr class="w-20 border-t-4 border-[#ff551a] rounded">
            </div>
        </div>

        <div class="flex justify-end mb-6">
            <a href="/admin/utilisateurs/create"
                class="bg-[#ff551a] text-white px-6 py-2 rounded-full hover:bg-orange-600 transition">
                <i class="fa-solid fa-plus"></i>
                Ajouter un Utilisateur
            </a>
        </div>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded">
                <div class="flex items-center">
                    <i class="fa-solid fa-exclamation-circle text-red-500 mr-3"></i>
                    <p class="text-red-700 text-sm"><?= session()->getFlashdata('error') ?></p>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded">
                <div class="flex items-center">
                    <i class="fa-solid fa-check-circle text-green-500 mr-3"></i>
                    <p class="text-green-700 text-sm"><?= session()->getFlashdata('success') ?></p>
                </div>
            </div>
        <?php endif; ?>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Nom
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                            Prénom
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider 
                        ">Role
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?= esc($user['lastName']) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?= esc($user['firstName']) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?= esc($user['email']) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                     <?= $user['role'] === 'client' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' ?>"">
                                    <?= esc($user['role']) ?>
                                    </span>
                                </td>
                                   <td class=" px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a href="/admin/utilisateurs/edit/<?= $user['id'] ?>"
                                                class="text-blue-600 hover:text-blue-900">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                            <a href="/admin/utilisateurs/delete/<?= $user['id'] ?>"
                                                class="text-red-600 hover:text-red-900"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce utilisateur ?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                Aucun utilisateur trouvé.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>

            </table>
        </div>

    </div>
</section>

<?= $this->endSection() ?>