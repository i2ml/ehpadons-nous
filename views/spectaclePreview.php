<?
global $spectacle;

$artist = get_field('artiste', $spectacle->ID);
$etablissement = get_field('etablissement', $spectacle->ID);
$visual = wp_get_attachment_image_src(get_post_thumbnail_id($artist->ID), 'thumbnail');
$visual = $visual ? $visual[0] : get_stylesheet_directory_uri().'/assets/images/default-artist.jpg';
?>
<a class="spectaclePreview" href="<?= get_permalink($spectacle->ID) ?>" data-dialog="open">

  <div class="spectaclePreview-date">
    <?= get_field('date', $spectacle->ID) ?>
  </div>

  <aside class="spectaclePreview-aside">
    <img class="spectaclePreview-visual" src="<?= $visual ?>" alt="">
  </aside>

  <main class="spectaclePreview-main">
    <h3 class="spectaclePreview-artiste">
      <span class="spectaclePreview-artiste-name"><?= $artist->post_title ?></span>
      <span class="spectaclePreview-artiste-discipline">/<?= get_field('discipline', $artist->ID) ?></span>
    </h3>

    <div class="spectaclePreview-description" data-clamp="3">
      <?= tokenTruncate(get_field('description', $artist->ID), 300, '...') ?>
    </div>

    <?
    if($etablissement):
      ?>
      <h4 class="spectaclePreview-etablissement"><?= $etablissement->post_title ?></h4>
      <?
    endif;
    ?>

    <div class="spectaclePreview-metas">
      <div class="spectaclePreview-meta">
        <? icon('time') ?>
        <?= get_field('time', $spectacle->ID) ?>
      </div>
      <?
      if($etablissement):
        ?>
        <div class="spectaclePreview-meta">
          <? icon('marker') ?>
          <?= get_field('address', $etablissement->ID) ?>
        </div>
        <?
      endif;
      ?>
    </div>

    <div class="spectaclePreview-link">
      <div class="spectaclePreview-link-icon">
        +
      </div>
      <div class="spectaclePreview-link-text">
        Voir la suite
      </div>
    </div>

  </main>

</a>
