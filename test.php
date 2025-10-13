<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Me Stack Encapsulé</title>

<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
	@import url('clash-display.css');
@import url('general-sans.css');
/* --- Reset CSS --- */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html, body {
  height: 100%;
  font-family: 'GeneralSans-Variable', sans-serif;
}

ul, ol {
  list-style: none;
}

a {
  text-decoration: none;
  color: inherit;
}

button, input, textarea, select {
  font: inherit;
  background: none;
  border: none;
  outline: none;
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
  transform: translate3d(0, 75%, 0);
  z-index: 1;
}

/* Spécifique à ton bouton "close" */
.close, .menu {
  --baseColor: #222;
  --fillerColor: #455CE9;
  --hoverTextColor: #ffffff;
}

/* Animations */

.hover-in .button_filler {
  animation: fillerHoverIn 0.8s forwards;
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
/* Lien effect souligner */
a#underline {
  position: relative;
}
a#underline::after {
  content: '';
  position: absolute;
  bottom: -5px;
  left: 0;
  height: 2px;
  width: 100%;
  background-color: #fff;
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.4s ease;
}
a#underline:hover::after {
  transform: scaleX(1);
  transform-origin: left;
}
a#underline:not(:hover)::after {
  transform: scaleX(0);
  transform-origin: right;
}
/* FIN Lien effect souligner */
/* CSS PORTFOLIO */

/* HEADER */
header {
    position: absolute;
    top: 0;
    left: 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 5%;
    height: 120px;
    width: 100%;
    z-index: 1;
}
header .logo span {
  font-weight: 500;
  color: #fff;
}
.container_nav_home nav ul {
  display: flex;
}
.container_nav_home nav ul li:not(:last-child) {
  margin-right: 20px;
}
.container_nav_home nav ul li a {
  font-weight: 500;
  color: #fff;
}
.container_bouton_header {
  position: fixed;
  top: 25px;
  right: 4%;
  z-index: 100;
  transform: scale(0); /* invisible au départ */
  opacity: 0;
  transition: all 0.2s ease;
  pointer-events: none; /* pas cliquable au départ */
}
.container_bouton_header button.menu {
    height: 100px;
    width: 100px;
    background-color: #1c1d20;
    color: #fff;
    border-radius: 1000px;
    position: relative;
    border: 1px solid #48494C;
}
button.menu .button_text {
  font-weight: 500;
  font-size: 16px;
}

/* FIN HEADER */
/* NAV */
.container_nav_header .logo span {
  font-weight: 500;
}
.container_nav_header button.close {
    height: 100px;
    width: 100px;
    background-color: #455CE9;
    color: #fff;
    border-radius: 1000px;
    overflow: hidden;
    position: relative;
    will-change: transform;
    transform: translateZ(0);
}
.container_nav_header button.close .button_text {
  font-weight: 500;
  font-size: 16px;
}

.container_nav .socials {
	position: absolute;
	bottom: 40px;
	left: 5%;
}

.container_nav .socials ul {
  display: flex;
  align-items: flex-end; /* <— autorise les <a> à bouger verticalement */
  overflow: hidden; 
  padding: 10px 0;
}

.container_nav .socials ul li a {
  display: inline-block;
	text-transform: uppercase;
	letter-spacing: 0px;
  font-weight: 500;
  color: #1c1d20;
}

.container_nav .socials ul li a#underline::after {
	background-color: #1C1D20;
}

.container_nav .socials ul li:not(:last-child) {
    margin-right: 40px;
}

.container_nav {
	position: fixed;
	left: -100%;
	width: 100%;
	height: 100vh;
	background: #fff;
  padding: 25px 4% 25px 5%;
  z-index: 1000;
}

.container_nav_header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.menu__item {
	position: relative;
}

.menu__item-link {
	display: inline-block;
	cursor: pointer;
	position: relative;
	transition: opacity 0.4s;
  font-weight: 500;
}

.menu__item-link::before {
	all: initial;
	counter-increment: menu;
	position: absolute;
	bottom: 60%;
	left: 0;
	pointer-events: none;
}

.menu__item-link:hover {
	transition-duration: 0.1s;
	opacity: 0;
}

