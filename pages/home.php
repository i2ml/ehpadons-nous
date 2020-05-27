<?

/**
 * Template Name: One pager
 */

global $post;
get_header('compiled');

get_view('intro');
get_view('menu');
get_view('secondarynav');
get_view('about');
get_view('offers');
get_view('formations');
get_view('teambuilding');
get_view('references');
get_view('contact');

get_footer('compiled');
?>
