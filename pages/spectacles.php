<?php

/**
 * Template Name: Liste des spectacles d'une sous-edition
 */

global $post;
get_header('compiled');

$sousedition = get_post($_GET["sous-edition"]);
$directionartistique = get_field("direction_artistique",$sousedition->ID);
?>



    <div class="page-container page__programme">

        <?php get_view('page-intro');
        ?>
        <div class="page-intro-introduction">
            <p>Retrouvez ici la <b>programmation éclectique</b> : musique classique, jazz, musique française, flamenco, tango, electro et hip-hop</p>
            <p>Direction artistique : <?= $directionartistique?></p>
        </div>
        <div class="page__programme-list">
            <?php
            $spectacles = get_posts([
                'post_type' => 'spectacle',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ]);
            foreach ($spectacles as $spectacle) {
                if (get_field('sousedition', $spectacle->ID)->ID == $_GET["sous-edition"]){
                    get_view('spectaclePreview');
               }
            }
            ?>
        </div>
    </div>
<?php

get_footer('compiled');
?>