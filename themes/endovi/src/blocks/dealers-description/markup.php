<?php
/**
 * Block Name: Dealers Description
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;

$hide = (bool) get_field( 'dealers_description_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$_title        = trim_string( get_field( 'dealers_description_title' ) );
$image         = (int) get_field( 'dealers_description_image' );
$description   = trim_string( get_field( 'dealers_description_description' ) );
$description_2 = trim_string( get_field( 'dealers_description_description_2' ) );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-dealers-description endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-dealers-description__wrapper endovi-wrapper flex fdc jcfe relative">
		<?php if ( $_title ) : ?>
			<div class="endovi-dealers-description__title-container fg1 relative">
				<h2 class="endovi-dealers-description__title h2 text-white">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="endovi-dealers-description__footer flex jcspb aife relative">
			<?php if ( $image ) : ?>
				<div class="endovi-dealers-description__image-container img-cover">
					<?php endovi_the_image( $image, 'endovi-dealers-description__image' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( $description || $description_2 ) : ?>
				<div class="endovi-dealers-description__descriptions flex">
					<?php if ( $description ) : ?>
						<div class="endovi-dealers-description__description-container">
							<p class="endovi-dealers-description__description text-normal text-white">
								<?php echo wp_kses_post( $description ); ?>
							</p>
						</div>
					<?php endif; ?>
					<?php if ( $description_2 ) : ?>
						<div class="endovi-dealers-description__description-container">
							<p class="endovi-dealers-description__description text-normal text-white">
								<?php echo wp_kses_post( $description_2 ); ?>
							</p>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
