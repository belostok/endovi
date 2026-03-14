<?php

namespace endoviTheme\CPT;

function start() {
	$callback = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'init', $callback( 'register_post_type_brand' ) );
	add_action( 'register_post_type_args', $callback( 'modify_post_type_args' ), 10, 2 );
}

/**
 * Change settings of the registered post-types.
 *
 * @param array  $args      Post-type arguments.
 * @param string $post_type Post-type name.
 */
function modify_post_type_args( $args, $post_type ): array {
	// Completely hide the default 'post' post-type.
	if ( $post_type === 'post' ) {
		$args['public']              = false;
		$args['show_ui']             = false;
		$args['show_in_menu']        = false;
		$args['show_in_admin_bar']   = false;
		$args['show_in_nav_menus']   = false;
		$args['can_export']          = false;
		$args['has_archive']         = false;
		$args['exclude_from_search'] = true;
		$args['publicly_queryable']  = false;
		$args['show_in_rest']        = false;
	}

	return $args;
}

/**
 * Register post type
 * @return void
 */
function register_post_type_brand() {

}

