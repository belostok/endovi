<?php
/**
 * Block Name: Support
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;

$hide = (bool) get_field( 'support_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$_title            = trim_string( get_field( 'support_title' ) );
$description       = trim_string( get_field( 'support_description' ) );
$background        = (int) get_field( 'support_background' );
$background_mobile = (int) get_field( 'support_background_mobile' );
$image             = (int) get_field( 'support_image' );
$cta_text          = trim_string( get_field( 'support_cta_text' ) );
$cta_link          = trim_string( get_field( 'support_cta_link' ) );
$cta_text2         = trim_string( get_field( 'support_cta_text2' ) );
$cta_link2         = trim_string( get_field( 'support_cta_link2' ) );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-support endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-support__wrapper endovi-wrapper flex jcspb relative">
		<?php if ( $background ) : ?>
			<div class="endovi-support__background-container absolute img-cover">
				<?php endovi_the_image( $background, 'endovi-support__background desktop' ); ?>
				<?php if ( $background_mobile ) : ?>
					<?php endovi_the_image( $background_mobile, 'endovi-support__background mobile' ); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<div class="endovi-support__side flex fdc relative">
			<div class="endovi-support__header fg1 flex fdc">
				<?php if ( $_title ) : ?>
					<div class="endovi-support__title-container">
						<h2 class="endovi-support__title h2 text-white">
							<?php echo wp_kses_post( $_title ); ?>
						</h2>
					</div>
				<?php endif; ?>
				<?php if ( $description ) : ?>
					<div class="endovi-support__description-container">
						<p class="endovi-support__description text-normal text-white">
							<?php echo wp_kses_post( $description ); ?>
						</p>
					</div>
				<?php endif; ?>
			</div>
			<div class="endovi-support__buttons flex fdc">
				<?php
				get_template_part(
					'partials/button',
					null,
					array(
						'text'     => $cta_text,
						'link'     => $cta_link,
						'classes'  => 'endovi-support__button',
						'is_value' => true,
					)
				);

				get_template_part(
					'partials/button',
					null,
					array(
						'text'     => $cta_text2,
						'link'     => $cta_link2,
						'classes'  => 'endovi-button_orange endovi-support__button',
						'is_value' => true,
					)
				);
				?>
			</div>
		</div>
		<?php if ( $image ) : ?>
			<div class="endovi-support__side endovi-support__side_image relative">
				<div class="endovi-support__image-container img-cover">
					<?php endovi_the_image( $image, 'endovi-support__image' ); ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
