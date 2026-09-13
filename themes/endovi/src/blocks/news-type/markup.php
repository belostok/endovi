<?php
/**
 * Block Name: News Type
 *
 * @var $block
 */

use endoviTheme\Constants\Constants;
use function endoviTheme\Helpers\trim_string;

if ( empty( $block['id'] ) ) {
	return null;
}

$news_type_id = (int) get_field( 'news_type_id' );

if ( ! $news_type_id ) {
	return null;
}

$query = new WP_Query(
	array(
		'post_type'      => Constants::PT_SLUG_NEWS,
		'post_status'    => 'publish',
		'posts_per_page' => 100,
		'fields'         => 'ids',
		'tax_query'      => array(
			array(
				'taxonomy' => Constants::TAX_MEDIA_TYPES_SLUG,
				'field'    => 'term_id',
				'terms'    => $news_type_id,
			),
		),
	)
);

$items = $query->posts;

if ( empty( $items ) ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-news-type endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

if ( ! empty( $block['className'] ) ) {
	$class_names .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$class_names .= ' align' . $block['align'];
}
?>
<section
	class="<?php echo esc_attr( $class_names ); ?>"
	<?php echo $anchor; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
>
	<div class="endovi-news-type__wrapper endovi-wrapper">
		<div class="endovi-news-type__items flex fwrap">
			<?php
			foreach ( $items as $item ) :
				get_template_part(
					'partials/media-post',
					null,
					array(
						'title'   => get_the_title( $item ),
						'link'    => get_permalink( $item ),
						'image'   => get_post_thumbnail_id( $item ),
						'excerpt' => get_the_excerpt( $item ),
						'date'    => trim_string( get_field( 'news_dates', $item ) ),
					)
				);
			endforeach;
			?>
		</div>
	</div>
</section>
