<?= $this->extend('public/layouts/main') ?>

<?= $this->section('content') ?>

<section id="property" class="pt-[160px] py-20 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4">
        <div class="title text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">
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

        <?php
        $locations = [];
        foreach ($properties as $prop) {
            if (!empty($prop['latitude']) && !empty($prop['longitude'])) {
                $Image = !empty($prop['image'])
                    ? base_url($prop['image'])
                    : base_url('assets/img/placeholder.jpg');

                $locations[] = [
                    'lat' => $prop['latitude'],
                    'lng' => $prop['longitude'],
                    'id' => $prop['id'],
                    'title' => $prop['title'],
                    'type_name' => $prop['type_name'],
                    'transaction_type' => $prop['transaction_type'],
                    'price' => $prop['price'],
                    'city' => $prop['city'] ?? '-',
                    'image' => $Image,
                ];
            }
        }
        ?>
        <div class="bg-white p-3 rounded-lg shadow-sm overflow-hidden">
            <div id="map" style="width: 100%; height: 500px; position: relative; z-index: 0;"></div>
        </div>

        <div class="flex justify-center mt-12">
            <a href="<?= base_url('biens') ?>"
                class="bg-primary text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:bg-orange-600 transition duration-300">
                Voir plus de biens
            </a>
        </div>

        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <style>
            .leaflet-popup-content-wrapper {
                padding: 0;
                border-radius: 1rem;
                overflow: hidden;
            }

            .leaflet-popup-content {
                margin: 0;
                width: 280px !important;
            }

            .leaflet-popup-tip-container {
                display: none;
            }
        </style>
        <script>
            var map = L.map('map').setView([33.9658, -6.8710], 12);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            var locations = <?= json_encode($locations) ?>;

            locations.forEach(function (loc) {
                var popupContent = `
                    <div class="max-w-sm mx-auto">
                        <div class="bg-white rounded-2xl overflow-hidden shadow-md">
                            <a href="<?= base_url('bien/') ?>${loc.id}"  target="_blank"
                                class="group relative block rounded-t-2xl overflow-hidden">
                                <div class="relative h-48 bg-gray-200 overflow-hidden group-hover:bg-primary transition duration-500">
                                    <img src="${loc.image}" alt="${loc.title}"
                                        class="w-full h-full object-cover group-hover:brightness-50 transition duration-500">
                                    
                                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
                                        <span class="text-white text-2xl bg-primary/80 p-3 rounded-full shadow-lg">
                                            <i class="fa-solid fa-link"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="absolute top-3 left-3">
                                    <span class="bg-gray-900 text-white px-3 py-1.5 rounded-full text-xs font-semibold shadow-lg backdrop-blur-sm">
                                        ${loc.type_name}
                                    </span>
                                </div>
                                <div class="absolute top-3 right-3">
                                    <span class="bg-primary text-white px-3 py-1.5 rounded-full text-xs font-semibold shadow-lg backdrop-blur-sm">
                                        <i class="fa-solid fa-key mr-1"></i>
                                        ${loc.transaction_type}
                                    </span>
                                </div>
                                <div class="absolute bottom-3 left-3">
                                    <span class="bg-white/95 text-primary px-3 py-1.5 rounded-lg text-base font-bold shadow-lg backdrop-blur-sm">
                                        ${new Intl.NumberFormat('fr-FR').format(loc.price)} MAD
                                    </span>
                                </div>
                            </a>

                            <div class="p-4">
                                <h3 class="text-lg font-bold text-gray-800 mb-3 line-clamp-2">
                                    ${loc.title.length > 25 ? loc.title.substring(0, 25) + '...' : loc.title}
                                </h3>

                            </div>
                        </div>
                    </div>
                `;

                L.marker([loc.lat, loc.lng]).addTo(map)
                    .bindPopup(popupContent, {
                        maxWidth: 350,
                        minWidth: 320,
                        className: 'property-popup'
                    });
            });
        </script>

    </div>
</section>

<?= $this->endSection() ?>