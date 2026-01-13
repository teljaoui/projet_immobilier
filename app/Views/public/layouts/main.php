<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <title><?= esc($title ?? 'Site vitrine Agence') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#ff551a',
                    },
                    fontFamily: {
                        rubik: ['Rubik', 'sans-serif'],
                        merriweather: ['Merriweather', 'serif']
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
    <link rel="icon" href="<?= base_url('assets/img/logo.png') ?>">
</head>

<body class="font-rubik bg-gray-50 text-gray-800">

    <?= view('public/partials/navbar') ?>

    <main class="min-h-screen">
        <?= $this->renderSection('content') ?>
    </main>

    <?= view('public/partials/footer') ?>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>

</html>