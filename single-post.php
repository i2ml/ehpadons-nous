<?
global $post;
the_post();
get_header('compiled');

?>
<div class="page-container page__article">

  <div class="page__article-heading">
    Médiathèque
  </div>

  <div class="inner">

    <main class="page__article-main">

      <header class="page__article-header">
        <h1 class="page__article-title">
          <?= $post->post_title ?>
        </h1>

        <div class="page__article-info">
          publié le <? the_date('j F') ?>
          par <? the_author() ?>
        </div>

      </header>

      <div class="page__article-content">
        <? the_content(); ?>
      </div>

    </main>

  </div>
</div>
<?

get_footer('compiled');
?>
