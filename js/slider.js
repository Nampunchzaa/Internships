let index = 0;
const slides = document.querySelector(".slides");
const total = document.querySelectorAll(".card").length;

function slide(direction) {
  index += direction;

  if (index < 0) index = total - 1;
  if (index >= total) index = 0;

  slides.style.transform = `translateX(-${index * 100}%)`;
}