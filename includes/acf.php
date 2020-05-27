<?php

// 1. customize ACF path
add_filter('acf/settings/path', function($path) {
	return get_stylesheet_directory() . '/plugins/advanced-custom-fields-pro/';
});

// 2. customize ACF dir
add_filter('acf/settings/dir', function($dir) {
	return get_stylesheet_directory_uri() . '/plugins/advanced-custom-fields-pro/';
});

// 3. Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_true');

// 4. Include ACF
include_once( get_stylesheet_directory() . '/plugins/advanced-custom-fields-pro/acf.php' );
