<?php
/**
 * Block Name: Single Card
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;

$hide = (bool) get_field( 'single_card_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$_title      = trim_string( get_field( 'single_card_title' ) );
$description = trim_string( get_field( 'single_card_description' ) );
$cta_text_1  = trim_string( get_field( 'single_card_cta_text_1' ) );
$cta_link_1  = trim_string( get_field( 'single_card_cta_link_1' ) );
$cta_text_2  = trim_string( get_field( 'single_card_cta_text_2' ) );
$cta_link_2  = trim_string( get_field( 'single_card_cta_link_2' ) );
$image       = (int) get_field( 'single_card_image' );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-single-card endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-single-card__wrapper endovi-wrapper">
		<div class="endovi-single-card__item flex">
			<div class="endovi-single-card__column endovi-single-card__column_title flex fdc jcspb">
				<?php if ( $_title ) : ?>
					<div class="endovi-single-card__title-container">
						<h2 class="endovi-single-card__title h2">
							<?php echo wp_kses_post( $_title ); ?>
						</h2>
					</div>
				<?php endif; ?>
				<?php if ( $description ) : ?>
					<div class="endovi-single-card__description-container">
						<p class="endovi-single-card__description text-normal">
							<?php echo wp_kses_post( $description ); ?>
						</p>
					</div>
				<?php endif; ?>
			</div>
			<div class="endovi-single-card__column endovi-single-card__column_image flex fdc jcc">
				<?php if ( $image ) : ?>
					<div class="endovi-single-card__image-container">
						<?php endovi_the_image( $image, 'endovi-single-card__image' ); ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="endovi-single-card__column flex fdc jcfe aife">
				<div class="endovi-single-card__button-container flex fdc">
					<?php
					get_template_part(
						'partials/button',
						null,
						array(
							'text'    => $cta_text_1,
							'link'    => $cta_link_1,
							'classes' => 'endovi-single-card__button',
						)
					);

					get_template_part(
						'partials/button',
						null,
						array(
							'text'    => $cta_text_2,
							'link'    => $cta_link_2,
							'classes' => 'endovi-button_orange endovi-single-card__button',
						)
					);
					?>
				</div>
			</div>
		</div>
	</div>
</section>
