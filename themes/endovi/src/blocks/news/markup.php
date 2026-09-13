<?php
/**
 * Block Name: News
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'news_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$_title   = trim_string( get_field( 'news_title' ) );
$cta_text = trim_string( get_field( 'news_cta_text' ) );
$cta_link = trim_string( get_field( 'news_cta_link' ) );
$items    = get_array( get_field( 'news_items' ) );

if ( empty( $items ) ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-news endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-news__wrapper endovi-wrapper">
		<div class="endovi-news__upper flex fwrap aife jcspb">
			<?php if ( $_title ) : ?>
				<div class="endovi-news__title-container">
					<h2 class="endovi-news__title h2">
						<?php echo wp_kses_post( $_title ); ?>
					</h2>
				</div>
			<?php endif; ?>
			<?php if ( $cta_text && $cta_link ) : ?>
				<div class="endovi-news__button-container endovi-news__button-container_desktop desktop">
					<?php
					get_template_part(
						'partials/button',
						null,
						array(
							'text'    => $cta_text,
							'link'    => $cta_link,
							'classes' => 'endovi-button_orange',
						)
					);
					?>
				</div>
			<?php endif; ?>
		</div>
		<div class="endovi-news__items">
			<?php
			foreach ( $items as $item ) :
				$post_title   = get_the_title( $item );
				$post_link    = get_permalink( $item );
				$post_image   = get_post_thumbnail_id( $item );
				$post_excerpt = get_the_excerpt( $item );
				$post_date    = trim_string( get_field( 'news_dates', $item ) );

				if ( ! $post_title || ! $post_link ) {
					continue;
				}
				?>
				<?php
				get_template_part(
					'partials/media-post',
					null,
					array(
						'title'   => $post_title,
						'link'    => $post_link,
						'image'   => $post_image,
						'excerpt' => $post_excerpt,
						'date'    => $post_date,
					)
				);
				?>
			<?php endforeach; ?>
		</div>
		<?php if ( $cta_text && $cta_link ) : ?>
			<div class="endovi-news__button-container endovi-news__button-container_mobile mobile">
				<?php
				get_template_part(
					'partials/button',
					null,
					array(
						'text'    => $cta_text,
						'link'    => $cta_link,
						'classes' => 'endovi-button_orange',
					)
				);
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
