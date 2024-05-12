import domReady from '@roots/sage/client/dom-ready';

domReady(async () => {

  const hamburger = document.querySelector('.hamburger');
  const nav = document.querySelector('.nav');

  hamburger.addEventListener('click', function () {
    nav.classList.toggle('nav-mobile-visible');
  });


});

if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);