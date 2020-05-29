<?

/**
 * Template Name: Le programme
 */

global $post;
get_header('compiled');

?>
<div class="page page__programme">

  <? get_view('page-intro') ?>

  <div class="page__programme-list">
    <?
    $spectacles = get_posts([
      'post_type'     => 'spectacle',
      'post_per_page' => 3,
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
