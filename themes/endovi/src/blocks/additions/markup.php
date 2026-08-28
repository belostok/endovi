<?php
/**
 * Block Name: Additions
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'additions_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$_title = trim_string( get_field( 'additions_title' ) );
$items  = get_array( get_field( 'additions_items' ) );

if ( empty( $items ) ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-additions endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-additions__wrapper endovi-wrapper relative js-additions">
		<div class="endovi-additions__header flex jcspb aic">
			<div class="endovi-additions__title-container">
				<?php if ( $_title ) : ?>
					<h2 class="endovi-additions__title h2">
						<?php echo wp_kses_post( $_title ); ?>
					</h2>
				<?php endif; ?>
			</div>
			<div class="endovi-additions__nav-container flex">
				<button
					class="endovi-additions__nav endovi-additions__nav_prev endovi-nav endovi-nav_grouped endovi-nav_prev js-nav-prev">
					<svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M0.146446 4.03544C-0.0488157 3.84018 -0.0488157 3.52359 0.146446 3.32833L3.32843 0.146351C3.52369 -0.0489108 3.84027 -0.0489108 4.03553 0.146351C4.2308 0.341614 4.2308 0.658196 4.03553 0.853458L1.20711 3.68189L4.03553 6.51031C4.2308 6.70557 4.2308 7.02216 4.03553 7.21742C3.84027 7.41268 3.52369 7.41268 3.32843 7.21742L0.146446 4.03544ZM9.5 3.68188L9.5 4.18188L0.5 4.18189L0.5 3.68189L0.5 3.18189L9.5 3.18188L9.5 3.68188Z"
							fill="#020033"/>
					</svg>
				</button>
				<button
					class="endovi-additions__nav endovi-additions__nav_next endovi-nav endovi-nav_grouped endovi-nav_next js-nav-next">
					<svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M9.35355 4.03544C9.54882 3.84018 9.54882 3.52359 9.35355 3.32833L6.17157 0.146351C5.97631 -0.0489108 5.65973 -0.0489108 5.46447 0.146351C5.2692 0.341614 5.2692 0.658196 5.46447 0.853458L8.29289 3.68189L5.46447 6.51031C5.2692 6.70557 5.2692 7.02216 5.46447 7.21742C5.65973 7.41268 5.97631 7.41268 6.17157 7.21742L9.35355 4.03544ZM0 3.68188L-4.37113e-08 4.18188L9 4.18189L9 3.68189L9 3.18189L4.37113e-08 3.18188L0 3.68188Z"
							fill="#020033"/>
					</svg>
				</button>
			</div>
		</div>
		<div class="endovi-additions__slider-container">
			<div class="endovi-additions__slider js-additions-slider" data-autoplay="1">
				<div class="swiper-wrapper">
					<?php
					foreach ( $items as $item ) :
						$item_link  = get_permalink( $item );
						$item_title = get_the_title( $item );
						$item_image = get_post_thumbnail_id( $item );

						if ( ! $item_image || ! $item_link || ! $item_title ) {
							continue;
						}
						?>
						<div class="endovi-additions__slide swiper-slide">
							<a href="<?php echo esc_url( $item_link ); ?>" class="endovi-additions__item flex fdc default-hover">
								<div class="endovi-additions__image-container img-cover">
									<?php endovi_the_image( $item_image, 'endovi-additions__image' ); ?>
								</div>
								<div class="endovi-additions__item-title-container">
									<h4 class="endovi-additions__item-title h4">
										<?php echo wp_kses_post( $item_title ); ?>
									</h4>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
