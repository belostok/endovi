<?php
/**
 * Block Name: Two Cards
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'two_cards_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$items = get_array( get_field( 'two_cards_items' ) );

if ( empty( $items ) ) {
	return null;
}

$_title      = trim_string( get_field( 'two_cards_title' ) );
$description = trim_string( get_field( 'two_cards_description' ) );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-two-cards endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-two-cards__wrapper endovi-wrapper">
		<div class="endovi-two-cards__header flex jcspb">
			<?php if ( $_title ) : ?>
				<div class="endovi-two-cards__title-container">
					<h2 class="endovi-two-cards__title h2">
						<?php echo wp_kses_post( $_title ); ?>
					</h2>
				</div>
			<?php endif; ?>
			<?php if ( $description ) : ?>
				<div class="endovi-two-cards__description-container">
					<p class="endovi-two-cards__description text-normal text-gray">
						<?php echo wp_kses_post( $description ); ?>
					</p>
				</div>
			<?php endif; ?>
		</div>
		<div class="endovi-two-cards__items">
			<?php
			$i = 0;
			foreach ( $items as $item ) :
				$item_image       = (int) ( $item['image'] ?? 0 );
				$item_title       = trim_string( $item['title'] ?? '' );
				$item_description = trim_string( $item['description'] ?? '' );
				?>
				<?php if ( $i % 2 === 0 ) : ?>
					<div class="endovi-two-cards__item-row">
				<?php endif; ?>
				<div class="endovi-two-cards__item flex fdc">
					<div class="endovi-two-cards__item-upper flex fdc">
						<?php if ( $item_title ) : ?>
							<div class="endovi-two-cards__item-title-container">
								<h3 class="endovi-two-cards__item-title h3">
									<?php echo esc_html( $item_title ); ?>
								</h3>
							</div>
						<?php endif; ?>
						<?php if ( $item_image ) : ?>
							<div class="endovi-two-cards__item-image-container img-cover">
								<?php endovi_the_image( $item_image, 'endovi-two-cards__image' ); ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="endovi-two-cards__item-description-container">
						<?php if ( $item_description ) : ?>
							<p class="endovi-two-cards__item-description text-normal">
								<?php echo wp_kses_post( $item_description ); ?>
							</p>
						<?php endif; ?>
					</div>
				</div>
				<?php if ( $i % 2 === 1 || $i === count( $items ) - 1 ) : ?>
					</div>
				<?php endif; ?>
				<?php
				++$i;
			endforeach;
			?>
		</div>
	</div>
</section>
