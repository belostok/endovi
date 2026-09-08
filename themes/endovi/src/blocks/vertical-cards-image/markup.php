<?php
/**
 * Block Name: Vertical Cards Image
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'vertical_cards_image_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$image = (int) get_field( 'vertical_cards_image_image' );
$items = get_array( get_field( 'vertical_cards_image_items' ) );

if ( empty( $items ) || ! $image ) {
	return null;
}

$_title       = trim_string( get_field( 'vertical_cards_image_title' ) );
$title_color  = trim_string( get_field( 'vertical_cards_image_title_color' ) );
$image_mobile = (int) get_field( 'vertical_cards_image_image_mobile' );
$image_mobile = $image_mobile ? $image_mobile : $image;
$is_scroll    = (bool) get_field( 'vertical_cards_image_is_scroll' );
$scroll_image = (int) get_field( 'vertical_cards_image_scroll_image' );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-vertical-cards-image endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

if ( $is_scroll ) {
	$class_names .= ' endovi-vertical-cards-image_scroll';
}

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
	<div class="endovi-vertical-cards-image__wrapper endovi-wrapper relative">
		<div class="endovi-vertical-cards-image__image-container img-cover absolute">
			<?php endovi_the_image( $image, 'endovi-vertical-cards-image__image desktop' ); ?>
			<?php endovi_the_image( $image_mobile, 'endovi-vertical-cards-image__image mobile' ); ?>
		</div>
		<?php if ( $_title ) : ?>
			<div class="endovi-vertical-cards-image__title-container relative">
				<h2
					class="endovi-vertical-cards-image__title h2"
					<?php echo $title_color ? 'style="color:' . esc_attr( $title_color ) . '"' : ''; ?>
				>
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="endovi-vertical-cards-image__items relative flex fdc fwrap">
			<?php foreach ( $items as $item ) : ?>
				<?php
				get_template_part(
					'partials/card',
					'icon',
					array(
						'icon'        => (int) ( $item['icon'] ?? 0 ),
						'title'       => trim_string( $item['title'] ?? '' ),
						'description' => trim_string( $item['description'] ?? '' ),
					)
				);
				?>
			<?php endforeach; ?>
		</div>
		<?php if ( $is_scroll && $scroll_image ) : ?>
			<div class="endovi-vertical-cards-image__scroll-image-container absolute">
				<div class="endovi-vertical-cards-image__scroll-icon absolute img-contain mobile">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M15.0078 4.497H20.9988M15.0078 4.497C15.0078 3.797 16.9988 2.491 17.5038 2M15.0078 4.497C15.0078 5.197 16.9988 6.503 17.5038 6.994"
							stroke="#5B5B66" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path
							d="M6.53589 14.4486V9.97856V4.45856C6.53589 3.63756 7.22089 2.97656 8.04189 2.97656C8.86389 2.97656 9.51089 3.63756 9.51089 4.45856V8.45856M9.51089 8.45856V10.9866M9.51089 8.45856C10.0689 7.54856 12.0979 7.91756 12.4929 9.63556M6.53589 9.98056C5.21889 11.1726 3.80189 12.6786 3.61089 13.0646C2.72289 14.4146 2.81589 15.0696 3.80589 16.7216C4.4394 17.7633 5.11908 18.7764 5.84289 19.7576C6.51389 20.5176 6.38089 20.5176 7.35389 21.2326C8.22389 21.8346 10.0269 22.2556 14.2539 21.8346C17.6979 21.3046 18.5239 18.3006 18.5049 16.8646V13.3216C18.7199 10.3756 17.4869 10.2416 15.2489 9.95156M12.4939 9.63356C12.4939 9.64156 12.4952 9.6489 12.4979 9.65556L12.5139 9.74356C12.5239 9.8209 12.5289 9.89956 12.5289 9.97956V10.9826M15.5139 11.9796V10.8346C15.3899 8.72856 12.3529 8.43656 12.4939 9.63356C12.4972 9.6689 12.5039 9.70556 12.5139 9.74356"
							stroke="#5B5B66" stroke-width="1.5" stroke-linecap="round"/>
					</svg>
				</div>
				<div class="endovi-vertical-cards-image__scroll-image-wrapper">
					<div class="endovi-vertical-cards-image__scroll-image-inner img-contain">
						<?php endovi_the_image( $scroll_image, 'endovi-vertical-cards-image__scroll-image' ); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
