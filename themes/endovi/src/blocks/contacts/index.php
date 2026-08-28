<?php

namespace endoviTheme\Blocks\Contacts;

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
			'key'                   => 'group_6a89769897e2b',
			'title'                 => esc_attr__( 'Блок Контакты', 'endovi' ),
			'fields'                => array(
				array(
					'key'               => 'field_6a897699641df',
					'label'             => esc_attr__( 'Скрыть', 'endovi' ),
					'name'              => 'contacts_hide',
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
					'key'               => 'field_6a8976cf641e0',
					'label'             => esc_attr__( 'Заголовок', 'endovi' ),
					'name'              => 'contacts_title',
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
					'key'               => 'field_6a8976ed641e1',
					'label'             => esc_attr__( 'Контакты', 'endovi' ),
					'name'              => 'contacts_items',
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
					'layout'            => 'row',
					'pagination'        => 0,
					'min'               => 0,
					'max'               => 0,
					'collapsed'         => '',
					'button_label'      => esc_attr__( 'Добавить', 'endovi' ),
					'rows_per_page'     => 20,
					'sub_fields'        => array(
						array(
							'key'               => 'field_6a897706641e2',
							'label'             => esc_attr__( 'Заголовок', 'endovi' ),
							'name'              => 'title',
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
							'parent_repeater'   => 'field_6a8976ed641e1',
						),
						array(
							'key'               => 'field_6a89772a641e3',
							'label'             => '',
							'name'              => 'is_icons',
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
							'ui_on_text'        => esc_attr__( 'Иконки', 'endovi' ),
							'ui_off_text'       => esc_attr__( 'Текст', 'endovi' ),
							'ui'                => 1,
							'parent_repeater'   => 'field_6a8976ed641e1',
						),
						array(
							'key'               => 'field_6a89775a641e4',
							'label'             => esc_attr__( 'Иконки', 'endovi' ),
							'name'              => 'icons',
							'aria-label'        => '',
							'type'              => 'repeater',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => array(
								array(
									array(
										'field'    => 'field_6a89772a641e3',
										'operator' => '==',
										'value'    => '1',
									),
								),
							),
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
									'key'               => 'field_6a897784641e5',
									'label'             => esc_attr__( 'Ссылка', 'endovi' ),
									'name'              => 'link',
									'aria-label'        => '',
									'type'              => 'url',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'default_value'     => '',
									'allow_in_bindings' => 0,
									'placeholder'       => '',
									'parent_repeater'   => 'field_6a89775a641e4',
								),
								array(
									'key'               => 'field_6a8977b6641e6',
									'label'             => esc_attr__( 'Иконка', 'endovi' ),
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
									'parent_repeater'   => 'field_6a89775a641e4',
								),
							),
							'parent_repeater'   => 'field_6a8976ed641e1',
						),
						array(
							'key'               => 'field_6a8977df641e7',
							'label'             => esc_attr__( 'Текст', 'endovi' ),
							'name'              => 'values',
							'aria-label'        => '',
							'type'              => 'wysiwyg',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => array(
								array(
									array(
										'field'    => 'field_6a89772a641e3',
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
							'allow_in_bindings' => 0,
							'tabs'              => 'all',
							'toolbar'           => 'heading_link',
							'media_upload'      => 0,
							'delay'             => 0,
							'parent_repeater'   => 'field_6a8976ed641e1',
						),
					),
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'endovi/contacts',
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
