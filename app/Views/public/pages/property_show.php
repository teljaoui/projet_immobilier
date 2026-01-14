<?= $this->extend('public/layouts/main') ?>

<?= $this->section('content') ?>

<section id="property" class="pt-[160px] py-20 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4">
        <div class="title text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">
                Détail du <span class="text-primary"><?= esc($property['type_name']) ?></span>
            </h2>

            <p class="text-gray-600 max-w-4xl mx-auto text-sm md:text-base mb-6">
                Découvrez le <?= esc($property['type_name']) ?> "<strong><?= esc($property['title']) ?></strong>" situé
                à <?= esc($property['city']) ?> </p>

            <div class="flex justify-center mb-6">
                <hr class="w-20 border-t-4 border-primary rounded">
            </div>
        </div>
        <div class="flex flex-col md:flex-row items-start gap-8">
            <div class="md:w-1/2 w-full">
                <div class="swiper propertySwiper rounded-lg overflow-hidden shadow-lg">
                    <div class="swiper-wrapper">
                        <?php if (!empty($property['images']) && is_array($property['images']) && count($property['images']) > 0): ?>
                            <?php foreach ($property['images'] as $image): ?>
                                <div class="swiper-slide">
                                    <img src="<?= esc($image) ?>" alt="<?= esc($property['title']) ?>"
                                        class="w-full h-[400px] object-cover">
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="swiper-slide">
                                <div class="w-full h-[400px] bg-gray-200 flex items-center justify-center">
                                    <div class="text-center">
                                        <i class="fa-solid fa-image text-gray-400 text-6xl mb-4"></i>
                                        <p class="text-gray-500 text-lg">Aucune image disponible</p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($property['images']) && is_array($property['images']) && count($property['images']) > 1): ?>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="md:w-1/2 w-full">
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="bg-gray-900 text-white px-4 py-1 rounded-full text-sm font-semibold">
                            <?= esc($property['type'] ?? 'Vente') ?>
                        </span>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">
                        <?= esc($property['title']) ?>
                    </h1>
                    <p class="text-2xl font-bold text-primary">
                        <?= number_format($property['price'] ?? 0, 0, ',', ' ') ?> DH
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6 pb-2 border-b border-gray-100">
                    <div class="flex items-center gap-2 text-gray-700">
                        <i class="fa-solid fa-location-dot text-primary"></i>
                        <div>
                            <p class="text-xs text-gray-500">Localisation</p>
                            <p class="font-semibold">
                                <?= esc($property['city'] ?? '-') ?><?= !empty($property['address']) ? ', ' . esc($property['address']) : '' ?>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-gray-700">
                        <i class="fa-solid fa-expand text-primary"></i>
                        <div>
                            <p class="text-xs text-gray-500">Surface</p>
                            <p class="font-semibold"><?= esc($property['surface'] ?? '-') ?> m²</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 text-gray-700">
                        <i class="fa-solid fa-bed text-primary"></i>
                        <div>
                            <p class="text-xs text-gray-500">Chambres</p>
                            <p class="font-semibold"><?= esc($property['bedrooms'] ?? '-') ?> Chambres</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 text-gray-700">
                        <i class="fa-solid fa-bath text-primary"></i>
                        <div>
                            <p class="text-xs text-gray-500">Salles de bain</p>
                            <p class="font-semibold"><?= esc($property['bathrooms'] ?? '-') ?> Bains</p>
                        </div>
                    </div>

                </div>
                <div class="mb-6 pb-6 border-b border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Description</h3>
                    <p class="text-gray-600 leading-relaxed">
                        <?= esc($property['description'] ?? 'Aucune description disponible.') ?>
                    </p>
                </div>
                <?php if (!empty($property['year_built']) || !empty($property['property_id'])): ?>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <?php if (!empty($property['year_built'])): ?>
                            <div class="flex items-center gap-2 text-gray-700">
                                <i class="fa-solid fa-calendar text-primary"></i>
                                <div>
                                    <p class="text-xs text-gray-500">Année de construction</p>
                                    <p class="font-semibold"><?= esc($property['year_built']) ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($property['property_id'])): ?>
                            <div class="flex items-center gap-2 text-gray-700">
                                <i class="fa-solid fa-hashtag text-primary"></i>
                                <div>
                                    <p class="text-xs text-gray-500">Référence</p>
                                    <p class="font-semibold"><?= esc($property['property_id']) ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="flex gap-3">
                    <button
                        class="flex-1 bg-primary text-white py-3 px-6 rounded-lg font-semibold hover:bg-primary/90 transition">
                        <i class="fa-solid fa-phone mr-2"></i>
                        Contacter
                    </button>
                    <button
                        class="bg-gray-100 text-gray-700 py-3 px-6 rounded-lg font-semibold hover:bg-gray-200 transition">
                        <i class="fa-solid fa-heart"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>