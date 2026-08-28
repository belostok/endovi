<?php

namespace endoviTheme\Blocks\Additions;

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
			'key'                   => 'group_6a6cd94517cf0',
			'title'                 => esc_attr__( 'Блок Дополнительно', 'endovi' ),
			'fields'                => array(
				array(
					'key'               => 'field_6a6cd945e4839',
					'label'             => esc_attr__( 'Скрыть', 'endovi' ),
					'name'              => 'additions_hide',
					'aria-label'        => '',
					'type'              => 'true_false',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'message'           => '',
					'default_value'     => 0,
					'allow_in_bindings' => 0,
					'ui_on_text'        => '',
					'ui_off_text'       => '',
					'ui'                => 1,
				),
				array(
					'key'               => 'field_6a6cd980e483a',
					'label'             => esc_attr__( 'Заголовок', 'endovi' ),
					'name'              => 'additions_title',
					'aria-label'        => '',
					'type'              => 'textarea',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'maxlength'         => '',
					'allow_in_bindings' => 0,
					'rows'              => 2,
					'placeholder'       => '',
					'new_lines'         => 'br',
				),
				array(
					'key'                  => 'field_6a6cd9a2e483b',
					'label'                => esc_attr__( 'Каталог', 'endovi' ),
					'name'                 => 'additions_items',
					'aria-label'           => '',
					'type'                 => 'relationship',
					'instructions'         => '',
					'required'             => 0,
					'conditional_logic'    => 0,
					'wrapper'              => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'post_type'            => array(
						0 => Constants::PT_SLUG_CATALOG,
					),
					'post_status'          => '',
					'taxonomy'             => '',
					'filters'              => array(
						0 => 'search',
						1 => 'taxonomy',
					),
					'return_format'        => 'id',
					'min'                  => '',
					'max'                  => '',
					'allow_in_bindings'    => 0,
					'elements'             => '',
					'bidirectional'        => 0,
					'bidirectional_target' => array(),
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'endovi/additions',
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
