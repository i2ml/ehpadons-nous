<?php

/*
 * Custom routing
 */

add_action( 'wp_router_generate_routes', 'bl_add_routes', 20 );
function bl_add_routes( $router ) {
	generate_route( [ 'url' => 'contact/send' ] , $router);
	generate_route( [ 'url' => 'map' ] , $router);
}


/*
 * Generate route
 */

function generate_route($args, $router) {

	$url   = $args['url'];
	if($url==null) return false;

	$slug       = (isset($args['slug']))?$args['slug']:$args['url'];
	$title      = (isset($args['title']))?$args['title']:$args['url'];
	$query_vars = (isset($args['query_vars']))?$args['query_vars']:[];

	$route_args = [
									'path'            => '^'.$url.'$',
									'query_vars'      => array_merge($query_vars, ['route'=>$slug]),
									'page_callback'   => 'empty_callback',
									'page_arguments'  => array_keys($query_vars),
									'access_callback' => true,
									'title'           => $title,
									'template'        => [
										'pages/'.$slug.'.php',
										TEMPLATEPATH . 'pages/'.$slug.'.php'
									]
								];
	$router->add_route( $slug, $route_args );
}


/*
 * Is route
 */

function is_route($route) {
	return get_query_var('route') == $route;
}

/*
 * Empty callback
 */
function empty_callback( ) { return ''; }
?>
