<?php
/**
 * Block Name: Center Text Icons
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'center_text_icons_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$_title      = trim_string( get_field( 'center_text_icons_title' ) );
$description = trim_string( get_field( 'center_text_icons_description' ) );
$icons       = get_array( get_field( 'center_text_icons_icons' ) );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-center-text-icons ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-center-text-icons__container endovi-container">
		<div class="endovi-center-text-icons__wrapper endovi-wrapper flex jcc aic">
			<div class="endovi-center-text-icons__content flex fdc aic">
				<?php if ( $_title ) : ?>
					<div class="endovi-center-text-icons__title-container">
						<h2 class="endovi-center-text-icons__title h2">
							<?php echo wp_kses_post( $_title ); ?>
						</h2>
					</div>
				<?php endif; ?>
				<?php if ( $description ) : ?>
					<div class="endovi-center-text-icons__description-container">
						<h4 class="endovi-center-text-icons__description h4 text-gray">
							<?php echo wp_kses_post( $description ); ?>
						</h4>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $icons ) ) : ?>
					<div class="endovi-center-text-icons__icons flex fwrap jcc">
						<?php
						foreach ( $icons as $icon ) :
							$icon_image = (int) ( $icon['icon'] ?? 0 );

							if ( ! $icon_image ) {
								continue;
							}
							?>
							<div class="endovi-center-text-icons__icon-container img-cover">
								<?php endovi_the_image( $icon_image, 'endovi-center-text-icons__icon' ); ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
