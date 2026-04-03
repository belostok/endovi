<?php
/**
 * Block Name: Mission
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'mission_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$pre_title = trim_string( get_field( 'mission_pre_title' ) );
$_title    = trim_string( get_field( 'mission_title' ) );
$items     = get_array( get_field( 'mission_items' ) );

if ( empty( $items ) ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-mission endovi-container js-gsap-scroll-pinned ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-mission__wrapper endovi-wrapper flex">
		<div class="endovi-mission__text-side fg1">
			<?php if ( $pre_title ) : ?>
				<?php
				get_template_part(
					'partials/corner-title',
					null,
					array(
						'title' => $pre_title,
					)
				);
				?>
			<?php endif; ?>
			<?php if ( $_title ) : ?>
				<div class="endovi-mission__title-container">
					<h2 class="endovi-mission__title h2">
						<?php echo wp_kses_post( $_title ); ?>
					</h2>
				</div>
			<?php endif; ?>
		</div>
		<div class="endovi-mission__items">
			<div class="endovi-mission__items-wrapper flex fdc js-gsap-scroll-content">
				<?php
				$i = 0;
				foreach ( $items as $item ) :
					$item_title = trim_string( $item['title'] ?? '' );
					$item_image = (int) ( $item['image'] ?? 0 );

					if ( ! $item_image ) {
						continue;
					}

					++$i;
					?>
					<div class="endovi-mission__item flex fdc js-gsap-scroll-item">
						<div class="endovi-mission__item-image-container img-cover">
							<?php endovi_the_image( $item_image, 'endovi-mission__item-image' ); ?>
						</div>
						<div class="endovi-mission__item-text flex fdc">
							<div class="endovi-mission__item-count-container">
								<span class="endovi-mission__item-count text-normal">
									<?php echo esc_html( sprintf( '%02d', $i ) ); ?>
								</span>
							</div>
							<?php if ( $item_title ) : ?>
								<div class="endovi-mission__item-description-container">
									<p class="endovi-mission__item-description text-normal">
										<?php echo wp_kses_post( $item_title ); ?>
									</p>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
