<?php

use function endoviTheme\Helpers\trim_string;

$form_id = trim_string( $args['form_id'] ?? '' );

if ( ! $form_id ) {
	return null;
}

$_title  = trim_string( $args['title'] ?? '' );
$classes = trim_string( $args['classes'] ?? '' );
?>
<div class="endovi-popup-form">
	<div class="endovi-popup-form__inner">
		<div class="endovi-popup-form__container relative">
			<button type="button" class="endovi-popup-form__close absolute js-popup-close">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M6.4 19L5 17.6L10.6 12L5 6.4L6.4 5L12 10.6L17.6 5L19 6.4L13.4 12L19 17.6L17.6 19L12 13.4L6.4 19Z" fill="#020033"/>
				</svg>
			</button>
			<?php if ( $_title ) : ?>
				<div class="endovi-popup-form__title-container">
					<h3 class="endovi-popup-form__title">
						<?php echo esc_html( $_title ); ?>
					</h3>
				</div>
			<?php endif; ?>
			<div class="endovi-popup-form__form endovi-form">
				<?php echo do_shortcode( '[contact-form-7 id="' . esc_attr( $form_id ) . '"]' ); ?>
			</div>
		</div>
	</div>
</div>
