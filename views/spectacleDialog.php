<?
global $spectacle, $etablissement;

$artist = get_field('artiste', $spectacle->ID);
if($artist) {
  $artist->visual = wp_get_attachment_image_src(get_post_thumbnail_id($artist->ID), 'thumbnail');
  $artist->visual = $artist->visual ? $artist->visual[0] : false;
}

$etablissement = get_field('etablissement', $spectacle->ID);
if($etablissement) {
  $etablissement->visual = wp_get_attachment_image_src(get_post_thumbnail_id($etablissement->ID), 'thumbnail');
  $etablissement->visual = $etablissement->visual ? $etablissement->visual[0] : false;
}
?>
<div class="spectacleDialog">

  <?
  if($artist):
    ?>
    <div class="spectacleDialog-artist">
      <h3 class="spectacleDialog-artist-title">
        <span class="spectacleDialog-artist-name"><?= $artist->post_title ?></span>
        <span class="spectacleDialog-artist-discipline">/<?= get_field('discipline', $artist->ID) ?></span>
      </h3>
      <?
      if($artist->visual):
        ?>
        <img class="spectacleDialog-artist-visual" src="<?= $artist->visual ?>" alt="<?= $artist->post_title ?>">
        <?
      endif;
      ?>
      <div class="spectacleDialog-artist-description">
        <?= get_field('description', $artist->ID) ?>
      </div>
      <div class="clear"></div>
    </div>
    <hr>
    <?
  endif;
  ?>

  <div class="spectacleDialog-info">

    <h3 class="spectacleDialog-info-title">
      Infos pratiques :
    </h3>

    <div class="spectacleDialog-info-description">
      ce spectacle aura lieu le <strong><?= get_field('date', $spectacle->ID) ?></strong>
      à <strong><?= get_field('time', $spectacle->ID) ?></strong>
      à l'établissement suivant :
    </div>

    <?
    if($etablissement):
      get_view('etablissementPreview');
    endif;
    ?>

  </div>

</div>
