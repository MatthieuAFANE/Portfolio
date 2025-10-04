console.log("bonjour");
document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll("button");

  buttons.forEach((button) => {
    button.addEventListener("mouseenter", () => {
      button.classList.remove("hover-out");
      button.classList.add("hover-in");
    });

    button.addEventListener("mouseleave", () => {
      button.classList.remove("hover-in");
      button.classList.add("hover-out");
    });
  });
});

// ajout de l'aparition nav avec bouton close et menu

// Sélection des boutons et du container
const menuBtn = document.querySelector(".menu");
const closeBtn = document.querySelector(".close");
const containerNav = document.querySelector(".container_nav");

// Affiche la nav quand on clique sur "Menu"
menuBtn.addEventListener("click", () => {
    containerNav.classList.add("active");
});

// Masque la nav quand on clique sur "Close"
closeBtn.addEventListener("click", () => {
    containerNav.classList.remove("active");
});
