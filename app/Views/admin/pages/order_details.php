<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>

<section class="pt-[120px] py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="title text-center mb-12">
            <h2 class="text-2xl font-bold mb-2">
                Détail de la <span class="text-[#ff551a]">Demande</span>
            </h2>
            <div class="flex justify-center mb-6">
                <hr class="w-20 border-t-4 border-[#ff551a] rounded">
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 space-y-4">
            <div>
                <strong>Client :</strong> <?= esc($order['client_name']) ?>
            </div>
            <div>
                <strong>Email :</strong> <?= esc($order['client_email']) ?>
            </div>
            <div>
                <strong>Téléphone :</strong> <?= esc($order['client_phone']) ?>
            </div>
            <div>
                <strong>Bien :</strong>
                <a href="<?= base_url('bien/' . $order['property_id']) ?>" target="_blank"
                    class="text-primary hover:underline">
                    <?= esc($order['property_title']) ?>
                </a>
            </div>
            <div>
                <strong>Message Client :</strong>
                <p class="break-words"><?= esc($order['client_message']) ?></p>
            </div>
            <div>
                <strong>Message Agent :</strong>
                <p class="break-words"><?= !empty($order['agent_message']) ? esc($order['agent_message']) : '-' ?></p>
            </div>
            <div>
                <strong>Statut :</strong>
                <?php
                $status_fr = [
                    'pending' => 'En attente',
                    'accepted' => 'Accepté',
                    'rejected' => 'Refusé'
                ];
                $status_color = $order['status'] === 'pending' ? 'text-yellow-600' : ($order['status'] === 'accepted' ? 'text-green-600' : 'text-red-600');
                ?>
                <span class="<?= $status_color ?> font-semibold">
                    <?= esc($status_fr[$order['status']] ?? $order['status']) ?>
                </span>
            </div>
            <div>
                <strong>Date de création :</strong> <?= date('d/m/Y H:i', strtotime($order['created_at'])) ?>
            </div>

            <div class="mt-6 border-t pt-6">

                <form action="<?= base_url('admin/demandes/update/' . $order['id']) ?>" method="post" class="space-y-4">
                    <?= csrf_field() ?>
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

                    <div>
                        <label for="agent_message" class="block font-medium text-gray-700">Message Agent</label>
                        <textarea name="agent_message" id="agent_message" rows="4"
                            class="mt-1 w-full px-4 py-3 border border-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"><?= esc($order['agent_message']) ?></textarea>
                    </div>

                    <div>
                        <label for="status" class="block font-medium text-gray-700">Statut</label>
                        <select name="status" id="status"
                            class="mt-1 w-full px-4 py-3 border border-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition">
                            <option value="pending" <?= $order['status'] === 'pending' ? 'selected' : '' ?>>En attente
                            </option>
                            <option value="accepted" <?= $order['status'] === 'accepted' ? 'selected' : '' ?>>Accepté
                            </option>
                            <option value="rejected" <?= $order['status'] === 'rejected' ? 'selected' : '' ?>>Refusé
                            </option>
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="px-6 py-2 bg-[#ff551a] text-white rounded-md hover:bg-[#e64b12]">
                            Mettre à jour
                        </button>
                        <a href="<?= base_url('admin') ?>" class="ml-4 text-blue-600 hover:underline">&larr;
                            Retour aux demandes</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>