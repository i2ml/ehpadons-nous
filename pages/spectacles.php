<?php

/**
 * Template Name: Liste des spectacles d'une sous-edition
 */

global $post;
get_header('compiled');


?>
<link rel="stylesheet" type="" href="<?= get_stylesheet_directory_uri() ?>/sass/pages/_carrousel.scss">

<div class="page-container page__programme">

    <?php get_view('page-intro');

    $sousedition = get_post($_GET["sous-edition"]);
    $directionartistique = get_field("direction_artistique", $sousedition->ID);
    $nomSousEdition = get_field("region", $sousedition->ID);
    ?>
    <div class="page-intro-introduction">
        <p>Retrouvez ici la <b>programmation éclectique</b> : musique classique, jazz, musique française, flamenco,
            tango, electro et hip-hop</p>
        <p>Direction artistique : <?= $directionartistique ?></p>
    </div>
    <div class="page__programme-list">
        <?php
        $spectacles = get_posts([
            'post_type' => 'spectacle',
            'posts_per_page' => -1,
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'meta_key' => 'date'
        ]);
        foreach ($spectacles as $spectacle) {
            if (get_field('sousedition', $spectacle->ID)->ID == $_GET["sous-edition"]) {
                get_view('spectaclePreview');
            }
        }
        ?>
    </div>
</div>

<?php
$partenaires = get_posts([
    'post_type' => 'Partenaire',
    'posts_per_page' => -1,
    'orderby' => 'post_title',
    'order' => 'DESC'
]);
$partenariats = get_posts([
    'post_type' => 'Partenariat',
    'posts_per_page' => -1,
    'orderby' => 'post_title',
    'order' => 'DESC'
]);
$compteur = 0;
foreach ($partenariats as $partenariat) {
    if (get_field("sous-edition", $partenariat->ID)->ID == $_GET["sous-edition"]) {
        $compteur += 1;
    }
}

if ($compteur != 0){
?>
<div class="prefooter">
    <div class="prefooter-container">
        <div class="inner">

            <?php
            if ($compteur == 1) {
                ?>
                <h3 class="prefooter-title">Le partenaire de la Sous édition <?= $nomSousEdition ?></h3>
                <div class="slider-container2">

                    <div class="slider-content2">
                        <?php
                        $partenaire = get_field("partenaire", $partenariat->ID);
                        $visual = get_fields($partenaire->ID)['logo'];
                        $url = get_fields($partenaire->ID)['site'];
                        ?>
                        <a href="<?php echo $url ?>" target="_blank" rel="noreferrer">
                            <img class="imageSeule" src="<?php echo $visual ?>">
                        </a>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <h3 class="prefooter-title">Les partenaires de la Sous édition <?= $nomSousEdition ?></h3>
                <div class="slider-container">

                    <div class="slider-content">
                        <?php

                        foreach ($partenariats as $partenariat) {
                            if (get_field("sous-edition", $partenariat->ID)->ID == $_GET["sous-edition"] && $compteur > 1) {
                                $partenaire = get_field("partenaire", $partenariat->ID);
                                $visual = get_fields($partenaire->ID)['logo'];
                                $url = get_fields($partenaire->ID)['site'];
                                ?>

                                <div class="slider-single">

                                    <a href="<?php echo $url ?>" target="_blank" rel="noreferrer">
                                        <img class="slider-single-image" src="<?php echo $visual ?>">
                                    </a>
                                </div>
                                <?php
                            }
                        }


                        ?>
                    </div>
                </div>
                <?php
            }
            }
            ?>
        </div>
    </div>
</div>

<footer class="footer">
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

<div id="svg-store"><!-- inject:svg --><!-- endinject --></div>

<? wp_footer() ?>
<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/jquery.min.js"></script>
<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/lodash.min.js"></script>
<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/glide.min.js"></script>
<script src="<?= get_stylesheet_directory_uri() ?>/app.js<%= killCache %>"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-167999934-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-167999934-1');
</script>


<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/carrousel.min.js"></script>
<script src="https://kit.fontawesome.com/5a9d4b2eb4.js" crossorigin="anonymous"></script>
