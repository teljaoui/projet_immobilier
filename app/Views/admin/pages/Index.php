<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>

<section class="pt-[120px] py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="title text-center mb-12">
            <h2 class="text-2xl font-bold mb-2">
                Gestion des <span class="text-[#ff551a]">Demandes</span>
            </h2>
            <div class="flex justify-center mb-6">
                <hr class="w-20 border-t-4 border-[#ff551a] rounded">
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Téléphone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Détails</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if(!empty($orders)): ?>
                        <?php
                            $status_fr = [
                                'pending'  => 'En attente',
                                'accepted' => 'Accepté',
                                'rejected' => 'Refusé'
                            ];
                        ?>
                        <?php foreach($orders as $order): ?>
                            <tr>
                                <td class="px-6 py-4 break-words"><?= esc($order['client_name']) ?></td>
                                <td class="px-6 py-4 break-words"><?= esc($order['client_email']) ?></td>
                                <td class="px-6 py-4 break-words"><?= esc($order['client_phone']) ?></td>
                                <td class="px-6 py-4 font-semibold
                                    <?= $order['status'] === 'pending' ? 'text-yellow-600' : ($order['status'] === 'accepted' ? 'text-green-600' : 'text-red-600') ?>">
                                    <?= esc($status_fr[$order['status']] ?? $order['status']) ?>
                                </td>
                                <td class="px-6 py-4"><?= date('d/m/Y H:i', strtotime($order['created_at'])) ?></td>
                                <td class="px-6 py-4">
                                    <a href="<?= base_url('admin/demandes/detail/'.$order['id']) ?>" 
                                       class="text-blue-600 hover:underline">Voir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-gray-500">Aucune demande trouvée</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
