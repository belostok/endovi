<?php

namespace endoviTheme\Blocks\NewsType;

use endoviTheme\Constants\Constants;

defined( 'ABSPATH' ) || exit;

add_action( 'init', __NAMESPACE__ . '\\register_block' );
add_action( 'init', __NAMESPACE__ . '\\register_fields' );

/**
 * Registers all block assets so that they can be enqueued through Gutenberg
 * in the corresponding context.
 */
function register_block() {
	register_block_type( __DIR__ );
}

/**
 * Register block fields
 * @return void
 */
function register_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'                   => 'group_6aa3ddf30cd12',
			'title'                 => esc_attr__( 'Блок Тип статей', 'endovi' ),
			'fields'                => array(
				array(
					'key'                  => 'field_6aa3ddf46bf19',
					'label'                => esc_attr__( 'Тип статей', 'endovi' ),
					'name'                 => 'news_type_id',
					'aria-label'           => '',
					'type'                 => 'taxonomy',
					'instructions'         => '',
					'required'             => 0,
					'conditional_logic'    => 0,
					'wrapper'              => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'taxonomy'             => Constants::TAX_MEDIA_TYPES_SLUG,
					'add_term'             => 0,
					'save_terms'           => 0,
					'load_terms'           => 0,
					'return_format'        => 'id',
					'field_type'           => 'select',
					'allow_null'           => 0,
					'allow_in_bindings'    => 0,
					'bidirectional'        => 0,
					'multiple'             => 0,
					'bidirectional_target' => array(),
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'endovi/news-type',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
			'show_in_rest'          => 0,
			'display_title'         => '',
		)
	);
}
