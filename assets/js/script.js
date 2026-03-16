console.log("bonjour");

document.addEventListener("DOMContentLoaded", () => {
    // --- Test GSAP ---
    if (window.gsap) {
        console.log("✅ GSAP est bien connecté !");
    } else {
        console.log("❌ GSAP n'est pas chargé !");
        return;
    }

    gsap.registerPlugin(ScrollTrigger);

    // ==========================================
    // 1 à 6. (GARDÉS INTACTS : LENIS, BOUTONS, NAV, ELASTIC, LEGAL, MARQUEE)
    // ==========================================
    const lenis = new Lenis({
        duration: 1.5,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        orientation: 'vertical',
        gestureOrientation: 'vertical',
        smoothWheel: true,
        wheelMultiplier: 1,
        smoothTouch: false,
        touchMultiplier: 2,
        infinite: false,
    });
    lenis.on('scroll', ScrollTrigger.update);
    gsap.ticker.add((time) => { lenis.raf(time * 1000); });
    gsap.ticker.lagSmoothing(0);

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

    const menuBtn = document.querySelector(".menu");
    const closeBtn = document.querySelector(".close");
    const homeSection = document.getElementById('home');
    const menu = document.querySelector('.container_bouton_header');

    if (homeSection && menu) {
        window.addEventListener('scroll', () => {
            const homeBottom = homeSection.offsetTop + homeSection.offsetHeight;
            const scrollY = window.scrollY;
            if (scrollY >= homeBottom) {
                menu.style.transform = 'scale(1)';
                menu.style.opacity = '1';
                menu.style.pointerEvents = 'auto';
            } else {
                menu.style.transform = 'scale(0)';
                menu.style.opacity = '0';
                menu.style.pointerEvents = 'none';
            }
        });
    }

    const t1 = gsap.timeline({ paused: true });
    t1.to(".container_nav", { duration: 1, x: "0%", ease: "expo.inOut" })
      .from(".container_menu > div", { duration: 0.6, y: 100, opacity: 0, ease: "expo.out", stagger: 0.1 }, "-=0.4")
      .from(".container_nav .socials li a", { y: 40, x: -20, opacity: 0, duration: 0.8, ease: "power1.in", stagger: 0.15 }, "-=0.6");

    if (menuBtn && closeBtn) {
        menuBtn.addEventListener("click", () => t1.timeScale(1).play());
        closeBtn.addEventListener("click", () => t1.timeScale(2).reverse());
    }
    document.querySelectorAll(".menu__item-link").forEach((linkNav) => {
        linkNav.addEventListener("click", () => t1.timeScale(2).reverse());
    });

    document.querySelectorAll('#elastic').forEach((btn) => {
        let rect = null;
        btn.addEventListener('mouseenter', () => rect = btn.getBoundingClientRect());
        window.addEventListener('resize', () => rect = btn.getBoundingClientRect());
        btn.addEventListener('mousemove', (e) => {
            if (!rect) rect = btn.getBoundingClientRect();
            const tx = (e.clientX - rect.left - rect.width / 2) * 0.4;
            const ty = (e.clientY - rect.top - rect.height / 2) * 0.4;
            gsap.to(btn, { x: tx, y: ty, rotationX: -ty / 2, rotationY: tx / 2, duration: 0.45, ease: "power3.out", transformPerspective: 600, transformOrigin: "center" });
        });
        btn.addEventListener('mouseleave', () => gsap.to(btn, { x: 0, y: 0, rotationX: 0, rotationY: 0, duration: 1.5, ease: "elastic.out(2, 0.4)" }));
    });

    const modalTl = gsap.timeline({ paused: true });
    modalTl.to(".legal-overlay-new", { clipPath: "inset(0% 0% 0% 0%)", pointerEvents: "auto", duration: 1, ease: "power4.inOut" })
           .from(".legal-title-wrapper h2, .legal-date", { y: 50, opacity: 0, stagger: 0.1, duration: 0.8, ease: "power3.out" }, "-=0.4")
           .to(".legal-block", { y: 0, opacity: 1, stagger: 0.1, duration: 0.8, ease: "power3.out" }, "-=0.6");

    const btnOpenLegal = document.querySelector(".btn-mentions");
    const btnCloseLegal = document.querySelector(".close-legal-btn");
    if (btnOpenLegal && btnCloseLegal) {
        btnOpenLegal.addEventListener("click", (e) => { e.preventDefault(); lenis.stop(); modalTl.timeScale(1).play(); });
        btnCloseLegal.addEventListener("click", () => { modalTl.timeScale(1.5).reverse().eventCallback("onReverseComplete", () => lenis.start()); });
    }

    const wrap1 = document.querySelectorAll('.name_wrap')[0];
    const wrap2 = document.querySelectorAll('.name_wrap')[1];
    if (wrap1 && wrap2) {
        let direction = -1, speed = 0.3, pos = 0, wrapWidth = wrap1.getBoundingClientRect().width;
        wrap1.style.left = "0px"; wrap2.style.left = `${wrapWidth}px`;
        function animateMarquee() {
            pos += speed * direction;
            if (pos <= -100) pos = 0;
            if (pos >= 0 && direction === 1) pos = -100;
            wrap1.style.transform = `translateX(${pos}%)`;
            wrap2.style.transform = `translateX(${pos}%)`;
            requestAnimationFrame(animateMarquee);
        }
        animateMarquee();
        let lastScrollY = window.scrollY;
        window.addEventListener('scroll', () => {
            direction = window.scrollY > lastScrollY ? -1 : 1;
            lastScrollY = window.scrollY;
        });
    }

    // ==========================================
    // 7. SECTION ABOUT ME (GLOBALISÉE)
    // ==========================================
    window.initAboutSplit = function() {
        const aboutContainer = document.querySelector('.myStackAbout');
        if (!aboutContainer) return;

        const aboutSections = aboutContainer.querySelectorAll('.about-me section');

        const splitWordsAndChars = (el) => {
            const words = el.textContent.trim().split(/\s+/);
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

        aboutContainer.querySelectorAll('.js-split-letters').forEach(el => splitWordsAndChars(el));

        aboutContainer.querySelectorAll('.js-split-letters').forEach(el => {
            const section = el.closest('section');
            const isDark = section ? section.classList.contains('dark') : false;
            const chars = el.querySelectorAll('.char');

            gsap.fromTo(chars,
                { color: isDark ? "var(--text-dim-dark)" : "var(--text-dim-light)" },
                { color: isDark ? "var(--text-bright-dark)" : "var(--text-bright-light)", duration: 0.6, stagger: 0.01, ease: "none",
                  scrollTrigger: { trigger: el, start: "top 70%", end: "bottom 40%", scrub: 0.5, pinnedContainer: section }
                }
            );
        });

        // Nettoyage des anciens pins pour éviter les bugs au changement de langue
        ScrollTrigger.getAll().forEach(st => { if(st.vars.trigger && aboutSections.length && Array.from(aboutSections).includes(st.vars.trigger)) st.kill() });

        aboutSections.forEach((section, i) => {
            if (i === aboutSections.length - 1) return;
            ScrollTrigger.create({ trigger: section, start: "top top", endTrigger: aboutSections[i + 1], end: "top top", pin: true, pinSpacing: false, scrub: true });
        });

        aboutContainer.querySelectorAll('.cta').forEach(el => {
            gsap.to(el, { opacity: 1, y: 0, duration: 1, ease: "power3.out", scrollTrigger: { trigger: el, start: "top 85%", toggleActions: "play none none none" } });
        });
    };

    // ==========================================
    // 8. PROJETS & CURSEUR (GLOBALISÉ)
    // ==========================================
    const projectsData = [
        {
            title: "Aroma E-commerce",
            type: "perso",
            image: "assets/img/aroma.jpg",
            link: "http://aroma.free.nf/",
            tags: ["PHP", "MySQL", "JS", "HTML/CSS"],
            desc: "Site e-commerce complet de pods aromatisés olfactifs. Gestion du panier, des utilisateurs et requêtes en base de données développés en PHP natif."
        },
        {
            title: "Portfolio Matthieu",
            type: "perso",
            image: "assets/img/portfolio_MA.jpg",
            link: "#",
            tags: ["GSAP", "JS", "HTML/CSS", "PHP"],
            desc: "Portfolio interactif présentant mes projets. Mise en avant d'une interface utilisateur fluide et dynamique grâce aux animations GSAP."
        },
        {
            title: "Space Invaders",
            type: "scolaire",
            image: "assets/img/cover_16x9-1714708168967.avif",
            link: "https://github.com/MatthieuAFANE/SpaceInvaders",
            tags: ["Phaser"],
            desc: "Reproduction du célèbre jeu d'arcade rétro. Projet axé sur la logique algorithmique et le moteur physique avec le framework Phaser."
        },
        {
            title: "Colive",
            type: "scolaire",
            image: "assets/img/Colive.jpg",
            link: "https://github.com/MatthieuAFANE/Colive",
            tags: ["Symfony"],
            desc: "Application web de gestion de logements étudiants façon Airbnb. Conception robuste basée sur l'architecture MVC avec le framework Symfony."
        }
    ];
    const cursor = document.querySelector('.custom-cursor');
    if (cursor) {
        const xTo = gsap.quickTo(cursor, "x", { duration: 0.7, ease: "power2.out" });
        const yTo = gsap.quickTo(cursor, "y", { duration: 0.7, ease: "power2.out" });
        window.addEventListener('mousemove', (e) => { xTo(e.clientX + 20); yTo(e.clientY + 20); });
    }

    window.initProjects = function() {
        const grid = document.getElementById('projects-grid');
        if (!grid) return;
        grid.innerHTML = '';

        projectsData.forEach((project) => {
            const card = document.createElement('a');
            card.href = project.link;
            card.className = "project-card";
            card.setAttribute('data-type', project.type);
            card.innerHTML = `
                <div class="card-image-wrapper"><img src="${project.image}" alt="${project.title}"></div>
                <h3>${project.title}</h3><p>${project.desc}</p>
                <div class="tags">${project.tags.map(tag => `<span class="tag">${tag}</span>`).join('')}</div>
            `;
            grid.appendChild(card);

            if (cursor) {
                card.addEventListener('mouseenter', () => { cursor.innerHTML = "Voir"; gsap.to(cursor, { scale: 1, opacity: 1, duration: 0.4, ease: "back.out(1.7)" }); });
                card.addEventListener('mouseleave', () => { gsap.to(cursor, { scale: 0, opacity: 0, duration: 0.4, ease: "power2.in" }); });
            }

            gsap.from(card, { opacity: 0, y: 50, duration: 1, scrollTrigger: { trigger: card, start: "top 90%", toggleActions: "play none none none" } });
        });
        
        // Relance les filtres
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const activeBtn = document.querySelector('.filter-btn.active');
                if(activeBtn) activeBtn.classList.remove('active');
                btn.classList.add('active');
                const filter = btn.getAttribute('data-filter');
                document.querySelectorAll('.project-card').forEach(card => {
                    if (filter === 'all' || card.getAttribute('data-type') === filter) {
                        card.style.display = "block";
                        gsap.to(card, { opacity: 1, scale: 1, duration: 0.4 });
                    } else {
                        gsap.to(card, { opacity: 0, scale: 0.9, duration: 0.4, onComplete: () => card.style.display = "none" });
                    }
                });
                setTimeout(() => ScrollTrigger.refresh(), 400);
            });
        });
    };

    // ==========================================
    // 9. TEXT REVEAL (GLOBALISÉ)
    // ==========================================
    window.initTextReveal = function() {
        const revealText = document.getElementById('reveal-text');
        if (!revealText) return;

        // Tue l'ancien ScrollTrigger s'il existe (pour le changement de langue)
        let st = ScrollTrigger.getById("revealST");
        if (st) st.kill();

        const content = revealText.innerText; // Récupère le texte brut mis par updateLanguage
        const words = content.trim().split(/\s+/);
        revealText.innerHTML = ""; // Vide le conteneur

        words.forEach((word, index) => {
            const span = document.createElement("span");
            span.innerText = word;
            span.style.opacity = "0.8"; 
            revealText.appendChild(span);
            if (index < words.length - 1) {
                revealText.appendChild(document.createTextNode(" "));
            }
        });

        const spans = revealText.querySelectorAll('span');
        gsap.to(spans, {
            color: "#1C1D20",
            opacity: 1,
            stagger: 0.1,
            scrollTrigger: {
                id: "revealST", // ID défini pour pouvoir le tuer au rechargement
                trigger: revealText,
                start: "top 85%",
                end: "bottom 60%",
                scrub: true,
            }
        });
    };

    // ==========================================
    // 10. GESTION DE LA LANGUE (INITIE TOUT LE RESTE)
    // ==========================================
    const langBtn = document.getElementById('lang-switch');
    let currentLang = localStorage.getItem('lang') || 'fr'; 

    function updateLanguage(lang) {
        currentLang = lang;
        localStorage.setItem('lang', lang);

        document.querySelectorAll('[data-fr]').forEach(el => {
            const text = el.getAttribute(`data-${lang}`);
            if (text) el.innerText = text;
        });

        if (langBtn) {
            const btnText = langBtn.querySelector('.button_text');
            if (btnText) btnText.innerText = (lang === 'fr') ? 'EN' : 'FR';
        }

        // On lance (ou relance) les fonctions d'animation APRÈS avoir mis à jour le texte brut !
        if (typeof window.initProjects === "function") window.initProjects();
        if (typeof window.initTextReveal === "function") window.initTextReveal();
        if (typeof window.initAboutSplit === "function") window.initAboutSplit();
        
        setTimeout(() => ScrollTrigger.refresh(), 200);
    }

    // Le premier lancement de updateLanguage au chargement va s'occuper 
    // d'appeler initProjects, initTextReveal et initAboutSplit tout seul !
    updateLanguage(currentLang);

    if (langBtn) {
        langBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const newLang = (currentLang === 'fr') ? 'en' : 'fr';
            updateLanguage(newLang);
        });
    }
});