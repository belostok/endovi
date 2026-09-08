<?php

namespace endoviTheme\Blocks\Hero;

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
			'key'                   => 'group_69c64efe2b57b',
			'title'                 => esc_attr__( 'Hero', 'endovi' ),
			'fields'                => array(
				array(
					'key'               => 'field_69c65134add83',
					'label'             => esc_attr__( 'Слайдер', 'endovi' ),
					'name'              => 'hero_slider',
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
					'layout'            => 'block',
					'pagination'        => 0,
					'min'               => 9,
					'max'               => 0,
					'collapsed'         => '',
					'button_label'      => esc_attr__( 'Добавить слайд', 'endovi' ),
					'rows_per_page'     => 20,
					'sub_fields'        => array(
						array(
							'key'               => 'field_69c652c3add84',
							'label'             => esc_attr__( 'Изображение', 'endovi' ),
							'name'              => 'image',
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
							'parent_repeater'   => 'field_69c65134add83',
						),
						array(
							'key'               => 'field_69c64effadd7f',
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
							'rows'              => 2,
							'placeholder'       => '',
							'new_lines'         => 'br',
							'parent_repeater'   => 'field_69c65134add83',
						),
						array(
							'key'               => 'field_69c6506aadd80',
							'label'             => esc_attr__( 'Заметка', 'endovi' ),
							'name'              => 'note',
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
							'parent_repeater'   => 'field_69c65134add83',
						),
						array(
							'key'               => 'field_69c650a5add81',
							'label'             => esc_attr__( 'Текст кнопки', 'endovi' ),
							'name'              => 'cta_text',
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
							'maxlength'         => 50,
							'allow_in_bindings' => 0,
							'placeholder'       => '',
							'prepend'           => '',
							'append'            => '',
							'parent_repeater'   => 'field_69c65134add83',
						),
						array(
							'key'               => 'field_69c650dcadd82',
							'label'             => esc_attr__( 'Ссылка кнопки', 'endovi' ),
							'name'              => 'cta_link',
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
							'parent_repeater'   => 'field_69c65134add83',
						),
					),
				),
				array(
					'key'               => 'field_69c6531fadd86',
					'label'             => esc_attr__( 'Текст кнопки', 'endovi' ),
					'name'              => 'hero_cta_text_more',
					'aria-label'        => '',
					'type'              => 'text',
					'instructions'      => esc_attr__( 'Кнопка #2', 'endovi' ),
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '50',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'maxlength'         => 50,
					'allow_in_bindings' => 0,
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
				),
				array(
					'key'               => 'field_69c65325add87',
					'label'             => esc_attr__( 'Ссылка кнопки', 'endovi' ),
					'name'              => 'hero_cta_link_more',
					'aria-label'        => '',
					'type'              => 'text',
					'instructions'      => esc_attr__( 'Кнопка #2', 'endovi' ),
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
						'value'    => 'endovi/hero',
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
