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
                console.log(data); // Verify the structure of data
                publicationsContainer.innerHTML = '';
                if (data.length) {
                    data.forEach(function(publikacja) {
                        const div = document.createElement('div');
                        div.className = 'publikacja';
                        let publikacjaHTML = `<h2>${publikacja.title}</h2>`;
                        if (publikacja.okladka) {
                            if (publikacja.link) {
                                publikacjaHTML += `<a href="${publikacja.link}"><img src="${publikacja.okladka}" alt="Okładka"></a>`;
                            } else {
                                publikacjaHTML += `<img src="${publikacja.okladka}" alt="Okładka">`;
                            }
                        }
                        if (publikacja.pdf) {
                            publikacjaHTML += `<a href="${publikacja.pdf}">Pobierz PDF</a>`;
                        }
                        div.innerHTML = publikacjaHTML;
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

    // Call the function directly after defining it to load all publications by default.
    filterPublications();
});
