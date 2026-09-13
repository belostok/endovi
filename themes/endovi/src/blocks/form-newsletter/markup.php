<?php
/**
 * Block Name: Form Newsletter
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;

$hide = (bool) get_field( 'form_newsletter_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$_title = trim_string( get_field( 'form_newsletter_title' ) );
$form   = (int) get_field( 'form_newsletter_form' );

if ( ! $form ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-form-newsletter ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-form-newsletter__wrapper flex fdc">
		<?php if ( $_title ) : ?>
			<div class="endovi-form-newsletter__title-container">
				<h3 class="endovi-form-newsletter__title h3 text-white">
					<?php echo wp_kses_post( $_title ); ?>
				</h3>
			</div>
		<?php endif; ?>
		<div class="endovi-form-newsletter__form-container endovi-form">
			<?php echo do_shortcode( '[contact-form-7 id="' . $form . '"]' ); ?>
		</div>
	</div>
</section>
