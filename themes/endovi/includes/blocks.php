<?php

namespace endoviTheme\Blocks;

function start() {
	$callback = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	// Register function on init must have higher priority than each block itself
	add_action( 'init', $callback( 'register_theme_blocks' ), 9 );

	// Load block assets only when they are rendered
	add_filter( 'should_load_separate_core_block_assets', '__return_false' );
	add_filter( 'allowed_block_types_all', $callback( 'allowed_block_types' ), 10, 2 );
}


/**
 * Write your blocks here, just folder name from src/blocks.
 *
 * @return void
 */
function register_theme_blocks() {
	$blocks = array(
		'additions',
		'alternating',
		'catalog',
		'center-card',
		'center-text-icons',
		'contacts',
		'dealers',
		'dealers-description',
		'distributors',
		'email',
		'equipment',
		'feedback',
		'feedback-cards',
		'four-cards',
		'form',
		'hero',
		'hero-inner',
		'hero-manufacturer',
		'hero-second',
		'image-three-cards',
		'image-slider',
		'mission',
		'models',
		'news',
		'note-image',
		'simple',
		'single-card',
		'specifications',
		'support',
		'tech-specifications',
		'three-cards',
		'three-cards-description',
		'title-description-image',
		'two-cards',
		'two-cards-description',
		'vacancies',
		'values',
		'vertical-cards-image',
		'vertical-cards-right',
		'warning',
	);

	foreach ( $blocks as $block ) {
		$block_path = ENDOVI_THEME_BLOCKS . "$block/index.php";

		// Fix for local environment, ToDo check on other OS
		$block_path = str_replace( '\\', '/', $block_path );

		if ( file_exists( $block_path ) ) {
			require_once $block_path;
		}
	}
}

function allowed_block_types( $allowed_blocks, $editor_context ): array {
	$blocks = \WP_Block_Type_Registry::get_instance()->get_all_registered();

	return array_keys( $blocks );
}
