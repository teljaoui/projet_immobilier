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

        <?php
        $locations = [];
        foreach ($properties as $prop) {
            if (!empty($prop['latitude']) && !empty($prop['longitude'])) {
                $locations[] = [
                    'lat' => $prop['latitude'],
                    'lng' => $prop['longitude'],
                    'title' => $prop['title'] ?? $prop['city'] ?? 'Bien',
                ];
            }
        }
        ?>
        <div class="bg-white p-3 rounded-lg shadow-sm overflow-hidden">
            <div id="map" style="width: 100%; height: 500px; position: relative; z-index: 0;"></div>
        </div>

        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        <script>
            var map = L.map('map').setView([33.9658, -6.8710], 12);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            var locations = <?= json_encode($locations) ?>;

            locations.forEach(function (loc) {
                L.marker([loc.lat, loc.lng]).addTo(map)
                    .bindPopup("<b>" + loc.title + "</b>");
            });
        </script>

    </div>
</section>

<?= $this->endSection() ?>