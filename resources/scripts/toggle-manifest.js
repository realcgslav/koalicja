document.addEventListener('DOMContentLoaded', function() {
  if (document.body.classList.contains('home')) {
    const toggleButton = document.querySelector('.toggle-button');
    const manifestContent = document.querySelector('.manifest-content');
    const manifestContainer = document.querySelector('.manifest-container');

    if (toggleButton && manifestContent && manifestContainer) {
      toggleButton.addEventListener('click', function() {
        manifestContent.classList.toggle('expanded');
        if (manifestContent.classList.contains('expanded')) {
          toggleButton.textContent = 'Zwiń';
        } else {
          toggleButton.textContent = 'Rozwiń';
          // Opóźnij wykonanie scrollIntoView
          setTimeout(() => {
            // Przewiń do kontenera manifestu
            manifestContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
          }, 100); // Opóźnienie 300ms, można dostosować w zależności od czasu animacji
        }
      });
    }
  }
});