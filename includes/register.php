<?php

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Footer'),
            'menu_title'    => __('Footer'),
            'menu_slug'     => 'footer-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}

/*
 * Main theme setup
 */

add_action('after_setup_theme', 'blank_theme_setup');
function blank_theme_setup() {
	add_theme_support('post-thumbnails');
	add_action('init', 'register_all');
  remove_image_size('large');
  register_nav_menu('primary', __('Menu principal', 'theme'));
  register_nav_menu('footer', __('Menu footer', 'theme'));
}

function register_all() {

  register_post_type('etablissement', array(
  		'labels' => array(
  		'name' => __('Établissements', 'blank'),
  		'singular_name' => __('Établissement', 'blank'),
  		'add_new' => __('Ajouter Nouveau', 'blank'),
  		'add_new_item' => __('Ajouter Nouvel Item', 'blank'),
  		'edit' => __('Editer item', 'blank')
  	),
  	'public' => true,
  	'publicly_queryable' => true,
  	'hierarchical' => true,
  	'has_archive' => true,
  	'rewrite' => ['slug' => 'etablissements'],
  	'supports' => array(
  		'title',
  		'editor',
  		'thumbnail',
  	),
  	'can_export' => true,
  ));

  register_post_type('artiste', array(
  		'labels' => array(
  		'name' => __('Artistes', 'blank'),
  		'singular_name' => __('Artiste', 'blank'),
  		'add_new' => __('Ajouter Nouveau', 'blank'),
  		'add_new_item' => __('Ajouter Nouvel Item', 'blank'),
  		'edit' => __('Editer item', 'blank')
  	),
  	'public' => true,
    'publicly_queryable' => false,
  	'hierarchical' => true,
  	'has_archive' => true,
  	'rewrite' => ['slug' => 'artistes'],
  	'supports' => array(
  		'title',
  		'editor',
  		'thumbnail',
  	),
  	'can_export' => true,
  ));

  register_post_type('spectacle', array(
  		'labels' => array(
  		'name' => __('Spectacles', 'blank'),
  		'singular_name' => __('Spectacle', 'blank'),
  		'add_new' => __('Ajouter Nouveau', 'blank'),
  		'add_new_item' => __('Ajouter Nouvel Item', 'blank'),
  		'edit' => __('Editer item', 'blank')
  	),
  	'public' => true,
  	'publicly_queryable' => true,
  	'hierarchical' => true,
  	'has_archive' => true,
  	'rewrite' => ['slug' => 'spectacles'],
  	'supports' => array(),
  	'can_export' => true,
  ));

  remove_post_type_support('spectacle', 'title');

  register_post_type('oeuvre', array(
  		'labels' => array(
  		'name' => __('Oeuvres', 'blank'),
  		'singular_name' => __('Oeuvre', 'blank'),
  		'add_new' => __('Ajouter Nouveau', 'blank'),
  		'add_new_item' => __('Ajouter Nouvel Item', 'blank'),
  		'edit' => __('Editer item', 'blank')
  	),
  	'public' => true,
  	'publicly_queryable' => true,
  	'hierarchical' => true,
  	'has_archive' => true,
  	'rewrite' => ['slug' => 'oeuvres'],
  	'supports' => array(
  		'title',
  		'thumbnail',
  	),
  	'can_export' => true,
  ));

    register_post_type('edition', array(
        'labels' => array(
            'name' => __('Editions', 'blank'),
            'singular_name' => __('Edition', 'blank'),
            'add_new' => __('Ajouter Nouveau', 'blank'),
            'add_new_item' => __('Ajouter Nouvel Item', 'blank'),
            'edit' => __('Editer item', 'blank')
        ),
        'public' => true,
        'publicly_queryable' => true,
        'hierarchical' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'editions'],
        'supports' => array(),
        'can_export' => true,
    ));

    register_post_type('sousedition', array(
        'labels' => array(
            'name' => __('Sous-Editions', 'blank'),
            'singular_name' => __('Sous-Edition', 'blank'),
            'add_new' => __('Ajouter Nouveau', 'blank'),
            'add_new_item' => __('Ajouter Nouvel Item', 'blank'),
            'edit' => __('Editer item', 'blank')
        ),
        'public' => true,
        'publicly_queryable' => true,
        'hierarchical' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'souseditions'],
        'supports' => array(),
        'can_export' => true,
    ));

}

add_filter( 'generate_show_title','tu_gig_remove_title' );
function blank_gig_remove_title( $title ) {
  if(is_singular('spectacle')) {
    return false;
  }
  return $title;
}


/* change admin title */
/* --------------------------------------------------------------------------------- */


add_action('acf/save_post', function($post_id) {
  global $post, $wpdb;
  if($post->post_type != 'spectacle') return;
  $new_title = 'Le '.get_field('date', $post_id).' à '.get_field('time', $post_id);
  $wpdb->update($wpdb->posts, array('post_title' => $new_title), ['ID' => $post_id]);
});



/* menu */
/* --------------------------------------------------------------------------------- */

add_shortcode('menu', function($atts, $content = null) {
    extract(shortcode_atts(array( 'name' => null, ), $atts));
    return wp_nav_menu(
      array(
        'theme_location' => $name,
        'container' => false,
        'menu_class' => 'pageDefault-menu',
        'echo' => false )
      );
});

add_filter('intermediate_image_sizes_advanced', function($sizes) {
    // unset( $sizes['medium']);
    // unset( $sizes['large']);
    return $sizes;
});

add_filter( 'use_default_gallery_style', '__return_false' );

add_filter('upload_mimes', function($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
});

add_filter('wp_mail_from', function($content_type) {
  return get_option( 'admin_email' );
});

add_filter('wp_mail_from_name', function($name) {
  return get_option( 'site_title' );
});
