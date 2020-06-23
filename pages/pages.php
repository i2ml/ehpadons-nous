<?

/**
 * Template Name: Liste de pages
 */

global $post;
get_header('compiled');
?>
<div class="page-container page__pages">

  <? get_view('page-intro') ?>

  <div class="inner">
    <div class="page__pages-list">
      <?
      foreach(get_field('pages') as $item) {
        $page = $item['page'];
        ?>
        <div class="page__pages-item">
          <h2><?= $page->post_title ?></h2>
          <main>
            <?= $item['description'] ?>
          </main>
          <a class="button-<?= $item['button_color'] ?>" href="<?= get_permalink($page->ID) ?>">
            <?= $item['button_text'] ?>
          </a>
        </div>
        <?
      }
      ?>
    </div>
  </div>

</div>
<?

get_footer('compiled');
?>
