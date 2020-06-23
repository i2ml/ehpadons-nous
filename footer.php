
      <div class="prefooter">
        <div class="prefooter-container">
          <div class="inner">
            <h3 class="prefooter-title">Les partenaires du festival</h3>
            <div class="prefooter-logos">
              <?
              foreach(get_field('partners', 'options') as $partner):
                ?>
                <a href="<?= $partner['url'] ?>" target="_blank">
                  <img src="<?= $partner['logo']['url'] ?>" width="<?= $partner['logo']['width']/2 ?>">
                </a>
                <?
              endforeach;
              ?>
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


	</body>
</html>
