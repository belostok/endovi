<?php
/**
 * Block Name: Feedback
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'feedback_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$_title = trim_string( get_field( 'feedback_title' ) );
$items  = get_array( get_field( 'feedback_items' ) );

if ( empty( $items ) ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-feedback endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-feedback__wrapper endovi-wrapper">
		<?php if ( $_title ) : ?>
			<div class="endovi-feedback__title-container">
				<h2 class="endovi-feedback__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="endovi-feedback__slider-container relative">
			<div class="endovi-feedback__slider js-feedback-slider" data-autoplay="1">
				<div class="endovi-feedback__slider-wrapper swiper-wrapper">
					<?php
					foreach ( $items as $item ) :
						$item_description = trim_string( $item['description'] ?? '' );
						$item_position    = trim_string( $item['position'] ?? '' );

						if ( ! $item_description ) {
							continue;
						}
						?>
						<div class="endovi-feedback__slide swiper-slide">
							<div class="endovi-feedback__slide-inner flex fdc jcspb">
								<div class="endovi-feedback__slide-description-container">
									<h4 class="endovi-feedback__slide-description h4">
										<?php echo wp_kses_post( $item_description ); ?>
									</h4>
								</div>
								<?php if ( $item_position ) : ?>
									<div class="endovi-feedback__slide-position-container">
										<span class="endovi-feedback__slide-position">
											<?php echo esc_html( $item_position ); ?>
										</span>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="endovi-feedback__pagination endovi-pagination js-pagination"></div>
			<div class="endovi-feedback__nav-container">
				<button
					class="endovi-feedback__nav endovi-feedback__nav_prev endovi-nav endovi-nav_fill endovi-nav_prev js-nav-prev">
					<svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M0.146446 4.03544C-0.0488157 3.84018 -0.0488157 3.52359 0.146446 3.32833L3.32843 0.146351C3.52369 -0.0489108 3.84027 -0.0489108 4.03553 0.146351C4.2308 0.341614 4.2308 0.658196 4.03553 0.853458L1.20711 3.68189L4.03553 6.51031C4.2308 6.70557 4.2308 7.02216 4.03553 7.21742C3.84027 7.41268 3.52369 7.41268 3.32843 7.21742L0.146446 4.03544ZM9.5 3.68188L9.5 4.18188L0.5 4.18189L0.5 3.68189L0.5 3.18189L9.5 3.18188L9.5 3.68188Z"
							fill="white"/>
					</svg>
				</button>
				<button
					class="endovi-feedback__nav endovi-feedback__nav_next endovi-nav endovi-nav_fill endovi-nav_next js-nav-next">
					<svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M9.35355 4.03544C9.54882 3.84018 9.54882 3.52359 9.35355 3.32833L6.17157 0.146351C5.97631 -0.0489108 5.65973 -0.0489108 5.46447 0.146351C5.2692 0.341614 5.2692 0.658196 5.46447 0.853458L8.29289 3.68189L5.46447 6.51031C5.2692 6.70557 5.2692 7.02216 5.46447 7.21742C5.65973 7.41268 5.97631 7.41268 6.17157 7.21742L9.35355 4.03544ZM0 3.68188L-4.37113e-08 4.18188L9 4.18189L9 3.68189L9 3.18189L4.37113e-08 3.18188L0 3.68188Z"
							fill="white"/>
					</svg>
				</button>
			</div>
		</div>
	</div>
</section>
