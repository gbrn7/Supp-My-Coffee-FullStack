// AOS.init();
// new PureCounter();

// var swiper = new Swiper(".mySwiper", {
//     slidesPerView: 1,
//     spaceBetween: 30,
//     freeMode: true,
//     pagination: {
//         el: ".swiper-pagination",
//         clickable: true,
//     },
//     autoplay: {
//         delay: 2000,
//     },
//     breakpoints: {

//         768: {
//             slidesPerView: 2,
//         },
//         1200: {
//             slidesPerView: 3,
//         }
//     },
// });

// const x = window;
// x.addEventListener("scroll", function (e) {
//     const y = document.querySelector(".navbar");
//     const z = document.querySelector(".home");
//     if (x.scrollY > (z.clientHeight * 65 / 100)) {
//         y.classList.add("show");
//     }
//     else {
//         y.classList.remove("show");
//     }
// });

const a = document.querySelectorAll(".nav-link");

a.forEach((e) => {
    e.addEventListener("click", () => {
        a.forEach((x) => {
            x.classList.remove("nav-link-active");
        });
        e.classList.add("nav-link-active");
    })
});

AOS.init();