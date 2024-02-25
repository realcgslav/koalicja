document.addEventListener('DOMContentLoaded', function() {
    var filterForm = document.getElementById('filter-form');
    var publicationsContainer = document.getElementById('publications-container');

    if (filterForm) {
        filterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var searchValue = document.getElementById('search-input').value;
            var selectedTag = document.getElementById('tag-select').value;

            jQuery.ajax({
                url: koalicjaApi.root + '?search=' + searchValue + '&tag=' + selectedTag,
                method: 'GET',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-WP-Nonce', koalicjaApi.nonce);
                },
                success: function(data) {
                    publicationsContainer.innerHTML = '';
                    if (data.length) {
                        data.forEach(function(publikacja) {
                            var div = document.createElement('div');
                            div.className = 'publikacja';
                            div.innerHTML = `<h3>${publikacja.post_title}</h3>`;
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
        });
    }
});
