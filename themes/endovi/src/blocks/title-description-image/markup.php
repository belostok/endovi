<?php
/**
 * Block Name: Title Description Image
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;

$hide = (bool) get_field( 'title_description_image_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$_title      = trim_string( get_field( 'title_description_image_title' ) );
$description = trim_string( get_field( 'title_description_image_description' ) );
$image       = (int) get_field( 'title_description_image_image' );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-title-description-image endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-title-description-image__wrapper endovi-wrapper flex fdc jcspb relative">
		<?php if ( $_title ) : ?>
			<div class="endovi-title-description-image__title-container">
				<h2 class="endovi-title-description-image__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="endovi-title-description-image__footer flex jcspb aife">
			<?php if ( $description ) : ?>
				<div class="endovi-title-description-image__description-container relative">
					<h4 class="endovi-title-description-image__description h4">
						<?php echo wp_kses_post( $description ); ?>
					</h4>
				</div>
			<?php endif; ?>
			<?php if ( $image ) : ?>
				<div class="endovi-title-description-image__image-container img-cover">
					<?php endovi_the_image( $image, 'endovi-title-description-image__image' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
