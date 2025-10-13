<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Me Stack Encapsulé</title>

<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
@import url('/assets/css/clash-display.css');
@import url('/assets/css/general-sans.css');

/* ======================
   VARIABLES
   ====================== */
.myStackAbout {
  --text-dim-dark: rgba(255,255,255,0.25);
  --text-bright-dark: #ffffff;
  --text-dim-light: rgba(0,0,0,0.3);
  --text-bright-light: #000000;
}

/* ======================
   RESET / BASE
   ====================== */
.myStackAbout * { box-sizing: border-box; margin: 0; padding: 0; }
.myStackAbout html, .myStackAbout body { height: 100%; scroll-behavior: smooth; }
.myStackAbout body { font-family: 'GeneralSans-Variable', sans-serif; overflow-x: hidden; -webkit-font-smoothing: antialiased; }

/* ======================
   SECTIONS
   ====================== */
.myStackAbout section {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 4rem 2rem;
  position: relative;
  width: 100%;
  transition: background-color 0.4s ease, color 0.4s ease;
}

/* Home */
.myStackAbout .home {
  background-color: #000;
  color: #fff;
  text-align: center;
  flex-direction: column;
  justify-content: center;
}

.myStackAbout .home h1 {
  font-size: clamp(2.5rem, 7vw, 5rem);
  font-weight: 700;
  letter-spacing: -0.03em;
  margin-bottom: 1rem;
}

.myStackAbout .home p {
  font-size: 1.2rem;
  opacity: 0.8;
}

/* About Me sections */
.myStackAbout .about-me section.dark {
  background-color: #000;
  color: var(--text-dim-dark);
}

.myStackAbout .about-me section.light {
  background-color: #fff;
  color: var(--text-dim-light);
}

.myStackAbout figure {
  max-width: 900px;
  width: 100%;
  padding: 2rem;
  text-align: center;
}

.myStackAbout p.js-split-letters {
  font-size: clamp(1.8rem, 4vw, 3.6rem);
  line-height: 1.1;
  font-weight: 600;
  margin: 0;
  letter-spacing: -0.02em;
  overflow: visible;
  display: inline-block;
}

.myStackAbout .word { display: inline-block; }
.myStackAbout .char { display: inline-block; will-change: color; transition: color 0.3s ease; }
.myStackAbout .space { display: inline-block; width: 0.35em; }

.myStackAbout figcaption { font-size: 1rem; opacity: 0.6; margin-top: 1rem; }

/* CTA */
.myStackAbout .cta {
  display: inline-block;
  margin-top: 1.5rem;
  padding: 0.75rem 1.25rem;
  border-radius: 8px;
  background: linear-gradient(135deg,#ffd166,#ff6b6b);
  color: #111;
  font-weight: 700;
  text-decoration: none;
  transform: translateY(15px);
  opacity: 0;
}

/* Bouton spécifique pour la section CV */
.myStackAbout section.light:last-of-type .cta {
  background: linear-gradient(135deg, #6a5af9, #43e97b);
  color: #fff;
  font-size: 1.1rem;
  padding: 1rem 1.5rem;
  box-shadow: 0 8px 20px rgba(0,0,0,0.25);
  transform: translateY(20px);
  opacity: 0;
  transition: transform 0.3s ease, opacity 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
}

.myStackAbout section.light:last-of-type .cta:hover {
  transform: translateY(0) scale(1.05);
  box-shadow: 0 12px 25px rgba(0,0,0,0.35);
  background: linear-gradient(135deg, #7b61ff, #4af488);
}
</style>
</head>
<body>

<div class="myStackAbout">

  <!-- HOME -->
  <section class="home">
    <h1>Bienvenue dans mon univers</h1>
    <p>Faites défiler pour découvrir mon parcours</p>
  </section>

  <!-- ABOUT ME -->
  <div class="about-me">

    <section class="light">
      <figure>
        <blockquote>
          <p class="js-split-letters">Actuellement étudiant en informatique à l'IUT de Reims-Châlons-Charleville, je transforme le code en projets concrets.</p>
        </blockquote>
        <figcaption>— Moi</figcaption>
      </figure>
    </section>

    <section class="dark">
      <figure>
        <blockquote>
          <p class="js-split-letters" style="font-size: 9vw">MON OBJECTIF ?</p>
        </blockquote>
        <figcaption>— Objectif</figcaption>
      </figure>
    </section>

    <section class="light">
      <figure>
        <blockquote>
          <p class="js-split-letters">Faire briller vos idées dans le monde numérique, avec créativité et efficacité.</p>
        </blockquote>
        <figcaption>— Vision</figcaption>
      </figure>
    </section>

    <section class="dark">
      <figure>
        <blockquote>
          <p class="js-split-letters">Du concret, zéro blabla.</p>
        </blockquote>
        <figcaption>— Promesse</figcaption>
      </figure>
    </section>

    <section class="light">
      <figure>
        <blockquote>
          <p class="js-split-letters">Découvret mon parcours</p>
        </blockquote>
        <figcaption>— CV</figcaption>
        <a href="#" class="cta">Télécharger mon CV</a>
      </figure>
    </section>

  </div>

</div>

<!-- GSAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
  gsap.registerPlugin(ScrollTrigger);

  const container = document.querySelector('.myStackAbout');
  const aboutSections = container.querySelectorAll('.about-me section');

  // Split texte en mots puis lettres
  const splitWordsAndChars = (el) => {
    const words = el.textContent.split(' ');
    el.textContent = '';

    words.forEach((word, wIdx) => {
      const wordSpan = document.createElement('span');
      wordSpan.className = 'word';
      [...word].forEach(char => {
        const charSpan = document.createElement('span');
        charSpan.className = 'char';
        charSpan.textContent = char;
        wordSpan.appendChild(charSpan);
      });

      if (wIdx < words.length - 1) {
        const space = document.createElement('span');
        space.className = 'space';
        space.innerHTML = '&nbsp;';
        wordSpan.appendChild(space);
      }

      el.appendChild(wordSpan);
    });
  };

  container.querySelectorAll('.js-split-letters').forEach(el => splitWordsAndChars(el));

  // Lettres animées
  container.querySelectorAll('.js-split-letters').forEach(el => {
    const section = el.closest('section');
    const isDark = section.classList.contains('dark');
    const chars = el.querySelectorAll('.char');

    gsap.fromTo(chars,
      { color: isDark ? "var(--text-dim-dark)" : "var(--text-dim-light)" },
      {
        color: isDark ? "var(--text-bright-dark)" : "var(--text-bright-light)",
        duration: 0.6,
        stagger: 0.01,
        ease: "none",
        scrollTrigger: {
          trigger: el,
          start: "top 70%",
          end: "bottom 40%",
          scrub: 0.5,
        }
      }
    );
  });

  // Effet de stack (chevauchement)
  aboutSections.forEach((section, i) => {
    if (i === aboutSections.length - 1) return;
    ScrollTrigger.create({
      trigger: section,
      start: "top top",
      endTrigger: aboutSections[i + 1],
      end: "top top",
      pin: true,
      pinSpacing: false,
      scrub: true
    });
  });

  // CTA
  container.querySelectorAll('.cta').forEach(el => {
    gsap.to(el, {
      opacity: 1,
      y: 0,
      duration: 1,
      ease: "power3.out",
      scrollTrigger: {
        trigger: el,
        start: "top 85%",
        toggleActions: "play none none none"
      }
    });
  });
});
</script>

</body>
</html>
