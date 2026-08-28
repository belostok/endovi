<?php
/**
 * Block Name: Email
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;

$hide = (bool) get_field( 'email_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$_title      = trim_string( get_field( 'email_title' ) );
$description = trim_string( get_field( 'email_description' ) );
$email       = trim_string( get_field( 'email_email' ) );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-email endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-email__wrapper flex fdc aic jcc">
		<?php if ( $_title ) : ?>
			<div class="endovi-email__title-container">
				<h2 class="endovi-email__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<?php if ( $description ) : ?>
			<div class="endovi-email__description-container">
				<p class="endovi-email__description text-normal">
					<?php echo wp_kses_post( $description ); ?>
				</p>
			</div>
		<?php endif; ?>
		<?php if ( $email ) : ?>
			<div class="endovi-email__email-container">
				<p class="endovi-email__email h1">
					<?php echo wp_kses_post( $email ); ?>
				</p>
			</div>
		<?php endif; ?>
	</div>
</section>
