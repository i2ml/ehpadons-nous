<?php

/**
 * Template Name: Liste des spectacles d'une sous-edition
 */

global $post;
get_header('compiled');

?>
    <div class="page-container page__programme">

        <?php get_view('page-intro') ?>

        <div class="page__programme-list">
            <?php
            $spectacles = get_posts([
                'post_type' => 'spectacle',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ]);
            foreach ($spectacles as $spectacle) {
                if (get_field('sousedition', $spectacle->ID)->ID == $_POST["sous-edition"]){
                    get_view('spectaclePreview');
               }
            }
            ?>
        </div>
    </div>
<?php

get_footer('compiled');
?>