<?

/**
 * Template Name: L'accueil
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
.slider-container .bullet-container {
  position: absolute;
  bottom: 10px;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}
.slider-container .bullet-container .bullet {
  margin-right: 14px;
  height: 20px;
  width: 20px;
  border-radius: 50%;
  background-color: white;
  opacity: 0.5;
}
.slider-container .bullet-container .bullet:last-child {
  margin-right: 0px;
}
.slider-container .bullet-container .bullet.active {
  opacity: 1;
}
.slider-container .slider-content {
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
<div class="page__accueil">

  <div class="page__accueil-intro">
    <div class="inner">
      <img class="page__accueil-intro-logo" src="<?= get_stylesheet_directory_uri() ?>/assets/images/logo-full-export.png" alt="EHPAD'ons-nous !">
      <div class="page__accueil-intro-main">
        <div class="page__accueil-intro-description">
          <?= get_field('intro_description') ?>
        </div>
        <div class="page__accueil-intro-date">
          <?= get_field('intro_date') ?>
        </div>
        <a class="page__accueil-intro-cta" href="/le-programme">Voir le programme</a>
      </div>
    </div>
  </div>

  <div class="page__accueil-apropos">
    <div class="inner">

      <h2 class="page__accueil-programme-title">EHPAD'ons-nous!</h2>

      <div class="page__accueil-apropos-description">
        <?= get_field('apropos_description') ?>
      </div>

      <div class="page__accueil-partners">

        <div class="page__accueil-partner">
          <h3>Organisé par</h3>
          <a href="http://www.i2ml.fr/" target="_blank" title="le Festival EHPAD'ons-nous! est organisé par la fondation i2ml">
            <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/logo-i2ml.png" alt="Logo i2ml">
          </a>
        </div>

        <div class="page__accueil-partner">
          <h3>Parrainé par</h3>
          <div class="page__accueil-partner-card">
            <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/thierry_thieu_niang_small.jpg" alt="Thierry Thieû Niang">
            <div class="page__accueil-partner-card-main">
              <h4>Thierry Thieû Niang</h4>
              <span>danseur chorégraphe</span>
            </div>
          </div>
        </div>

      </div>

      <a class="page__accueil-apropos-more" href="/a-propos">
        LIRE LE MOT DU PARRAIN
      </a>

    </div>
  </div>

  <div class="page__accueil-programme">
    <h2 class="page__accueil-programme-title">Le programme</h2>
    <div class="page__accueil-programme-list">
      <?
      $spectacles = get_posts([
        'post_type'     => 'spectacle',
        'posts_per_page' => 2,
      	'orderby'			  => 'menu_order',
      	'order'				  => 'ASC'
      ]);
      foreach($spectacles as $spectacle) {
        get_view('spectaclePreview');
      }
      ?>
    </div>
    <a class="page__accueil-programme-more" href="/le-programme">
      Voir le programme complet
    </a>
  </div>

  <div class="page__accueil-info">
    <div class="inner">
      <div class="page__accueil-conferences">
        <h2 class="page__accueil-conferences-title">
          <?= get_field('articles_title') ?>
        </h2>
        <div class="page__accueil-conferences-box">
          <div class="page__accueil-conferences-content">
            <?
            $articles = get_posts([
              'post_type' => 'post',
              'posts_per_page' => 2,
              'category_name' => 'capsules'
            ]);
            if(!$articles):
              ?>
              <div class="page__accueil-conferences-description">
                <?= get_field('articles_description') ?>
              </div>
              <?
            else:
              ?>
              <div class="page__accueil-conferences-list">
                <?
                foreach($articles as $article) {
                  get_view('articlePreview');
                }
                ?>
              </div>
              <?
            endif;
            ?>
          </div>
          <a class="page__accueil-conferences-more" href="<?= get_field('articles_link') ?>">
            Voir plus
          </a>
        </div>
      </div>
      <div class="page__accueil-exposition">
        <h2 class="page__accueil-exposition-title">L' Exposition</h2>
        <div class="page__accueil-exposition-box">
          <div class="page__accueil-exposition-description">
            <?= get_field('exposition_description') ?>
          </div>
          <a class="page__accueil-exposition-more" href="/lexposition">
            Voir l'exposition
          </a>
        </div>
      </div>
    </div>
  </div>

</div>

      <div class="prefooter">
        <div class="prefooter-container">
          <div class="inner">
            <h3 class="prefooter-title">Les partenaires du festival</h3>
            
              <?php

                $partenaires = get_posts([
                  'post_type' => 'Partenaire',
                  'posts_per_page' => -1,
                  'orderby' => 'post_title',
                  'order' => 'DESC'
                ]);
              ?>
              <div class="slider-container">

<div class="slider-content">

                    <?php
                      $compteur = 0;
                      foreach($partenaires as $partenaire){
                        $visual = get_fields($partenaire->ID)['logo'];
                        $description = get_fields($partenaire->ID)['description'];
                        $url = get_fields($partenaire->ID)['site'];
                        
                        $compteur += 1;
                        ?>
                        
                      <div class="slider-single">
                          
                          <a href="<?php echo $url ?>" target="_blank" rel="noreferrer">
                              <img class="slider-single-image" src="<?php echo $visual ?>"  >
                          </a>
                          <h1 class="slider-single-title"><?php echo $description ?></h1>
                      </div>            
                      <?php
                      }
                      ?>
  

  
</div>
</div>
            
          </div>
        </div>
      </div>
      
                    
                
      <footer class="footer espacementBot">
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

		<div id="svg-store"><!-- inject:svg --><svg xmlns="http://www.w3.org/2000/svg"><symbol id="icon-close" viewBox="0 0 24 24">
    <path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"/>
</symbol><symbol id="icon-facebook" viewBox="0 0 24 24">
    <path d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z"/>
</symbol><symbol id="icon-marker" viewBox="0 0 24 24">
    <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z"/>
</symbol><symbol id="icon-menu" viewBox="0 0 24 24">
    <path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z"/>
</symbol><symbol id="icon-time" viewBox="0 0 24 24">
    <path d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z"/>
</symbol></svg><!-- endinject --></div>

		<? wp_footer() ?>
		<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/jquery.min.js"></script>
		<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/lodash.min.js"></script>
		<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/glide.min.js"></script>
		<script src="<?= get_stylesheet_directory_uri() ?>/app.js?noCache=4735a3cf"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167999934-1"></script>
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


	</body>
</html>

