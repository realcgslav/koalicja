import domReady from '@roots/sage/client/dom-ready';

/**
 * Application entrypoint
 */
domReady(async () => {


  const hamburger = document.querySelector('.hamburger');
  const nav = document.querySelector('.nav');

  hamburger.addEventListener('click', function () {
    nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
  });

  // Usuwanie inline styles przy zmianie rozmiaru okna
  window.addEventListener('resize', function () {
    if (window.innerWidth >= 768) {
      nav.removeAttribute('style');
    }
  });
  // ...
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);