let swiper = new Swiper(".swiper", {
  slidesPerView: 1,
  spaceBetween: 10,
  breakpoints: {
    425: {
      slidesPerView: 2,
    },
    600: {
      slidesPerView: 3,
    },
    768: {
      slidesPerView: 4,
    },
    1024: {
      slidesPerView: 5,
    },
  },
});
