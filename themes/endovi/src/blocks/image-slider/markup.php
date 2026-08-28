<?php
/**
 * Block Name: Image Slider
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'image_slider_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$items = get_array( get_field( 'image_slider_items' ) );

if ( empty( $items ) ) {
	return null;
}

$media_count = count(
	array_filter(
		$items,
		fn( $item ) => ! empty( $item['image'] ) || ! empty( $item['video'] )
	)
);

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-image-slider endovi-container relative js-image-slider ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-image-slider__wrapper relative">
		<div class="endovi-image-slider__slider-container relative">
			<div class="endovi-image-slider__slider js-image-slider-slider">
				<div class="swiper-wrapper">
					<?php
					$i = 1;
					foreach ( $items as $item ) :
						$image = (int) ( $item['image'] ?? 0 );
						$video = (int) ( $item['video'] ?? 0 );
						if ( ! $image && ! $video ) {
							continue;
						}
						$description = trim_string( $item['description'] ?? '' );
						?>
						<div class="endovi-image-slider__slide swiper-slide">
							<div class="endovi-image-slider__slide-inner relative flex aife">
								<?php
								if ( $video ) :
									$poster = wp_get_attachment_url( $image );
									?>
									<div class="endovi-image-slider__image-container absolute img-cover">
										<video
											poster="<?php echo esc_url( $poster ); ?>"
											class="endovi-image-slider__video"
											playsinline
										>
											<source src="<?php echo esc_url( wp_get_attachment_url( $video ) ); ?>" type="video/mp4">
										</video>
									</div>
									<button type="button" class="endovi-image-slider__play-button absolute img-contain default-hover flex aic jcc js-play-button" aria-label="<?php esc_attr_e( 'Play video', 'endovi' ); ?>">
										<svg width="25" height="28" viewBox="0 0 25 28" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M23.3984 12.0491C24.7318 12.8189 24.7318 14.7434 23.3984 15.5132L2.99844 27.2911C1.66511 28.0609 -0.00156156 27.0987 -0.0015615 25.5591L-0.00156047 2.00321C-0.0015604 0.463608 1.66511 -0.498645 2.99844 0.271155L23.3984 12.0491Z" fill="#FF9462"/>
										</svg>
									</button>
								<?php else : ?>
									<div class="endovi-image-slider__image-container absolute img-cover">
										<?php endovi_the_image( $image, 'endovi-image-slider__image' ); ?>
									</div>
								<?php endif; ?>
								<?php if ( $description ) : ?>
									<div class="endovi-image-slider__card flex fdc relative">
										<div class="endovi-image-slider__counter-container text-gray">
											<span class="endovi-image-slider__counter-current">
												<?php echo esc_html( sprintf( '%02d', $i ) ); ?>
											</span>/
											<span class="endovi-image-slider__counter-total">
												<?php echo esc_html( sprintf( '%02d', $media_count ) ); ?>
											</span>
										</div>
										<div class="endovi-image-slider__description-container fg1 flex aife">
											<p class="endovi-image-slider__description text-normal">
												<?php echo wp_kses_post( $description ); ?>
											</p>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<?php
						++ $i;
					endforeach;
					?>
				</div>
			</div>
			<button
				class="endovi-image-slider__nav endovi-image-slider__nav_prev endovi-nav endovi-nav_prev js-nav-prev">
				<svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M0.146446 4.03544C-0.0488157 3.84018 -0.0488157 3.52359 0.146446 3.32833L3.32843 0.146351C3.52369 -0.0489108 3.84027 -0.0489108 4.03553 0.146351C4.2308 0.341614 4.2308 0.658196 4.03553 0.853458L1.20711 3.68189L4.03553 6.51031C4.2308 6.70557 4.2308 7.02216 4.03553 7.21742C3.84027 7.41268 3.52369 7.41268 3.32843 7.21742L0.146446 4.03544ZM9.5 3.68188L9.5 4.18188L0.5 4.18189L0.5 3.68189L0.5 3.18189L9.5 3.18188L9.5 3.68188Z"
						fill="#020033"/>
				</svg>
			</button>
			<button
				class="endovi-image-slider__nav endovi-image-slider__nav_next endovi-nav endovi-nav_next js-nav-next">
				<svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M9.35355 4.03544C9.54882 3.84018 9.54882 3.52359 9.35355 3.32833L6.17157 0.146351C5.97631 -0.0489108 5.65973 -0.0489108 5.46447 0.146351C5.2692 0.341614 5.2692 0.658196 5.46447 0.853458L8.29289 3.68189L5.46447 6.51031C5.2692 6.70557 5.2692 7.02216 5.46447 7.21742C5.65973 7.41268 5.97631 7.41268 6.17157 7.21742L9.35355 4.03544ZM0 3.68188L-4.37113e-08 4.18188L9 4.18189L9 3.68189L9 3.18189L4.37113e-08 3.18188L0 3.68188Z"
						fill="#020033"/>
				</svg>
			</button>
			<div class="endovi-image-slider__pagination endovi-pagination js-pagination"></div>
		</div>
	</div>
</section>
