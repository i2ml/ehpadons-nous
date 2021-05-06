<?php

/**
 * Template Name: Liste des spectacles d'une sous-edition
 */

global $post;
get_header('compiled');


?>
<style>
@keyframes heartbeat {
  0% {
    transform: scale(0);
  }
  25% {
    transform: scale(1.2);
  }
  50% {
    transform: scale(1);
  }
  75% {
    transform: scale(1.2);
  }
  100% {
    transform: scale(1);
  }
}


.slider-container {
  position: relative;
  margin: 0 auto;
  width: 600px;
  height: 400px;
}
.slider-container .slider-content {
  position: relative;
  left: 50%;
  top: 50%;
  width: 70%;
  height: 60%;
  transform: translate(-50%, -50%);
  
}
.slider-container2 {
  position: relative;
  margin: 0 auto;
  width: 600px;
  height: 400px;
}
.slider-container2 .slider-content2 {
  position: relative;
  left: 50%;
  top: 50%;
  width: 70%;
  height: 60%;
  transform: translate(-50%, -50%);
  
}
.slider-container .slider-content .slider-single {
  position: absolute;
  z-index: 0;
  padding-left:2%;
  padding-right:2%;
  top: 0;
  width: 100%;
  height: 100%;
  transition: z-index 0ms 250ms;
}
.slider-container .slider-content .slider-single .slider-single-image {
  position: relative;
  left: 0;
  top: 0;
  width: 100%;
  height: 80%;
  
  box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.2);
  transition: 500ms cubic-bezier(0.17, 0.67, 0.55, 1.43);
  transform: scale(0);
  opacity: 0;
  background-color: white;
  
}
.slider-container .slider-content .slider-single .slider-single-download {
  position: absolute;
  display: block;
  right: -22px;
  bottom: 12px;
  padding: 15px;
  color: #333333;
  background-color: #fdc84b;
  font-size: 18px;
  font-weight: 600;
  font-family: "karla";
  border-radius: 5px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
  transition: 500ms cubic-bezier(0.17, 0.67, 0.55, 1.43);
  opacity: 1;
}
.slider-container .slider-content .slider-single .slider-single-download:hover, .slider-container .slider-content .slider-single .slider-single-download:focus {
  outline: none;
  text-decoration: none;
}
.slider-container .slider-content .slider-single .slider-single-title {
  display: block;
  float: left;
  margin: 16px 0 0 20px;
  font-size: 20px;
  font-family: "karla";
  font-weight: 400;
  color: black;
  transition: 500ms cubic-bezier(0.17, 0.67, 0.55, 1.43);
  opacity: 0;
}
.slider-container .slider-content .slider-single .slider-single-likes {
  display: block;
  float: right;
  margin: 16px 20px 0 0;
  transition: 500ms cubic-bezier(0.17, 0.67, 0.55, 1.43);
  opacity: 0;
}
.slider-container .slider-content .slider-single .slider-single-likes i {
  font-size: 20px;
  display: inline-block;
  vertical-align: middle;
  margin-right: 5px;
  color: #ff6060;
  transition: 500ms cubic-bezier(0.17, 0.67, 0.55, 1.43);
  transform: scale(0);
}
.slider-container .slider-content .slider-single .slider-single-likes p {
  display: inline-block;
  vertical-align: middle;
  margin: 0;
  color: #ffffff;
}
.slider-container .slider-content .slider-single .slider-single-likes:hover, .slider-container .slider-content .slider-single .slider-single-likes:focus {
  outline: none;
  text-decoration: none;
}
.slider-container .slider-content .slider-single.preactivede .slider-single-image {
  transform: translateX(-50%) scale(0);
}
.slider-container .slider-content .slider-single.preactive {
  z-index: 1;
}
.slider-container .slider-content .slider-single.preactive .slider-single-image {
  opacity: 0.3;
  transform: translateX(-25%) scale(0.8);
}
.slider-container .slider-content .slider-single.preactive .slider-single-download {
  transform: translateX(-150px);
}
.slider-container .slider-content .slider-single.preactive .slider-single-title {
  transform: translateX(-150px);
}
.slider-container .slider-content .slider-single.preactive .slider-single-likes {
  transform: translateX(-150px);
}
.slider-container .slider-content .slider-single.proactive {
  z-index: 1;
}
.slider-container .slider-content .slider-single.proactive .slider-single-image {
  opacity: 0.3;
  transform: translateX(25%) scale(0.8);
}
.slider-container .slider-content .slider-single.proactive .slider-single-download {
  transform: translateX(150px);
}
.slider-container .slider-content .slider-single.proactive .slider-single-title {
  transform: translateX(150px);
}
.slider-container .slider-content .slider-single.proactive .slider-single-likes {
  transform: translateX(150px);
}
.slider-container .slider-content .slider-single.proactivede .slider-single-image {
  transform: translateX(50%) scale(0);
}
.slider-container .slider-content .slider-single.active {
  z-index: 2;
}
.slider-container .slider-content .slider-single.active .slider-single-image {
  opacity: 1;
  transform: translateX(0%) scale(1);
}
.slider-container .slider-content .slider-single.active .slider-single-download {
  opacity: 1;
  transition-delay: 100ms;
  transform: translateX(0px);
}
.slider-container .slider-content .slider-single.active .slider-single-title {
  opacity: 1;
  transition-delay: 200ms;
  transform: translateX(0px);
}
.slider-container .slider-content .slider-single.active .slider-single-likes {
  opacity: 1;
  transition-delay: 300ms;
  transform: translateX(0px);
}
.slider-container .slider-content .slider-single.active .slider-single-likes i {
  animation-name: heartbeat;
  animation-duration: 500ms;
  animation-delay: 900ms;
  animation-interation: 1;
  animation-fill-mode: forwards;
}
.slider-container .slider-left {
  position: absolute;
  z-index: 3;
  display: block;
  right: 99%;
  top: 50%;
  color: black;
  transform: translateY(-50%);
  padding: 20px 15px;
  
  margin-right: -2px;
}
.slider-container .slider-right {
  position: absolute;
  z-index: 3;
  display: block;
  left: 99%;
  top: 50%;
  color: black;
  transform: translateY(-50%);
  padding: 20px 15px;
  
  margin-left: -2px;
}

