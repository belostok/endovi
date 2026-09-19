<?php
/**
 * Block Name: Modes
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'modes_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$items = get_array( get_field( 'modes_items' ) );

if ( empty( $items ) ) {
	return null;
}

$_title      = trim_string( get_field( 'modes_title' ) );
$description = trim_string( get_field( 'modes_description' ) );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-modes endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-modes__wrapper endovi-wrapper">
		<?php if ( $_title ) : ?>
			<div class="endovi-modes__title-container">
				<h2 class="endovi-modes__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<?php if ( $description ) : ?>
			<div class="endovi-modes__description-container">
				<h4 class="endovi-modes__description h4 text-gray">
					<?php echo wp_kses_post( $description ); ?>
				</h4>
			</div>
		<?php endif; ?>
		<div class="endovi-modes__items flex fwrap jcc">
			<?php
			foreach ( $items as $item ) :
				$item_image       = (int) ( $item['image'] ?? 0 );
				$item_title       = trim_string( $item['title'] ?? '' );
				$item_description = trim_string( $item['description'] ?? '' );
				$item_note        = trim_string( $item['note'] ?? '' );
				?>
				<div class="endovi-modes__item">
					<div class="endovi-modes__item-inner flex fdc">
						<?php if ( $item_image ) : ?>
							<div class="endovi-modes__item-image-wrapper flex jcc aic">
								<div class="endovi-modes__item-image-container img-cover">
									<?php endovi_the_image( $item_image, 'endovi-modes__item-image' ); ?>
								</div>
							</div>
						<?php endif; ?>
						<?php if ( $item_title || $item_description || $item_note ) : ?>
							<div class="endovi-modes__item-content flex fdc">
								<?php if ( $item_title ) : ?>
									<div class="endovi-modes__item-title-container">
										<h4 class="endovi-modes__item-title h4">
											<?php echo wp_kses_post( $item_title ); ?>
										</h4>
									</div>
								<?php endif; ?>
								<?php if ( $item_description ) : ?>
									<div class="endovi-modes__item-description-container">
										<p class="endovi-modes__item-description text-small text-gray">
											<?php echo wp_kses_post( $item_description ); ?>
										</p>
									</div>
								<?php endif; ?>
								<?php if ( $item_note ) : ?>
									<div class="endovi-modes__item-note-container">
										<p class="endovi-modes__item-note text-small text-gray">
											<?php echo wp_kses_post( $item_note ); ?>
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
