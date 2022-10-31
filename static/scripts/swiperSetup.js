let slidesPerView

if (innerWidth < 512) {
    slidesPerView = 1
} else if (innerWidth < 768) {
    slidesPerView = 2
} else if (innerWidth < 1024) {
    slidesPerView = 3
}else if (innerWidth < 1200) {
    slidesPerView = 4
} else {
    slidesPerView = 5
}

var swiper = new Swiper(".mySwiper", {
    slidesPerView,
    spaceBetween: 30,
    slidesPerGroup: slidesPerView,
    loop: true,
    loopFillGroupWithBlank: false,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
})