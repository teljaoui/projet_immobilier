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
