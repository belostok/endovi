<?php

namespace endoviTheme\Blocks\Modes;

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
			'key'                   => 'group_6aae8e3e3054e',
			'title'                 => esc_attr__( 'Блок Режимы', 'endovi' ),
			'fields'                => array(
				array(
					'key'               => 'field_6aae8e3e246ca',
					'label'             => esc_attr__( 'Скрыть', 'endovi' ),
					'name'              => 'modes_hide',
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
					'key'               => 'field_6aae8e72246cb',
					'label'             => esc_attr__( 'Заголовок', 'endovi' ),
					'name'              => 'modes_title',
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
					'key'               => 'field_6aae8ea3246cc',
					'label'             => esc_attr__( 'Описание', 'endovi' ),
					'name'              => 'modes_description',
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
					'key'               => 'field_6aae8ed6246cd',
					'label'             => esc_attr__( 'Карточки', 'endovi' ),
					'name'              => 'modes_items',
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
					'min'               => 0,
					'max'               => 0,
					'collapsed'         => '',
					'button_label'      => esc_attr__( 'Добавить', 'endovi' ),
					'rows_per_page'     => 20,
					'sub_fields'        => array(
						array(
							'key'               => 'field_6a67a1e293xc5',
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
							'parent_repeater'   => 'field_6aae8ed6246cd',
						),
						array(
							'key'               => 'field_6aae8f02246ce',
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
							'parent_repeater'   => 'field_6aae8ed6246cd',
						),
						array(
							'key'               => 'field_6aae8f31246cf',
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
							'parent_repeater'   => 'field_6aae8ed6246cd',
						),
						array(
							'key'               => 'field_6aae8f51246d0',
							'label'             => esc_attr__( 'Заметка', 'endovi' ),
							'name'              => 'note',
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
							'parent_repeater'   => 'field_6aae8ed6246cd',
						),
					),
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'endovi/modes',
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
