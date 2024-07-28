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

    function renderPublications(data) {
        publicationsContainer.innerHTML = '';

        if (data.length) {
            data.forEach(function(publikacja) {
                const div = document.createElement('div');
                div.className = 'publikacja';
                let publikacjaHTML = `<h2>${publikacja.title}</h2>`;
                
                if (publikacja.okladka) {
                    const okladkaUrl = publikacja.okladka; // Adjusted to use the URL field correctly
                    if (publikacja.link) {
                        publikacjaHTML += `<a href="${publikacja.link}"><img src="${okladkaUrl}" alt="Okładka"></a>`;
                    } else {
                        publikacjaHTML += `<img src="${okladkaUrl}" alt="Okładka">`;
                    }
                }

                if (publikacja.pdf) {
                    const pdfUrl = publikacja.pdf; // Adjusted to use the URL field correctly
                    publikacjaHTML += `<a class="publikacja-button" href="${pdfUrl}">Pobierz PDF</a>`;
                }

                div.innerHTML = publikacjaHTML;
                publicationsContainer.appendChild(div);
            });
        } else {
            publicationsContainer.innerHTML = '<p>No publications found.</p>';
        }
    }

    function fetchPublications() {
        const searchValue = searchInput.value;
        const selectedTags = getSelectedTags();

        console.log('Fetching publications with:', {
            searchValue,
            selectedTags
        });

        jQuery.ajax({
            url: `${koalicjaApi.root}?search=${encodeURIComponent(searchValue)}&tags=${encodeURIComponent(selectedTags)}`,
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-WP-Nonce', koalicjaApi.nonce);
            },
            success: function(data) {
                console.log('Fetched data:', data);
                renderPublications(data);
            },
            error: function(error) {
                console.error('Error fetching publications:', error);
                publicationsContainer.innerHTML = '<p>There was an error.</p>';
            }
        });
    }

    searchInput.addEventListener('input', fetchPublications);
    tagCheckboxes.forEach(checkbox => checkbox.addEventListener('change', fetchPublications));

    // Initial fetch to load all publications by default
    fetchPublications();
});
