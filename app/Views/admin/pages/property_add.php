<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<section id="contact" class="pt-[120px] py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="title text-center mb-12">
            <h2 class="text-2xl font-bold mb-2">
                Ajouter un <span class="text-[#ff551a]">Bien</span>
            </h2>
            <div class="flex justify-center mb-6">
                <hr class="w-20 border-t-4 border-[#ff551a] rounded">
            </div>
        </div>

        <div class="max-w-6xl mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-8">
                
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

                <form action="<?= base_url('admin/biens/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <?= csrf_field() ?>

                    <div class="border-b pb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            <i class="fa-solid fa-info-circle text-[#ff551a] mr-2"></i>
                            Informations de base
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                    Titre du bien <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="title" name="title" required value="<?= old('title') ?>"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                                    placeholder="Ex: Villa moderne avec piscine">
                            </div>

                            <div class="md:col-span-2">
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                    Description <span class="text-red-500">*</span>
                                </label>
                                <textarea id="description" name="description" required rows="4"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                                    placeholder="Décrivez le bien en détail..."><?= old('description') ?></textarea>
                            </div>

                            <div>
                                <label for="type_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    Type de bien <span class="text-red-500">*</span>
                                </label>
                                <select id="type_id" name="type_id" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition">
                                    <option value="">Sélectionnez un type</option>
                                    <?php if (isset($properties_type)): ?>
                                        <?php foreach ($properties_type as $type): ?>
                                            <option value="<?= $type['id'] ?>" <?= old('type_id') == $type['id'] ? 'selected' : '' ?>>
                                                <?= esc($type['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div>
                                <label for="transaction_type" class="block text-sm font-medium text-gray-700 mb-2">
                                    Type de transaction <span class="text-red-500">*</span>
                                </label>
                                <select id="transaction_type" name="transaction_type" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition">
                                    <option value="">Sélectionnez</option>
                                    <option value="vente" <?= old('transaction_type') == 'vente' ? 'selected' : '' ?>>Vente</option>
                                    <option value="location" <?= old('transaction_type') == 'location' ? 'selected' : '' ?>>Location</option>
                                </select>
                            </div>

                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                                    Prix (DH) <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="price" name="price" required value="<?= old('price') ?>" min="0" step="0.01"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                                    placeholder="1500000">
                            </div>
                        </div>
                    </div>

                    <div class="border-b pb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            <i class="fa-solid fa-ruler-combined text-[#ff551a] mr-2"></i>
                            Caractéristiques
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div>
                                <label for="surface" class="block text-sm font-medium text-gray-700 mb-2">
                                    Surface (m²) <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="surface" name="surface" required value="<?= old('surface') ?>" min="0" step="0.01"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                                    placeholder="120">
                            </div>

                            <div>
                                <label for="rooms" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nombre de pièces
                                </label>
                                <input type="number" id="rooms" name="rooms" value="<?= old('rooms') ?>" min="0"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                                    placeholder="5">
                            </div>

                            <div>
                                <label for="bedrooms" class="block text-sm font-medium text-gray-700 mb-2">
                                    Chambres
                                </label>
                                <input type="number" id="bedrooms" name="bedrooms" value="<?= old('bedrooms') ?>" min="0"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                                    placeholder="3">
                            </div>

                            <div>
                                <label for="bathrooms" class="block text-sm font-medium text-gray-700 mb-2">
                                    Salles de bain
                                </label>
                                <input type="number" id="bathrooms" name="bathrooms" value="<?= old('bathrooms') ?>" min="0"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                                    placeholder="2">
                            </div>
                        </div>
                    </div>

                    <div class="border-b pb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            <i class="fa-solid fa-location-dot text-[#ff551a] mr-2"></i>
                            Localisation
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700 mb-2">
                                    Ville <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="city" name="city" required value="<?= old('city') ?>"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                                    placeholder="Casablanca">
                            </div>

                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                                    Adresse <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="address" name="address" required value="<?= old('address') ?>"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                                    placeholder="123 Rue Example">
                            </div>

                            <div>
                                <label for="latitude" class="block text-sm font-medium text-gray-700 mb-2">
                                    Latitude
                                </label>
                                <input type="text" id="latitude" name="latitude" value="<?= old('latitude') ?>"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                                    placeholder="33.5731">
                            </div>

                            <div>
                                <label for="longitude" class="block text-sm font-medium text-gray-700 mb-2">
                                    Longitude
                                </label>
                                <input type="text" id="longitude" name="longitude" value="<?= old('longitude') ?>"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                                    placeholder="-7.5898">
                            </div>
                        </div>
                    </div>

                    <div class="pb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            <i class="fa-solid fa-images text-[#ff551a] mr-2"></i>
                            Images du bien
                        </h3>
                        
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Image principale <span class="text-red-500">*</span>
                            </label>
                            <div class="border-2 border-dashed border-[#ff551a] rounded-lg p-6 text-center hover:border-[#e64910] transition bg-orange-50">
                                <input type="file" id="main_image" name="main_image" accept="image/*" required
                                    class="hidden" onchange="previewMainImage(event)">
                                <label for="main_image" class="cursor-pointer">
                                    <i class="fa-solid fa-star text-4xl text-[#ff551a] mb-3"></i>
                                    <p class="text-gray-700 mb-2 font-semibold">Cliquez pour sélectionner des images</p>
                                    <p class="text-xs text-gray-500">PNG, JPG, JPEG (Max. 5MB)</p>
                                </label>
                            </div>
                            <div id="mainImagePreview" class="mt-4"></div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Images supplémentaires (optionnel)
                            </label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-[#ff551a] transition">
                                <input type="file" id="images" name="images[]" multiple accept="image/*" 
                                    class="hidden" onchange="previewImages(event)">
                                <label for="images" class="cursor-pointer">
                                    <i class="fa-solid fa-cloud-arrow-up text-4xl text-gray-400 mb-3"></i>
                                    <p class="text-gray-600 mb-2">Cliquez pour sélectionner des images</p>
                                    <p class="text-xs text-gray-500">PNG, JPG, JPEG (Max. 5MB par image)</p>
                                </label>
                            </div>
                            <div id="imagePreview" class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4"></div>
                        </div>
                    </div>

                    <div class="flex justify-end gap-4 pt-6">
                        <a href="<?= base_url('admin/biens') ?>" 
                            class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                            <i class="fa-solid fa-times mr-2"></i>
                            Annuler
                        </a>
                        <button type="submit"
                            class="bg-[#ff551a] text-white font-semibold py-3 px-6 rounded-lg hover:bg-[#e64910] transition-all duration-300 flex items-center gap-2">
                            <i class="fa-solid fa-check"></i>
                            Enregistrer le bien
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



<?= $this->endSection() ?>