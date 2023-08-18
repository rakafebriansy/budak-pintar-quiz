const submitBtn = document.getElementById("submitBtn");
const resultPopup = document.getElementById("resultPopup");
const closeBtn = document.getElementById("closeBtn");
const scoreSpan = document.getElementById("score");
const starTwo = document.getElementById("two");
const starThree = document.getElementById("three");
const starFour = document.getElementById("four");

function createConfetti() {
  const confettiContainer = document.querySelector(".confetti-container");
  const confettiElement = document.createElement("div");
  confettiElement.classList.add("confetti");
  confettiContainer.appendChild(confettiElement);
}

function animateScore(targetScore) {
  let currentScore = 0;
  const animationDuration = 100000; // Animation duration in milliseconds
  const interval = 30; // Interval between each animation step
  const increment = Math.ceil(targetScore / (animationDuration / interval));

  const scoreAnimation = setInterval(() => {
    currentScore += increment;
    if (currentScore >= targetScore) {
      clearInterval(scoreAnimation);
      currentScore = targetScore;
    }
    scoreSpan.textContent = currentScore;

    // Automatically check stars based on score
    if (currentScore >= 50) {
      starTwo.checked = true;
    }
    if (currentScore >= 75) {
      starThree.checked = true;
    }
    if (currentScore >= 100) {
      starFour.checked = true;
    }
  }, interval);
}

submitBtn.addEventListener("click", function () {
  for (let i = 0; i < 10; i++) {
    createConfetti();
  }

  // Ngubah Nilainya sesuai database ya raka :)
  const targetScore = 100;
  animateScore(targetScore);

  resultPopup.style.display = "block";
});

closeBtn.addEventListener("click", function () {
  resultPopup.style.display = "none";
});
