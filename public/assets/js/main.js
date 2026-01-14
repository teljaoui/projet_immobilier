const swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        bulletClass: "swiper-pagination-bullet",
        bulletActiveClass: "swiper-pagination-bullet-active",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
    },
});

const bullets = document.querySelectorAll('.swiper-pagination-bullet');
bullets.forEach(bullet => bullet.classList.add('bg-primary'));

swiper.on('slideChange', () => {
    document.querySelectorAll('.swiper-pagination-bullet').forEach((bullet, index) => {
        if (index === swiper.realIndex) {
            bullet.classList.add('bg-primary');
        } else {
            bullet.classList.remove('bg-primary');
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('toggleFilters');
    const closeButton = document.getElementById('closeFilters');
    const filterForm = document.getElementById('filterForm');
    const filterButtonText = document.getElementById('filterButtonText');
    const filterIcon = document.getElementById('filterIcon');

    function showFilters() {
        filterForm.classList.remove('hidden');
        filterForm.classList.add('animate-slideDown');
        filterButtonText.textContent = 'Masquer les filtres';
        filterIcon.classList.add('rotate-180');
    }

    function hideFilters() {
        filterForm.classList.add('hidden');
        filterForm.classList.remove('animate-slideDown');
        filterButtonText.textContent = 'Afficher les filtres';
        filterIcon.classList.remove('rotate-180');
    }

    toggleButton.addEventListener('click', function () {
        if (filterForm.classList.contains('hidden')) {
            showFilters();
        } else {
            hideFilters();
        }
    });

    closeButton.addEventListener('click', function () {
        hideFilters();
    });

    const urlParams = new URLSearchParams(window.location.search);
    const hasFilters = Array.from(urlParams.keys()).some(key =>
        ['transaction_type', 'type_id', 'city', 'price_min', 'price_max', 'surface_min', 'bedrooms_min', 'bathrooms_min', 'rooms_min'].includes(key)
    );

    if (hasFilters) {
        showFilters();
    }
});


document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (togglePassword && passwordInput && eyeIcon) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            if (type === 'password') {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        });
    }
});