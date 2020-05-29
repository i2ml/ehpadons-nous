
      <div class="prefooter">
        <div class="inner">
          <h3 class="prefooter-title">Partenaires</h3>
          <div class="prefooter-logos">
            <?
            foreach(get_field('partners', 'options') as $partner):
              ?>
              <a href="<?= $partner['url'] ?>">
                <img src="<?= $partner['logo'] ?>">
              </a>
              <?
            endforeach;
            ?>
          </div>
        </div>
      </div>

      <footer class="footer">
        <div class="inner">

        </div>
      </footer>

		</div><!-- .wrapper -->

		<div class="dialog" id="dialog">
		  <div class="dialog-inner">
		    <div class="dialog-mask" data-dialog="close"></div>
		    <div class="dialog-body"></div>
		  </div>
		</div>

		<div id="svg-store"><!-- inject:svg --><svg xmlns="http://www.w3.org/2000/svg"><symbol id="icon-marker" viewBox="0 0 24 24">
    <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z"/>
</symbol><symbol id="icon-time" viewBox="0 0 24 24">
    <path d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z"/>
</symbol></svg><!-- endinject --></div>

		<? wp_footer() ?>
		<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/jquery.min.js"></script>
		<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/lodash.min.js"></script>
		<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/glide.min.js"></script>
		<script src="<?= get_stylesheet_directory_uri() ?>/app.js?noCache=14a4f636"></script>

	</body>
</html>
