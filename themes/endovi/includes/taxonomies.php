<?php

namespace endoviTheme\Taxonomies;

use endoviTheme\Constants\Constants;

function start() {
	$callback = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'init', $callback( 'register_taxonomies' ) );
}

/**
 * Register taxonomies.
 * @return void
 */
function register_taxonomies() {
	register_taxonomy(
		Constants::TAX_CATALOG_TYPES_SLUG,
		array(
			Constants::PT_SLUG_CATALOG,
		),
		array(
			'label'             => '',
			'labels'            => [
				'name'              => esc_attr__( 'Типы', 'endovi' ),
				'singular_name'     => esc_attr__( 'Тип', 'endovi' ),
				'search_items'      => esc_attr__( 'Поиск типов', 'endovi' ),
				'all_items'         => esc_attr__( 'Все типы', 'endovi' ),
				'view_item'         => esc_attr__( 'Просмотр типов', 'endovi' ),
				'parent_item'       => esc_attr__( 'Родительский тип', 'endovi' ),
				'parent_item_colon' => esc_attr__( 'Родительский тип:', 'endovi' ),
				'edit_item'         => esc_attr__( 'Редактировать тип', 'endovi' ),
				'update_item'       => esc_attr__( 'Обновить тип', 'endovi' ),
				'add_new_item'      => esc_attr__( 'Добавить тип', 'endovi' ),
				'new_item_name'     => esc_attr__( 'Новый тип', 'endovi' ),
				'menu_name'         => esc_attr__( 'Типы', 'endovi' ),
			],
			'description'       => esc_attr__( 'Типы оборудования', 'endovi' ),
			'public'            => true,
			'hierarchical'      => false,
			'rewrite'           => true,
			'meta_box_cb'       => null,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rest_base'         => 'catalog-types',
		)
	);

	register_taxonomy(
		Constants::TAX_CATALOG_SERIES_SLUG,
		array(
			Constants::PT_SLUG_CATALOG,
		),
		array(
			'label'             => '',
			'labels'            => [
				'name'              => esc_attr__( 'Серии', 'endovi' ),
				'singular_name'     => esc_attr__( 'Серия', 'endovi' ),
				'search_items'      => esc_attr__( 'Поиск серий', 'endovi' ),
				'all_items'         => esc_attr__( 'Все серии', 'endovi' ),
				'view_item'         => esc_attr__( 'Просмотр серий', 'endovi' ),
				'parent_item'       => esc_attr__( 'Родительская серия', 'endovi' ),
				'parent_item_colon' => esc_attr__( 'Родительская серия:', 'endovi' ),
				'edit_item'         => esc_attr__( 'Редактировать серию', 'endovi' ),
				'update_item'       => esc_attr__( 'Обновить серию', 'endovi' ),
				'add_new_item'      => esc_attr__( 'Добавить серию', 'endovi' ),
				'new_item_name'     => esc_attr__( 'Новая серия', 'endovi' ),
				'menu_name'         => esc_attr__( 'Серии', 'endovi' ),
			],
			'description'       => esc_attr__( 'Серии оборудования', 'endovi' ),
			'public'            => true,
			'hierarchical'      => false,
			'rewrite'           => true,
			'meta_box_cb'       => null,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rest_base'         => null,
		)
	);

	register_taxonomy(
		Constants::TAX_MEDIA_TYPES_SLUG,
		array(
			Constants::PT_SLUG_NEWS,
		),
		array(
			'label'             => '',
			'labels'            => [
				'name'              => esc_attr__( 'Типы', 'endovi' ),
				'singular_name'     => esc_attr__( 'Тип', 'endovi' ),
				'search_items'      => esc_attr__( 'Поиск типов', 'endovi' ),
				'all_items'         => esc_attr__( 'Все типы', 'endovi' ),
				'view_item'         => esc_attr__( 'Просмотр типов', 'endovi' ),
				'parent_item'       => esc_attr__( 'Родительский тип', 'endovi' ),
				'parent_item_colon' => esc_attr__( 'Родительский тип:', 'endovi' ),
				'edit_item'         => esc_attr__( 'Редактировать тип', 'endovi' ),
				'update_item'       => esc_attr__( 'Обновить тип', 'endovi' ),
				'add_new_item'      => esc_attr__( 'Добавить тип', 'endovi' ),
				'new_item_name'     => esc_attr__( 'Новый тип', 'endovi' ),
				'menu_name'         => esc_attr__( 'Типы', 'endovi' ),
			],
			'description'       => esc_attr__( 'Типы медиа', 'endovi' ),
			'public'            => true,
			'hierarchical'      => true,
			'rewrite'           => true,
			'meta_box_cb'       => null,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rest_base'         => 'media-types',
		)
	);
}
