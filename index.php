<!DOCTYPE HTML>
<!--
	Ethereal by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Portfolio Es sabbani Nasser</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="Portfolio Es sabbani Nasser">
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/css/style.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Wrapper -->
					<div id="wrapper">



						<!-- Panel (Banner) -->
						<section class="panel banner right">
								<div class="content color0 span-3-75">
									<h2 class="major">Bonjour, Es sabbani Nasser,<br />
									Développeur Web et Web Mobile</h2>
									<p>A travers ce portfolio, vous retrouverai differents sites que j'ai réalisé tout au long de l'année 2020 au sein de la formation "Access code school" à Lons le saunier  </p>
									<ul class="actions">
										<li><a href="#first" class="button primary color1 circle icon solid fa-angle-right">Next</a></li>
									</ul>
								</div>
							</section>

						<!-- Panel (Spotlight) -->
							<section class="panel spotlight medium right" id="first">
								<div class="content span-7">
									<h2 class="major">À propos de moi</h2>
									<p>Développeur web curieux, autonome, rigoureux, j'aime les applications simples, rapides et efficaces.
										Un sens de l'écoute et du service renforcé par 2 ans d'expérience à travailler sur des projets variés, une expertise technique en constante progression grâce à une formation perpétuelle. Motivé par le besoin de faire toujours mieux et appuyé par de solides bases acquises lors de mon parcours, je prends plaisir à relever de nouveaux challenges.
									</p>
									<center><a href="cv.jpg" target="_blank"> <input type="button" value="ACCEDER À MON CV"> </a></center>
								</div>
								<div class="image filtered tinted" data-position="top left">
									<img src="images/pic02.jpg" alt="" />
								</div>
							</section>



						<!-- Panel -->
							<section class="panel">
								<div class="intro color2 content span-5 ">
									<h2 class="major">Mon Portfolio</h2>
									<p>Voici les differents sites que j'ai réalisés au cours de mon année de formation :</p>
								<div class="gallery">
									<div class="content span-7">
									<div class="container">
									<div class="col-12 col-md-6">
		<div id="caroussel">
		<div id="slider" class="slider">
  <div class="slider__inner" style="width: 230px;">
    <a href="site/administration/" target="_blank"><img src="images/site/03.jpg" alt="Sunflowers" data-index="1" class="slider__image image--1"></a>
    <a href="site/hertz/" class="hertz" target="_blank"><img src="images/site/02.jpg" alt="Waterfall" data-index="2" class="slider__image image--2"></a>
    <a href="site/burger/" target="_blank"><img src="images/site/01.jpg" alt="River" data-index="3" class="slider__image image--3"></a>
    <img src="https://s1.1zoom.ru/prev2/547/China_Taiwan_Mountains_Forests_Fields_Roads_Night_546672_300x200.jpg" alt="Land" data-index="4" class="slider__image image--4">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/Quba_385.jpg/300px-Quba_385.jpg" alt="Mountains" data-index="5" class="slider__image image--5">
  </div>
  <div class="slider__action">
    <div id="prev" class="slider__button slider__button--prev">
      <i class="fas fa-angle-left"></i>
    </div>
    <div id="next" class="slider__button slider__button--next">
      <i class="fas fa-angle-right"></i>
    </div>
  </div>
</div>
<script>
"use strict";

// forEach FIX for IE 
(function () {
  if ( typeof NodeList.prototype.forEach === "function" ) return false;
  NodeList.prototype.forEach = Array.prototype.forEach;
})();

//document.documentElement.setAttribute("data-agent", navigator.userAgent);

// Slider prototype object
function Slider(element, imageSelector) {
  //Image selector class or default
  this.imageClass = imageSelector || '.slider__image';

  //Array with images in slider
  this.images = element.querySelectorAll(this.imageClass);

  //Previous image
  this.previous = function() {
    this.images.forEach( function img(elem,index) {
      let Index = parseInt(elem.getAttribute('data-index')), IN, addClass;
      if (Index < 5){ IN = Index + 1; } 
      else { IN = 1; }
      addClass = 'image--'+IN;
      elem.className = elem.className.replace(/image--[0-9]/,'');
      elem.setAttribute('data-index', IN);
      elem.classList.add(addClass);

      if (addClass == 'image--1') { elem.classList.add('active'); } 
      else { elem.classList.remove('active'); }
    });
  };

  //Next image
  this.next = function() {
    this.images.forEach(function (elem, index) {
      let Index = parseInt(elem.getAttribute('data-index')), IN, addClass;
      if(Index > 1){ IN = Index - 1; } 
      else { IN = 5; }
      addClass = 'image--'+IN;
      elem.className = elem.className.replace(/image--[0-9]/,'');
      elem.setAttribute('data-index', IN);
      elem.classList.add(addClass);

      if(addClass=='image--1'){ elem.classList.add('active'); } 
      else { elem.classList.remove('active'); }
    });
  };
};

const d = document,
      slider = d.getElementById('slider'),    //Slider container
      next = d.getElementById('next'),        //Next slide button 
      prev = d.getElementById('prev');        //Previous slide button
