<?

/**
 * Template Name: Programme menu
 */

global $post;
get_header('compiled');
?>
<div class="page-container page__pages">

    <? get_view('page-intro') ?>

    <div class="inner">
        <?

        $editions = get_posts([
            'post_type' => 'edition',
            'posts_per_page' => -1,
            'orderby' => 'post_title',
            'order' => 'DESC'
        ]);
        $souseditions = get_posts([
            'post_type' => 'sousedition',
            'posts_per_page' => -1,
            'orderby' => 'post_title',
            'order' => 'ASC',
        ]);
        foreach ($editions as $edition) {
            $compteur = 0;
            ?>
            <div class="page__pages-Titre">
                <p>
                    <?php
                    echo $edition->annee;
                    ?>
                </p>
            </div>
            <div class="page__pages-list">
            <?php
            foreach ($souseditions as $sousedition) {
                if (get_fields($sousedition->ID)['edition'] == $edition) {

                    $editionfields = get_fields($sousedition->ID);
                    ?>
                    <div class="page__pages-item">
                        <h2><?= $editionfields['region'] ?></h2>
                        <main>
                            <?= $editionfields['description'] ?>
                        </main>
                        <form action="./spectacles/" method="get">
                            <input type="hidden" value="<?= $sousedition->ID ?>" name="sous-edition">
                            <a class="button-<?= ["green", "yellow", "pink"][rand(0, 2)] ?>" href="#"
                               onclick="$(this).closest('form').submit()">
                                VOIR LA PAGE
                            </a>
                        </form>


                    </div>
                    <?php
                    if ($compteur < 2) {
                        $compteur += 1;
                    } else {
                        ?>
                        </div>
                        <div class="page__pages-list">
                        <?php
                        $compteur = 0;
                    }
                } ?>

                <?php
            }
            ?>
            </div>
            <?php
        }
        ?>

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


</body>
</html>

