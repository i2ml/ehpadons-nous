<?

/**
 * User roles
 */

remove_role( 'subscriber' );
remove_role( 'author' );
remove_role( 'contributor' );


/**
 * Menu pages
 */

add_action( 'admin_menu', function() {
	// remove_menu_page('edit.php');
	// remove_menu_page( 'edit-comments.php' );
});

add_filter('acf/options_page/settings', function($acf_options_page_settings) {
  $acf_options_page_settings['capability'] = 'edit_themes';
  return $acf_options_page_settings;
});


/**
 * Custom column
 */

add_filter('manage_edit-page_columns', function($columns) {
    $columns['template'] = 'Template';
    return $columns;
});

add_action('manage_page_posts_custom_column',  function($name) {
    global $post;
    switch ($name) {
        case 'template':
    		echo get_page_template_slug();
    }
});

function remove_pages_count_columns($defaults) {
unset($defaults['comments']);
return $defaults;
}
add_filter('manage_pages_columns', 'remove_pages_count_columns');