.slider-container .not-visible {
  display: none !important;
}
@media screen and (max-width:1080px){
  .slider-container .slider-left{
    display:none;
  }
  .slider-container .slider-right {
    display:none;
  }
  .slider-container {
  position: relative;
  margin: 0 auto;
  width: 200px;
  height: 200px;
padding-bottom: 50px;
background-color: white;
  
}

.slider-container .slider-content .slider-single .slider-single-title {
  display: block;
  float: left;
  margin: 16px 0 0 20px;
  font-size: 10px;
  font-family: "karla";
  font-weight: 400;
  color: black;
  transition: 500ms cubic-bezier(0.17, 0.67, 0.55, 1.43);
  opacity: 0;
}

}
  </style>



    <div class="page-container page__programme">

        <?php get_view('page-intro');

            $sousedition = get_post($_GET["sous-edition"]);
            $directionartistique = get_field("direction_artistique",$sousedition->ID);
            $nomSousEdition = get_field("region",$sousedition->ID);
        ?>
        <div class="page-intro-introduction">
            <p>Retrouvez ici la <b>programmation éclectique</b> : musique classique, jazz, musique française, flamenco, tango, electro et hip-hop</p>
            <p>Direction artistique : <?= $directionartistique?></p>
        </div>
        <div class="page__programme-list">
            <?php
            $spectacles = get_posts([
                'post_type' => 'spectacle',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ]);
            foreach ($spectacles as $spectacle) {
                if (get_field('sousedition', $spectacle->ID)->ID == $_GET["sous-edition"]){
                    get_view('spectaclePreview');
               }
            }
            ?>
        </div>
    </div>
    <div class="prefooter">
        <div class="prefooter-container">
            <div class="inner">
                <?php
                    $partenaires = get_posts([
                    'post_type' => 'Partenaire',
                    'posts_per_page' => -1,
                    'orderby' => 'post_title',
                    'order' => 'DESC'
                    ]);
                    $partenariats = get_posts([
                        'post_type' => 'Partenariat',
                        'posts_per_page' => -1,
                        'orderby' => 'post_title',
                        'order' => 'DESC'
                    ]);
                    $compteur = 0;
                    foreach($partenariats as $partenariat){$compteur += 1;}
                    if($compteur == 0){
                ?>
                            <h3 class="prefooter-title">Aucun partenaires pour la Sous édition <?= $nomSousEdition ?></h3>
                            <?php
                        }else{
                            ?>
                            <h3 class="prefooter-title">Les partenaires de la Sous édition <?= $nomSousEdition ?></h3>
                            <?php
                        if($compteur == 1){?>
                            <div class="slider-container2">

                            <div class="slider-content2">
                            <?php
                            $partenaire = get_field("partenaire",$partenariat->ID);
                            $visual = get_fields($partenaire->ID)['logo'];
                            $description = get_fields($partenaire->ID)['description'];
                            $url = get_fields($partenaire->ID)['site'];
                            ?>
                            
                            
                                
                                <a href="<?php echo $url ?>" target="_blank" rel="noreferrer">
                                    <img class="imageSeule" src="<?php echo $visual ?>"  >
                                </a>
                                <h1 class="textSeul"><?php echo $description ?></h1>
                            </div>
                            </div>
                            <?php
                        }else{?>
                        <div class="slider-container">

                            <div class="slider-content">
                        <?php

                        foreach($partenariats as $partenariat){
                            if(get_field("sous-edition",$partenariat->ID)->ID == $_GET["sous-edition"] && $compteur >1){
                                $partenaire = get_field("partenaire",$partenariat->ID);
                                $visual = get_fields($partenaire->ID)['logo'];
                                $description = get_fields($partenaire->ID)['description'];
                                $url = get_fields($partenaire->ID)['site'];
                                ?>
                                
                                <div class="slider-single">
                                    
                                    <a href="<?php echo $url ?>" target="_blank" rel="noreferrer">
                                        <img class="slider-single-image" src="<?php echo $visual ?>"  >
                                    </a>
                                    <h1 class="slider-single-title"><?php echo $description ?></h1>
                                </div>            
                                <?php
                                }
                            }
                            
                            
                            ?>
                            </div>
                        </div>
                        <?php
                        }
                        }
                        ?>
            </div>
        </div>
    </div>

      <footer class="footer">
        <div class="inner">
          <div class="footer-organizer">
            <span>organisé par :</span>
            <a href="http://www.i2ml.fr/" target="_blank" title="le Festival EHPAD'ons-nous! est organisé par la fondation i2ml">
              <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/logo-i2ml.png" alt="Logo i2ml">
            </a>
          </div>
          <div class="footer-nav">
            <? wp_nav_menu(['theme_location' => 'footer', 'container' => false, 'menu_class' => 'footer-menu']) ?>
            <hr>
            <a href="https://www.facebook.com/EHPADONSNOUS/" target="_blank" class="footer-social">
              <? icon('facebook') ?>
              Suivez nous !
            </a>
          </div>
        </div>
      </footer>

		</div><!-- .wrapper -->

		<div class="dialog" id="dialog">
		  <div class="dialog-inner">
		    <div class="dialog-mask" data-dialog="close"></div>
		    <div class="dialog-body"></div>
		  </div>
		</div>

		<div id="svg-store"><!-- inject:svg --><!-- endinject --></div>

		<? wp_footer() ?>
		<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/jquery.min.js"></script>
		<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/lodash.min.js"></script>
		<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/glide.min.js"></script>
		<script src="<?= get_stylesheet_directory_uri() ?>/app.js<%= killCache %>"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167999934-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-167999934-1');
    </script>


    <script>

