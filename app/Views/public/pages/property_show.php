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
        <div id="alert-container" class="flex py-2 w-full space-y-3"></div>
        <div class="flex flex-col bg-white p-6 rounded-lg md:flex-row items-start gap-8">
            <div class="md:w-1/2 w-full">
                <div class="swiper mySwiper propertySwiper rounded-lg overflow-hidden shadow-lg">
                    <div class="swiper-wrapper">
                        <?php if (!empty($property['images']) && is_array($property['images']) && count($property['images']) > 0): ?>
                            <?php foreach ($property['images'] as $image): ?>
                                <div class="swiper-slide">
                                    <img src="<?= base_url($image) ?>" alt="<?= esc($property['title']) ?>"
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
                <?php $isLoggedIn = session()->get('isLoggedIn'); ?>

                <div class="flex flex-col gap-3">

                    <?php if ($isLoggedIn): ?>

                        <h3 class="text-gray-900 text-2xl  font-semibold text-center">
                            Demander une visite
                        </h3>
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
                        <form action="<?= base_url('client/demande-visite') ?>" method="post" class="mt-3 space-y-3">
                            <?= csrf_field() ?>

                            <input type="hidden" name="property_id" value="<?= esc($property['id']) ?>">

                            <textarea name="message" rows="4" required
                                class="w-full border rounded-lg p-3 text-sm rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition">
Bonjour,
Je suis intéressé(e) par le bien "<?= esc($property['title']) ?>" situé à <?= esc($property['city']) ?>.
Je souhaite demander une visite.
Merci de me contacter.
Cordialement.
    </textarea>


                            <button type="submit"
                                class="w-full bg-gray-900 text-white py-3 rounded-lg font-semibold hover:bg-gray-800 transition">
                                Envoyer la demande
                            </button>
                        </form>

                    <?php else: ?>
                        <a href="<?= base_url('connexion?redirect=' . urlencode(current_url())) ?>"
                            class="bg-primary text-white py-3 px-6 rounded-lg font-semibold hover:bg-primary/90 transition text-center">
                            <i class="fa-solid fa-lock mr-2"></i>
                            Connectez-vous pour demander une visite
                        </a>


                    <?php endif; ?>

                </div>
            </div>

        </div>
        <?php
        $lat = $property['latitude'] ?? null;
        $lng = $property['longitude'] ?? null;
        ?>

        <div class="title bg-white p-3 rounded-lg shadow-sm text-center mt-12">
            <h2 class="text-xl text-gray-900 font-bold mb-4">
                Localisation
            </h2>

            <?php if ($lat && $lng): ?>
                <div class="overflow-hidden  rounded-lg h-[300px]">
                    <iframe width="100%" height="100%" style="border:0;" loading="lazy" allowfullscreen
                        src="https://maps.google.com/maps?q=<?= $lat ?>,<?= $lng ?>&hl=fr&z=15&output=embed">
                    </iframe>
                </div>
            <?php else: ?>
                <p class="text-gray-500">Localisation non disponible</p>
            <?php endif; ?>
        </div>

    </div>
</section>

<?= $this->endSection() ?>