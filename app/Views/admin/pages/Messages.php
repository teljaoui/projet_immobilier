<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>

<section class="pt-[120px] py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="title text-center mb-12">
            <h2 class="text-2xl font-bold mb-2">
                Gestion des <span class="text-[#ff551a]">Messages</span>
            </h2>
            <div class="flex justify-center mb-6">
                <hr class="w-20 border-t-4 border-[#ff551a] rounded">
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Téléphone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Message</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if(!empty($messages)): ?>
                        <?php foreach($messages as $msg): ?>
                            <tr>
                                <td class="px-6 py-4"><?= esc($msg['name']) ?></td>
                                <td class="px-6 py-4"><?= esc($msg['email']) ?></td>
                                <td class="px-6 py-4"><?= esc($msg['phone_number']) ?></td>
                                <td class="px-6 py-4"><?= esc($msg['message']) ?></td>
                                <td class="px-6 py-4"><?= date('d/m/Y H:i', strtotime($msg['created_at'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Aucun message trouvé</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
