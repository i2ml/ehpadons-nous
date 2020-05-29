<?

/**
 * Template Name: L'accueil
 */

global $post;
get_header('compiled');

?>
<div class="page__accueil">

  <div class="page__accueil-intro">
    <div class="inner">
      <img class="page__accueil-intro-logo" src="<?= get_stylesheet_directory_uri() ?>/assets/images/logo-full-export.png" alt="EHPAD'ons-nous !">
      <div class="page__accueil-intro-main">
        <div class="page__accueil-intro-description">
          <?= get_field('intro_description') ?>
        </div>
        <div class="page__accueil-intro-date">
          <?= get_field('intro_date') ?>
        </div>
        <a class="page__accueil-intro-cta" href="/le-programme">Voir le programme</a>
      </div>
    </div>
  </div>

  <div class="page__accueil-apropos">
    <div class="inner">
      <h2 class="page__accueil-programme-title">EHPAD'ons-nous!</h2>
      <div class="page__accueil-apropos-description">
        <?= get_field('apropos_description') ?>
      </div>
      <a class="page__accueil-apropos-more" href="/apropos">
        - - - LIRE LA SUITE
      </a>
    </div>
  </div>

  <div class="page__accueil-programme">
    <h2 class="page__accueil-programme-title">Le programme</h2>
    <div class="page__accueil-programme-list">
      <?
      $spectacles = get_posts([
        'post_type'     => 'spectacle',
        'post_per_page' => 2,
      	'orderby'			  => 'menu_order',
      	'order'				  => 'ASC'
      ]);
      foreach($spectacles as $spectacle) {
        get_view('spectaclePreview');
      }
      ?>
    </div>
    <a class="page__accueil-programme-more" href="/le-programme">
      Voir le programme complet
    </a>
  </div>

  <div class="page__accueil-info">
    <div class="inner">
      <div class="page__accueil-conferences">
        <h2 class="page__accueil-conferences-title">
          <?= get_field('articles_title') ?>
        </h2>
        <div class="page__accueil-conferences-box">
          <div class="page__accueil-conferences-content">
            <div class="page__accueil-conferences-list">
              <?
              $articles = get_posts([
                'post_type' => 'post',
                'posts_per_page' => 2,
                'category_name' => 'capsules'
              ]);
              foreach($articles as $article) {
                get_view('articlePreview');
              }
              ?>
            </div>
          </div>
          <a class="page__accueil-conferences-more" href="<?= get_field('articles_link') ?>">
            Voir plus
          </a>
        </div>
      </div>
      <div class="page__accueil-exposition">
        <h2 class="page__accueil-exposition-title">L' Exposition</h2>
        <div class="page__accueil-exposition-box">
          <div class="page__accueil-exposition-description">
            <?= get_field('exposition_description') ?>
          </div>
          <a class="page__accueil-exposition-more" href="/lexposition">
            Voir l'exposition
          </a>
        </div>
      </div>
    </div>
  </div>

</div>
<?
get_footer('compiled');
?>
