<?
global $etablissement;
$etablissement->visual = wp_get_attachment_image_src(get_post_thumbnail_id($etablissement->ID), 'thumbnail');
$etablissement->visual = $etablissement->visual ? $etablissement->visual[0] : false;
?>
<div class="etablissementPreview">

  <?
  if($etablissement->visual):
    ?>
    <img class="etablissementPreview-visual" src="<?= $etablissement->visual ?>" alt="<?= $etablissement->post_title ?>">
    <?
  endif;
  ?>

  <div class="etablissementPreview-main">
    <h3 class="etablissementPreview-name">
      <?= $etablissement->post_title ?>
    </h3>
    <div class="etablissementPreview-address">
      <? icon('marker') ?>
      <?= get_field('address', $etablissement->ID) ?>
    </div>
  </div>

</div>
