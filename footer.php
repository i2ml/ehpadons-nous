
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

		<div id="svg-store"><!-- inject:svg --><!-- endinject --></div>

		<? wp_footer() ?>
		<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/jquery.min.js"></script>
		<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/lodash.min.js"></script>
		<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/glide.min.js"></script>
		<script src="<?= get_stylesheet_directory_uri() ?>/app.js<%= killCache %>"></script>

	</body>
</html>