.menu__item-img {
	z-index: 2;
	pointer-events: none;
	position: absolute;
	height: 12vh;
	max-height: 600px;
	opacity: 0;
	left: 8%;
	top: 10%;
	transform: scale(0);
}

.menu__item-link:hover + .menu__item-img {
	opacity: 1;
	transform: scale(1);
	transition: all 0.4s;
}

.container_menu {
	--offset: 20vw;
	--move-initial: calc(-25% + var(--offset));
	--move-final: calc(-50% + var(--offset));
}

.marquee {
	position: absolute;
	top: 0;
	left: 0;
	overflow: hidden;
	color: rgb(214, 214, 214);
	pointer-events: none;
}

.marquee__inner {
	width: fit-content;
	display: flex;
	position: relative;
	opacity: 0;
	transition: all 0.1s;
	transform: translateX(60px);
}

.menu__item-link:hover ~ .marquee .marquee__inner {
	opacity: 1;
	transform: translateX(0px);
	transition-duration: 0.4s;
}

.menu__item-link,
.marquee span {
	white-space: nowrap;
	font-size: max(5rem, 5vw);
	line-height: 1.15;
}

.marquee span {
	font-style: italic;
}
/* FIN NAV */
/* MAIN */
main {
  width: 100%;
}
/* HOME */
section#home {
  width: 100%;
}
.container_home {
  position: relative;
}
.container_home_image {
  width: 100%;
  height: 100vh;
  background: linear-gradient(to bottom, #6F6B63, #B2ACA1);

}
.container_home_image img {
  width: 100%;
  height: 100%;
  object-fit: contain;
}
.container_home_element {
  position: absolute;
  bottom: 1vw;
  left: 0;
  width: 100%;
}
.container_home_element .wrapper {
  position: relative;
  width: 100%;
  display: flex;
  overflow-x: hidden;
}
.container_home_element .name_wrap {
  white-space: nowrap;
}
.container_home_element .name_wrap h1 {
  font-family: 'ClashDisplay-Variable', sans-serif;
  font-size: max(9em, 15vw);
  font-weight: 500;
  color: rgb(255, 255, 255);
  margin: 0;
  display: inline-block;
}
.container_home_element .spacer {
  padding: 0 3vw;
}
.container_home_intro {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  display: flex;
  justify-content: space-between;
  width: 100%;
  padding: 0 7.5%;
}
.container_home_intro svg {
  fill: #fff;
}
.container_home_intro .intro svg {
  transform: rotate(90deg);
}
.container_home_intro .intro h2 {
  color: #fff;
  font-size: 30px;
  font-weight: 500;
}
.container_home_intro .social-icons ul li:not(:last-child) {
  margin-bottom: 10px;
}
.container_home_intro .social-icons ul li a svg {
  transition: .1s;
}
.container_home_intro .social-icons ul li a:hover svg {
  transform: scale(1.2);
}
/* FIN HOME */
/* WORK */
section#work {
  width: 100%;
  padding: 60px 5%;
}
.container_work_header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.container_work_header_title h2 {
  font-family: 'ClashDisplay-Variable', sans-serif;
  font-size: 70px;
  font-weight: 500;
}
.container_work_header_display {
  width: 110px;
  display: flex;
  justify-content: space-between;
}
.contanier_work_header_display button {
  width: 50px;
  height: 50px;
  border: 1px solid #dfdfdf;
}
.container_work_content {
  margin-top: 40px;
  display: grid;                 /* Active le mode grid */
  grid-template-columns: repeat(2, minmax(300px, 1fr));
  gap: 40px; 
  width: 100%;
}
.work_template {
  width: 100%;
}
.work_template:last-child {
  /* grid-column: span 2; Prend les 2 colonnes */
}
.work_template_image_more {
  position: relative;
  overflow: hidden;
  width: 100%;
  aspect-ratio: 3 / 2;
}
.work_template_image_more img {
  width: 100%;
  transition: .3s;
  height: 100%;
  object-fit: cover;
  display: block;
}
.work_template_image_more:hover img {
  transform: scale(1.05);
}
.work_template_info_header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: 20px 0 15px;
}
.work_template_info_header :is(.technology, .date)  {
  font-weight: 500;
}
.work_template_info_content_title {
  display: flex;
  align-items: center;
  position: relative;
  overflow: hidden;
}
.work_template_info_content_title h3 {
  margin-left: 10px;
  font-family: 'ClashDisplay-Variable', sans-serif;
  font-size: 32px;
  font-weight: 500;
}
.work_template_info_content_title :is(h3, svg) {
  transform: translateX(-34px); /* c la taille du svg + margin left = 24px + 10px = 34px (A adapter responsive) */
  transition: 0.3s ease-in-out;
}
.work_template_link:hover .work_template_info_content_title :is(h3, svg) {
  transform: translateX(0);
}

