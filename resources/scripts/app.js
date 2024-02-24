import domReady from '@roots/sage/client/dom-ready';

domReady(async () => {
  const updateResults = (data) => {
    const resultsContainer = document.querySelector('.publikacje-results');
    resultsContainer.innerHTML = ''; // Clear previous results
    data.forEach(publikacja => {
      const publikacjaElement = document.createElement('div');
      publikacjaElement.innerHTML = `Title: ${publikacja.title} <br> Description: ${publikacja.description}`;
      resultsContainer.appendChild(publikacjaElement);
    });
  };

  const fetchData = () => {
    const searchData = new FormData(document.getElementById('search-form'));
    const tags = document.querySelectorAll('input[name="tag[]"]:checked');
    tags.forEach(tag => searchData.append('tags[]', tag.value));
    fetch('/wp-json/sage/v1/publikacje', {
      method: 'POST',
      body: searchData,
    })
    .then(response => response.json())
    .then(data => updateResults(data))
    .catch(error => console.error('Error:', error));
  };

  document.getElementById('search-form').addEventListener('submit', function(e) {
    e.preventDefault();
    fetchData();
  });

  document.querySelectorAll('input[name="tag[]"]').forEach(tag => {
    tag.addEventListener('change', fetchData);
  });

  document.getElementById('search-input').addEventListener('input', fetchData);
});
