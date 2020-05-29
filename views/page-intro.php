<?
global $post;
?>
<div class="page-intro">
  <div class="inner">
    <h2 class="page-intro-title"><?= get_field('intro_title') ?></h2>
    <div class="page-intro-introduction">
      <?= get_field('intro_text') ?>
    </div>
  </div>
</div>
