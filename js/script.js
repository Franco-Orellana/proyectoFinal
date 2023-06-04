var swiper = new Swiper(".carrousel", {
    centerSlider: 'true',
    grabCursor: 'true',
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 30,
        slidesPerGroup: 1,
      },
      375: {
        slidesPerView: 1,
        spaceBetween: 30,
        slidesPerGroup: 1,
      },
      425: {
        slidesPerView: 1,
        spaceBetween: 30,
        slidesPerGroup: 1,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 30,
        slidesPerGroup: 2,
      },
      1200: {
        slidesPerView: 3,
        spaceBetween: 25,
        slidesPerGroup: 3,
      },

    }

});