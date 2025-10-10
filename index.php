<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <div class="logo">
            <span>©</span>
            <span>Code by Matthieu</span>
        </div>
        <div class="container_nav_home">
                <nav>
                    <ul>
                        <li><a id="underline" href="#">Home</a></li>
                        <li><a id="underline" href="#">Work</a></li>
                        <li><a id="underline" href="#">About</a></li>
                        <li><a id="underline" href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>
        <div class="container_bouton_header">
            <button id="elastic" class="menu" type="button">
               <span class="button_text">Menu</span>
                <div class="button_filler"></div>
            </button>
        </div>
    </header>
    <!-- <div class="container_nav">
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
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Work</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div class="container_social">
            <div class="container_social_title">
                <span>Socials & mail</span>
            </div>
            <div class="container_social_info">
                <span>matthieu.afane@gmail.com</span>
                <ul>
                    <li><a href="#">GitHub</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagrame</a></li>
                    <li><a href="#">LinKedin</a></li>
                </ul>
            </div>
        </div>
    </div> -->
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
                <li><a id="underline" href="#">GitHub</span></a></li>
                <li><a id="underline" href="#">Twitter</a></li>
                <li><a id="underline" href="#">Instagram</a></li>
                <li><a id="underline" href="#">LinkedIn</a></li>
            </ul>
		</div>
		<nav class="container_menu">
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
    <main>
        <section id="home">
            <div class="container_home">
                <div class="container_home_image">
                    <img src="assets/img/matthieuAfane1.png" alt="photo_Matthieu_Afane">
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
                
                
            </div>
        </section>
        <section id="work">
            <div class="container_work">
                <div class="container_work_header">
                    <div class="container_work_header_title">
                        <h2>Work</h2>
                    </div>
                    <div class="contaier_work_header_display">
                        <button type="button">=</button>
                        <button type="button">O</button>
                    </div>
                </div>
                <div class="container_work_content">
                    <figure class="work_template">
                        <div class="work_template_image_more">
                            <a href="#" class="work_template_image">
                                <img src="https://tse4.mm.bing.net/th/id/OIP.tU1NAZ2vUoqqNIMhyPuV0QHaF2?cb=12&rs=1&pid=ImgDetMain&o=7&rm=3" alt="">
                            </a>
                            <div class="overlay"></div> <!-- filtre sombre -->
                            <div class="work_template_more">
                                    <a class="code" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h240l80 80h320q33 0 56.5 23.5T880-640v400q0 33-23.5 56.5T800-160H160Zm0-80h640v-400H447l-80-80H160v480Zm0 0v-480 480Z"/></svg>
                                        <span>Source code</span>
                                    </a>
                                    <a class="view" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="#fff"><path d="m256-240-56-56 384-384H240v-80h480v480h-80v-344L256-240Z"/></svg>
                                    </a>
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
                    <figure class="work_template">
                        <div class="work_template_image">
                            <img src="https://tse4.mm.bing.net/th/id/OIP.tU1NAZ2vUoqqNIMhyPuV0QHaF2?cb=12&rs=1&pid=ImgDetMain&o=7&rm=3" alt="">
                        </div>
                        <div class="work_template_info">
                            <div class="work_template_info_header">
                                <div class="work_template_info_header_title">
                                    <h3>TWICE</h3>
                                </div>
                                <div class="work_template_info_header_more">
                                    <a href="#">View</a>
                                    <a href="#">Code source</a>
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
                    <figure class="work_template">
                        <div class="work_template_image">
                            <img src="https://tse4.mm.bing.net/th/id/OIP.tU1NAZ2vUoqqNIMhyPuV0QHaF2?cb=12&rs=1&pid=ImgDetMain&o=7&rm=3" alt="">
                        </div>
                        <div class="work_template_info">
                            <div class="work_template_info_header">
                                <div class="work_template_info_header_title">
                                    <h3>TWICE</h3>
                                </div>
                                <div class="work_template_info_header_more">
                                    <a href="#">View</a>
                                    <a href="#">Code source</a>
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
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container_footer">
            <div class="container_footer_header">
                <div class="image">
                    <img src="assets/img/matthieuAfane.png" alt="moi">
                </div>
                <div class="text">
                    <h2>Let's work together</h2>
                </div>
            </div>
            <div class="container_footer_content">
                <div class="container_button">
                    <button type="button">
                        <span class="button_text">matthieu.afane@gmail.com</span>
                        <div class="button_filler"></div>
                    </button>
                    <button type="button">
                        <span class="button_text">+33 07 71 83 21 41</span>
                        <div class="button_filler"></div>
                    </button>
                </div>

            </div>
            <div class="container_footer_edition_socials">
                <div class="edition">
                    <div class="title">
                        <h4>Edition</h4>
                    </div>
                    <div class="info">
                        <span>© 2025 matthieuafane.free.nf</span>
                    </div>
                </div>
                <div class="socials">
                    <div class="title">
                        <h4>Socials</h4>
                    </div>
                    <ul>
                        <li><a id="underline" href="#">GitHub</a></li>
                        <li><a id="underline" href="#">Twitter</a></li>
                        <li><a id="underline" href="#">Instagrame</a></li>
                        <li><a id="underline" href="#">LinKedin</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <!-- JS source code -->
    <script src="assets/js/script.js"></script>

</body>
</html>