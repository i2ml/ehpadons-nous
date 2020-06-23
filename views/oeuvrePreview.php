<?
global $oeuvre;

$visual = wp_get_attachment_image_src(get_post_thumbnail_id($oeuvre->ID), 'thumbnail');
$visual = $visual ? $visual[0] : get_stylesheet_directory_uri().'/assets/images/default-artist.jpg';
?>
<a class="oeuvrePreview" href="<?= get_permalink($oeuvre->ID) ?>" data-dialog="open">

  <img class="oeuvrePreview-visual" src="<?= $visual ?>" alt="">

  <main class="oeuvrePreview-main">

    <h3 class="oeuvrePreview-name">
      <?= $oeuvre->post_title ?>
    </h3>

  </main>

</a>
