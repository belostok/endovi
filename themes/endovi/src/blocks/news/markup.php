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
				<div class="endovi-news__button-container endovi-news__button-container_desktop">
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
				$post_date    = gmdate( 'd .m. Y г.', strtotime( get_the_date( '', $item ) ) );

				if ( ! $post_title || ! $post_link ) {
					continue;
				}
				?>
				<a href="<?php echo esc_url( $post_link ); ?>" class="endovi-news-card default-hover">
					<?php if ( $post_image ) : ?>
						<div class="endovi-news-card__image-container img-cover">
							<?php endovi_the_image( $post_image, 'endovi-news-card__image' ); ?>
						</div>
					<?php endif; ?>
					<div class="endovi-news-card__text-side flex fdc jcspb">
						<div class="endovi-news-card__text-upper flex fdc">
							<div class="endovi-news-card__title-container">
								<h4 class="endovi-news-card h4">
									<?php echo esc_html( $post_title ); ?>
								</h4>
							</div>
							<?php if ( $post_excerpt ) : ?>
								<div class="endovi-news-card__description-container">
									<p class="endovi-news-card__description">
										<?php echo esc_html( $post_excerpt ); ?>
									</p>
								</div>
							<?php endif; ?>
						</div>
						<?php if ( $post_date ) : ?>
							<div class="endovi-news-card__date-container">
								<span class="endovi-news-card__date text-normal">
									<?php echo esc_html( $post_date ); ?>
								</span>
							</div>
						<?php endif; ?>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
		<?php if ( $cta_text && $cta_link ) : ?>
			<div class="endovi-news__button-container endovi-news__button-container_mobile">
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
