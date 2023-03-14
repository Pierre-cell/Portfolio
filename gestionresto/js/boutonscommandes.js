function togglePopup(event) {
  const button = event.target;
  const popup = button.nextElementSibling;

  if (popup.classList.contains("popup")) {
    popup.style.display = "flex";
  } else if (button.classList.contains("close")) {
    popup.style.display = "none";
  }
}

document.addEventListener("click", togglePopup);
const reservationButtons = document.querySelectorAll(".material-symbols-outlined");
reservationButtons.forEach((button) => {
  button.addEventListener("click", togglePopup);
});

const closeIcons = document.querySelectorAll(".close");
closeIcons.forEach((icon) => {
  icon.addEventListener("click", togglePopup);
});
