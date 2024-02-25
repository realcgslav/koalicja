document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    const tagCheckboxes = document.querySelectorAll('.filter-tag');
    const publicationsContainer = document.getElementById('publikacje-list');

    // Funkcja do pobrania zaznaczonych tagów
    const getSelectedTags = () => {
        return Array.from(tagCheckboxes)
                     .filter(checkbox => checkbox.checked)
                     .map(checkbox => checkbox.dataset.tag)
                     .join(',');
    };

    searchInput.addEventListener('input', filterPublications);
    tagCheckboxes.forEach(checkbox => checkbox.addEventListener('change', filterPublications));

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
                        div.innerHTML = `<h2>${publikacja.post_title}</h2><p>${publikacja.post_content}</p>`;
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
});
