<style>
  .sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
}

.sr-only-focusable:active,
.sr-only-focusable:focus {
    position: static;
    width: auto;
    height: auto;
    overflow: visible;
    clip: auto;
    white-space: normal;
}
.d-block {
    display: block !important;
}
  
.carousel {
  position: relative;
}

.carousel.pointer-event {
  touch-action: pan-y;
}

.carousel-inner {
  position: relative;
  width: 100%;
  overflow: hidden;
}

.carousel-inner::after {
  display: block;
  clear: both;
  content: "";
}

.carousel-item {
  position: relative;
  display: none;
  float: left;
  width: 100%;
  margin-right: -100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  transition: transform 0.6s ease-in-out;
}

@media (prefers-reduced-motion: reduce) {
  .carousel-item {
    transition: none;
  }
}

.carousel-item.active,
.carousel-item-next,
.carousel-item-prev {
  display: block;
}

.carousel-item-next:not(.carousel-item-left),
.active.carousel-item-right {
  transform: translateX(100%);
}

.carousel-item-prev:not(.carousel-item-right),
.active.carousel-item-left {
  transform: translateX(-100%);
}

.carousel-fade .carousel-item {
  opacity: 0;
  transition-property: opacity;
  transform: none;
}

.carousel-fade .carousel-item.active,
.carousel-fade .carousel-item-next.carousel-item-left,
.carousel-fade .carousel-item-prev.carousel-item-right {
  z-index: 1;
  opacity: 1;
}

.carousel-fade .active.carousel-item-left,
.carousel-fade .active.carousel-item-right {
  z-index: 0;
  opacity: 0;
  transition: opacity 0s 0.6s;
}

@media (prefers-reduced-motion: reduce) {
  .carousel-fade .active.carousel-item-left,
  .carousel-fade .active.carousel-item-right {
    transition: none;
  }
}

.carousel-control-prev,
.carousel-control-next {
  position: absolute;
  top: 0;
  bottom: 0;
  z-index: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 15%;
  color: #fff;
  text-align: center;
  opacity: 0.5;
  transition: opacity 0.15s ease;
}

@media (prefers-reduced-motion: reduce) {
  .carousel-control-prev,
  .carousel-control-next {
    transition: none;
  }
}

.carousel-control-prev:hover,
.carousel-control-prev:focus,
.carousel-control-next:hover,
.carousel-control-next:focus {
  color: #fff;
  text-decoration: none;
  outline: 0;
  opacity: 0.9;
}

.carousel-control-prev {
  left: 0;
}

.carousel-control-next {
  right: 0;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  display: inline-block;
  width: 20px;
  height: 20px;
  background: no-repeat 50% / 100% 100%;
}

.carousel-control-prev-icon {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e");
}

.carousel-control-next-icon {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e");
}

.carousel-indicators {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 15;
  display: flex;
  justify-content: center;
  padding-left: 0;
  margin-right: 15%;
  margin-left: 15%;
  list-style: none;
}

.carousel-indicators li {
  box-sizing: content-box;
  flex: 0 1 auto;
  width: 30px;
  height: 3px;
  margin-right: 3px;
  margin-left: 3px;
  text-indent: -999px;
  cursor: pointer;
  background-color: #fff;
  background-clip: padding-box;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  opacity: 0.5;
  transition: opacity 0.6s ease;
}

@media (prefers-reduced-motion: reduce) {
  .carousel-indicators li {
    transition: none;
  }
}

.carousel-indicators .active {
  opacity: 1;
}

.carousel-caption {
  position: absolute;
  right: 15%;
  bottom: 20px;
  left: 15%;
  z-index: 10;
  padding-top: 20px;
  padding-bottom: 20px;
  color: #fff;
  text-align: center;
}
#carouselExemple {
  width: 80%;
  margin: 0 auto;
  margin-top: 120px;
}

.carousel-item img {
  width: 100%;
  height: auto;
}

  </style>
      <div class="prefooter">
        <div class="prefooter-container">
          <div class="inner">
            <h3 class="prefooter-title">Les partenaires du festival</h3>
            <div class="prefooter-logos">
              <?

              $partenaires = get_posts([
                'post_type' => 'Partenaire',
                'posts_per_page' => -1,
                'orderby' => 'post_title',
                'order' => 'DESC'
            ]);
            
            
            foreach($partenaires as $partenaire){
              $visual = wp_get_attachment_image_src(get_post_thumbnail_id($partenaire->ID), 'thumbnail');
              $description = get_fields($partenaire->ID)['description'];
              $url = get_fields($partenaire->ID)['site'];/*
              ?>
              <a href="<?php echo $url ?>" target="_blank">
                  <img src="<?php echo $visual[0] ?>" target="_blank" rel="noreferrer">
                </a>
                <?php*/
            }
            
              ?>
<?php  ?>
  <div id="carouselExemple" class="carousel slide" data-ride="carousel" data-interval="3000">

    <ol class="carousel-indicators">
      <li data-target="#carouselExemple" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExemple" data-slide-to="1"></li>
      <li data-target="#carouselExemple" data-slide-to="2"></li>
      <li data-target="#carouselExemple" data-slide-to="3"></li>
      <li data-target="#carouselExemple" data-slide-to="4"></li>
      <li data-target="#carouselExemple" data-slide-to="5"></li>

    </ol>


    <div class="carousel-inner">

      <div class="carousel-item active">
        <img src="<?= $visual[0] ?>"
        class="d-block">
      </div>

      <div class="carousel-item">
        <img src="<?= $visual[0] ?>"
        class="d-block">
        bonjour
      </div>

      <div class="carousel-item">
        <img src="<?= $visual[0] ?>"
        class="d-block">
      </div>

      <div class="carousel-item">
        <img src="<?= $visual[0] ?>"
        class="d-block">
      </div>
      <div class="carousel-item">
        <img src="<?= $visual[0] ?>"
        class="d-block">
      </div>

      <div class="carousel-item">
        <img src="<?= $visual[0] ?>"
        class="d-block">
      </div>

    </div>

    <a href="#carouselExemple" class="carousel-control-prev" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="ture"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a href="#carouselExemple" class="carousel-control-next" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>

  </div>
<?php  ?>
            </div>
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
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-167999934-1');
    </script>


	</body>
</html>
