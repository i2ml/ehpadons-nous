<?
global $post;
?>
<div class="page-intro">
  <div class="inner">
    <h2 class="page-intro-title"><?= $post->post_title ?></h2>
    <div class="page-intro-introduction">
      <?= get_field('introduction') ?>
    </div>
  </div>
</div>
