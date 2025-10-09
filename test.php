<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Fullscreen Overlay Responsive Navigation Menu Using GSAP</title>
		<link rel="stylesheet" type="text/css" href="styles.css" />
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
<style>
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
</style>
    <style>
@import url('assets/css/clash-display.css');
@import url('assets/css/general-sans.css');
      * {
	/* font-family: "Neue Montreal"; */
	font-weight: 400;
}

body {
	margin: 0;
	background: #161616;
  font-family: 'GeneralSans-Variable', sans-serif;
}

.menu {
	color: #fff;
}

.menu-open,
.menu-close {
	position: absolute;
	top: 0;
	right: 0;
	padding: 40px;
	font-size: 20px;
	cursor: pointer;
}

.socials {
	position: absolute;
	bottom: 40px;
	left: 5%;
}

.socials ul {
  display: flex;
}

.socials ul li a {
	text-transform: uppercase;
	margin: 0 20px;
	letter-spacing: 0px;
  font-weight: 500;
  color: #1c1d20;
}

.socials ul li a:not(last-child) {
  margin-right: 20px
}

.container_nav {
	position: fixed;
	left: -100%;
	width: 100%;
	height: 100vh;
	background: #fff;
  padding: 40px 5%;
}

.container_nav_header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
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

.contaier_menu {
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
    </style>
	</head>

	<body>
		<div class="menu">menu</div>
    
		<div class="container_nav">
			<div class="container_nav_header">
            <div class="logo">
                <span>©</span>
                <span>Code by Matthieu</span>
            </div>
            <div class="container_bouton_nav">
                <button id="elastic" class="close" type="button">
                    <span class="button_text">Close</span>
                    <div class="button_filler"></div>
                </button>
            </div>
        </div>
			<div class="socials">
				<ul>
          <li><a id="underline" href="#">GitHub</a></li>
          <li><a id="underline" href="#">Twitter</a></li>
          <li><a id="underline" href="#">Instagrame</a></li>
          <li><a id="underline" href="#">LinKedin</a></li>
        </ul>
			</div>
			<nav class="contaier_menu">
				<div class="menu__item">
					<a class="menu__item-link">Home</a>
					<img class="menu__item-img" src="menu-img-one.jpg" />
					<div class="marquee">
						<div class="marquee__inner">
							<span>Home - Home - Home - Home - Home - Home - Home</span>
						</div>
					</div>
				</div>
				<div class="menu__item">
					<a class="menu__item-link">Work</a>
					<img class="menu__item-img" src="menu-img-two.jpg" />
					<div class="marquee">
						<div class="marquee__inner">
							<span>Work - Work - Work - Work - Work - Work - Work</span>
						</div>
					</div>
				</div>
				<div class="menu__item">
					<a class="menu__item-link">About</a>
					<img class="menu__item-img" src="menu-img-three.jpg" />
					<div class="marquee">
						<div class="marquee__inner">
							<span>About - About - About - About - About - About - About</span>
						</div>
					</div>
				</div>
				<div class="menu__item">
					<a class="menu__item-link">Contact</a>
					<img class="menu__item-img" src="menu-img-four.jpg" />
					<div class="marquee">
						<div class="marquee__inner">
							<span>Contact - Contact - Contact - Contact - Contact - Contact - Contact</span>
						</div>
					</div>
				</div>
			</nav>
		</div>
		<script>
			var t1 = new TimelineMax({ paused: true });

			t1.to(".container_nav", 1, {
				left: 0,
				ease: Expo.easeInOut,
			});

			t1.staggerFrom(
				".contaier_menu > div",
				0.8,
				{ y: 100, opacity: 0, ease: Expo.easeOut },
				"0.1",
				"-=0.4"
			);

			t1.staggerFrom(
				".socials",
				0.8,
				{ y: 100, opacity: 0, ease: Expo.easeOut },
				"0.4",
				"-=0.6"
			);

t1.reverse();

document.querySelectorAll('.menu, .close').forEach(btn => {
  btn.addEventListener('click', () => {
    t1.reversed(!t1.reversed());
  });
});

		</script>
	</body>
</html>