/* À partir de 768px de large (tablettes et +) → 2 colonnes */
@media (max-width: 768px) {
  .container_work_content {
    grid-template-columns: 1fr;
  }
}
/* FIN WORK */
/* FOOTER */
.container_footer {
  background-color: #1C1D20;
  padding: 50px 5%;
}
.container_footer_header {
  display: flex;
  align-items: center;
}
.container_footer_header .image {
  height: 30px;
  width: 30px;
}
.container_footer_header .image img {
  width: 100%;
  height: 100%;
}
.container_footer_header .text {
  margin-left: 10px;
}
.container_footer_header .text h2 {
  font-family: 'ClashDisplay-Variable', sans-serif;
  font-size: 34px;
  font-weight: 500;
  color: #fff;
}
.container_button {
  display: flex;
  margin: 40px 0 30px;
}
.container_button button {
  border: 1px solid #48494C;
  width: 220px;
  height: 50px;
  color: #fff;
}
.container_button button:first-child {
  margin-right: 10px;
}
.container_button button .button_filler {
  background-color: #455CE9;
}
.container_footer_edition_socials {
  padding-top: 10px;
  border-top: 1px solid #48494C;
  display: flex;
  justify-content: space-between;
}
.container_footer_edition_socials .edition .title h4 {
  color: #8B8C8D;
  font-size: 14px;
  font-weight: 500;
}
.container_footer_edition_socials .edition .info span {
  color: #fff;
  font-size: 14px;
  font-weight: 400;
}
.container_footer_edition_socials .socials .title h4 {
  color: #8B8C8D;
  font-size: 14px;
  font-weight: 500;
}
.container_footer_edition_socials .socials ul {
  display: flex;
}
.container_footer_edition_socials .socials ul li a {
  color: #fff;
  font-size: 14px;
  font-weight: 400;
}
.container_footer_edition_socials .socials ul li a#underline::after {
  height: 1px;
}
.container_footer_edition_socials .socials ul li:not(:last-child) {
  margin-right: 10px;
}
/* FIN FOOTER */
/*test*/

:root {
  --text-dim-dark: rgba(255,255,255,0.25);
  --text-bright-dark: #ffffff;
  --text-dim-light: rgba(0,0,0,0.3);
  --text-bright-light: #000000;
}

section#about section {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 4rem 2rem;
  position: relative;
  width: 100%;
  transition: background-color 0.4s ease, color 0.4s ease;
}

/* About Me sections */
.about-me section.dark {
  background-color: #000;
  color: var(--text-dim-dark);
}

.about-me section.light {
  background-color: #fff;
  color: var(--text-dim-light);
}

figure {
  max-width: 900px;
  width: 100%;
  padding: 2rem;
  text-align: center;
}

p.js-split-letters {
  font-size: clamp(1.8rem, 4vw, 3.6rem);
  line-height: 1.1;
  font-weight: 600;
  margin: 0;
  letter-spacing: -0.02em;
  overflow: visible;
  display: inline-block;
}
.word { display: inline-block; }
.char { display: inline-block; will-change: color; transition: color 0.3s ease; }
.space { display: inline-block; width: 0.35em; }

figcaption { font-size: 1rem; opacity: 0.6; margin-top: 1rem; }

