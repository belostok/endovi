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
				<div class="endovi-vertical-cards-image__scroll-image-inner img-contain">
					<?php endovi_the_image( $scroll_image, 'endovi-vertical-cards-image__scroll-image' ); ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
