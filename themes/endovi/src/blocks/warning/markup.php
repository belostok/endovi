<?php
/**
 * Block Name: Warning
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;

$hide = (bool) get_field( 'warning_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$description = trim_string( get_field( 'warning_description' ) );

if ( ! $description ) {
	return null;
}

$_title = trim_string( get_field( 'contacts_title' ) );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-warning endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-warning__wrapper flex fdc">
		<?php if ( $_title ) : ?>
			<div class="endovi-warning__title-container">
				<h2 class="endovi-warning__title h2 text-white">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="endovi-warning__description-container">
			<p class="endovi-warning__description text-normal text-gray">
				<?php echo wp_kses_post( $description ); ?>
			</p>
		</div>
	</div>
</section>
