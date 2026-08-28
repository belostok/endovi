<?php
/**
 * Block Name: Vertical Cards Right
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'vertical_cards_right_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$_title             = trim_string( get_field( 'vertical_cards_right_title' ) );
$title_color        = trim_string( get_field( 'vertical_cards_right_title_color' ) );
$title_color_mobile = trim_string( get_field( 'vertical_cards_right_title_color_mobile' ) );
$title_color_mobile = $title_color_mobile ? $title_color_mobile : $title_color;
$image              = (int) get_field( 'vertical_cards_right_image' );
$image_mobile       = (int) get_field( 'vertical_cards_right_image_mobile' );
$image_mobile       = $image_mobile ? $image_mobile : $image;
$items              = get_array( get_field( 'vertical_cards_right_items' ) );

if ( empty( $items ) || ! $image ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-vertical-cards-right endovi-container relative ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-vertical-cards-right__image-container img-contain absolute">
		<?php endovi_the_image( $image, 'endovi-vertical-cards-right__image desktop' ); ?>
		<?php endovi_the_image( $image_mobile, 'endovi-vertical-cards-right__image mobile' ); ?>
	</div>
	<div class="endovi-vertical-cards-right__wrapper endovi-wrapper relative flex">
		<?php if ( $_title ) : ?>
			<div class="endovi-vertical-cards-right__title-container relative fg1">
				<h2
					class="endovi-vertical-cards-right__title h2 desktop"
					<?php echo $title_color ? 'style="color:' . esc_attr( $title_color ) . '"' : ''; ?>
				>
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
				<h2
					class="endovi-vertical-cards-right__title h2 mobile"
					<?php echo $title_color_mobile ? 'style="color:' . esc_attr( $title_color_mobile ) . '"' : ''; ?>
				>
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="endovi-vertical-cards-right__items relative flex fdc fwrap">
			<?php foreach ( $items as $item ) : ?>
				<?php
				get_template_part(
					'partials/card',
					null,
					array(
						'title' => trim_string( $item['description'] ?? '' ),
					)
				);
				?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
