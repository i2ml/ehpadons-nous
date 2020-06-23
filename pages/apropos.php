<?

/**
 * Template Name: À propos
 */

global $post;
get_header('compiled');

?>
<div class="page-container page__apropos">

  <? get_view('page-intro') ?>

  <a href="http://www.i2ml.fr/" class="page__apropos-logo">
    <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/logo-i2ml.png" alt="">
  </a>

</div>
<?

get_footer('compiled');
?>
