<?= $this->extend('client/layouts/main') ?>

<?= $this->section('content') ?>

<section id="profile" class="pt-[160px] py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="title text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">
                Bienvenue sur votre <span class="text-[#ff551a]">Profil Client</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-base mb-6">
                Ici, vous pouvez consulter et mettre à jour vos informations personnelles, gérer vos demandes et suivre
                vos activités.
            </p>
            <div class="flex justify-center mb-6">
                <hr class="w-20 border-t-4 border-[#ff551a] rounded">
            </div>
        </div>

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-sm p-8">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded">
                    <div class="flex items-center">
                        <i class="fa-solid fa-check-circle text-green-500 mr-3"></i>
                        <p class="text-green-700 text-sm"><?= session()->getFlashdata('success') ?></p>
                    </div>
                </div>
            <?php endif; ?>
            <h3 class="text-2xl font-semibold mb-4">Vos informations</h3>
            <p><strong>Nom complet :</strong> <?= session()->get('user_name') ?></p>
            <p class=" mb-6"><strong>Email :</strong> <?= session()->get('user_email') ?></p>
            <div class="flex justify-end gap-4">
                <a href="<?= base_url('commandes') ?>"
                    class="bg-gray-900 hover:bg-gray-800  text-white px-4 py-2 rounded hover:bg-[#e64910] transition duration-500">
                    Mes Commandes
                </a>
                <form action="<?= base_url('logout') ?>" method="POST" class="inline">
                    <?= csrf_field() ?>
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition"
                        onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?')">
                        Déconnexion
                    </button>
                </form>

            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>