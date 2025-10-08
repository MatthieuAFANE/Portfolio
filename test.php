<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bouton animé GSAP</title>
  <style>

html, body {
  height: 200vh;
  font-family: 'GeneralSans-Variable', sans-serif;
}
/* BUTTON ROND */
button {
    cursor: pointer;
}
button {
    border-radius: 1000px;
    font-size: 14px;
    overflow: hidden;
    position: relative;
}
.button_text {
  position: relative;
  z-index: 2;
  transition: color 0.3s ease;
}

.button_filler {
  position: absolute;
  top: -50%;
  left: -25%;
  width: 150%;
  height: 200%;
  border-radius: 50%;
  background: var(--fillerColor);
  transform: none;
  z-index: 1;
}

/* Spécifique à ton bouton "close" */
.close, .menu {
  --baseColor: #222;
  --fillerColor: #ff0000;
  --hoverTextColor: #ffffff;
}

/* Animations */
.hover-in .button_text {
  animation: textHoverIn 0.5s forwards;
}
.hover-in .button_filler {
  animation: fillerHoverIn 0.8s forwards;
}

.hover-out .button_text {
  animation: textHoverOut 0.5s forwards;
}
.hover-out .button_filler {
  animation: fillerHoverOut 0.8s forwards;
}

/* Keyframes */
@keyframes textHoverIn {
  0% {
    opacity: 0;
  }
  1% {
    transform: translateY(-100%);
    opacity: 1;
  }
  100% {
    transform: translateY(0);
    color: var(--hoverTextColor);
  }
}

@keyframes textHoverOut {
  0% {
    opacity: 0;
  }
  1% {
    transform: translateY(100%);
    opacity: 1;
  }
  100% {
    transform: translateY(0);
  }
}

@keyframes fillerHoverIn {
  0% {
    transform: translate3d(0, 75%, 0);
  }
  100% {
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fillerHoverOut {
  0% {
    transform: translate3d(0, 0, 0);
  }
  100% {
    transform: translate3d(0, -75%, 0);
  }
}
/* FIN BUTTON ROND */
/* CSS PORTFOLIO */
.container_bouton_header {
  position: fixed;
  top: 25px;
  right: 5%;
  z-index: 100;
  transform: scale(1); /* invisible au départ */
  opacity: 1;
  transition: all 0.2s ease;
}
.container_bouton_header button {
    height: 70px;
    width: 70px;
    background-color: #000;
    color: #fff;
    border-radius: 1000px;
    font-size: 14px;
    position: relative;
  transform: translate3d(0, 0, 0);
  will-change: transform;
    display: grid;
  place-items: center;
  transform-origin: center;
}

  </style>
</head>
<body>

    
        <div class="container_bouton_header">
            <button class="menu" type="button">
               <span class="button_text">Menu</span>
                <div class="button_filler"></div>
            </button>
        </div>


  <!-- Importation de GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script>

  // affiche bouton menu lorsqu'il depasse section#home
// const homeSection = document.getElementById('home');
// const menu = document.querySelector('.container_bouton_header');

// window.addEventListener('scroll', () => {
//   const homeBottom = homeSection.offsetTop + homeSection.offsetHeight;
//   const scrollY = window.scrollY;

//   if (scrollY >= homeBottom) {
//     // Affiche le bouton avec effet scale
//      menu.style.transform = 'scale(1)';
//       menu.style.opacity = '1';
//       menu.style.pointerEvents = 'auto';
//   } else {
//     // Cache et désactive le bouton
//      menu.style.transform = 'scale(0)';
//       menu.style.opacity = '0';
//       menu.style.pointerEvents = 'none';
//   }
// }); 
  // const buttons = document.querySelectorAll("button");
  // buttons.forEach((button) => {
  //   button.addEventListener("mouseenter", () => {
  //     button.classList.remove("hover-out");
  //     button.classList.add("hover-in");
  //   });
  //   button.addEventListener("mouseleave", () => {
  //     button.classList.remove("hover-in");
  //     button.classList.add("hover-out");
  //   });
  // });

// FRONTIERE  EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
    // s'assurer que le bouton existe et que GSAP est chargé
    const button = document.querySelector('.menu');
    if (!button) {
      console.error('Bouton .menu introuvable');
    } else if (!window.gsap) {
      console.error('GSAP non chargé');
    } else {
      let rect = button.getBoundingClientRect();

      // Mettre à jour le rect au resize / à l'entrée de la souris
      const updateRect = () => rect = button.getBoundingClientRect();
      window.addEventListener('resize', updateRect);
      button.addEventListener('mouseenter', updateRect);

      button.addEventListener('mousemove', (e) => {
        // IMPORTANT : utiliser clientX / clientY (coordonnées viewport)
        const mouseX = e.clientX;
        const mouseY = e.clientY;

        const localX = mouseX - rect.left;
        const localY = mouseY - rect.top;

        // calcul translation centrée
        const tx = (localX - rect.width / 2) * 0.4;
        const ty = (localY - rect.height / 2) * 0.4;

        // limite la translation pour éviter gros sauts
        const max = 22; // px
        const clamp = (v) => Math.max(-max, Math.min(max, v));

        gsap.to(button, {
          x: clamp(tx),
          y: clamp(ty),
          duration: 0.45,
          ease: "power3.out"
        });
      });

      button.addEventListener('mouseleave', () => {
        gsap.to(button, { x: 0, y: 0, duration: 0.45, ease: "power3.out" });
      });
    }

  </script>
</body>
</html>