const repeat = true;
const noArrows = false;
const noBullets = false;


const container = document.querySelector(".slider-container");
var slide = document.querySelectorAll(".slider-single");
var slideTotal = slide.length - 1;
var slideCurrent = -1;

function initBullets() {
  if (noBullets) {
    return;
  }
  const bulletContainer = document.createElement("div");
  bulletContainer.classList.add("bullet-container");
  slide.forEach((elem, i) => {
    const bullet = document.createElement("div");
    bullet.classList.add("bullet");
    bullet.id = `bullet-index-${i}`;
    bullet.addEventListener("click", () => {
      goToIndexSlide(i);
    });
    bulletContainer.appendChild(bullet);
    elem.classList.add("proactivede");
  });
  container.appendChild(bulletContainer);
}

function initArrows() {
  if (noArrows) {
    return;
  }
  const leftArrow = document.createElement("a");
  const iLeft = document.createElement("i");
  iLeft.classList.add("fa");
  iLeft.classList.add("fa-arrow-left");
  leftArrow.classList.add("slider-left");
  leftArrow.appendChild(iLeft);
  leftArrow.addEventListener("click", () => {
    slideLeft();
  });
  const rightArrow = document.createElement("a");
  const iRight = document.createElement("i");
  iRight.classList.add("fa");
  iRight.classList.add("fa-arrow-right");
  rightArrow.classList.add("slider-right");
  rightArrow.appendChild(iRight);
  rightArrow.addEventListener("click", () => {
    slideRight();
  });
  container.appendChild(leftArrow);
  container.appendChild(rightArrow);
}

function slideInitial() {
  
  /*initBullets();*/
  initArrows();
  setTimeout(function () {
    slideRight();
  }, 500);
  const interval = setInterval(function () {
    slideRight();
  }, 5000);
}

function updateBullet() {
  if (!noBullets) {
    document
      .querySelector(".bullet-container")
      .querySelectorAll(".bullet")
      .forEach((elem, i) => {
        elem.classList.remove("active");
        if (i === slideCurrent) {
          elem.classList.add("active");
        }
      });
  }
  checkRepeat();
}

