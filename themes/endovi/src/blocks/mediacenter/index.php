<?php

namespace endoviTheme\Blocks\Mediacenter;

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
			'key'                   => 'group_6aa3c9104c122',
			'title'                 => esc_attr__( 'Блок Медиацентр', 'endovi' ),
			'fields'                => array(
				array(
					'key'                  => 'field_6aa3c911073dd',
					'label'                => esc_attr__( 'Разделы', 'endovi' ),
					'name'                 => 'mediacenter_items',
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
						0 => 'page',
					),
					'post_status'          => '',
					'taxonomy'             => '',
					'filters'              => array(
						0 => 'search',
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
						'value'    => 'endovi/mediacenter',
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
