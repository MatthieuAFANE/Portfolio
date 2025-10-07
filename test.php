<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Texte défilant GSAP</title>

  <style>
    body {
      height: 200vh; /* pour pouvoir scroller */
      background: #111;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow-x: hidden;
      font-family: sans-serif;
    }

    .wrapper {
      overflow: hidden;
      width: 100vw;
      white-space: nowrap;
    }

    .marquee {
      display: inline-block;
      white-space: nowrap;
      font-size: 3rem;
      font-weight: 600;
      color: white;
      will-change: transform;
    }

    .marquee span {
      margin: 0 1rem;
    }




    .work_template_image {
    position: relative;
    display: inline-block;
}

.image_link img {
    display: block;
    width: 100%;
    height: auto;
}

/* Les deux liens cachés par défaut */
.work_template_image_more {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: flex;
    gap: 10px;
    opacity: 0;
    transition: opacity 0.3s ease;
}


.work_template_image:hover .work_template_image_more {
    opacity: 1;
}
  </style>
</head>

<body>
  <div class="wrapper">
    <h1 class="marquee">
      Matthieu Afane <span>—</span> Matthieu Afane <span>—</span> Matthieu Afane <span>—</span> Matthieu Afane <span>—</span> Matthieu Afane <span>—</span>
    </h1>
  </div>


  <figure class="work_template">
    <div class="work_template_image">
        <a href="#" class="image_link">
            <img src="https://tse4.mm.bing.net/th/id/OIP.tU1NAZ2vUoqqNIMhyPuV0QHaF2?cb=12&rs=1&pid=ImgDetMain&o=7&rm=3" alt="TWICE">
        </a>
        <div class="work_template_image_more">
            <a href="#">View</a>
            <a href="#">Code source</a>
        </div>
    </div>
    <div class="work_template_info">
        <div class="work_template_info_header">
            <div class="work_template_info_header_title">
                <h3>TWICE</h3>
            </div>
        </div>
        <div class="work_template_info_content">
            <div class="typeANDdate">
                <h4 class="type">Development</h4>
                <h4 class="date">2024</h4>
            </div>
            <div class="technology">
                <p>HTML CSS JS PHP</p>
            </div>
        </div>
    </div>
</figure>


  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      if (!window.gsap) {
        console.error("❌ GSAP n'est pas chargé !");
        return;
      }

      console.log("✅ GSAP est bien chargé, animation du texte...");

      const marquee = document.querySelector(".marquee");

      if (!marquee) {
        console.error("⚠️ Élément .marquee introuvable !");
        return;
      }

      // Animation infinie du texte vers la gauche
      const tl = gsap.to(marquee, {
        xPercent: -50,
        duration: 10,
        ease: "none",
        repeat: -1
      });

      // Détection du sens du scroll
      let lastScroll = window.scrollY;

      window.addEventListener("scroll", () => {
        const currentScroll = window.scrollY;

        if (currentScroll > lastScroll) {
          // Descente → défile vers la gauche
          tl.timeScale(1);
        } else {
          // Montée → défile vers la droite
          tl.timeScale(-1);
        }

        lastScroll = currentScroll;
      });
    });
  </script>
</body>
</html>
