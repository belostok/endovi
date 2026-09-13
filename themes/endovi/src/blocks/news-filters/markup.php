<?php
/**
 * Block Name: News Filters
 *
 * @var $block
 */

use endoviTheme\Constants\Constants;
use function endoviTheme\Blocks\NewsFilters\get_news_object_terms;
use function endoviTheme\Blocks\NewsFilters\query_news_posts;
use function endoviTheme\Blocks\NewsFilters\render_news_items;
use function endoviTheme\Helpers\trim_string;

if ( empty( $block['id'] ) ) {
	return null;
}

$_title = trim_string( get_field( 'news_filters_title' ) );
$_title = $_title ? $_title : get_the_title();

if ( ! $_title ) {
	return null;
}

$media_type_id = (int) get_field( 'news_filters_media_type' );

if ( ! $media_type_id ) {
	return null;
}

$term_query = new WP_Term_Query(
	array(
		'taxonomy'   => Constants::TAX_MEDIA_TYPES_SLUG,
		'parent'     => $media_type_id,
		'hide_empty' => false,
	)
);

$categories = ! empty( $term_query->terms )
	? wp_list_pluck( $term_query->terms, 'name', 'term_id' )
	: array();

$items        = query_news_posts( $media_type_id );
$object_terms = get_news_object_terms( $items, $media_type_id );
$badges       = $object_terms
	? wp_list_pluck( $object_terms, 'name', 'object_id' )
	: array();

if ( $object_terms ) {
	$categories = array_intersect_key(
		$categories,
		array_flip( wp_list_pluck( $object_terms, 'term_id' ) )
	);
}

if ( empty( $categories ) && empty( $items ) ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-news-filters endovi-container js-news-filters ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

if ( ! empty( $block['className'] ) ) {
	$class_names .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$class_names .= ' align' . $block['align'];
}
?>
<section
	class="<?php echo esc_attr( $class_names ); ?>"
	data-id="<?php echo esc_attr( $media_type_id ); ?>"
	<?php echo $anchor; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
>
	<div class="endovi-news-filters__wrapper endovi-wrapper">
		<div class="endovi-news-filters__title-block">
			<?php
			get_template_part(
				'partials/breadcrumbs',
				null,
				array(
					'classes' => 'endovi-hero-inner__breadcrumbs-container',
				)
			);
			?>
			<div class="endovi-news-filters__title-wrapper flex fwrap jcspb aife">
				<div class="endovi-news-filters__title-container">
					<h1 class="endovi-news-filters__title h1">
						<?php echo wp_kses_post( $_title ); ?>
					</h1>
				</div>
				<div class="endovi-news-filters__search-container">
					<form
						class="endovi-news-filters__search-wrapper endovi-form js-search-form"
						data-id="<?php echo esc_attr( $media_type_id ); ?>"
					>
						<input
							type="text"
							name="search"
							placeholder="<?php echo esc_attr__( 'Поиск', 'endovi' ); ?>"
							class="endovi-news-filters__search"
						>
						<button type="submit" class="endovi-news-filters__search-button default-hover absolute img-contain">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M9.5 16C7.68333 16 6.146 15.3707 4.888 14.112C3.63 12.8533 3.00067 11.316 3 9.5C2.99933 7.684 3.62867 6.14667 4.888 4.888C6.14733 3.62933 7.68467 3 9.5 3C11.3153 3 12.853 3.62933 14.113 4.888C15.373 6.14667 16.002 7.684 16 9.5C16 10.2333 15.8833 10.925 15.65 11.575C15.4167 12.225 15.1 12.8 14.7 13.3L20.3 18.9C20.4833 19.0833 20.575 19.3167 20.575 19.6C20.575 19.8833 20.4833 20.1167 20.3 20.3C20.1167 20.4833 19.8833 20.575 19.6 20.575C19.3167 20.575 19.0833 20.4833 18.9 20.3L13.3 14.7C12.8 15.1 12.225 15.4167 11.575 15.65C10.925 15.8833 10.2333 16 9.5 16ZM9.5 14C10.75 14 11.8127 13.5627 12.688 12.688C13.5633 11.8133 14.0007 10.7507 14 9.5C13.9993 8.24933 13.562 7.187 12.688 6.313C11.814 5.439 10.7513 5.00133 9.5 5C8.24867 4.99867 7.18633 5.43633 6.313 6.313C5.43967 7.18967 5.002 8.252 5 9.5C4.998 10.748 5.43567 11.8107 6.313 12.688C7.19033 13.5653 8.25267 14.0027 9.5 14Z" fill="#020033"/>
							</svg>
						</button>
					</form>
				</div>
			</div>
			<div class="endovi-news-filters__categories">
				<div class="endovi-news-filters__categories-wrapper flex fwrap">
					<button
						type="button"
						class="endovi-news-filters__category-button endovi-button js-news-filters-cat-button endovi-news-filters__category-button_active"
						data-id="0"
					>
						<span><?php echo esc_html__( 'Все', 'endovi' ); ?></span>
						<svg width="10" height="8" viewBox="0 0 10 8" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
								d="M9.35355 4.03544C9.54882 3.84018 9.54882 3.52359 9.35355 3.32833L6.17157 0.146351C5.97631 -0.0489108 5.65973 -0.0489108 5.46447 0.146351C5.2692 0.341614 5.2692 0.658196 5.46447 0.853458L8.29289 3.68189L5.46447 6.51031C5.2692 6.70557 5.2692 7.02216 5.46447 7.21742C5.65973 7.41268 5.97631 7.41268 6.17157 7.21742L9.35355 4.03544ZM0 3.68188L-4.37113e-08 4.18188L9 4.18189L9 3.68189L9 3.18189L4.37113e-08 3.18188L0 3.68188Z"
								fill="#020033"/>
						</svg>
					</button>
					<?php
					foreach ( $categories as $cat_id => $cat_title ) :
						$cat_id    = (int) $cat_id;
						$cat_title = trim_string( $cat_title );

						if ( ! $cat_id || ! $cat_title ) {
							continue;
						}
						?>
						<button
							type="button"
							class="endovi-news-filters__category-button endovi-button js-news-filters-cat-button"
							data-id="<?php echo esc_attr( $cat_id ); ?>"
						>
							<span><?php echo esc_html( $cat_title ); ?></span>
							<svg width="10" height="8" viewBox="0 0 10 8" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M9.35355 4.03544C9.54882 3.84018 9.54882 3.52359 9.35355 3.32833L6.17157 0.146351C5.97631 -0.0489108 5.65973 -0.0489108 5.46447 0.146351C5.2692 0.341614 5.2692 0.658196 5.46447 0.853458L8.29289 3.68189L5.46447 6.51031C5.2692 6.70557 5.2692 7.02216 5.46447 7.21742C5.65973 7.41268 5.97631 7.41268 6.17157 7.21742L9.35355 4.03544ZM0 3.68188L-4.37113e-08 4.18188L9 4.18189L9 3.68189L9 3.18189L4.37113e-08 3.18188L0 3.68188Z"
									fill="#020033"/>
							</svg>
						</button>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="endovi-news-filters__items-block">
			<div class="endovi-news-filters__items js-news-filters-items">
				<?php echo render_news_items( $items, $badges ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
		</div>
	</div>
</section>
