<?php

namespace endoviTheme\Blocks\Form;

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
			'key'                   => 'group_6a6cad69712f6',
			'title'                 => esc_attr__( 'Блок Форма', 'endovi' ),
			'fields'                => array(
				array(
					'key'               => 'field_6a6cad6a1ca94',
					'label'             => esc_attr__( 'Скрыть', 'endovi' ),
					'name'              => 'form_hide',
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
					'key'               => 'field_6a6cad931ca95',
					'label'             => esc_attr__( 'Заголовок', 'endovi' ),
					'name'              => 'form_title',
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
					'rows'              => 4,
					'placeholder'       => '',
					'new_lines'         => 'br',
				),
				array(
					'key'                  => 'field_6a6cadb71ca96',
					'label'                => esc_attr__( 'Форма', 'endovi' ),
					'name'                 => 'form_form',
					'aria-label'           => '',
					'type'                 => 'post_object',
					'instructions'         => '',
					'required'             => 0,
					'conditional_logic'    => 0,
					'wrapper'              => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'post_type'            => array(
						0 => 'wpcf7_contact_form',
					),
					'post_status'          => '',
					'taxonomy'             => '',
					'return_format'        => 'id',
					'multiple'             => 0,
					'allow_null'           => 0,
					'allow_in_bindings'    => 0,
					'bidirectional'        => 0,
					'ui'                   => 1,
					'bidirectional_target' => array(),
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'endovi/form',
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
