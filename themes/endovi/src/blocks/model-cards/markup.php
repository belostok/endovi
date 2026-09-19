<?php
/**
 * Block Name: Model Cards
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'model_cards_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$items = get_array( get_field( 'model_cards_items' ) );

if ( empty( $items ) ) {
	return null;
}

$_title = trim_string( get_field( 'model_cards_title' ) );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-model-cards endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-model-cards__wrapper endovi-wrapper">
		<?php if ( $_title ) : ?>
			<div class="endovi-model-cards__title-container">
				<h2 class="endovi-model-cards__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="endovi-model-cards__items">
			<?php
			foreach ( $items as $item ) :
				$item_image       = (int) ( $item['image'] ?? 0 );
				$item_title       = trim_string( $item['title'] ?? '' );
				$item_subtitle    = trim_string( $item['subtitle'] ?? '' );
				$item_description = trim_string( $item['description'] ?? '' );
				?>
				<div class="endovi-model-cards__item">
					<div class="endovi-model-cards__item-inner flex fdc">
						<?php if ( $item_image ) : ?>
							<div class="endovi-model-cards__item-image-wrapper flex jcc aic">
								<div class="endovi-model-cards__item-image-container img-cover">
									<?php endovi_the_image( $item_image, 'endovi-model-cards__item-image' ); ?>
								</div>
							</div>
						<?php endif; ?>
						<?php if ( $item_title || $item_description || $item_subtitle ) : ?>
							<div class="endovi-model-cards__item-content flex fdc">
								<?php if ( $item_title ) : ?>
									<div class="endovi-model-cards__item-title-container">
										<h3 class="endovi-model-cards__item-title h3">
											<?php echo wp_kses_post( $item_title ); ?>
										</h3>
									</div>
								<?php endif; ?>
								<?php if ( $item_subtitle ) : ?>
									<div class="endovi-model-cards__item-subtitle-container">
										<p class="endovi-model-cards__item-subtitle text-normal">
											<?php echo wp_kses_post( $item_subtitle ); ?>
										</p>
									</div>
								<?php endif; ?>
								<?php if ( $item_description ) : ?>
									<div class="endovi-model-cards__item-description-container">
										<p class="endovi-model-cards__item-description text-normal text-gray">
											<?php echo wp_kses_post( $item_description ); ?>
										</p>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
