<?php

namespace endoviTheme\Enqueue;

use function endoviTheme\Helpers\get_version;

function start() {
	$callback = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	// Insert critical css as inline styles in the head
	add_filter( 'wp_head', $callback( 'add_critical_css' ), 5 );

	// Modify the maximum size of inlined styles
	add_filter( 'styles_inline_size_limit', $callback( 'styles_inline_size_limit' ) );

	// Add font preload before the styles
	add_action( 'wp_head', __NAMESPACE__ . '\\preload_font', 2 );

	// Load our frontend css and js
	add_action( 'wp_enqueue_scripts', $callback( 'enqueue_scripts' ), 1 );

	// Load our admin css and js
	add_action( 'admin_enqueue_scripts', $callback( 'admin_enqueue_scripts' ) );

	// Remove jquery migrate
	add_action( 'wp_default_scripts', $callback( 'wp_default_scripts' ) );
}

/**
 * Add inline critical styles.
 *
 * @return void
 */
function add_critical_css() {
	endovi_inline_style( 'critical' );
}

/**
 * Change the maximum size of inlined styles in bytes.
 *
 * @param int $total_inline_limit The file-size threshold, in bytes. Default 20000.
 *
 * @return int
 */
function styles_inline_size_limit( int $total_inline_limit ): int {
	return 100000;
}

/**
 * Add preload to important for Core Web Vitals fonts.
 * It's not recommended to add more than two preload connections.
 *
 * @return void
 */
function preload_font() {
	// Add theme fonts here
	/*
	?>
	<link
		rel="preload"
		href="<?php echo esc_url( ENDOVI_TEMPLATE_URL . 'build/fonts/BigShouldersDisplay-Variable.woff2' ); ?>"
		as="font"
		type="font/woff2" crossorigin
	>
	<?php
	*/
}

/**
 * Enqueue scripts.
 *
 * @return void
 */
function enqueue_scripts() {
	// Remove jQuery on frontend
	if ( ! is_admin() && ! wp_get_current_user() ) {
		wp_deregister_script( 'jquery' );
		wp_dequeue_script( 'jquery' );
	}

	$ver = get_version();

	wp_enqueue_style(
		'endovi-front-styles',
		ENDOVI_TEMPLATE_URL . 'build/front.css',
		[],
		$ver
	);

	wp_enqueue_script(
		'endovi-front-scripts',
		ENDOVI_TEMPLATE_URL . 'build/front.js',
		[],
		$ver,
		true
	);

	wp_enqueue_script(
		'endovi-front-delayed-scripts',
		ENDOVI_TEMPLATE_URL . 'build/front-delayed.js',
		[],
		$ver,
		true
	);

	// Localize our ajax
	wp_localize_script(
		'endovi-front-scripts',
		'endovi_ajax',
		[
			'url'   => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'endovi-nonce' ),
		]
	);
}

/**
 * Admin enqueue scripts.
 *
 * @return void
 */
function admin_enqueue_scripts() {
	$ver = get_version();

	wp_enqueue_style(
		'endovi-admin-styles',
		ENDOVI_TEMPLATE_URL . 'build/admin.css',
		[],
		$ver
	);

	wp_enqueue_script(
		'endovi-admin-scripts',
		ENDOVI_TEMPLATE_URL . 'build/admin.js',
		[ 'jquery' ],
		$ver,
		true
	);

	// Localize our ajax
	wp_localize_script(
		'endovi-admin-scripts',
		'endovi_ajax',
		[
			'url'   => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'endovi-nonce' ),
		]
	);
}

/**
 * Unset jQuery migrate on frontend.
 *
 * @param $scripts
 *
 * @return void
 */
function wp_default_scripts( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
		if ( $script->deps ) {
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
}