.cta {
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
section.light:last-of-type .cta {
  background: linear-gradient(135deg, #6a5af9, #43e97b);
  color: #fff;
  font-size: 1.1rem;
  padding: 1rem 1.5rem;
  box-shadow: 0 8px 20px rgba(0,0,0,0.25);
  transform: translateY(20px);
  opacity: 0;
  transition: transform 0.3s ease, opacity 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
}

section.light:last-of-type .cta:hover {
  transform: translateY(0) scale(1.05);
  box-shadow: 0 12px 25px rgba(0,0,0,0.35);
  background: linear-gradient(135deg, #7b61ff, #4af488);
}
</style>
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
<section id="home">
            <div class="container_home">
                <div class="container_home_image">
                    <img src="assets/img/matthieuAfane1.png" alt="photo_Matthieu_Afane">
                </div>
                <div class="container_home_intro">
                    <div class="intro">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"><path d="m256-240-56-56 384-384H240v-80h480v480h-80v-344L256-240Z"/></svg>
                        <h2>Web developer</h2>
                    </div>
                    <div class="social-icons">
                        <ul>
                            <li>
                                <a title="mon github" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="Github-Logo-2--Streamline-Logos" height="24" width="24">
                                        <path d="M11.996 1.284a10.986 10.986 0 0 0 -3.472 21.412c0.548 0.095 0.722 -0.227 0.722 -0.517 0 -0.263 0.006 -0.991 0 -1.91 -3.057 0.662 -3.688 -1.448 -3.688 -1.448a2.907 2.907 0 0 0 -1.22 -1.607c-0.997 -0.682 0.075 -0.669 0.075 -0.669a2.307 2.307 0 0 1 1.683 1.131 2.34 2.34 0 0 0 3.197 0.914 2.34 2.34 0 0 1 0.697 -1.464c-2.439 -0.279 -5.004 -1.22 -5.004 -5.432a4.248 4.248 0 0 1 1.132 -2.948 3.942 3.942 0 0 1 0.107 -2.907s0.924 -0.295 3.02 1.128a10.402 10.402 0 0 1 5.503 0c2.102 -1.422 3.018 -1.128 3.018 -1.128 0.405 0.92 0.444 1.96 0.109 2.907a4.243 4.243 0 0 1 1.13 2.95c0 4.223 -2.569 5.15 -5.016 5.42a2.604 2.604 0 0 1 0.752 2.026v3.041c0 0.294 0.177 0.619 0.735 0.512a10.986 10.986 0 0 0 -3.48 -21.411Z" stroke-width="1"></path>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a title="mon linkedin" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="Linkedin-Logo--Streamline-Logos" height="24" width="24">
                                        <path fill-rule="evenodd" d="M3.5 6a2.5 2.5 0 1 0 0 -5 2.5 2.5 0 0 0 0 5ZM6 23V8H1v15h5ZM8 8h4.5v1.946C13.216 9.005 14.746 8 17.5 8c4.33 0 5.5 4.32 5.5 7v8h-5v-8c0 -1 -0.5 -3 -2.5 -3 -1.42 0 -2.42 1.008 -3 1.951V23H8V8Z" clip-rule="evenodd" stroke-width="1"></path>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a title="mon twitter" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="Twitter-Logo-1--Streamline-Logos" height="24" width="24">
                                        <path d="M1 19c15.617 6.062 20.038 -5.025 19.905 -10.5C22.173 8.156 23 7.292 23 6.406c-1.048 0.55 -1.595 0.394 -2.119 0 1.128 -0.768 1.071 -1.863 1.071 -2.619 -0.527 0.277 -1.503 0.96 -2.619 1.048 -0.745 -1.166 -2.619 -2.095 -5.238 -1.048 -2.619 1.048 -3.143 3.842 -2.619 5.238 -3.352 0 -7.333 -3.492 -8.905 -5.238 -1.883 2.688 0.5 5.353 1.572 6.286 -0.715 0.214 -1.572 0 -2.095 -0.524 0 2.991 2.619 4.19 3.666 4.715H3.62c0 2.095 2.444 2.968 3.667 3.142 -0.838 0.838 -4.215 1.596 -6.286 1.596Z" stroke-width="1"></path>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a title="mon e-mail" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="Google-Mail-Logo--Streamline-Logos" height="24" width="24">
                                    <path fill-rule="evenodd" d="M1 6.5A2.5 2.5 0 0 1 3.5 4h0.782a2.5 2.5 0 0 1 1.442 0.458l1.276 0.9v7.514L1 8.437V6.5Zm0 3.802V20h6v-5.263l-6 -4.435Zm16 4.435V20h6v-9.698l-6 4.435Zm6 -6.3V6.5A2.5 2.5 0 0 0 20.5 4h-0.782a2.5 2.5 0 0 0 -1.442 0.458l-1.276 0.9v7.514l6 -4.435Zm-7.5 -2.02L12 8.888l-3.5 -2.47v7.562l3.5 2.587 3.5 -2.587V6.417Z" clip-rule="evenodd" stroke-width="1"></path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="container_home_element">
                    <div class="wrapper">
                        <div class="name_wrap">
                            <h1>Matthieu Afane<span class="spacer">—</span></h1>
                        </div>
                        <div class="name_wrap">
                            <h1>Matthieu Afane<span class="spacer">—</span></h1>
                        </div>
                    </div>
                </div>
            </div>
</section>
<div class="myStackAbout">

  <!-- HOME -->


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
<section id="work">
            <div class="container_work">
                <div class="container_work_header">
                    <div class="container_work_header_title">
                        <h2>Work</h2>
                    </div>
                    <div class="container_work_header_display">
                        <button type="button">=</button>
                        <button type="button">O</button>
                    </div>
                </div>
                <div class="container_work_content">
                    <figure class="work_template">
                        <a href="#" class="work_template_link">
                            <div class="work_template_image_more">
                                <img src="https://assets.awwwards.com/awards/submissions/2025/08/68af13d98621f852628699.jpg" alt="">
                            </div>
                            
                            <div class="work_template_info">
                                <div class="work_template_info_header">
                                    <h4 class="technology">HTML • CSS • JS • PHP</h4>
                                    <h4 class="date">2024</h4>
                                </div>
                                <div class="work_template_info_content">
                                    <div class="work_template_info_content_title">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z"/></svg>
                                        <h3>TWICE</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </figure>
                    <figure class="work_template">
                        <a href="#" class="work_template_link">
                            <div class="work_template_image_more">
                                <img src="https://assets.awwwards.com/awards/media/cache/thumb_440_330/submissions/2025/07/688443b774d62163098050.jpg" alt="">
                            </div>
                            
                            <div class="work_template_info">
                                <div class="work_template_info_header">
                                    <h4 class="technology">HTML • CSS • JS • PHP</h4>
                                    <h4 class="date">2024</h4>
                                </div>
                                <div class="work_template_info_content">
                                    <div class="work_template_info_content_title">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z"/></svg>
                                        <h3>HONDA</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </figure>
                    <figure class="work_template">
                        <a href="#" class="work_template_link">
                            <div class="work_template_image_more">
                                <img src="https://assets.awwwards.com/awards/media/cache/thumb_440_330/submissions/2025/07/688443b774d62163098050.jpg" alt="">
                            </div>
                            
                            <div class="work_template_info">
                                <div class="work_template_info_header">
                                    <h4 class="technology">HTML • CSS • JS • PHP</h4>
                                    <h4 class="date">2024</h4>
                                </div>
                                <div class="work_template_info_content">
                                    <div class="work_template_info_content_title">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z"/></svg>
                                        <h3>HONDA</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </figure>
                    <figure class="work_template">
                        <a href="#" class="work_template_link">
                            <div class="work_template_image_more">
                                <img src="https://assets.awwwards.com/awards/submissions/2025/08/68af13d98621f852628699.jpg" alt="">
                            </div>
                            
                            <div class="work_template_info">
                                <div class="work_template_info_header">
                                    <h4 class="technology">HTML • CSS • JS • PHP</h4>
                                    <h4 class="date">2024</h4>
                                </div>
                                <div class="work_template_info_content">
                                    <div class="work_template_info_content_title">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z"/></svg>
                                        <h3>TWICE</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </figure>
                </div>
            </div>
        </section>
<!-- GSAP -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script>
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


  // test
  gsap.registerPlugin(ScrollTrigger);

  const aboutSections = document.querySelectorAll('.about-me section');

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

  document.querySelectorAll('.js-split-letters').forEach(el => splitWordsAndChars(el));

  // Lettres animées
  document.querySelectorAll('.js-split-letters').forEach(el => {
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
  gsap.to('.cta', {
    opacity: 1,
    y: 0,
    duration: 1,
    ease: "power3.out",
    scrollTrigger: {
      trigger: '.cta',
      start: "top 85%",
      toggleActions: "play none none none"
    }
  });
});
</script>
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