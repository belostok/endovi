<?php

namespace endoviTheme\Blocks\NewsFilters;

use endoviTheme\Constants\Constants;
use WP_Query;
use function endoviTheme\Helpers\trim_string;

defined( 'ABSPATH' ) || exit;

add_action( 'init', __NAMESPACE__ . '\\register_block' );
add_action( 'init', __NAMESPACE__ . '\\register_fields' );
add_filter( 'acf/load_field/key=field_6aa526a8b4f85', __NAMESPACE__ . '\\load_media_type_field_choices' );
add_action( 'wp_ajax_endovi_filter_news', __NAMESPACE__ . '\\filter_news' );
add_action( 'wp_ajax_nopriv_endovi_filter_news', __NAMESPACE__ . '\\filter_news' );

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
			'key'                   => 'group_6aa5266ecdd1f',
			'title'                 => esc_attr__( 'Блок Новости с категориями', 'endovi' ),
			'fields'                => array(
				array(
					'key'               => 'field_6aa5266fb4f84',
					'label'             => esc_attr__( 'Заголовок', 'endovi' ),
					'name'              => 'news_filters_title',
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
					'key'               => 'field_6aa526a8b4f85',
					'label'             => esc_attr__( 'Тип статей', 'endovi' ),
					'name'              => 'news_filters_media_type',
					'aria-label'        => '',
					'type'              => 'select',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'choices'           => array(),
					'default_value'     => false,
					'return_format'     => 'value',
					'multiple'          => 0,
					'allow_null'        => 0,
					'allow_in_bindings' => 0,
					'ui'                => 1,
					'ajax'              => 0,
					'placeholder'       => '',
					'create_options'    => 0,
					'save_options'      => 0,
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'block',
						'operator' => '==',
						'value'    => 'endovi/news-filters',
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

/**
 * Populate media type select with top-level terms that have children.
 *
 * @param array $field ACF field settings.
 * @return array
 */
function load_media_type_field_choices( array $field ): array {
	$field['choices'] = get_media_type_parent_choices();

	return $field;
}

/**
 * Get top-level media type terms that have child terms.
 *
 * @return array<string, string>
 */
function get_media_type_parent_choices(): array {
	$choices = array();

	$terms = get_terms(
		array(
			'taxonomy'   => Constants::TAX_MEDIA_TYPES_SLUG,
			'parent'     => 0,
			'hide_empty' => false,
		)
	);

	if ( is_wp_error( $terms ) || empty( $terms ) ) {
		return $choices;
	}

	foreach ( $terms as $term ) {
		$children = get_terms(
			array(
				'taxonomy'   => Constants::TAX_MEDIA_TYPES_SLUG,
				'parent'     => $term->term_id,
				'hide_empty' => false,
				'fields'     => 'ids',
				'number'     => 1,
			)
		);

		if ( ! is_wp_error( $children ) && ! empty( $children ) ) {
			$choices[ (string) $term->term_id ] = $term->name;
		}
	}

	return $choices;
}

/**
 * Query news posts for a media type, optional child category and search.
 *
 * @param int    $media_type_id Parent media type term ID.
 * @param int    $category_id   Child category term ID, or 0 for all.
 * @param string $search        Search string.
 * @return int[]
 */
function query_news_posts( int $media_type_id, int $category_id = 0, string $search = '' ): array {
	if ( ! $media_type_id ) {
		return array();
	}

	$term_id          = $category_id ?: $media_type_id;
	$include_children = ! $category_id;

	$args = array(
		'post_type'      => Constants::PT_SLUG_NEWS,
		'post_status'    => 'publish',
		'posts_per_page' => 100,
		'fields'         => 'ids',
		'tax_query'      => array(
			array(
				'taxonomy'         => Constants::TAX_MEDIA_TYPES_SLUG,
				'field'            => 'term_id',
				'terms'            => $term_id,
				'include_children' => $include_children,
			),
		),
	);

	$query = new WP_Query( $args );
	$items = $query->posts ?: array();

	if ( ! $search || empty( $items ) ) {
		return $items;
	}

	return array_values(
		array_filter(
			$items,
			static function ( $item ) use ( $search ) {
				return news_post_matches_search( (int) $item, $search );
			}
		)
	);
}

/**
 * Match a news post against a search string.
 *
 * Looks in title, excerpt, content and the news_dates field.
 *
 * @param int    $post_id Post ID.
 * @param string $search  Search string.
 * @return bool
 */
function news_post_matches_search( int $post_id, string $search ): bool {
	$post = get_post( $post_id );

	if ( ! $post ) {
		return false;
	}

	$haystack = mb_strtolower(
		implode(
			"\n",
			array(
				$post->post_title,
				$post->post_excerpt,
				wp_strip_all_tags( (string) $post->post_content ),
				trim_string( get_field( 'news_dates', $post_id ) ),
			)
		)
	);

	$words = preg_split( '/\s+/u', mb_strtolower( $search ), -1, PREG_SPLIT_NO_EMPTY );

	if ( empty( $words ) ) {
		return true;
	}

	foreach ( $words as $word ) {
		if ( false === mb_strpos( $haystack, $word ) ) {
			return false;
		}
	}

	return true;
}

/**
 * Get child media-type terms assigned to posts.
 *
 * @param int[] $items          Post IDs.
 * @param int   $media_type_id Parent media type term ID.
 * @return array
 */
function get_news_object_terms( array $items, int $media_type_id ): array {
	if ( empty( $items ) || ! $media_type_id ) {
		return array();
	}

	$object_terms = wp_get_object_terms(
		$items,
		Constants::TAX_MEDIA_TYPES_SLUG,
		array(
			'parent' => $media_type_id,
			'fields' => 'all_with_object_id',
		)
	);

	if ( is_wp_error( $object_terms ) || empty( $object_terms ) ) {
		return array();
	}

	return $object_terms;
}

/**
 * Map post ID to child category name.
 *
 * @param int[] $items          Post IDs.
 * @param int   $media_type_id Parent media type term ID.
 * @return array<int, string>
 */
function get_news_badges( array $items, int $media_type_id ): array {
	$object_terms = get_news_object_terms( $items, $media_type_id );

	return $object_terms
		? wp_list_pluck( $object_terms, 'name', 'object_id' )
		: array();
}

/**
 * Render news cards HTML.
 *
 * @param int[]            $items  Post IDs.
 * @param array<int, string> $badges Post ID => badge label.
 * @return string
 */
function render_news_items( array $items, array $badges = array() ): string {
	ob_start();

	foreach ( $items as $item ) {
		$item         = (int) $item;
		$post_title   = get_the_title( $item );
		$post_link    = get_permalink( $item );
		$post_image   = get_post_thumbnail_id( $item );
		$post_excerpt = get_the_excerpt( $item );
		$post_date    = trim_string( get_field( 'news_dates', $item ) );
		$post_badge   = trim_string( $badges[ $item ] ?? '' );

		if ( ! $post_title || ! $post_link ) {
			continue;
		}

		get_template_part(
			'partials/media-post',
			null,
			array(
				'title'   => $post_title,
				'link'    => $post_link,
				'image'   => $post_image,
				'excerpt' => $post_excerpt,
				'date'    => $post_date,
				'badge'   => $post_badge,
			)
		);
	}

	$html = trim( (string) ob_get_clean() );

	if ( $html ) {
		return $html;
	}

	ob_start();
	?>
	<p class="endovi-news-filters__empty">
		<?php echo esc_html__( 'По такому запросу ничего не найдено', 'endovi' ); ?>
	</p>
	<?php

	return (string) ob_get_clean();
}

/**
 * AJAX: filter news by category and search.
 *
 * @return void
 */
function filter_news() {
	check_ajax_referer( 'endovi-nonce', 'nonce' );

	$media_type_id = absint( wp_unslash( $_POST['media_type'] ?? 0 ) );
	$category_id   = absint( wp_unslash( $_POST['category'] ?? 0 ) );
	$search        = trim_string( sanitize_text_field( wp_unslash( $_POST['search'] ?? '' ) ) );

	if ( ! $media_type_id ) {
		wp_send_json_error();
	}

	$media_type = get_term( $media_type_id, Constants::TAX_MEDIA_TYPES_SLUG );

	if ( ! $media_type || is_wp_error( $media_type ) ) {
		wp_send_json_error();
	}

	if ( $category_id ) {
		$category = get_term( $category_id, Constants::TAX_MEDIA_TYPES_SLUG );

		if ( ! $category || is_wp_error( $category ) || (int) $category->parent !== $media_type_id ) {
			wp_send_json_error();
		}
	}

	$items  = query_news_posts( $media_type_id, $category_id, $search );
	$badges = get_news_badges( $items, $media_type_id );

	wp_send_json_success(
		array(
			'html' => render_news_items( $items, $badges ),
		)
	);
}
