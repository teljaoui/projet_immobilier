<?= $this->extend('public/layouts/main') ?>

<?= $this->section('content') ?>

<section id="about" class="pt-[160px] py-20 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4">
        <div class="title text-center mb-12">
            <h2 class="text-3xl  font-bold mb-4">
                À propos de <span class="text-primary">nous</span>
            </h2>
            <p class="text-gray-600 max-w-4xl  mx-auto text-sm md:text-base mb-6">
                Nous sommes une agence immobilière engagée à accompagner nos clients à chaque étape de leur projet,
                qu'il s'agisse d’acheter, de vendre, de louer ou d’investir dans l’immobilier.
            </p>
            <div class="flex justify-center mb-6">
                <hr class="w-20 border-t-4 border-primary rounded">
            </div>
        </div>
        <div class="flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-1/2">
                <img src="<?= base_url('assets/img/bg.jpg') ?>" alt="À propos de nous"
                    class="rounded-lg shadow-lg w-full">
            </div>

            <div class="md:w-1/2 text-gray-700">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide p-6  ">
                            <h3 class="text-2xl font-semibold mb-4">Notre mission</h3>
                            <p class="text-gray-600 mb-4">
                                Offrir à nos clients un accompagnement complet et personnalisé dans tous leurs projets
                                immobiliers.
                                Nous veillons à fournir des conseils fiables et adaptés aux besoins et budgets de
                                chacun.
                            </p>
                            <p class="text-gray-600">
                                Notre objectif est de créer une relation de confiance durable avec chaque client,
                                en assurant un suivi rigoureux et des solutions sur mesure pour que chaque transaction
                                se déroule parfaitement.
                            </p>
                        </div>
                        <div class="swiper-slide p-6">
                            <h3 class="text-2xl font-semibold mb-4">Notre vision</h3>
                            <p class="text-gray-600 mb-4">
                                Être l’agence immobilière de référence au niveau national, reconnue pour la qualité de
                                ses services et son expertise.
                            </p>
                            <p class="text-gray-600">
                                Nous aspirons à moderniser le marché immobilier en apportant transparence, innovation et
                                accompagnement personnalisé
                                pour chaque client, tout en renforçant notre présence dans les principales villes du
                                pays.
                            </p>
                        </div>
                        <div class="swiper-slide p-6">
                            <h3 class="text-2xl font-semibold mb-4">Notre objectif</h3>
                            <p class="text-gray-600 mb-4">
                                Simplifier l’accès à l’immobilier pour tous, en offrant des solutions transparentes et
                                efficaces adaptées à chaque client.
                            </p>
                            <p class="text-gray-600">
                                Nous cherchons à optimiser chaque étape du processus immobilier, de la recherche au
                                suivi après-vente,
                                afin de garantir la satisfaction totale de nos clients et partenaires.
                            </p>
                        </div>
                        <div class="swiper-slide p-6 ">
                            <h3 class="text-2xl font-semibold mb-4">Nos valeurs</h3>
                            <ul class="list-disc list-inside space-y-2 text-gray-600 mb-4">
                                <li>Transparence et fiabilité</li>
                                <li>Professionnalisme et expertise</li>
                                <li>Satisfaction client avant tout</li>
                            </ul>
                            <p class="text-gray-600">
                                Ces valeurs guident chacune de nos actions et décisions, pour offrir à nos clients une
                                expérience immobilière
                                claire, sécurisée et efficace.
                            </p>
                        </div>

                    </div>

                    <div class="swiper-pagination mt-4"></div>
                </div>
            </div>

        </div>

    </div>
</section>


<?= $this->endSection() ?>