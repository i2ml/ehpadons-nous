<?php

/*
 * Main theme setup
 */

add_action( 'after_setup_theme', 'blank_theme_setup' );
function blank_theme_setup() {
	add_theme_support( 'post-thumbnails' );
	add_action( 'init', 'register_all' );
  remove_image_size('large');
}

function register_all() {
}

add_shortcode('menu', function($atts, $content = null) {
    extract(shortcode_atts(array( 'name' => null, ), $atts));
    return wp_nav_menu( array( 'theme_location' => $name, 'container' => false, 'menu_class' => 'pageDefault-menu', 'echo' => false ) );
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
  return 'CortexWorld';
});
