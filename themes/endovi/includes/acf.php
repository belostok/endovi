<?php

namespace endoviTheme\ACF;

function start() {
	$callback = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	// Options page
	// https://www.advancedcustomfields.com/resources/options-page/
	add_action( 'init', $callback( 'register_options_page' ) );

	// You should register your fields in this hook
	// https://www.advancedcustomfields.com/resources/register-fields-via-php/
	add_action( 'init', $callback( 'register_fields' ) );
	// Show custom fields in admin area
	add_filter( 'acf/settings/show_admin', '__return_false' );

	// Register custom WYSIWYG toolbars (Mini, List, Heading)
	add_filter( 'acf/fields/wysiwyg/toolbars', $callback( 'wysiwyg_custom_toolbars' ), 10, 1 );
}

/**
 * Register options page.
 *
 * @return void
 */
function register_options_page() {
	if ( ! function_exists( 'acf_add_options_page' ) ) {
		return;
	}

	acf_add_options_page(
		[
			'page_title' => esc_attr__( 'Настройки сайта', 'endovi' ),
			'menu_title' => esc_attr__( 'Настройки сайта', 'endovi' ),
			'menu_slug'  => 'endovi-options',
			'capability' => 'edit_posts',
			'redirect'   => false,
		]
	);
}

/**
 * Register fields.
 *
 * @return void
 */
function register_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	$items = array(
		'options',
		'footer-menu',
	);
	foreach ( $items as $item ) {
		include_once sprintf( '%s/acf-fields/%s.php', __DIR__, $item );
	}
}


/**
 * @param $toolbars
 *
 * @return mixed
 */
function wysiwyg_custom_toolbars( $toolbars ) {

	$toolbars['Mini'] = [
		'1' => [
			'bold',
			'link',
			'wp_adv',
		],
		'2' => [
			'forecolor',
		],
	];

	$toolbars['List'] = [
		'1' => [
			'bold',
			'bullist',
			'link',
			'wp_adv',
		],
		'2' => [
			'forecolor',
		],
	];

	$toolbars['Heading'] = [
		'1' => [
			'formatselect',
		],
	];

	$toolbars['Heading_List'] = [
		'1' => [
			'formatselect',
			'bullist',
		],
	];

	$toolbars['Heading_Color'] = [
		'1' => [
			'formatselect',
		],
		'2' => [
			'forecolor',
		],
	];

	$toolbars['Heading_Link'] = [
		'1' => [
			'formatselect',
			'link',
		],
	];

	return $toolbars;
}
