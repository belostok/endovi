<?php

namespace endoviTheme\Core;

function start() {
	$callback = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	// Theme features
	add_action( 'after_setup_theme', $callback( 'after_setup_theme' ) );
}

/**
 * After setup theme.
 *
 * @return void
 */
function after_setup_theme() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		[
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		]
	);

	register_nav_menus(
		[
			'header' => esc_html__( 'Header Menu', 'endovi' ),
			'footer' => esc_html__( 'Footer Menu', 'endovi' ),
		]
	);
}
