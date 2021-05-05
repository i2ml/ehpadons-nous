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
                        <form action="./spectacles" method="get">
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
<?

get_footer('compiled');
?>
