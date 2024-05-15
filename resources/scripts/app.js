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
    type: 'swiper',
    perView: 1,
    focusAt: 'center',
    gap: 0,
}).mount();

//clamp titles
const titles = document.querySelectorAll('.clamp-title');
        const maxLength = 70; // Maksymalna liczba znaków

        titles.forEach(title => {
            if (title.textContent.length > maxLength) {
                title.textContent = title.textContent.slice(0, maxLength) + '...';
            }
        });
//end clamp titles
});

if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);