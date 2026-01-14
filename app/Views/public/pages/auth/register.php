<?= $this->extend('public/layouts/main') ?>

<?= $this->section('content') ?>

<section id="register" class="pt-[160px] py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="title text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">
                Créez votre <span class="text-[#ff551a]">Compte Client</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-base mb-6">
                Inscrivez-vous pour accéder à votre espace personnel et profiter de nos services.
            </p>
            <div class="flex justify-center mb-6">
                <hr class="w-20 border-t-4 border-[#ff551a] rounded">
            </div>
        </div>

        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold text-gray-800">Inscription</h3>
                    <p class="text-gray-600 text-sm mt-2">Remplissez vos informations pour commencer</p>
                </div>

                <?php if (session()->getFlashdata('validation')): ?>
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded">
                        <div class="flex items-center">
                            <i class="fa-solid fa-exclamation-circle text-red-500 mr-3"></i>
                            <p class="text-red-700 text-sm"> <?php $validation = session()->getFlashdata('validation'); ?>
                            </p>
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

                <form action="<?= base_url('inscription_post') ?>" method="POST" class="space-y-6">
                    <?= csrf_field() ?>

                    <div class="flex gap-4">
                        <div class="flex-1">
                            <label for="firstName" class="block text-sm font-medium text-gray-700 mb-2">Prénom</label>
                            <input type="text" id="firstName" name="firstName" required value="<?= old('firstName') ?>"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                                placeholder="Votre prénom">
                            <?php if (isset($validation) && $validation->hasError('firstName')): ?>
                                <p class="text-red-500 text-xs mt-1"><?= $validation->getError('firstName') ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="flex-1">
                            <label for="lastName" class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
                            <input type="text" id="lastName" name="lastName" required value="<?= old('lastName') ?>"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                                placeholder="Votre nom">
                            <?php if (isset($validation) && $validation->hasError('lastName')): ?>
                                <p class="text-red-500 text-xs mt-1"><?= $validation->getError('lastName') ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Adresse email</label>
                        <input type="email" id="email" name="email" required value="<?= old('email') ?>"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition"
                            placeholder="votre.email@exemple.com">
                        <?php if (isset($validation) && $validation->hasError('email')): ?>
                            <p class="text-red-500 text-xs mt-1"><?= $validation->getError('email') ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Mot de passe</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ff551a] focus:border-transparent transition pr-12"
                                placeholder="••••••••">
                            <button type="button" id="togglePassword"
                                class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 transition">
                                <i class="fa-solid fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                        <?php if (isset($validation) && $validation->hasError('password')): ?>
                            <p class="text-red-500 text-xs mt-1"><?= $validation->getError('password') ?></p>
                        <?php endif; ?>

                    </div>

                    <button type="submit"
                        class="w-full bg-[#ff551a] text-white font-semibold py-3 px-6 rounded-lg hover:bg-[#e64910] transition-all duration-300">
                        S'inscrire
                    </button>
                </form>


                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-gray-500">Ou</span>
                    </div>
                </div>

                <div class="text-center">
                    <p class="text-gray-600 text-sm">
                        Vous avez déjà un compte ?
                        <a href="<?= base_url('connexion') ?>" class="text-[#ff551a] font-semibold hover:underline">
                            Connectez-vous
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>