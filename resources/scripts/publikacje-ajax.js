document.addEventListener('DOMContentLoaded', function() {
    var filterTags = document.querySelectorAll('.filter-tag');
    var publicationsContainer = document.getElementById('publikacje-list');

    filterTags.forEach(function(tag) {
        tag.addEventListener('click', function(e) {
            var tagValue = e.target.getAttribute('data-tag');

            jQuery.ajax({
                url: koalicjaApi.root + '?tag=' + tagValue,
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
        });
    });
});
