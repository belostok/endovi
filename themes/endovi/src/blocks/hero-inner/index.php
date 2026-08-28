<?php

namespace endoviTheme\Blocks\HeroInner;

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
			'key'                   => 'group_69ce669823kl6',
			'title'                 => esc_attr__( 'Hero Inner block', 'endovi' ),
			'fields'                => array(
				array(
					'key'               => 'field_69ce66993dbbr',
					'label'             => esc_attr__( 'Заголовок', 'endovi' ),
					'name'              => 'hero_inner_title',
					'aria-label'        => '',
					'type'              => 'textarea',
					'instructions'      => esc_attr__( 'Используется заголовок поста, если не заполнено', 'endovi' ),
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
					'key'               => 'field_6a6cad6a1co8u',
					'label'             => esc_attr__( 'Скрыть описание', 'endovi' ),
					'name'              => 'hero_inner_hide_description',
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
					'key'               => 'field_69ce66993djjb',
					'label'             => esc_attr__( 'Описание', 'endovi' ),
					'name'              => 'hero_inner_description',
					'aria-label'        => '',
					'type'              => 'textarea',
					'instructions'      => esc_attr__( 'Используется отрывок поста, если не заполнено', 'endovi' ),
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_6a6cad6a1co8u',
								'operator' => '!=',
								'value'    => '1',
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
					'key'               => 'field_69ce68ced4k7h',
					'label'             => esc_attr__( 'Изображение', 'endovi' ),
					'name'              => 'hero_inner_image',
					'aria-label'        => '',
					'type'              => 'image',
					'instructions'      => esc_attr__( 'Используется изображение поста, если не заполнено', 'endovi' ),
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
			),
			'location'              => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'endovi/hero-inner',
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
