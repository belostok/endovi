<?php

namespace endoviTheme\Blocks\Values;

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
			'key'                   => 'group_69cffb0ccda98',
			'title'                 => esc_attr__( 'Values block', 'endovi' ),
			'fields'                => array(
				array(
					'key'               => 'field_69cffb0ed663b',
					'label'             => esc_attr__( 'Скрыть', 'endovi' ),
					'name'              => 'values_hide',
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
					'key'               => 'field_69cffb48d663c',
					'label'             => esc_attr__( 'Предзаголовок', 'endovi' ),
					'name'              => 'values_pre_title',
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
					'default_value'     => '',
					'maxlength'         => '',
					'allow_in_bindings' => 0,
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
				),
				array(
					'key'               => 'field_69cffb72d663d',
					'label'             => esc_attr__( 'Вкладки', 'endovi' ),
					'name'              => 'values_items',
					'aria-label'        => '',
					'type'              => 'repeater',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'layout'            => 'table',
					'pagination'        => 0,
					'min'               => 0,
					'max'               => 0,
					'collapsed'         => '',
					'button_label'      => esc_attr__( 'Добавить вкладку', 'endovi' ),
					'rows_per_page'     => 20,
					'sub_fields'        => array(
						array(
							'key'               => 'field_69cffbb3d663e',
							'label'             => esc_attr__( 'Текст кнопки', 'endovi' ),
							'name'              => 'button_title',
							'aria-label'        => '',
							'type'              => 'text',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '25',
								'class' => '',
								'id'    => '',
							),
							'default_value'     => '',
							'maxlength'         => 50,
							'allow_in_bindings' => 0,
							'placeholder'       => '',
							'prepend'           => '',
							'append'            => '',
							'parent_repeater'   => 'field_69cffb72d663d',
						),
						array(
							'key'               => 'field_69cffbe0d663f',
							'label'             => esc_attr__( 'Иконка', 'endovi' ),
							'name'              => 'content_icon',
							'aria-label'        => '',
							'type'              => 'image',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '10',
								'class' => '',
								'id'    => '',
							),
							'return_format'     => 'id',
							'library'           => 'all',
							'min_width'         => '',
							'min_height'        => '',
							'min_size'          => '',
							'max_width'         => '',
							'max_height'        => '',
							'max_size'          => '',
							'mime_types'        => '',
							'allow_in_bindings' => 0,
							'preview_size'      => 'medium',
							'parent_repeater'   => 'field_69cffb72d663d',
						),
						array(
							'key'               => 'field_69cffbfdd6640',
							'label'             => esc_attr__( 'Описание', 'endovi' ),
							'name'              => 'content_description',
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
							'parent_repeater'   => 'field_69cffb72d663d',
						),
					),
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'endovi/values',
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
