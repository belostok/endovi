<?php
/**
 * Block Name: Center Card
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;

$hide = (bool) get_field( 'center_card_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$bg_text     = trim_string( get_field( 'center_card_bg_text' ) );
$description = trim_string( get_field( 'center_card_description' ) );
$cta_text    = trim_string( get_field( 'center_card_cta_text' ) );
$cta_link    = trim_string( get_field( 'center_card_cta_link' ) );

if ( ! $description ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-center-card endovi-container relative ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<?php if ( $bg_text ) : ?>
		<div class="endovi-center-card__background-text endovi-background-text">
			<?php echo esc_html( str_repeat( $bg_text, 20 ) ); ?>
		</div>
	<?php endif; ?>
	<div class="endovi-center-card__wrapper endovi-wrapper">
		<div class="endovi-center-card__item flex fdc relative">
			<div class="endovi-center-card__description-container">
				<h4 class="endovi-center-card__description h4">
					<?php echo wp_kses_post( $description ); ?>
				</h4>
			</div>
			<?php if ( $cta_text && $cta_link ) : ?>
				<div class="endovi-center-card__button-container flex">
					<?php
					get_template_part(
						'partials/button',
						null,
						array(
							'text'    => $cta_text,
							'link'    => $cta_link,
							'classes' => 'endovi-button_orange',
						)
					);
					?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
