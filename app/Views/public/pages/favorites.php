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
        <div id="alert-container" class="flex py-2 w-full space-y-3"></div>

        <div id="empty-favorites" class="text-center py-12 bg-white rounded-lg shadow hidden">
            <i class="fa-solid fa-heart-crack text-gray-300 text-6xl mb-4"></i>
            <p class="text-gray-500 text-lg mb-4">Aucun favori pour le moment</p>
            <a href="<?= base_url('biens') ?>"
                class="inline-block bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition">
                <i class="fa-solid fa-search mr-2"></i>Découvrir nos biens
            </a>
        </div>

        <div id="favorites-table-container" class="overflow-x-auto bg-white shadow rounded-lg">

            <div class="flex justify-between items-center p-4 border-b">
                <p class="text-gray-700">
                    <span id="favorites-count" class="font-bold text-primary">0</span> bien(s) en favori
                </p>
                <button onclick="clearAllFavorites()" id="clear-all-btn"
                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition text-sm hidden">
                    <i class="fa-solid fa-trash mr-2"></i>Tout supprimer
                </button>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image
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
                <tbody id="favorites-tbody" class="bg-white divide-y divide-gray-200">
                </tbody>
            </table>
        </div>
    </div>
</section>

<?= $this->endSection() ?>