import domReady from '@roots/sage/client/dom-ready';
import Swiper, { Navigation, Pagination } from 'swiper';

domReady(async () => {

  const hamburger = document.querySelector('.hamburger');
  const nav = document.querySelector('.nav');

  hamburger.addEventListener('click', function () {
    nav.classList.toggle('nav-mobile-visible');
  });
  
  // Inicjalizacja Swipera
  const swiper = new Swiper('.swiper', {
    // Parametry Swipera
    modules: [Navigation, Pagination],
    loop: true,
    pagination: {
      el: ".swiper-pagination", 
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
});

if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
