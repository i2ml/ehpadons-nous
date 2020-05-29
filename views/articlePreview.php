<?
global $article;
$visual = wp_get_attachment_image_src(get_post_thumbnail_id($article->ID), 'thumbnail');
$visual = $visual ? $visual[0] : get_stylesheet_directory_uri().'/assets/images/default-artist.jpg';
?>
<a class="articlePreview" href="<?= get_permalink($article->ID) ?>">

  <aside class="articlePreview-aside">
    <img class="articlePreview-visual" src="<?= $visual ?>" alt="">
  </aside>

  <main class="articlePreview-main">

    <div class="articlePreview-date">
      publié le <?= get_the_date('j F', $article->ID) ?>
    </div>

    <h3 class="articlePreview-title">
      <?= $article->post_title ?>
    </h3>

    <!-- <div class="spectaclePreview-description" data-clamp="3">
      <?= tokenTruncate(get_the_excerpt($article->ID), 300, '...') ?>
    </div> -->

  </main>

</a>
