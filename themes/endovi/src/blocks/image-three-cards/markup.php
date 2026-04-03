<?php
/**
 * Block Name: Image Three Cards
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'image_three_cards_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$_title      = trim_string( get_field( 'image_three_cards_title' ) );
$description = trim_string( get_field( 'image_three_cards_description' ) );
$sub_title   = trim_string( get_field( 'image_three_cards_sub_title' ) );
$image       = (int) get_field( 'image_three_cards_image' );
$items       = get_array( get_field( 'image_three_cards_items' ) );

if ( empty( $items ) || ! $image ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-image-three-cards endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-image-three-cards__wrapper endovi-wrapper">
		<?php if ( $_title || $description ) : ?>
			<div class="endovi-image-three-cards__title-side flex">
				<?php if ( $sub_title ) : ?>
					<div class="endovi-image-three-cards__title-container fg1">
						<h2 class="endovi-image-three-cards__title h2">
							<?php echo wp_kses_post( $_title ); ?>
						</h2>
					</div>
				<?php endif; ?>
				<?php if ( $description ) : ?>
					<div class="endovi-image-three-cards__description-container">
						<p class="endovi-image-three-cards__description text-normal">
							<?php echo wp_kses_post( $description ); ?>
						</p>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<div class="endovi-image-three-cards__content relative flex fdc jcspb">
			<div class="endovi-image-three-cards__image-container img-cover absolute">
				<?php endovi_the_image( $image, 'endovi-image-three-cards__image' ); ?>
			</div>
			<?php if ( $sub_title ) : ?>
				<div class="endovi-image-three-cards__content-title-container relative">
					<h3 class="endovi-image-three-cards__content-title h3">
						<?php echo wp_kses_post( $sub_title ); ?>
					</h3>
				</div>
			<?php endif; ?>
			<div class="endovi-image-three-cards__items relative">
				<?php
				foreach ( $items as $item ) :
					$item_title = trim_string( $item['title'] ?? '' );

					if ( ! $item_title ) {
						continue;
					}
					?>
					<div class="endovi-image-three-cards__item">
						<div class="endovi-image-three-cards__item-title-container">
							<h4 class="endovi-image-three-cards__item-title h4">
								<?php echo wp_kses_post( $item_title ); ?>
							</h4>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