function checkRepeat() {
  if (!repeat) {
    if (slideCurrent === slide.length - 1) {
      slide[0].classList.add("not-visible");
      slide[slide.length - 1].classList.remove("not-visible");
      if (!noArrows) {
        document.querySelector(".slider-right").classList.add("not-visible");
        document.querySelector(".slider-left").classList.remove("not-visible");
      }
    } else if (slideCurrent === 0) {
      slide[slide.length - 1].classList.add("not-visible");
      slide[0].classList.remove("not-visible");
      if (!noArrows) {
        document.querySelector(".slider-left").classList.add("not-visible");
        document.querySelector(".slider-right").classList.remove("not-visible");
      }
    } else {
      slide[slide.length - 1].classList.remove("not-visible");
      slide[0].classList.remove("not-visible");
      if (!noArrows) {
        document.querySelector(".slider-left").classList.remove("not-visible");
        document.querySelector(".slider-right").classList.remove("not-visible");
      }
    }
  }
}

function slideRight() {
  if (slideCurrent < slideTotal) {
    slideCurrent++;
  } else {
    slideCurrent = 0;
  }

  if (slideCurrent > 0) {
    var preactiveSlide = slide[slideCurrent - 1];
  } else {
    var preactiveSlide = slide[slideTotal];
  }
  var activeSlide = slide[slideCurrent];
  if (slideCurrent < slideTotal) {
    var proactiveSlide = slide[slideCurrent + 1];
  } else {
    var proactiveSlide = slide[0];
  }

  slide.forEach((elem) => {
    var thisSlide = elem;
    if (thisSlide.classList.contains("preactivede")) {
      thisSlide.classList.remove("preactivede");
      thisSlide.classList.remove("preactive");
      thisSlide.classList.remove("active");
      thisSlide.classList.remove("proactive");
      thisSlide.classList.add("proactivede");
    }
    if (thisSlide.classList.contains("preactive")) {
      thisSlide.classList.remove("preactive");
      thisSlide.classList.remove("active");
      thisSlide.classList.remove("proactive");
      thisSlide.classList.remove("proactivede");
      thisSlide.classList.add("preactivede");
    }
  });
  preactiveSlide.classList.remove("preactivede");
  preactiveSlide.classList.remove("active");
  preactiveSlide.classList.remove("proactive");
  preactiveSlide.classList.remove("proactivede");
  preactiveSlide.classList.add("preactive");

  activeSlide.classList.remove("preactivede");
  activeSlide.classList.remove("preactive");
  activeSlide.classList.remove("proactive");
  activeSlide.classList.remove("proactivede");
  activeSlide.classList.add("active");

  proactiveSlide.classList.remove("preactivede");
  proactiveSlide.classList.remove("preactive");
  proactiveSlide.classList.remove("active");
  proactiveSlide.classList.remove("proactivede");
  proactiveSlide.classList.add("proactive");

  updateBullet();
}

function slideLeft() {
  if (slideCurrent > 0) {
    slideCurrent--;
  } else {
    slideCurrent = slideTotal;
  }

  if (slideCurrent < slideTotal) {
    var proactiveSlide = slide[slideCurrent + 1];
  } else {
    var proactiveSlide = slide[0];
  }
  var activeSlide = slide[slideCurrent];
  if (slideCurrent > 0) {
    var preactiveSlide = slide[slideCurrent - 1];
  } else {
    var preactiveSlide = slide[slideTotal];
  }
  slide.forEach((elem) => {
    var thisSlide = elem;
    if (thisSlide.classList.contains("proactive")) {
      thisSlide.classList.remove("preactivede");
      thisSlide.classList.remove("preactive");
      thisSlide.classList.remove("active");
      thisSlide.classList.remove("proactive");
      thisSlide.classList.add("proactivede");
    }
    if (thisSlide.classList.contains("proactivede")) {
      thisSlide.classList.remove("preactive");
      thisSlide.classList.remove("active");
      thisSlide.classList.remove("proactive");
      thisSlide.classList.remove("proactivede");
      thisSlide.classList.add("preactivede");
    }
  });

  preactiveSlide.classList.remove("preactivede");
  preactiveSlide.classList.remove("active");
  preactiveSlide.classList.remove("proactive");
  preactiveSlide.classList.remove("proactivede");
  preactiveSlide.classList.add("preactive");

  activeSlide.classList.remove("preactivede");
  activeSlide.classList.remove("preactive");
  activeSlide.classList.remove("proactive");
  activeSlide.classList.remove("proactivede");
  activeSlide.classList.add("active");

  proactiveSlide.classList.remove("preactivede");
  proactiveSlide.classList.remove("preactive");
  proactiveSlide.classList.remove("active");
  proactiveSlide.classList.remove("proactivede");
  proactiveSlide.classList.add("proactive");

  updateBullet();
}

function goToIndexSlide(index) {
  const sliding = slideCurrent > index ? () => slideRight() : () => slideLeft();
  while (slideCurrent !== index) {
    sliding();
  }
}

slideInitial();

    </script>
    <script src="https://kit.fontawesome.com/5a9d4b2eb4.js" crossorigin="anonymous"></script>