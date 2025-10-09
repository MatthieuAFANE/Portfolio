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

  // if (menuBtn && closeBtn && containerNav) {
  //   menuBtn.addEventListener("click", () => {
  //     containerNav.classList.add("active");
  //     openNav();
  //   });
  //   closeBtn.addEventListener("click", () => {
  //     containerNav.classList.remove("active");
  //     closeNav();
  //   });
  // }
  // affiche bouton menu lorsqu'il depasse section#home
const homeSection = document.getElementById('home');
const menu = document.querySelector('.container_bouton_header');

window.addEventListener('scroll', () => {
  const homeBottom = homeSection.offsetTop + homeSection.offsetHeight;
  const scrollY = window.scrollY;

  if (scrollY >= homeBottom) {
    // Affiche le bouton avec effet scale
     menu.style.transform = 'scale(1)';
      menu.style.opacity = '1';
      menu.style.pointerEvents = 'auto';
  } else {
    // Cache et désactive le bouton
     menu.style.transform = 'scale(0)';
      menu.style.opacity = '0';
      menu.style.pointerEvents = 'none';
  }
});
// animation suivie cursor button rond
const elasticButtons = document.querySelectorAll('#elastic');

  menuBtn.addEventListener("click", () => {

  // Après l'ouverture, recalcule la position du bouton .close
  setTimeout(() => {
    const closeBtnElastic = document.querySelector('.close#elastic');
    if (closeBtnElastic) {
      rect = closeBtnElastic.getBoundingClientRect();
    }
  }, 400); // attends un peu que la nav soit animée
});

elasticButtons.forEach((btn) => {
  let rect = null;

  btn.addEventListener('mouseenter', () => {
    // recalcul avant le premier mouvement
    rect = btn.getBoundingClientRect();
  });

  // Met à jour le rectangle lors du redimensionnement de la fenêtre
  window.addEventListener('resize', () => {
    rect = btn.getBoundingClientRect();
  });

  btn.addEventListener('mousemove', (e) => {
    const localX = e.clientX - rect.left;
    const localY = e.clientY - rect.top;
    
    const tx = (localX - rect.width / 2) * 0.4;
    const ty = (localY - rect.height / 2) * 0.4;
    if (!rect) rect = btn.getBoundingClientRect();
    // Animation position + légère rotation selon le mouvement
    gsap.to(btn, {
      x: tx,
      y: ty,
      rotationX: -ty / 2,
      rotationY: tx / 2,
      duration: 0.45,
      ease: "power3.out",
      transformPerspective: 600,
      transformOrigin: "center"
    });
  });

  btn.addEventListener('mouseleave', () => {
    // Reviens au centre avec rotation
    gsap.to(btn, {
      x: 0,
      y: 0,
      rotationX: 0,
      rotationY: 0,
      duration: 1.5,
      ease: "elastic.out(2, 0.4)"
    });
  });



});






  // --- Test GSAP ---
  if (window.gsap) {
    console.log("✅ GSAP est bien connecté !");
  } else {
    console.log("❌ GSAP n'est pas chargé !");
    return; // stoppe le script ici
  }

// text Home defilement infini et change au scroll

const wrap1 = document.querySelectorAll('.name_wrap')[0];
const wrap2 = document.querySelectorAll('.name_wrap')[1];

let direction = -1; // -1 = vers la gauche (défilement vers le bas par défaut)
let speed = 0.3; 
let pos = 0;

// Largeur du texte réelle
let wrapWidth = wrap1.getBoundingClientRect().width;

// Position initiale
wrap1.style.left = "0px";
wrap2.style.left = `${wrapWidth}px`;

function animate() {
  pos += speed * direction;

  if (pos <= -100) pos = 0;
  if (pos >= 0 && direction === 1) pos = -100;

  wrap1.style.transform = `translateX(${pos}%)`;
  wrap2.style.transform = `translateX(${pos}%)`;

  requestAnimationFrame(animate);
}

animate();

// --- Détection desktop (scroll classique) ---
let lastScrollY = window.scrollY;
window.addEventListener('scroll', () => {
  const currentScrollY = window.scrollY;
  if (currentScrollY > lastScrollY) direction = -1;
  else if (currentScrollY < lastScrollY) direction = 1;
  lastScrollY = currentScrollY;
});

// --- Détection mobile (mouvements tactiles) ---
let touchStartY = 0;
window.addEventListener('touchstart', (e) => {
  touchStartY = e.touches[0].clientY;
});

window.addEventListener('touchmove', (e) => {
  const touchEndY = e.touches[0].clientY;

  // Si on glisse vers le haut (scroll vers le bas)
  if (touchEndY < touchStartY) {
    direction = -1;
  }
  // Si on glisse vers le bas (scroll vers le haut)
  else if (touchEndY > touchStartY) {
    direction = 1;
  }
});

// Ajustement lors d’un redimensionnement
window.addEventListener('resize', () => {
  wrapWidth = wrap1.getBoundingClientRect().width;
  wrap1.style.left = "0px";
  wrap2.style.left = `${wrapWidth}px`;
});




