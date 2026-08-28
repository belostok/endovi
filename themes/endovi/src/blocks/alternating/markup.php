<?php
/**
 * Block Name: Alternating
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'alternating_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$items = get_array( get_field( 'alternating_items' ) );

if ( empty( $items ) ) {
	return null;
}

$_title = trim_string( get_field( 'alternating_title' ) );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-alternating endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-alternating__wrapper endovi-wrapper">
		<?php if ( $_title ) : ?>
			<div class="endovi-alternating__title-container">
				<h2 class="endovi-alternating__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="endovi-alternating__items">
			<?php
			foreach ( $items as $item ) :
				$item_title       = trim_string( $item['title'] ?? '' );
				$item_sub_title   = trim_string( $item['sub_title'] ?? '' );
				$item_description = trim_string( $item['description'] ?? '' );
				$item_footer      = trim_string( $item['footer'] ?? '' );
				$item_icon        = (int) ( $item['icon'] ?? 0 );
				$item_images      = get_array( $item['images'] ?? [] );

				if ( ! $item_title || empty( $item_images ) ) {
					continue;
				}
				?>
				<div class="endovi-alternating__item">
					<div class="endovi-alternating__item-side flex fdc">
						<div class="endovi-alternating__item-header">
							<div class="endovi-alternating__item-title-section flex jcspb">
								<div class="endovi-alternating__item-title-container">
									<h2 class="endovi-alternating__item-title h2">
										<?php echo wp_kses_post( $item_title ); ?>
									</h2>
								</div>
								<?php if ( $item_icon ) : ?>
									<div class="endovi-alternating__item-icon-container flex jcc aic">
										<?php endovi_the_image( $item_icon, 'endovi-alternating__item-icon' ); ?>
									</div>
								<?php endif; ?>
							</div>
							<?php if ( $item_sub_title ) : ?>
								<div class="endovi-alternating__item-sub-title-container">
									<h4 class="endovi-alternating__item-sub-title h4">
										<?php echo wp_kses_post( $item_sub_title ); ?>
									</h4>
								</div>
							<?php endif; ?>
						</div>
						<div class="endovi-alternating__item-body fg1">
							<?php if ( $item_description ) : ?>
								<div class="endovi-alternating__item-description-container">
									<p class="endovi-alternating__item-description text-normal text-gray">
										<?php echo wp_kses_post( $item_description ); ?>
									</p>
								</div>
							<?php endif; ?>
						</div>
						<?php if ( $item_footer ) : ?>
							<div class="endovi-alternating__item-footer">
								<div class="endovi-alternating__item-footer-inner">
									<?php echo wp_kses_post( $item_footer ); ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="endovi-alternating__item-side relative">
						<div class="endovi-alternating__item-images flex fwrap jcc relative">
							<div class="endovi-alternating__item-images-scroll-icon absolute mobile">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M15.0078 4.497H20.9988M15.0078 4.497C15.0078 3.797 16.9988 2.491 17.5038 2M15.0078 4.497C15.0078 5.197 16.9988 6.503 17.5038 6.994" stroke="#5B5B66" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M6.53589 14.4486V9.97856V4.45856C6.53589 3.63756 7.22089 2.97656 8.04189 2.97656C8.86389 2.97656 9.51089 3.63756 9.51089 4.45856V8.45856M9.51089 8.45856V10.9866M9.51089 8.45856C10.0689 7.54856 12.0979 7.91756 12.4929 9.63556M6.53589 9.98056C5.21889 11.1726 3.80189 12.6786 3.61089 13.0646C2.72289 14.4146 2.81589 15.0696 3.80589 16.7216C4.4394 17.7633 5.11908 18.7764 5.84289 19.7576C6.51389 20.5176 6.38089 20.5176 7.35389 21.2326C8.22389 21.8346 10.0269 22.2556 14.2539 21.8346C17.6979 21.3046 18.5239 18.3006 18.5049 16.8646V13.3216C18.7199 10.3756 17.4869 10.2416 15.2489 9.95156M12.4939 9.63356C12.4939 9.64156 12.4952 9.6489 12.4979 9.65556L12.5139 9.74356C12.5239 9.8209 12.5289 9.89956 12.5289 9.97956V10.9826M15.5139 11.9796V10.8346C15.3899 8.72856 12.3529 8.43656 12.4939 9.63356C12.4972 9.6689 12.5039 9.70556 12.5139 9.74356" stroke="#5B5B66" stroke-width="1.5" stroke-linecap="round"/>
								</svg>
							</div>
							<?php
							foreach ( $item_images as $item_image ) :
								$item_el_image = (int) ( $item_image['image'] ?? 0 );
								$item_el_title = trim_string( $item_image['title'] ?? '' );

								if ( ! $item_el_image ) {
									continue;
								}
								?>
								<div class="endovi-alternating__item-image-el flex fdc">
									<div class="endovi-alternating__item-image-container img-contain">
										<?php endovi_the_image( $item_el_image, 'endovi-alternating__item-image' ); ?>
									</div>
									<?php if ( $item_el_title ) : ?>
										<div class="endovi-alternating__item-image-title-container">
											<p class="endovi-alternating__item-image-title text-normal text-gray">
												<?php echo esc_html( $item_el_title ); ?>
											</p>
										</div>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
