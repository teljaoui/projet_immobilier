<?= $this->extend('public/layouts/main') ?>

<?= $this->section('content') ?>

<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-6">
            Bienvenue sur notre <span class="text-primary">site vitrine</span>
        </h1>

        <p class="text-gray-600 max-w-2xl mx-auto mb-8">
            Nous proposons des solutions modernes et performantes
            pour booster votre présence en ligne.
        </p>

        <a href="/contact"
           class="inline-block bg-primary text-white px-6 py-3 rounded-lg hover:bg-orange-600 transition">
            <i class="fa-solid fa-envelope mr-2"></i>
            Nous contacter
        </a>
    </div>
</section>

<?= $this->endSection() ?>
