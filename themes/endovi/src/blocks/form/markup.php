<?php
/**
 * Block Name: Form
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;

$hide = (bool) get_field( 'form_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$_title = trim_string( get_field( 'form_title' ) );
$form   = (int) get_field( 'form_form' );

if ( ! $form ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-form-block endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-form-block__wrapper endovi-wrapper">
		<div class="endovi-form-block__grid">
			<div class="endovi-form-block__side endovi-form-block__side_title">
				<?php if ( $_title ) : ?>
					<div class="endovi-form-block__title-container">
						<h2 class="endovi-form-block__title h2 text-white">
							<?php echo wp_kses_post( $_title ); ?>
						</h2>
					</div>
				<?php endif; ?>
			</div>
			<div class="endovi-form-block__side endovi-form-block__side_form">
				<div class="endovi-form-block__form endovi-form">
					<?php echo do_shortcode( '[contact-form-7 id="' . $form . '"]' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>
