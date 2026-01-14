<?= $this->extend('public/layouts/main') ?>

<?= $this->section('content') ?>

<section id="property" class="pt-[160px] py-20 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4">
        <div class="title text-center mb-12">
            <h2 class="text-3xl  font-bold mb-4">
                Nos <span class="text-primary">biens immobiliers</span>
            </h2>

            <p class="text-gray-600 max-w-4xl mx-auto text-sm md:text-base mb-6">
                Découvrez notre sélection de biens immobiliers soigneusement choisis,
                incluant des appartements, maisons, villas et locaux commerciaux.
                Nous vous accompagnons dans votre recherche afin de trouver le bien
                qui correspond parfaitement à vos besoins et à votre budget.
            </p>

            <div class="flex justify-center mb-6">
                <hr class="w-20 border-t-4 border-primary rounded">
            </div>
        </div>

        <div class="mb-6 flex justify-center">
            <button type="button" id="toggleFilters"
                class="bg-primary text-white font-semibold py-3 px-8 rounded-lg hover:bg-opacity-90 transition-all duration-300 flex items-center gap-2 shadow-lg">
                <i class="fa-solid fa-filter"></i>
                <span id="filterButtonText">Filtrer les biens</span>
                <i class="fa-solid fa-chevron-down transition-transform duration-300" id="filterIcon"></i>
            </button>
        </div>
        <div id="filterForm" class="bg-white rounded-lg shadow-lg p-6 mb-10 hidden overflow-hidden transition-all duration-500">
            <form action="<?= base_url('properties') ?>" method="GET" class="space-y-6">

                <!-- Ligne 1: Type de transaction et Type de bien -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Type de transaction -->
                    <div>
                        <label for="transaction_type" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fa-solid fa-handshake text-primary mr-1"></i>
                            Type de transaction
                        </label>
                        <select id="transaction_type" name="transaction_type"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                            <option value="">Tous</option>
                            <option value="vente" <?= (isset($_GET['transaction_type']) && $_GET['transaction_type'] == 'vente') ? 'selected' : '' ?>>Vente</option>
                            <option value="location" <?= (isset($_GET['transaction_type']) && $_GET['transaction_type'] == 'location') ? 'selected' : '' ?>>Location</option>
                        </select>
                    </div>

                    <!-- Type de bien -->
                    <div>
                        <label for="type_id" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fa-solid fa-building text-primary mr-1"></i>
                            Type de bien
                        </label>
                        <select id="type_id" name="type_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                            <option value="">Tous les types</option>
                            <?php if (isset($propertyTypes) && is_array($propertyTypes)): ?>
                                <?php foreach ($propertyTypes as $type): ?>
                                    <option value="<?= $type['id'] ?>" <?= (isset($_GET['type_id']) && $_GET['type_id'] == $type['id']) ? 'selected' : '' ?>>
                                        <?= esc($type['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <!-- Ligne 2: Ville et Fourchette de prix -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Ville -->
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fa-solid fa-map-marker-alt text-primary mr-1"></i>
                            Ville
                        </label>
                        <select id="city" name="city"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                            <option value="">Toutes les villes</option>
                            <option value="Rabat" <?= (isset($_GET['city']) && $_GET['city'] == 'Rabat') ? 'selected' : '' ?>>Rabat</option>
                            <option value="Casablanca" <?= (isset($_GET['city']) && $_GET['city'] == 'Casablanca') ? 'selected' : '' ?>>Casablanca</option>
                            <option value="Marrakech" <?= (isset($_GET['city']) && $_GET['city'] == 'Marrakech') ? 'selected' : '' ?>>Marrakech</option>
                            <option value="Tanger" <?= (isset($_GET['city']) && $_GET['city'] == 'Tanger') ? 'selected' : '' ?>>Tanger</option>
                            <option value="Fès" <?= (isset($_GET['city']) && $_GET['city'] == 'Fès') ? 'selected' : '' ?>>
                                Fès</option>
                            <option value="Agadir" <?= (isset($_GET['city']) && $_GET['city'] == 'Agadir') ? 'selected' : '' ?>>Agadir</option>
                        </select>
                    </div>

                    <!-- Prix minimum -->
                    <div>
                        <label for="price_min" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fa-solid fa-money-bill-wave text-primary mr-1"></i>
                            Prix minimum
                        </label>
                        <input type="number" id="price_min" name="price_min"
                            value="<?= isset($_GET['price_min']) ? esc($_GET['price_min']) : '' ?>"
                            placeholder="Ex: 500000"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                    </div>

                    <!-- Prix maximum -->
                    <div>
                        <label for="price_max" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fa-solid fa-money-bill-wave text-primary mr-1"></i>
                            Prix maximum
                        </label>
                        <input type="number" id="price_max" name="price_max"
                            value="<?= isset($_GET['price_max']) ? esc($_GET['price_max']) : '' ?>"
                            placeholder="Ex: 2000000"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                    </div>
                </div>

                <!-- Ligne 3: Caractéristiques (Surface, Chambres, Salles de bain) -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Surface minimum -->
                    <div>
                        <label for="surface_min" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fa-solid fa-expand text-primary mr-1"></i>
                            Surface min (m²)
                        </label>
                        <input type="number" id="surface_min" name="surface_min"
                            value="<?= isset($_GET['surface_min']) ? esc($_GET['surface_min']) : '' ?>"
                            placeholder="Ex: 50"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                    </div>

                    <!-- Chambres minimum -->
                    <div>
                        <label for="bedrooms_min" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fa-solid fa-bed text-primary mr-1"></i>
                            Chambres min
                        </label>
                        <select id="bedrooms_min" name="bedrooms_min"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                            <option value="">Tous</option>
                            <option value="1" <?= (isset($_GET['bedrooms_min']) && $_GET['bedrooms_min'] == '1') ? 'selected' : '' ?>>1+</option>
                            <option value="2" <?= (isset($_GET['bedrooms_min']) && $_GET['bedrooms_min'] == '2') ? 'selected' : '' ?>>2+</option>
                            <option value="3" <?= (isset($_GET['bedrooms_min']) && $_GET['bedrooms_min'] == '3') ? 'selected' : '' ?>>3+</option>
                            <option value="4" <?= (isset($_GET['bedrooms_min']) && $_GET['bedrooms_min'] == '4') ? 'selected' : '' ?>>4+</option>
                            <option value="5" <?= (isset($_GET['bedrooms_min']) && $_GET['bedrooms_min'] == '5') ? 'selected' : '' ?>>5+</option>
                        </select>
                    </div>

                    <!-- Salles de bain minimum -->
                    <div>
                        <label for="bathrooms_min" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fa-solid fa-bath text-primary mr-1"></i>
                            Salles de bain min
                        </label>
                        <select id="bathrooms_min" name="bathrooms_min"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                            <option value="">Tous</option>
                            <option value="1" <?= (isset($_GET['bathrooms_min']) && $_GET['bathrooms_min'] == '1') ? 'selected' : '' ?>>1+</option>
                            <option value="2" <?= (isset($_GET['bathrooms_min']) && $_GET['bathrooms_min'] == '2') ? 'selected' : '' ?>>2+</option>
                            <option value="3" <?= (isset($_GET['bathrooms_min']) && $_GET['bathrooms_min'] == '3') ? 'selected' : '' ?>>3+</option>
                            <option value="4" <?= (isset($_GET['bathrooms_min']) && $_GET['bathrooms_min'] == '4') ? 'selected' : '' ?>>4+</option>
                        </select>
                    </div>

                    <!-- Pièces minimum -->
                    <div>
                        <label for="rooms_min" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fa-solid fa-door-open text-primary mr-1"></i>
                            Pièces min
                        </label>
                        <select id="rooms_min" name="rooms_min"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                            <option value="">Tous</option>
                            <option value="1" <?= (isset($_GET['rooms_min']) && $_GET['rooms_min'] == '1') ? 'selected' : '' ?>>1+</option>
                            <option value="2" <?= (isset($_GET['rooms_min']) && $_GET['rooms_min'] == '2') ? 'selected' : '' ?>>2+</option>
                            <option value="3" <?= (isset($_GET['rooms_min']) && $_GET['rooms_min'] == '3') ? 'selected' : '' ?>>3+</option>
                            <option value="4" <?= (isset($_GET['rooms_min']) && $_GET['rooms_min'] == '4') ? 'selected' : '' ?>>4+</option>
                            <option value="5" <?= (isset($_GET['rooms_min']) && $_GET['rooms_min'] == '5') ? 'selected' : '' ?>>5+</option>
                        </select>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="flex flex-col sm:flex-row gap-3 pt-4">
                    <button type="submit"
                        class="flex-1 bg-primary text-white font-semibold py-3 px-6 rounded-lg hover:bg-opacity-90 transition-all duration-300 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-search"></i>
                        Rechercher
                    </button>
                    <a href="<?= base_url('properties') ?>"
                        class="flex-1 sm:flex-none bg-gray-200 text-gray-700 font-semibold py-3 px-6 rounded-lg hover:bg-gray-300 transition-all duration-300 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-rotate-right"></i>
                        Réinitialiser
                    </a>
                </div>
            </form>
        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

            <div class="max-w-sm mx-auto mt-8">
                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-md transition-all duration-500 transform hover:-translate-y-1">

                    <a href="#"
                        class="group relative block rounded-2xl overflow-hidden shadow hover:shadow-xl transition duration-500">
                        <div
                            class="relative h-64 bg-gray-200 overflow-hidden group-hover:bg-primary transition duration-500">
                            <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=800" alt="Propriété"
                                class="w-full h-full object-cover group-hover:brightness-50 transition duration-500">

                            <div class="absolute bottom-3 left-1/2 transform -translate-x-1/2 flex gap-1.5">
                                <div class="w-2 h-2 bg-white rounded-full shadow"></div>
                                <div class="w-2 h-2 bg-white/50 rounded-full shadow"></div>
                            </div>
                            <div
                                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
                                <span class="text-white text-3xl bg-primary/80 p-4 rounded-full shadow-lg">
                                    <i class="fa-solid fa-link"></i>
                                </span>
                            </div>
                        </div>
                        <div class="absolute top-4 right-4">
                            <span
                                class="bg-primary text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg backdrop-blur-sm">
                                <i class="fa-solid fa-key mr-1"></i>
                                À Louer
                            </span>
                        </div>
                        <div class="absolute bottom-4 left-4">
                            <span
                                class="bg-white/95 text-primary px-4 py-2 rounded-lg text-lg font-bold shadow-lg backdrop-blur-sm">
                                5,500 MAD/mois
                            </span>
                        </div>
                    </a>


                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-800 mb-3 line-clamp-2">
                            Villa Spacieuse avec Jardin
                        </h3>

                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            Belle villa avec un grand jardin, parfaite pour une famille.
                            Quartier sécurisé avec parking privé inclus.
                        </p>

                        <div class="grid grid-cols-2 gap-4 mb-4  border-b border-gray-100">
                            <div class="flex items-center gap-2 text-gray-700">
                                <i class="fa-solid fa-expand text-primary"></i>
                                <div>
                                    <p class="text-xs text-gray-500">Surface</p>
                                    <p class="font-semibold">250 m²</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 text-gray-700">
                                <i class="fa-solid fa-bed text-primary"></i>
                                <div>
                                    <p class="text-xs text-gray-500">Chambres</p>
                                    <p class="font-semibold">4 Chambres</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 text-gray-700">
                                <i class="fa-solid fa-bath text-primary"></i>
                                <div>
                                    <p class="text-xs text-gray-500">Salles de bain</p>
                                    <p class="font-semibold">3 Bains</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 text-gray-700">
                                <i class="fa-solid fa-location-dot text-primary"></i>
                                <div>
                                    <p class="text-xs text-gray-500">Localisation</p>
                                    <p class="font-semibold">Rabat</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>

    </div>
</section>


<?= $this->endSection() ?>