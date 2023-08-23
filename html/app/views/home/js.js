function getRandomNumber(min, max) {
  return Math.random() * (max - min) + min;
}

function getRandomTranslation() {
  const x = getRandomNumber(-10, 10);
  const y = getRandomNumber(-10, 10);
  return `translate(${x}px, ${y}px)`;
}

document.addEventListener("DOMContentLoaded", () => {
  const shakingImage = document.getElementById("shaking-image");
  shakingImage.style.animationDuration = `${getRandomNumber(2, 5)}s`;
  shakingImage.style.animationTimingFunction = "ease-in-out";

  shakingImage.addEventListener("animationiteration", () => {
    shakingImage.style.transform = getRandomTranslation();
  });
});
