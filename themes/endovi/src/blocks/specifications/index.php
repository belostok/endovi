<?php

namespace endoviTheme\Blocks\Specifications;

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
			'key'                   => 'group_6a5a2bace8d52',
			'title'                 => esc_attr__( 'Блок Характеристики', 'endovi' ),
			'fields'                => array(
				array(
					'key'               => 'field_6a5a2badd39bd',
					'label'             => esc_attr__( 'Скрыть', 'endovi' ),
					'name'              => 'specifications_hide',
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
					'key'               => 'field_6a5a2c3c5236f',
					'label'             => esc_attr__( 'Заголовок', 'endovi' ),
					'name'              => 'specifications_title',
					'aria-label'        => '',
					'type'              => 'textarea',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_6a5a2c3c52kl7',
								'operator' => '==empty',
							),
						),
					),
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
					'key'                   => 'field_6a5a2c6acdb62',
					'label'                 => esc_attr__( 'Цвет заголовка', 'endovi' ),
					'name'                  => 'specifications_title_color',
					'aria-label'            => '',
					'type'                  => 'color_picker',
					'instructions'          => esc_attr__( 'Заменяет цвет по-умолчанию', 'endovi' ),
					'required'              => 0,
					'conditional_logic'     => array(
						array(
							array(
								'field'    => 'field_6a5a2c3c52kl7',
								'operator' => '==empty',
							),
						),
					),
					'wrapper'               => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'         => '',
					'enable_opacity'        => 0,
					'return_format'         => 'string',
					'allow_in_bindings'     => 0,
					'show_custom_palette'   => 0,
					'show_color_wheel'      => 1,
					'custom_palette_source' => '',
					'palette_colors'        => '',
				),
				array(
					'key'               => 'field_6a5a2c3c52kl7',
					'label'             => esc_attr__( 'Описание', 'endovi' ),
					'name'              => 'specifications_description',
					'aria-label'        => '',
					'type'              => 'textarea',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_6a5a2c3c5236f',
								'operator' => '==empty',
							),
						),
					),
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
					'key'               => 'field_6a5a2ce0e734d',
					'label'             => esc_attr__( 'Изображение фона', 'endovi' ),
					'name'              => 'specifications_image',
					'aria-label'        => '',
					'type'              => 'image',
					'instructions'      => esc_attr__( 'Десктоп', 'endovi' ),
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '50',
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
				),
				array(
					'key'               => 'field_6a5a2ce0e7nb6',
					'label'             => esc_attr__( 'Изображение фона', 'endovi' ),
					'name'              => 'specifications_image_mobile',
					'aria-label'        => '',
					'type'              => 'image',
					'instructions'      => esc_attr__( 'Мобайл', 'endovi' ),
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '50',
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
				),
				array(
					'key'               => 'field_6a5a2ce0e7bnf',
					'label'             => esc_attr__( 'Изображение', 'endovi' ),
					'name'              => 'specifications_image_center',
					'aria-label'        => '',
					'type'              => 'image',
					'instructions'      => esc_attr__( 'Центральное', 'endovi' ),
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_6a5a2c3c52kl7',
								'operator' => '==empty',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
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
				),
				array(
					'key'               => 'field_6a5a2cfde734e',
					'label'             => esc_attr__( 'Карточки', 'endovi' ),
					'name'              => 'specifications_items',
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
					'button_label'      => esc_attr__( 'Добавить', 'endovi' ),
					'rows_per_page'     => 20,
					'sub_fields'        => array(
						array(
							'key'               => 'field_6a5a2db8e734f',
							'label'             => esc_attr__( 'Описание', 'endovi' ),
							'name'              => 'description',
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
							'parent_repeater'   => 'field_6a5a2cfde734e',
						),
					),
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'endovi/specifications',
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
