import domReady from '@roots/sage/client/dom-ready';
import Glide from '@glidejs/glide'

domReady(async () => {

  const hamburger = document.querySelector('.hamburger');
  const nav = document.querySelector('.nav');

  hamburger.addEventListener('click', function () {
    nav.classList.toggle('nav-mobile-visible');
  });

  //glide
  new Glide('.glide', {
    type: 'carousel',
    perView: 1,
    focusAt: 'center',
    gap: 0,
}).mount();

});

if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);