<?php

namespace endoviTheme\Blocks\ImageThreeCards;

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
			'key'                   => 'group_69cfb80fe279a',
			'title'                 => esc_attr__( 'Image Three Cards block', 'endovi' ),
			'fields'                => array(
				array(
					'key'               => 'field_69cfb81052276',
					'label'             => esc_attr__( 'Скрыть', 'endovi' ),
					'name'              => 'image_three_cards_hide',
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
					'key'               => 'field_69cfb85f412f6',
					'label'             => esc_attr__( 'Заголовок', 'endovi' ),
					'name'              => 'image_three_cards_title',
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
					'key'               => 'field_69cfb891bd992',
					'label'             => esc_attr__( 'Описание', 'endovi' ),
					'name'              => 'image_three_cards_description',
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
					'key'               => 'field_69cfb8be85225',
					'label'             => esc_attr__( 'Изображение', 'endovi' ),
					'name'              => 'image_three_cards_image',
					'aria-label'        => '',
					'type'              => 'image',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
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
					'key'               => 'field_69cfb8d785226',
					'label'             => esc_attr__( 'Подзаголовок', 'endovi' ),
					'name'              => 'image_three_cards_sub_title',
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
					'key'               => 'field_69cfb91337a35',
					'label'             => esc_attr__( 'Карточки', 'endovi' ),
					'name'              => 'image_three_cards_items',
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
					'button_label'      => esc_attr__( 'Добавить карточку', 'endovi' ),
					'rows_per_page'     => 20,
					'sub_fields'        => array(
						array(
							'key'               => 'field_69cfb94237a36',
							'label'             => esc_attr__( 'Заголовок', 'endovi' ),
							'name'              => 'title',
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
							'parent_repeater'   => 'field_69cfb91337a35',
						),
					),
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'endovi/image-three-cards',
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
