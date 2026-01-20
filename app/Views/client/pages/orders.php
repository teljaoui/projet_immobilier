<?= $this->extend('client/layouts/main') ?>
<?= $this->section('content') ?>

<section id="orders" class="pt-[160px] py-20 bg-gray-50">

    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">
                Mes <span class="text-[#ff551a]">demandes de visite</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-base mb-6">
                Voici la liste de vos demandes de visite envoyées aux agents.
            </p>
            <div class="flex justify-center mb-6">
                <hr class="w-20 border-t-4 border-[#ff551a] rounded">
            </div>
        </div>

        <?php if (empty($orders)): ?>
            <div class="text-center py-12 bg-white rounded-lg shadow">
                <i class="fa-solid fa-calendar-xmark text-gray-300 text-6xl mb-4"></i>
                <p class="text-gray-500 text-lg mb-4">Vous n’avez encore aucune demande de visite.</p>
                <a href="<?= base_url('biens') ?>" class="inline-block bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition">
                    <i class="fa-solid fa-search mr-2"></i>Découvrir nos biens
                </a>
            </div>
        <?php else: ?>
            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <div class="flex justify-between items-center p-4 border-b">
                    <p class="text-gray-700">
                        <span class="font-bold text-primary"><?= count($orders) ?></span> demande(s) envoyée(s)
                    </p>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bien</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Localisation</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message client</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Réponse agent</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($orders as $index => $order): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $index + 1 ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    <a href="<?= base_url('bien/' . $order['property_id']) ?>" class="text-primary hover:underline">
                                        <?= esc($order['property_title']) ?>
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= esc($order['city'] ?? '-') ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?= esc($order['client_message']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    <?= !empty($order['agent_message']) ? esc($order['agent_message']) : '-' ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold 
                                    <?= $order['status'] === 'pending' ? 'text-yellow-600' : ($order['status'] === 'accepted' ? 'text-green-600' : 'text-red-600') ?>">
                                    <?= esc($order['status']) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?= date('d/m/Y H:i', strtotime($order['created_at'])) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

    </div>
</section>

<?= $this->endSection() ?>
