<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<section id="contact" class="pt-[120px] py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="title text-center mb-12">
            <h2 class="text-2xl font-bold mb-2">
                Ajouter un <span class="text-[#ff551a]">Utilisateur</span>
            </h2>
            <div class="flex justify-center mb-6">
                <hr class="w-20 border-t-4 border-[#ff551a] rounded">
            </div>
        </div>

        <div class="max-w-6xl mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-8">

                <!-- Messages flash -->
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

                <form action="<?= base_url('admin/utilisateurs/store') ?>" method="POST" class="space-y-6">
                    <?= csrf_field() ?>

                    <div class="border-b pb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            <i class="fa-solid fa-user text-[#ff551a] mr-2"></i>
                            Informations utilisateur
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="firstName" class="block text-sm font-medium text-gray-700 mb-2">
                                    Prénom <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="firstName" name="firstName" required
                                    value="<?= old('firstName') ?>"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                                    placeholder="Ex: Mohamed">
                            </div>

                            <div>
                                <label for="lastName" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nom <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="lastName" name="lastName" required value="<?= old('lastName') ?>"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                                    placeholder="Ex: Teljaoui">
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
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                    Mot de passe <span class="text-red-500">*</span>
                                </label>
                                <input type="password" id="password" name="password" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                                    placeholder="********">
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

                        </div>
                    </div>

                    <div class="flex justify-end gap-4 pt-6">
                        <a href="<?= base_url('admin/utilisateurs') ?>"
                            class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                            <i class="fa-solid fa-times mr-2"></i>
                            Annuler
                        </a>
                        <button type="submit"
                            class="bg-[#ff551a] text-white font-semibold py-3 px-6 rounded-lg hover:bg-[#e64910] transition-all duration-300 flex items-center gap-2">
                            <i class="fa-solid fa-check"></i>
                            Ajouter l'utilisateur
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>