<?php
/**
 * Block Name: Models
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'models_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$image = (int) get_field( 'models_image' );
$items = get_array( get_field( 'models_items' ) );

if ( empty( $items ) || ! $image ) {
	return null;
}

$_title       = trim_string( get_field( 'models_title' ) );
$note         = trim_string( get_field( 'models_note' ) );
$image_mobile = (int) get_field( 'models_image_mobile' );
$image_mobile = $image_mobile ? $image_mobile : $image;
$v2           = (bool) get_field( 'models_v2' );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-models endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

if ( $v2 ) {
	$class_names .= ' endovi-models_v2';
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
	<div class="endovi-models__wrapper endovi-wrapper relative">
		<div class="endovi-models__image-container img-cover absolute">
			<?php endovi_the_image( $image, 'endovi-models__image desktop' ); ?>
			<?php endovi_the_image( $image_mobile, 'endovi-models__image mobile' ); ?>
		</div>
		<div class="endovi-models__items-container relative">
			<?php if ( $_title ) : ?>
				<div class="endovi-models__title-container">
					<h2 class="endovi-models__title h2">
						<?php echo wp_kses_post( $_title ); ?>
					</h2>
				</div>
			<?php endif; ?>
			<div class="endovi-models__items flex fdc">
				<?php
				$i = 0;
				foreach ( $items as $item ) :
					$item_link        = trim_string( $item['link'] ?? '' );
					$item_title       = trim_string( $item['title'] ?? '' );
					$item_description = trim_string( $item['description'] ?? '' );

					if ( ! $item_description ) {
						continue;
					}

					++ $i;
					?>
					<?php if ( $item_link ) : ?>
					<a href="<?php echo esc_url( $item_link ); ?>" class="endovi-models__item default-hover flex fdc">
					<?php else : ?>
					<div class="endovi-models__item flex fdc">
					<?php endif; ?>
						<?php if ( ! $v2 ) : ?>
							<?php if ( $item_title ) : ?>
								<div class="endovi-models__item-title-container">
									<h4 class="endovi-models__item-title h4">
										<?php echo wp_kses_post( $item_title ); ?>
									</h4>
								</div>
							<?php endif; ?>
						<?php else : ?>
							<div class="endovi-models__item-count-container">
								<p class="endovi-models__item-count text-small">
									<?php echo esc_html( sprintf( '%02d', $i ) ); ?>
								</p>
							</div>
						<?php endif; ?>
						<?php if ( $item_description ) : ?>
							<div class="endovi-models__item-description-container">
								<p class="endovi-models__item-description text-normal text-gray">
									<?php echo wp_kses_post( $item_description ); ?>
								</p>
							</div>
						<?php endif; ?>
					</<?php echo esc_html( $item_link ? 'a' : 'div' ); ?>>
				<?php endforeach; ?>
			</div>
			<?php if ( $note ) : ?>
				<div class="endovi-models__note-container">
					<p class="endovi-models__note text-small text-gray">
						<?php echo wp_kses_post( $note ); ?>
					</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
