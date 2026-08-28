<?php
/**
 * Block Name: Three Cards
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'three_cards_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$_title = trim_string( get_field( 'three_cards_title' ) );
$items  = get_array( get_field( 'three_cards_items' ) );

if ( empty( $items ) ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-three-cards endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-three-cards__wrapper endovi-wrapper">
		<?php if ( $_title ) : ?>
			<div class="endovi-three-cards__title-container">
				<h2 class="endovi-three-cards__title h2 text-white">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="endovi-three-cards__items flex fwrap jcc">
			<?php
			foreach ( $items as $item ) :
				$item_description = trim_string( $item['description'] ?? '' );
				$item_image       = (int) ( $item['image'] ?? 0 );

				if ( ! $item_description ) {
					continue;
				}
				?>
				<div class="endovi-three-cards__item-outer">
					<div class="endovi-three-cards__item endovi-card <?php echo esc_attr( $item_image ? 'endovi-three-cards__item_image' : '' ); ?>">
						<?php if ( $item_image ) : ?>
							<div class="endovi-three-cards__item-image-container img-contain">
								<?php endovi_the_image( $item_image, 'endovi-three-cards__item-image' ); ?>
							</div>
						<?php endif; ?>
						<div class="endovi-three-cards__item-description-container">
							<p class="endovi-three-cards__item-description text-normal">
								<?php echo wp_kses_post( $item_description ); ?>
							</p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
