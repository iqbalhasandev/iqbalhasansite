/*!
 * Item: iqbalhasan.dev
 * Description: Personal Portfolio HTML5 Template
 * Author/Developer: IQBAL HASAN
 * Author/Developer URL: https://iqbalhasan.dev
 * Version: v1.0.0
 */

var swiperTestimony = new Swiper(".swiper-testimony", {
    spaceBetween: 30,
    grabCursor: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

var swiperClient = new Swiper(".swiper-client", {
    spaceBetween: 15,
    slidesPerView: 4,
    grabCursor: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    breakpoints: {
        340: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        640: {
            slidesPerView: 2,
            spaceBetween: 15,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 15,
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 15,
        },
    },
});
