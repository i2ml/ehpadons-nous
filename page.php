<?
global $post;
the_post();
get_header('compiled');
?>
<div class="page__default">

  <? get_view('page-intro') ?>

  <div class="page__default-inner">
    <div class="page__default-main">
      <div class="page__default-content">
        <?= get_field('content') ?>
      </div>
    </div>
  </div>

</div>
<? get_footer('compiled'); ?>
