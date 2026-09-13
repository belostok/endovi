<?php
/**
 * Block Name: Calling Card
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;
use function endoviTheme\Helpers\get_tel_href;
use function endoviTheme\Helpers\get_mailto_href;

$hide = (bool) get_field( 'calling_card_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$name = trim_string( get_field( 'calling_card_name' ) );

if ( ! $name ) {
	return null;
}

$image    = (int) get_field( 'calling_card_image' );
$position = trim_string( get_field( 'calling_card_position' ) );
$social   = get_array( get_field( 'calling_card_social' ) );
$phone    = trim_string( get_field( 'calling_card_phone' ) );
$email    = trim_string( get_field( 'calling_card_email' ) );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-calling-card endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-calling-card__wrapper flex aic jcc">
		<div class="endovi-calling-card__card relative">
			<div class="endovi-calling-card__header flex jcspb relative">
				<div class="endovi-calling-card__header-left flex">
					<?php if ( $image ) : ?>
						<div class="endovi-calling-card__image-container img-cover">
							<?php endovi_the_image( $image, 'endovi-calling-card__image' ); ?>
						</div>
					<?php endif; ?>
					<div class="endovi-calling-card__name-block flex fdc">
						<div class="endovi-calling-card__name-container">
							<h3 class="endovi-calling-card__name h3">
								<?php echo wp_kses_post( $name ); ?>
							</h3>
						</div>
						<?php if ( $position ) : ?>
							<div class="endovi-calling-card__position-container">
								<p class="endovi-calling-card__position text-normal text-gray">
									<?php echo wp_kses_post( $position ); ?>
								</p>
							</div>
						<?php endif; ?>
						<?php if ( ! empty( $social ) ) : ?>
							<div class="endovi-calling-card__social-container flex fdc jcfe mobile">
								<?php
								get_template_part(
									'partials/social',
									null,
									array(
										'icons' => $social,
									)
								);
								?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<?php if ( ! empty( $social ) ) : ?>
					<div class="endovi-calling-card__social-container flex fdc jcfe desktop">
						<?php
						get_template_part(
							'partials/social',
							null,
							array(
								'icons' => $social,
							)
						);
						?>
					</div>
				<?php endif; ?>
			</div>
			<?php if ( $phone || $email ) : ?>
				<div class="endovi-calling-card__footer flex fdc relative">
					<?php if ( $phone ) : ?>
						<a
							href="<?php echo esc_url( get_tel_href( $phone ) ); ?>"
							class="endovi-calling-card__footer-link h3 default-hover"
						>
							<?php echo esc_html( $phone ); ?>
						</a>
					<?php endif; ?>
					<?php if ( $email ) : ?>
						<a
							href="<?php echo esc_url( get_mailto_href( $email ) ); ?>"
							class="endovi-calling-card__footer-link h3 default-hover"
						>
							<?php echo esc_html( $email ); ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
