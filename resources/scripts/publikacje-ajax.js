document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    const tagCheckboxes = document.querySelectorAll('.filter-tag');
    const publicationsContainer = document.getElementById('publikacje-list');

    function getSelectedTags() {
        return Array.from(tagCheckboxes)
                     .filter(checkbox => checkbox.checked)
                     .map(checkbox => checkbox.dataset.tag)
                     .join(',');
    }

    function filterPublications() {
        const searchValue = searchInput.value;
        const selectedTags = getSelectedTags();

        jQuery.ajax({
            url: koalicjaApi.root + '?search=' + encodeURIComponent(searchValue) + '&tags=' + encodeURIComponent(selectedTags),
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-WP-Nonce', koalicjaApi.nonce);
            },
            success: function(data) {
                publicationsContainer.innerHTML = '';
                if (data.length) {
                    data.forEach(function(publikacja) {
                        const div = document.createElement('div');
                        div.className = 'publikacja';
                        div.innerHTML = `<h2>${publikacja.title}</h2>
                                         <p>${publikacja.opis ? publikacja.opis : ''}</p>
                                         <img src="${publikacja.okladka ? publikacja.okladka : ''}" alt="Okładka">
                                         <a href="${publikacja.pdf ? publikacja.pdf : '#'}">Pobierz PDF</a>`;
                        publicationsContainer.appendChild(div);
                    });
                } else {
                    publicationsContainer.innerHTML = '<p>No publications found.</p>';
                }
            },
            
            error: function(error) {
                console.error('Error:', error);
                publicationsContainer.innerHTML = '<p>There was an error.</p>';
            },
        });
    }

    searchInput.addEventListener('input', filterPublications);
    tagCheckboxes.forEach(checkbox => checkbox.addEventListener('change', filterPublications));

    // Wywołaj funkcję filterPublications bezpośrednio po zdefiniowaniu, aby załadować wszystkie publikacje domyślnie.
    filterPublications();
});
