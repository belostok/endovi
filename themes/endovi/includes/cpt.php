<?php

namespace endoviTheme\CPT;

use endoviTheme\Constants\Constants;

function start() {
	$callback = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'init', $callback( 'register_post_types' ) );
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
 * Register post types
 * @return void
 */
function register_post_types() {
	register_post_type(
		Constants::PT_SLUG_NEWS,
		[
			'label'                 => esc_attr__( 'Новости', 'xorit' ),
			'labels'                => [
				'name'          => esc_attr__( 'Новости', 'xorit' ),
				'singular_name' => esc_attr__( 'Новость', 'xorit' ),
			],
			'description'           => '',
			'public'                => true,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_rest'          => true,
			'rest_base'             => 'news',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'has_archive'           => false,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'delete_with_user'      => false,
			'exclude_from_search'   => false,
			'capability_type'       => 'post',
			'map_meta_cap'          => true,
			'hierarchical'          => true,
			'query_var'             => true,
			'supports'              => [
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'page-attributes',
			],
			'menu_icon'             => 'dashicons-star-filled',
		]
	);
}
