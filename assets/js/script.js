console.log("bonjour");
document.addEventListener("DOMContentLoaded", () => {
  // --- Boutons ---
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

  // --- Navigation ---
  const menuBtn = document.querySelector(".menu");
  const closeBtn = document.querySelector(".close");
  const containerNav = document.querySelector(".container_nav");

  if (menuBtn && closeBtn && containerNav) {
    menuBtn.addEventListener("click", () => {
      containerNav.classList.add("active");
    });
    closeBtn.addEventListener("click", () => {
      containerNav.classList.remove("active");
    });
  }

  // --- Test GSAP ---
  if (window.gsap) {
    console.log("✅ GSAP est bien connecté !");
  } else {
    console.log("❌ GSAP n'est pas chargé !");
    return; // stoppe le script ici
  }

  // --- Animation du texte infini ---
  const marquee = document.querySelector(".marquee");
  if (!marquee) {
    console.warn("⚠️ Élément .marquee non trouvé !");
    return;
  }

  const tl = gsap.to(marquee, {
    xPercent: -50,
    duration: 10,
    ease: "none",
    repeat: -1,
  });

  let lastScroll = window.scrollY;

  window.addEventListener("scroll", () => {
    const currentScroll = window.scrollY;

    if (currentScroll > lastScroll) {
      // on descend → défile vers la gauche
      tl.timeScale(1);
    } else {
      // on monte → défile vers la droite
      tl.timeScale(-1);
    }

    lastScroll = currentScroll;
  });
});
