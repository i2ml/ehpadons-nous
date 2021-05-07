<?

/**
 * Template Name: L'exposition
 */

global $post;
get_header('compiled');

?>
<div class="page-container page__exposition">
    <? get_view('page-intro') ?>
    <div class="page__exposition-list">
        <?
        $oeuvres = get_posts([
            'post_type' => 'oeuvre',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        ]);
        foreach ($oeuvres as $oeuvre) {
            get_view('oeuvrePreview');
        }
        ?>
    </div>
</div>
<?

get_footer('compiled');
?>
