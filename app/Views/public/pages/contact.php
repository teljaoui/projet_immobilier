<?= $this->extend('public/layouts/main') ?>

<?= $this->section('content') ?>

<section id="contact" class="pt-[160px] py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="title text-center mb-12">
            <h2 class="text-3xl  font-bold mb-4">
                Contactez <span class="text-[#ff551a]">nous</span>
            </h2>
            <p class="text-gray-600 max-w-4xl  mx-auto text-sm md:text-base mb-6">
                Une question, une demande d'information ou un besoin spécifique ?
                Notre équipe est à votre écoute et vous répondra dans les plus brefs délais.
            </p>
            <div class="flex justify-center mb-6">
                <hr class="w-20 border-t-4 border-[#ff551a] rounded">
            </div>
        </div>

        <div class="mb-8">
            <div class="bg-white p-3 rounded-lg shadow-sm overflow-hidden h-[300px]">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3309.0400880247735!2d-6.871059217220047!3d33.96580910406107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda71343ba143e81%3A0x1dbf65715f7b3b64!2sImmobilier%20rabat%20%7C%20Agence%20immobili%C3%A8re%20%C3%A0%20Rabat!5e0!3m2!1sfr!2sma!4v1768389461182!5m2!1sfr!2sma"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <div class="bg-white rounded-lg shadow-sm p-8">
                <h3 class="text-2xl font-bold mb-6 text-gray-800">
                    Nos <span class="text-[#ff551a]">Coordonnées</span>
                </h3>

                <ul class="space-y-6">
                    <li class="flex items-start">
                        <div
                            class="flex-shrink-0 w-12 h-12 bg-[#ff551a] bg-opacity-10 rounded-lg flex items-center justify-center mr-4">
                            <i class="fa-solid fa-location-dot text-[#ff551a] text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-1">Adresse</h4>
                            <p class="text-gray-600 text-sm">
                                N°9, Magasin, Rabat <br>
                                Code Postal: 1000
                            </p>
                        </div>
                    </li>

                    <li class="flex items-start">
                        <div
                            class="flex-shrink-0 w-12 h-12 bg-[#ff551a] bg-opacity-10 rounded-lg flex items-center justify-center mr-4">
                            <i class="fa-solid fa-phone text-[#ff551a] text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-1">Téléphone</h4>
                            <p class="text-gray-600 text-sm">
                                +212 6 00 00 00 00<br>
                                Lun - Ven: 9h00 - 18h00
                            </p>
                        </div>
                    </li>

                    <li class="flex items-start">
                        <div
                            class="flex-shrink-0 w-12 h-12 bg-[#ff551a] bg-opacity-10 rounded-lg flex items-center justify-center mr-4">
                            <i class="fa-solid fa-envelope text-[#ff551a] text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-1">Email</h4>
                            <p class="text-gray-600 text-sm">
                                contact@immobilier.ma<br>
                                Réponse sous 24h
                            </p>
                        </div>
                    </li>

                    <li class="flex items-start">
                        <div
                            class="flex-shrink-0 w-12 h-12 bg-[#ff551a] bg-opacity-10 rounded-lg flex items-center justify-center mr-4">
                            <i class="fa-solid fa-clock text-[#ff551a] text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-1">Horaires d'ouverture</h4>
                            <p class="text-gray-600 text-sm">
                                Lundi - Vendredi: 9h00 - 18h00<br>
                                Samedi: 9h00 - 13h00<br>
                                Dimanche: Fermé
                            </p>
                        </div>
                    </li>
                </ul>

                <div class="mt-8 pt-8 border-t border-gray-200">
                    <h4 class="font-semibold text-gray-800 mb-4">Suivez-nous</h4>
                    <div class="flex gap-3">
                        <a href="#"
                            class="w-10 h-10 bg-[#ff551a] bg-opacity-10 rounded-lg flex items-center justify-center hover:bg-[#ff551a] hover:text-white transition-colors">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-[#ff551a] bg-opacity-10 rounded-lg flex items-center justify-center hover:bg-[#ff551a] hover:text-white transition-colors">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-[#ff551a] bg-opacity-10 rounded-lg flex items-center justify-center hover:bg-[#ff551a] hover:text-white transition-colors">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-[#ff551a] bg-opacity-10 rounded-lg flex items-center justify-center hover:bg-[#ff551a] hover:text-white transition-colors">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-8">
                <h3 class="text-2xl font-bold mb-6 text-gray-800">
                    Envoyez-nous un <span class="text-[#ff551a]">Message</span>
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


                <form action="<?= base_url('contact/store') ?>" method="POST" class="space-y-6">
                    <?= csrf_field() ?>

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nom <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" required value="<?= old('name') ?>"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                            placeholder="Ex: Mohamed alaoui">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="email" name="email" required value="<?= old('email') ?>"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                            placeholder="exemple@mail.com">
                    </div>

                    <div>
                        <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-2">
                            Téléphone <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="phone_number" name="phone_number" required
                            value="<?= old('phone_number') ?>"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                            placeholder="Ex: 0600000000">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            Message <span class="text-red-500">*</span>
                        </label>
                        <textarea id="message" name="message" rows="4" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                            placeholder="Votre message..."><?= old('message') ?></textarea>
                    </div>

                    <div class="flex justify-end gap-4 pt-6">
                        <button type="submit"
                            class="bg-[#ff551a] text-white font-semibold py-3 px-6 rounded-lg hover:bg-[#e64910] transition-all duration-300 flex items-center gap-2">
                            <i class="fa-solid fa-paper-plane"></i>
                            Envoyer
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</section>

<?= $this->endSection() ?>