let isWheel;                                  //Global var for setTimeout

//Creating carousel
let carousel = new Slider(slider);

//Button 
next.addEventListener('click', function(e) { carousel.next(); }, true);
prev.addEventListener('click', function(e) { carousel.previous(); }, true);

//Adding sliding when scroll
slider.addEventListener('wheel', function(e){
  e.preventDefault;

  if (e.deltaY > 0){ carousel.next(); } 
  else { carousel.previous(); }

  //Getting alt text (name) from .active slide
  let active = this.getElementsByClassName('active'),
      name = active[0].getAttribute('alt');

  //Stoping latest timeout
  window.clearTimeout(isWheel);
});

//Adding swipe events to inner slider container
let sliderInner = slider.querySelector('.slider__inner');
swipedetect(sliderInner, function (swipedir) {
  if (swipedir == 'left') { carousel.previous(); }
  if (swipedir == 'right') { carousel.next(); }
});

// Library for swipe detect
// credit: http://www.javascriptkit.com/javatutors/touchevents2.shtml
function swipedetect(el, callback) {
  let touchsurface = el,
      swipedir,
      startX,
      startY,
      distX,
      distY,
      dist,
      threshold = 150, //required min distance traveled to be considered swipe
      restraint = 100, // maximum distance allowed at the same time in perpendicular direction
      allowedTime = 300, // maximum time allowed to travel that distance
      elapsedTime,
      startTime,
      handleswipe = callback || function (swipedir) { }

  touchsurface.addEventListener('touchstart', function(e) {
    let touchobj = e.changedTouches[0]
    swipedir = 'none'
    dist = 0
    startX = touchobj.pageX
    startY = touchobj.pageY
    startTime = new Date().getTime() // record time when finger first makes contact with surface
    e.preventDefault()
  }, false)

  touchsurface.addEventListener('touchmove', function (e) {
    e.preventDefault() // prevent scrolling when inside DIV
  }, false)

  touchsurface.addEventListener('touchend', function (e) {
    let touchobj = e.changedTouches[0]
    distX = touchobj.pageX - startX // get horizontal dist traveled by finger while in contact with surface
    distY = touchobj.pageY - startY // get vertical dist traveled by finger while in contact with surface
    elapsedTime = new Date().getTime() - startTime // get time elapsed
    if (elapsedTime <= allowedTime) { // first condition for awipe met
      if (Math.abs(distX) >= threshold && Math.abs(distY) <= restraint) { // 2nd condition for horizontal swipe met
        swipedir = (distX < 0) ? 'left' : 'right' // if dist traveled is negative, it indicates left swipe
      }
      else if (Math.abs(distY) >= threshold && Math.abs(distX) <= restraint) { // 2nd condition for vertical swipe met
        swipedir = (distY < 0) ? 'up' : 'down' // if dist traveled is negative, it indicates up swipe
      }
    }
    handleswipe(swipedir)
    e.preventDefault()
  }, false)
}
</script>
</div>
		</div>
	</div>
	</div>
									</div>
								</div>
							</section>

						<!-- Panel -->
							<section class="panel color4-alt">
								<div class="intro color4">
									<h2 class="major" id="contact">Contact</h2>
									<p>Pour toute question ou renseignement, n'hesiter pas à me contacter grace au formulaire de contact.</p>
								</div>
								<div class="inner columns divided">
									<div class="span-3-25">
										<form method="post" action="#contact">
											<div class="fields">
												<div class="field half">
													<label for="name">Name</label>
													<input type="text" name="name" id="name" />
												</div>
												<div class="field half">
													<label for="email">Email</label>
													<input type="email" name="email" id="email" />
												</div>
												<div class="field">
													<label for="message">Message</label>
													<textarea name="message" id="message" rows="4"></textarea>
												</div>
											</div>
											<ul class="actions">
												<li><input type="submit" value="Envoyer" class="button primary" /></li>
											</ul>
											<?php
											if(isset($_POST['message'])){
												$entete  = 'MIME-Version: 1.0' . "\r\n";
												$entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
												$entete .= 'From: ' . $_POST['email'] . "\r\n";
										
												$message = '<h1>Message envoyé depuis la page Contact</h1>
												<p><b>Nom : </b>' . $_POST['name'] . '<br>
												<b>Email : </b>' . $_POST['email'] . '<br>
												<b>Message : </b>' . $_POST['message'] . '</p>';
										
												$retour = mail('nasser.39@hotmail.fr', 'Envoi depuis page Contact', $message, $entete);
												if($retour) {
													echo '<p>Votre message a bien été envoyé.</p>';
												}
											}
											?>
										</form>
									</div>
									<div class="span-1-5">
										<ul class="contact-icons color1">
											<li class="icon brands fa-github"><a href="https://github.com/Nasser39170" target="_blank">Github</a></li>
											<li class="icon brands fa-linkedin"><a href="https://fr.linkedin.com/in/nasser-essabbani" target="_blank">Linkedin</a></li>
										</ul>
									</div>
								</div>
							</section>

						<!-- Copyright -->
							<div class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</div>

					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>