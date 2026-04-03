<?php
/**
 * Block Name: Simple
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;

$hide = (bool) get_field( 'simple_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$_title = trim_string( get_field( 'simple_title' ) );
$image  = (int) get_field( 'simple_image' );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-simple endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-simple__wrapper endovi-wrapper flex">
		<div class="endovi-simple__left fg1 relative">
			<?php if ( $_title ) : ?>
				<div class="endovi-simple__title-container">
					<h2 class="endovi-simple__title h2">
						<?php echo wp_kses_post( $_title ); ?>
					</h2>
				</div>
			<?php endif; ?>
		</div>
		<div class="endovi-simple__right flex aife relative">
			<?php if ( $image ) : ?>
				<div class="endovi-simple__image-container img-cover">
					<?php endovi_the_image( $image, 'endovi-simple__image' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
