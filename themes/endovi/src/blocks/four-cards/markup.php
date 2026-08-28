<?php
/**
 * Block Name: Four Cards
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'four_cards_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$items = get_array( get_field( 'four_cards_items' ) );

if ( empty( $items ) ) {
	return null;
}

$_title       = trim_string( get_field( 'four_cards_title' ) );
$title_color  = trim_string( get_field( 'four_cards_title_color' ) );
$image        = (int) get_field( 'four_cards_image' );
$image_mobile = (int) get_field( 'four_cards_image_mobile' );
$image_mobile = $image_mobile ? $image_mobile : $image;

$title_style = '';
if ( $title_color ) {
	$title_style = 'style=color:' . esc_attr( $title_color );
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-four-cards endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-four-cards__wrapper endovi-wrapper flex fdc jcspb relative">
		<?php if ( $image ) : ?>
			<div class="endovi-four-cards__image-container absolute img-cover">
				<?php endovi_the_image( $image, 'endovi-four-cards__image desktop' ); ?>
				<?php endovi_the_image( $image_mobile, 'endovi-four-cards__image mobile' ); ?>
			</div>
		<?php endif; ?>
		<?php if ( $_title ) : ?>
			<div class="endovi-four-cards__title-container relative">
				<h2
					class="endovi-four-cards__title h2"
					<?php echo esc_attr( $title_style ); ?>
				>
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="endovi-four-cards__items relative">
			<?php
			foreach ( $items as $item ) :
				$item_description = trim_string( $item['description'] ?? '' );

				if ( ! $item_description ) {
					continue;
				}
				?>
				<?php
				get_template_part(
					'partials/card',
					null,
					array(
						'title'   => $item_description,
						'classes' => 'endovi-four-cards__item',
					)
				);
				?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
