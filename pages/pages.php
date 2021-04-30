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
      $editions = get_posts([
        'post_type'     => 'edition',
        'posts_per_page' => -1,
        'orderby'			  => 'menu_order',
        'order'				  => 'ASC'
      ]);
      foreach($editions as $edition) {

        var_dump($edition->annee);

        /*$page = $item['page'];
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
        <?*/
      }
      ?>
    </div>
  </div>

</div>
<?

get_footer('compiled');
?>
