<header class="fixed top-0 left-0 w-full bg-white shadow z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">

        <a href="<?= base_url('/') ?>" class="flex items-center gap-2">
            <img src="<?= base_url('assets/img/logo.png') ?>" class="w-8 h-8" alt="Logo">
            <span class="text-xl font-semibold text-primary">
                Immobilière
            </span>
        </a>

        <ul class="flex gap-10 text-lg font-medium">

            <li>
                <a href="<?= base_url('admin') ?>"
                   class="relative transition duration-500
                   after:absolute after:left-0 after:-bottom-2 after:h-[1.5px] after:w-0 after:bg-primary after:transition-all after:duration-500
                   <?= uri_string() === 'admin' ? 'text-primary after:w-full' : 'hover:text-primary hover:after:w-full' ?>">
                    Tableau de bord
                </a>
            </li>

            <li>
                <a href="<?= base_url('admin/biens') ?>"
                   class="relative transition duration-500
                   after:absolute after:left-0 after:-bottom-2 after:h-[1.5px] after:w-0 after:bg-primary after:transition-all after:duration-500
                   <?= uri_string() === 'admin/biens'  ? 'text-primary after:w-full' : 'hover:text-primary hover:after:w-full' ?>">
                    Biens immobiliers
                </a>
            </li>

            <li>
                <a href="<?= base_url('admin/messages') ?>"
                   class="relative transition duration-500
                   after:absolute after:left-0 after:-bottom-2 after:h-[1.5px] after:w-0 after:bg-primary after:transition-all after:duration-500
                   <?= uri_string() === 'admin/messages' ? 'text-primary after:w-full' : 'hover:text-primary hover:after:w-full' ?>">
                    Messages
                </a>
            </li>

            <li>
                <a href="<?= base_url('admin/utilisateurs') ?>"
                   class="relative transition duration-500
                   after:absolute after:left-0 after:-bottom-2 after:h-[1.5px] after:w-0 after:bg-primary after:transition-all after:duration-500
                   <?= uri_string() === 'admin/utilisateurs' ? 'text-primary after:w-full' : 'hover:text-primary hover:after:w-full' ?>">
                    Utilisateurs
                </a>
            </li>

        </ul>

        <div class="flex items-center gap-4">
            <form action="<?= base_url('logout') ?>" method="POST">
                <?= csrf_field() ?>
                <button type="submit"
                        class="bg-primary text-white px-6 py-2 rounded-full hover:bg-orange-600 transition"
                        onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?')">
                    Déconnexion
                </button>
            </form>
        </div>

    </div>
</header>
