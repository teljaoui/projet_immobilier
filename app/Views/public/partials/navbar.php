<header class="fixed top-0 left-0 w-full bg-white shadow z-500">
    <div class="bg-primary">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between text-sm text-white">

            <ul class="flex gap-6">
                <li>
                    <a href="#" class="flex items-center gap-2 hover:opacity-80 transition">
                        <i class="fa-solid fa-location-dot"></i>
                        N°9, Magasin, Rabat 10000
                    </a>
                </li>
                <li>
                    <a href="mailto:info@gmail.com" class="flex items-center gap-2 hover:opacity-80 transition">
                        <i class="fa-solid fa-envelope"></i>
                        contact@immobilier.ma
                    </a>
                </li>
            </ul>

            <ul class="flex gap-6">
                <li>
                    <a href="tel:+212652583234" class="flex items-center gap-2 hover:opacity-80 transition">
                        <i class="fa-solid fa-phone"></i>
                        +212 652583234
                    </a>
                </li>
                <li>
                    <a href="https://wa.me/212652583234" class="flex items-center gap-2 hover:opacity-80 transition">
                        <i class="fa-brands fa-whatsapp"></i>
                        WhatsApp
                    </a>
                </li>
            </ul>

        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
        <a href="/" class="flex items-center gap-2">
            <img src="<?= base_url('assets/img/logo.png') ?>" class="w-8 h-8" alt="Logo">
            <span class="text-xl font-semibold text-primary">
                Immobilière
            </span>
        </a>
        <ul class="flex gap-10 text-lg font-medium">
            <li>
                <a href="/" class="relative transition duration-500
           after:absolute after:left-0 after:-bottom-2 after:h-[1.5px] after:w-0 after:bg-primary after:transition-all after:duration-500
           <?= uri_string() == '' ? 'text-primary after:w-full' : 'hover:text-primary hover:after:w-full' ?>">
                    Accueil
                </a>
            </li>
            <li>
                <a href="/#services"
                    class="relative transition duration-500
           after:absolute after:left-0 after:-bottom-2 after:h-[1.5px] after:w-0 after:bg-primary after:transition-all after:duration-500
           <?= uri_string() == '/#services' ? 'text-primary after:w-full' : 'hover:text-primary hover:after:w-full' ?>">
                    Services
                </a>
            </li>
            <li>
                <a href="/apropos" class="relative transition duration-500
           after:absolute after:left-0 after:-bottom-2 after:h-[1.5px] after:w-0 after:bg-primary after:transition-all after:duration-500
           <?= uri_string() == 'apropos' ? 'text-primary after:w-full' : 'hover:text-primary hover:after:w-full' ?>">
                    À propos
                </a>
            </li>
            <li>
                <a href="/contact" class="relative transition duration-500
           after:absolute after:left-0 after:-bottom-2 after:h-[1.5px] after:w-0 after:bg-primary after:transition-all after:duration-500
           <?= uri_string() == 'contact' ? 'text-primary after:w-full' : 'hover:text-primary hover:after:w-full' ?>">
                    Contact
                </a>
            </li>
            <li>
                <a href="/catalogue" class="relative transition duration-500
                 after:absolute after:left-0 after:-bottom-2 after:h-[1.5px] after:w-0 after:bg-primary after:transition-all after:duration-500
                 <?= uri_string() == 'catalogue' ? 'text-primary after:w-full' : 'hover:text-primary hover:after:w-full' ?>">
                    Catalogue
                </a>
            </li>
        </ul>
        <div class="flex items-center gap-4">
            <?php if (session()->get('isLoggedIn')): ?>
                <a href="<?= site_url(session()->get('role') === 'admin' ? '/admin/dashboard' : '/client') ?>"
                    class="bg-primary text-white px-6 py-2 rounded-full hover:bg-orange-600 transition flex items-center gap-2">
                    <i class="fa-solid fa-user"></i>
                    Profile
                </a>
            <?php else: ?>
                <a href="<?= site_url('/connexion') ?>"
                    class="bg-primary text-white px-6 py-2 rounded-full hover:bg-orange-600 transition flex items-center gap-2">
                    <i class="fa-solid fa-user"></i>
                    Connexion
                </a>
            <?php endif; ?>
            <a href="/favorites" class="text-primary text-xl hover:text-orange-600 transition">
                <i class="fa-regular fa-heart"></i>
            </a>
        </div>



    </div>

</header>