// test
// OUVERTURE DE LA NAV
// function openNav() {
//   const nav = document.querySelector('.container_nav');
//   gsap.timeline()
//     .set(nav, { display: 'block' })
//     .to(nav, {
//       top: "0",
//       opacity: 1,
//       duration: 1,
//       ease: "power4.inOut" // lent au début, rapide à la fin
//     })
//     .to(
//       [".container_nav_header", "nav", ".container_social"],
//       {
//         opacity: 1,
//         y: 0,
//         stagger: 0.15,
//         duration: 0.6,
//         ease: "power2.out"
//       },
//       "-=0.5" // commence avant la fin du slide
//     );
// }

// // FERMETURE DE LA NAV
// function closeNav() {
//   const nav = document.querySelector('.container_nav');
//   gsap.timeline()
//     .to(
//       [".container_nav_header", "nav", ".container_social"],
//       {
//         opacity: 0,
//         y: 30,
//         stagger: 0.1,
//         duration: 0.4,
//         ease: "power2.in"
//       }
//     )
//     .to(nav, {
//       top: "-100%",
//       opacity: 0,
//       duration: 1,
//       ease: "power4.inOut"
//     }, "-=0.2")
//     .set(nav, { display: 'none' });
// }

// Sélection des éléments
// const navLinks = document.querySelectorAll('.container_nav nav ul li');
// const socials = document.querySelector('.container_social');
// const logo = document.querySelector('.container_nav_header .logo');

// // Timeline GSAP (préparée mais en pause)
// const navTl = gsap.timeline({ paused: true, reversed: true });

// // Animation d’ouverture
// navTl
//   .set(containerNav, { display: 'initial' }) // s’assure que le menu est visible
//   .to(containerNav, {
//     y: 0,
//     opacity: 1,
//     duration: 0.5,
//     ease: "power4.out",
//   })
//   .from(logo, {
//     opacity: 0,
//     y: -30,
//     duration: 0.1,
//     ease: "power3.out"
//   }, "-=0.4")
//   .from(navLinks, {
//     opacity: 0,
//     y: 40,
//     duration: 0.4,
//     ease: "power3.out",
//     stagger: 0.1
//   }, "-=0.3")
//   .from(socials, {
//     opacity: 0,
//     y: 50,
//     duration: 0.2,
//     ease: "power3.out"
//   }, "-=0.3")
//   .from(closeBtn, {
//     opacity: 0,
//     scale: 0.8,
//     duration: 0.1,
//     ease: "back.out(1.7)"
//   }, "-=0.2");

// // Animation de fermeture
// const toggleNav = () => {
//   if (navTl.reversed()) {
//     navTl.play(); // ouverture
//     containerNav.classList.add("active");
//   } else {
//     navTl.reverse(); // fermeture
//     containerNav.classList.remove("active");
//   }
// };

// // Boutons pour ouvrir/fermer
// menuBtn.addEventListener('click', toggleNav);
// closeBtn.addEventListener('click', toggleNav);


// const siteContent = document.querySelector('main') || document.body;
// navTl.to(siteContent, {
//   filter: "blur(6px)",
//   duration: 0.6,
//   ease: "power2.out"
// }, 0);
// navTl.to(siteContent, {
//   filter: "blur(0px)",
//   duration: 0.6,
//   ease: "power2.in"
// }, "close");

// ANIMATION APPARITION NAV HAMBURGER
  // --- Timeline principale ---
  const t1 = new TimelineMax({ paused: true });

// Animation d'ouverture du menu
t1.to(".container_nav", {
  duration: 1,
  left: 0,
  ease: "expo.inOut"
});

// Animation des items du menu (GSAP 3 moderne)
t1.from(".container_menu > div", {
  duration: 0.6,
  y: 100,
  opacity: 0,
  ease: "expo.out",
  stagger: 0.1 // délai entre chaque div (effet cascade)
}, "-=0.4"); // commence 0.4s avant la fin de l’animation précédente


  // Animation des icônes sociales
t1.from(".container_nav .socials li a", {
  y: 40,
  x: -20,
  opacity: 0,
  duration: 0.8,
  ease: "power1.in",
  stagger: 0.15
}, "-=0.6");



  // Menu fermé au départ
  t1.reverse();

  // --- Gestion ouverture / fermeture ---

  if (!menuBtn || !closeBtn) {
    console.error("❌ Boutons .menu ou .close introuvables dans le DOM.");
    return;
  }

  // OUVERTURE (vitesse normale)
  menuBtn.addEventListener("click", (e) => {
    t1.timeScale(1);      // vitesse normale
    t1.reversed(false);   // joue la timeline vers l’avant
  });

  // FERMETURE (vitesse x2)
  closeBtn.addEventListener("click", (e) => {
    t1.timeScale(2);      // deux fois plus rapide
    t1.reversed(true);    // rejoue la timeline à l’envers
  });



});