<?php
/**
 * Block Name: Dealers
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'dealers_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$_title   = trim_string( get_field( 'dealers_title' ) );
$items    = get_array( get_field( 'dealers_items' ) );
$cta_text = trim_string( get_field( 'dealers_cta_text' ) );
$cta_link = trim_string( get_field( 'dealers_cta_link' ) );

if ( empty( $items ) ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-dealers ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-dealers__upper endovi-container relative">
		<div class="endovi-dealers__upper-wrapper endovi-wrapper">
			<?php if ( $_title ) : ?>
				<div class="endovi-dealers__title-container">
					<h2 class="endovi-dealers__title h2">
						<?php echo esc_html( $_title ); ?>
					</h2>
				</div>
			<?php endif; ?>
			<?php if ( $cta_text && $cta_link ) : ?>
				<div class="endovi-dealers__button-container flex jcc">
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
	</div>
	<div class="endovi-dealers__slider-container">
		<div class="endovi-dealers__slider js-dealers-slider" data-autoplay="1">
			<div class="endovi-dealers__slider-wrapper swiper-wrapper">
				<?php
				foreach ( $items as $item ) :
					$image = (int) ( $item['image'] ?? 0 );

					if ( ! $image ) {
						continue;
					}
					?>
					<div class="endovi-dealers__slide swiper-slide">
						<div class="endovi-dealers__image-container img-contain">
							<?php endovi_the_image( $image, 'endovi-dealers__image' ); ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
