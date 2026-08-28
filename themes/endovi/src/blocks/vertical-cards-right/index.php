<?php

namespace endoviTheme\Blocks\VerticalCardsRight;

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
			'key'                   => 'group_6a5e1e83e7cx6',
			'title'                 => esc_attr__( 'Блок Вертикальные карточки справа', 'endovi' ),
			'fields'                => array(
				array(
					'key'               => 'field_6a5e1e85c9m7h',
					'label'             => esc_attr__( 'Скрыть', 'endovi' ),
					'name'              => 'vertical_cards_right_hide',
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
					'key'               => 'field_6a5e2063b2nm6',
					'label'             => esc_attr__( 'Изображение', 'endovi' ),
					'name'              => 'vertical_cards_right_image',
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
					'key'               => 'field_6a5e20a7b2mmn',
					'label'             => esc_attr__( 'Изображение', 'endovi' ),
					'name'              => 'vertical_cards_right_image_mobile',
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
					'key'               => 'field_6a5e20c6b2vb4',
					'label'             => esc_attr__( 'Заголовок', 'endovi' ),
					'name'              => 'vertical_cards_right_title',
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
					'key'                   => 'field_6a5e2173b2mdd',
					'label'                 => esc_attr__( 'Цвет заголовка', 'endovi' ),
					'name'                  => 'vertical_cards_right_title_color',
					'aria-label'            => '',
					'type'                  => 'color_picker',
					'instructions'          => esc_attr__( 'Десктоп', 'endovi' ),
					'required'              => 0,
					'conditional_logic'     => 0,
					'wrapper'               => array(
						'width' => '50',
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
					'key'                   => 'field_6a5e2173b2mk7',
					'label'                 => esc_attr__( 'Цвет заголовка', 'endovi' ),
					'name'                  => 'vertical_cards_right_title_color_mobile',
					'aria-label'            => '',
					'type'                  => 'color_picker',
					'instructions'          => esc_attr__( 'Мобайл', 'endovi' ),
					'required'              => 0,
					'conditional_logic'     => 0,
					'wrapper'               => array(
						'width' => '50',
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
					'key'               => 'field_6a5e21a237n3d',
					'label'             => esc_attr__( 'Карточки', 'endovi' ),
					'name'              => 'vertical_cards_right_items',
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
					'max'               => 6,
					'collapsed'         => '',
					'button_label'      => esc_attr__( 'Добавить', 'endovi' ),
					'rows_per_page'     => 20,
					'sub_fields'        => array(
						array(
							'key'               => 'field_6a5e21f637vc2',
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
							'parent_repeater'   => 'field_6a5e21a237n3d',
						),
					),
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'endovi/vertical-cards-right',
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
