let currentSlide = 0;
const cards = document.querySelectorAll(".card");

function showSlide(index) {
  cards.forEach((card, i) => {
    card.classList.toggle("active", i === index);
  });
}

function nextSlide() {
  currentSlide = (currentSlide + 1) % cards.length;
  showSlide(currentSlide);
}

function prevSlide() {
  currentSlide = (currentSlide - 1 + cards.length) % cards.length;
  showSlide(currentSlide);
}
