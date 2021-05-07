<?

/**
 * Template Name: L'accueil
 */

global $post;
get_header('compiled');

?>
<link rel="stylesheet" type="" href="<?= get_stylesheet_directory_uri() ?>/sass/pages/_carrousel.scss">

<div class="page__accueil">

    <div class="page__accueil-intro">
        <div class="inner">
            <img class="page__accueil-intro-logo"
                 src="<?= get_stylesheet_directory_uri() ?>/assets/images/logo-full-export.png" alt="EHPAD'ons-nous !">
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

            <div class="page__accueil-partners">

                <div class="page__accueil-partner">
                    <h3>Organisé par</h3>
                    <a href="http://www.i2ml.fr/" target="_blank"
                       title="le Festival EHPAD'ons-nous! est organisé par la fondation i2ml">
                        <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/logo-i2ml.png" alt="Logo i2ml">
                    </a>
                </div>

                <div class="page__accueil-partner">
                    <h3>Parrainé par</h3>
                    <div class="page__accueil-partner-card">
                        <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/thierry_thieu_niang_small.jpg"
                             alt="Thierry Thieû Niang">
                        <div class="page__accueil-partner-card-main">
                            <h4>Thierry Thieû Niang</h4>
                            <span>danseur chorégraphe</span>
                        </div>
                    </div>
                </div>

            </div>

            <a class="page__accueil-apropos-more" href="/a-propos">
                LIRE LE MOT DU PARRAIN
            </a>

        </div>
    </div>

    <div class="page__accueil-programme">
        <h2 class="page__accueil-programme-title">Le programme</h2>
        <div class="page__accueil-programme-list">
            <?
            $spectacles = get_posts([
                'post_type' => 'spectacle',
                'posts_per_page' => 2,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ]);
            foreach ($spectacles as $spectacle) {
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
                        <?
                        $articles = get_posts([
                            'post_type' => 'post',
                            'posts_per_page' => 2,
                            'category_name' => 'capsules'
                        ]);
                        if (!$articles):
                            ?>
                            <div class="page__accueil-conferences-description">
                                <?= get_field('articles_description') ?>
                            </div>
                        <?
                        else:
                            ?>
                            <div class="page__accueil-conferences-list">
                                <?
                                foreach ($articles as $article) {
                                    get_view('articlePreview');
                                }
                                ?>
                            </div>
                        <?
                        endif;
                        ?>
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

<div class="prefooter">
    <div class="prefooter-container">
        <div class="inner">
            <h3 class="prefooter-title">Les partenaires du festival</h3>

            <?php

            $partenaires = get_posts([
                'post_type' => 'Partenaire',
                'posts_per_page' => -1,
                'orderby' => 'post_title',
                'order' => 'DESC'
            ]);
            ?>
            <div class="slider-container">

                <div class="slider-content">

                    <?php
                    $compteur = 0;
                    foreach ($partenaires as $partenaire) {
                        $visual = get_fields($partenaire->ID)['logo'];
                        $url = get_fields($partenaire->ID)['site'];

                        $compteur += 1;
                        ?>

                        <div class="slider-single">

                            <a href="<?php echo $url ?>" target="_blank" rel="noreferrer">
                                <img class="slider-single-image" src="<?php echo $visual ?>">
                            </a>
                        </div>
                        <?php
                    }
                    ?>


                </div>
            </div>

        </div>
    </div>
</div>


<footer class="footer espacementBot">
    <div class="inner">
        <div class="footer-organizer">
            <span>organisé par :</span>
            <a href="http://www.i2ml.fr/" target="_blank"
               title="le Festival EHPAD'ons-nous! est organisé par la fondation i2ml">
                <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/logo-i2ml.png" alt="Logo i2ml">
            </a>
        </div>
        <div class="footer-nav">
            <? wp_nav_menu(['theme_location' => 'footer', 'container' => false, 'menu_class' => 'footer-menu']) ?>
            <hr>
            <a href="https://www.facebook.com/EHPADONSNOUS/" target="_blank" class="footer-social">
                <? icon('facebook') ?>
                Suivez nous !
            </a>
        </div>
    </div>
</footer>

</div><!-- .wrapper -->

<div class="dialog" id="dialog">
    <div class="dialog-inner">
        <div class="dialog-mask" data-dialog="close"></div>
        <div class="dialog-body"></div>
    </div>
</div>

<div id="svg-store"><!-- inject:svg -->
    <svg xmlns="http://www.w3.org/2000/svg">
        <symbol id="icon-close" viewBox="0 0 24 24">
            <path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"/>
        </symbol>
        <symbol id="icon-facebook" viewBox="0 0 24 24">
            <path d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z"/>
        </symbol>
        <symbol id="icon-marker" viewBox="0 0 24 24">
            <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z"/>
        </symbol>
        <symbol id="icon-menu" viewBox="0 0 24 24">
            <path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z"/>
        </symbol>
        <symbol id="icon-time" viewBox="0 0 24 24">
            <path d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z"/>
        </symbol>
    </svg><!-- endinject --></div>

<? wp_footer() ?>
<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/jquery.min.js"></script>
<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/lodash.min.js"></script>
<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/glide.min.js"></script>
<script src="<?= get_stylesheet_directory_uri() ?>/app.js?noCache=4735a3cf"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-167999934-1"></script>
<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/carrousel.min.js"></script>
<script src="https://kit.fontawesome.com/5a9d4b2eb4.js" crossorigin="anonymous"></script>


</body>
</html>

