import domReady from '@roots/sage/client/dom-ready';

/**
 * Application entrypoint
 */
domReady(async () => {
  


  document.addEventListener("DOMContentLoaded", function() {
    const tags = document.querySelectorAll('.tags a');

    tags.forEach(tag => {
        tag.addEventListener('click', function(e) {
            e.preventDefault();
            const tagSlug = this.getAttribute('data-tag');
            const data = { 'tag': tagSlug };

            fetch('/wp-json/koalicja/v1/publikacje', {
                method: 'POST', // Metoda HTTP
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify(data), // Przekształcenie danych na ciąg JSON
            })
            .then(response => response.json())
            .then(data => {
                const publikacjeWrapper = document.querySelector('.publikacje-wrapper');
                publikacjeWrapper.innerHTML = ''; // Wyczyść aktualne publikacje

                // Iteracja przez zwrócone publikacje i dodanie ich do DOM
                data.forEach(publikacja => {
                    const article = document.createElement('article');
                    article.classList.add('publikacja');

                    const title = document.createElement('h3');
                    title.textContent = publikacja.title;
                    article.appendChild(title);

                    if (publikacja.okladka) {
                        const img = document.createElement('img');
                        img.setAttribute('src', publikacja.okladka.url);
                        img.setAttribute('alt', publikacja.title);
                        article.appendChild(img);
                    }

                    const opis = document.createElement('p');
                    opis.textContent = publikacja.opis;
                    article.appendChild(opis);

                    if (publikacja.pdf) {
                        const pdfLink = document.createElement('a');
                        pdfLink.setAttribute('href', publikacja.pdf.url);
                        pdfLink.setAttribute('target', '_blank');
                        pdfLink.textContent = 'Download PDF';
                        article.appendChild(pdfLink);
                    }

                    publikacjeWrapper.appendChild(article);
                });
            })
            .catch(error => console.error('Error:', error));
        });
    });
});





});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);