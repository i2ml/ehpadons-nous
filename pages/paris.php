<?

/**
 * Template Name: paris
 */

global $post;
get_header('compiled');

$cplist = ["75020","75014","93250","75017","75015","78150"]
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
      $todisplay = false;
      $etablissement = get_field('etablissement', $spectacle->ID);
      foreach ($cplist as $cp) {
        if($todisplay != true){
          $todisplay = strpos(get_field('address', $etablissement->ID),$cp) > -1;
        } 
      }
  
      if($todisplay){
        get_view('spectaclePreview');
      }
    }
    ?>
  </div>
</div>
<?
get_footer('compiled');
?>