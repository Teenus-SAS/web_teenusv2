let slideIndex = 0;

function moveSlide(n) {
  const slider = document.querySelector(".slider");
  const slides = document.querySelectorAll(".slide");

  // Cambiar índice de slide
  slideIndex += n;

  // Si se llega al final o principio, se reinicia el índice
  if (slideIndex >= slides.length) {
    slideIndex = 0;
  } else if (slideIndex < 0) {
    slideIndex = slides.length - 1;
  }

  // Mover el slider
  slider.style.transform = `translateX(-${slideIndex * 100}%)`;
}

// Auto-play (opcional)
setInterval(() => {
  moveSlide(1);
}, 5000); // Cambia cada 5 segundos
