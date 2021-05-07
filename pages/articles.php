<?

/**
 * Template Name: Liste d'articles
 */

global $post;
get_header('compiled');

$categories = get_field('categories');
$catIds = [];
foreach ($categories as $category) {
    $catIds[] = $category->term_id;
}
$articles = get_posts([
    'post_type' => 'post',
    'posts_per_page' => -1,
    'category__in' => $catIds
]);
?>
<div class="page-container page__articles">

    <? get_view('page-intro') ?>

    <div class="inner">
        <div class="page__articles-list">
            <?
            foreach ($articles as $article) {
                get_view('articlePreview');
            }
            ?>
        </div>
    </div>

</div>
<?

get_footer('compiled');
?>
