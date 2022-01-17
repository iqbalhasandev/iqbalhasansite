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
});
