<?php

namespace endoviTheme\Blocks\CenterCard;

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
			'key'                   => 'group_69cfc4d998681',
			'title'                 => esc_attr__( 'Center Card block', 'endovi' ),
			'fields'                => array(
				array(
					'key'               => 'field_69cfc4dad8efe',
					'label'             => esc_attr__( 'Скрыть', 'endovi' ),
					'name'              => 'center_card_hide',
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
					'key'               => 'field_69cfc513d8eff',
					'label'             => esc_attr__( 'Текст фона', 'endovi' ),
					'name'              => 'center_card_bg_text',
					'aria-label'        => '',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => esc_attr__( 'Информационное сообщество', 'endovi' ),
					'maxlength'         => '',
					'allow_in_bindings' => 0,
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
				),
				array(
					'key'               => 'field_69cfc553d8f00',
					'label'             => esc_attr__( 'Описание', 'endovi' ),
					'name'              => 'center_card_description',
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
					'rows'              => '',
					'placeholder'       => '',
					'new_lines'         => 'br',
				),
				array(
					'key'               => 'field_69cfc59425330',
					'label'             => esc_attr__( 'Текст кнопки', 'endovi' ),
					'name'              => 'center_card_cta_text',
					'aria-label'        => '',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '50',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'maxlength'         => 25,
					'allow_in_bindings' => 0,
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
				),
				array(
					'key'               => 'field_69cfc5c6552bf',
					'label'             => esc_attr__( 'Ссылка кнопки', 'endovi' ),
					'name'              => 'center_card_cta_link',
					'aria-label'        => '',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '50',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'maxlength'         => '',
					'allow_in_bindings' => 0,
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'endovi/center-card',
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
