<?php
/**
 * Block Name: Feedback Cards
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'feedback_cards_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$items = get_array( get_field( 'feedback_cards_items' ) );

if ( empty( $items ) ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-feedback-cards endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-feedback-cards__wrapper endovi-wrapper">
		<div class="endovi-feedback-cards__items">
			<?php
			foreach ( $items as $item ) :
				$feedback = trim_string( $item['feedback'] ?? '' );
				$name     = trim_string( $item['name'] ?? '' );
				$position = trim_string( $item['position'] ?? '' );

				if ( ! $feedback ) {
					continue;
				}
				?>
				<div class="endovi-feedback-cards__item">
					<div class="endovi-feedback-cards__item-feedback-container">
						<h4 class="endovi-feedback-cards__item-feedback h4">
							<?php echo wp_kses_post( $feedback ); ?>
						</h4>
					</div>
					<?php if ( $name ) : ?>
						<div class="endovi-feedback-cards__item-name-container">
							<h4 class="endovi-feedback-cards__item-name h4">
								<?php echo wp_kses_post( $name ); ?>
							</h4>
						</div>
					<?php endif; ?>
					<?php if ( $position ) : ?>
						<div class="endovi-feedback-cards__item-position-container">
							<p class="endovi-feedback-cards__item-position text-normal text-gray">
								<?php echo wp_kses_post( $position ); ?>
							</p>
						</div>
					<?php endif; ?>
				</div>
				<?php
			endforeach;
			?>
		</div>
	</div>
</section>
