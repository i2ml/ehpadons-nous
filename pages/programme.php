<?

/**
 * Template Name: Le programme
 */

global $post;
get_header('compiled');

?>
<div class="page-container page__programme">

  <? get_view('page-intro') ?>

  <div class="page__programme-list">
    <?
    $spectacles = get_posts([
      'post_type'     => 'spectacle',
      'posts_per_page' => -1,
    	'orderby'			  => 'menu_order',
    	'order'				  => 'ASC'
    ]);
    foreach($spectacles as $spectacle) {
      get_view('spectaclePreview');
    }
    ?>
  </div>
</div>
<?

get_footer('compiled');
?>
