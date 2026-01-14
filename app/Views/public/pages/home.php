<?= $this->extend('public/layouts/main') ?>

<?= $this->section('content') ?>

<section class="relative h-screen flex items-center  justify-center text-center overflow-hidden">
    <video autoplay muted loop class="absolute top-0 left-0 w-full h-full object-cover opacity-40">
        <source src="<?= base_url('assets/videos/video.mp4') ?>" type="video/mp4">
        Votre navigateur ne supporte pas la vidéo.
    </video>

    <div class="absolute top-0 left-0 w-full h-full bg-black opacity-50"></div>

    <div class="relative z-10 max-w-5xl px-4 text-white">
        <h1 class="text-5xl md:text-6xl font-bold mb-6">
            Bienvenue sur <span class="text-primary">Immobilière</span>
        </h1>
        <p class="text-lg md:text-xl mb-10">
            Trouvez votre propriété idéale rapidement grâce à notre moteur de recherche performant.
        </p>

        <form action="/search" method="GET" class="bg-white text-gray-800 rounded-lg p-6 shadow-lg">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-4">

                <div class="md:col-span-4">
                    <select name="type_id"
                        class="w-full bg-gray-100 rounded-lg px-4 py-3 border border-gray-300 focus:outline-none focus:border-primary focus:border-2 transition">
                        <option value="">Type de bien</option>
                        <?php /* foreach ($types as $type): ?>
                       <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                       <?php endforeach; */ ?>
                    </select>
                </div>
                <div class="md:col-span-3">
                    <select name="transaction_type"
                        class="w-full bg-gray-100 rounded-lg px-4 py-3 border border-gray-300 focus:outline-none focus:border-primary focus:border-2 transition">
                        <option value="">Transaction</option>
                        <option value="vente">Vente</option>
                        <option value="location">Location</option>
                    </select>
                </div>
                <div class="md:col-span-4">
                    <select name="transaction_type"
                        class="w-full bg-gray-100 rounded-lg px-4 py-3 border border-gray-300 focus:outline-none focus:border-primary focus:border-2 transition">
                        <option value="">Ville</option>
                        <option value="vente">Rabat</option>
                        <option value="location">Temara</option>
                    </select>
                </div>
                <div class="md:col-span-1 flex items-center">
                    <button type="submit"
                        class="w-full bg-gray-900 text-white p-3 rounded-lg hover:bg-gray-800 transition duration-500 flex items-center justify-center">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>

            </div>
        </form>


    </div>
</section>
<section id="services" class="py-20 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4">
        <div class="title text-center mb-6">
            <h2 class="text-3xl font-bold mb-2">
                Nos <span class="text-primary">Services</span>
            </h2>
            <p class="text-gray-600 max-w-4xl  mx-auto text-sm md:text-base mb-6">
                Nous accompagnons nos clients à chaque étape de leur projet immobilier, que ce soit pour acheter,
                vendre, louer ou investir.
                Notre expertise et notre savoir-faire vous garantissent des solutions fiables et personnalisées.
            </p>
            <div class="flex justify-center mb-6">
                <hr class="w-20 border-t-4 border-primary rounded">
            </div>

        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

            <div
                class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1">
                <div class="inline-block text-primary rounded-lg p-4 mb-4 shadow-sm">
                    <i class="fa-solid fa-building text-4xl"></i>
                </div>
                <h3 class="text-2xl pl-4 md:text-3xl font-medium mb-2 uppercase tracking-wide">
                    Vente de biens
                </h3>
                <p class="text-gray-600 pl-4 text-sm md:text-base">
                    Nous proposons une large sélection de propriétés à vendre dans toute la ville.
                </p>
            </div>

            <div
                class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1">
                <div class="inline-block text-primary rounded-lg p-4 mb-4 shadow-sm">
                    <i class="fa-solid fa-key text-4xl"></i>
                </div>
                <h3 class="text-2xl pl-4 md:text-3xl font-medium mb-2 uppercase tracking-wide">
                    Location de biens
                </h3>
                <p class="text-gray-600 pl-4 text-sm md:text-base">
                    Découvrez notre catalogue de biens disponibles à la location, pour court ou long terme.
                </p>
            </div>

            <div
                class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1">
                <div class="inline-block text-primary rounded-lg p-4 mb-4 shadow-sm">
                    <i class="fa-solid fa-house-chimney-user text-4xl"></i>
                </div>
                <h3 class="text-2xl pl-4 md:text-3xl font-medium mb-2 uppercase tracking-wide">
                    Gestion locative
                </h3>
                <p class="text-gray-600 pl-4 text-sm md:text-base">
                    Nous prenons en charge la gestion complète de vos biens locatifs, du suivi des loyers à l’entretien.
                </p>
            </div>

            <div
                class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1">
                <div class="inline-block text-primary rounded-lg p-4 mb-4 shadow-sm">
                    <i class="fa-solid fa-house-crack text-4xl"></i>
                </div>
                <h3 class="text-2xl pl-4 md:text-3xl font-medium mb-2 uppercase tracking-wide">
                    Estimation immobilière
                </h3>
                <p class="text-gray-600 pl-4 text-sm md:text-base">
                    Obtenez une estimation précise de la valeur de votre bien immobilier grâce à nos experts.
                </p>
            </div>

            <div
                class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1">
                <div class="inline-block text-primary rounded-lg p-4 mb-4 shadow-sm">
                    <i class="fa-solid fa-handshake text-4xl"></i>
                </div>
                <h3 class="text-2xl pl-4 md:text-3xl font-medium mb-2 uppercase tracking-wide">
                    Conseil en investissement
                </h3>
                <p class="text-gray-600 pl-4 text-sm md:text-base">
                    Nos conseillers vous accompagnent pour investir intelligemment dans l’immobilier.
                </p>
            </div>

            <div
                class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1">
                <div class="inline-block text-primary rounded-lg p-4 mb-4 shadow-sm">
                    <i class="fa-solid fa-file-contract text-4xl"></i>
                </div>
                <h3 class="text-2xl pl-4 md:text-3xl font-medium mb-2 uppercase tracking-wide">
                    Transactions immobilières
                </h3>
                <p class="text-gray-600 pl-4 text-sm md:text-base">
                    Nous facilitons toutes vos transactions immobilières en toute sécurité et transparence.
                </p>
            </div>

        </div>

    </div>

</section>

<section id="latest-properties" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="title text-center mb-6">
            <h2 class="text-3xl font-bold mb-2">
                Derniers <span class="text-primary">Biens Ajoutés</span>
            </h2>
            <p class="text-gray-600 max-w-4xl  mx-auto text-sm md:text-base mb-6">
                Découvrez nos derniers biens immobiliers ajoutés à notre catalogue, soigneusement sélectionnés pour
                vous.
            </p>
            <div class="flex justify-center mb-6">
                <hr class="w-20 border-t-4 border-primary rounded">
            </div>
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
        <div class="flex justify-center mt-12">
            <a href="<?= base_url('biens') ?>"
                class="bg-primary text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:bg-orange-600 transition duration-300">
                Voir plus de biens
            </a>
        </div>

    </div>
</section>


<?= $this->endSection() ?>