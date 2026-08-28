<?php
/**
 * Block Name: Hero Manufacturer
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;

if ( empty( $block['id'] ) ) {
	return null;
}

$_title = trim_string( get_field( 'hero_manufacturer_title' ) );

if ( ! $_title ) {
	return null;
}

$image = (int) get_field( 'hero_manufacturer_image' );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-hero-manufacturer endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-hero-manufacturer__wrapper endovi-wrapper">
		<div class="endovi-hero-manufacturer__header flex jcspb">
			<?php
			get_template_part(
				'partials/breadcrumbs',
				null,
				array(
					'classes' => 'endovi-hero-manufacturer__breadcrumbs-container',
				)
			);
			?>
			<div class="endovi-hero-manufacturer__title-container">
				<?php echo wp_kses_post( $_title ); ?>
			</div>
		</div>
		<?php if ( $image ) : ?>
			<div class="endovi-hero-manufacturer__image-container">
				<?php endovi_the_image( $image, 'endovi-hero-manufacturer__image' ); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
