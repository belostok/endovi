<?php
/**
 * Block Name: Hero Inner
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;

if ( empty( $block['id'] ) ) {
	return null;
}

$_title           = trim_string( get_field( 'hero_inner_title' ) );
$_title           = $_title ? $_title : get_the_title();
$hide_description = (bool) get_field( 'hero_inner_hide_description' );
$description      = trim_string( get_field( 'hero_inner_description' ) );
$description      = $hide_description ? '' : ( $description ? $description : get_the_excerpt() );
$image            = (int) get_field( 'hero_inner_image' );
$image            = $image ? $image : get_post_thumbnail_id();

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-hero-inner ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

if ( ! $image ) {
	$class_names .= ' endovi-hero-inner_no-image';
}

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
	<div class="endovi-hero-inner__container endovi-container">
		<div class="endovi-hero-inner__wrapper endovi-wrapper">
			<?php
			get_template_part(
				'partials/breadcrumbs',
				null,
				array(
					'classes' => 'endovi-hero-inner__breadcrumbs-container',
				)
			);
			?>
			<?php if ( $image ) : ?>
				<div class="endovi-hero-inner__image-container img-contain">
					<?php endovi_the_image( $image, 'endovi-hero-inner__image' ); ?>
				</div>
			<?php endif; ?>
			<div class="endovi-hero-inner__title-container">
				<h1 class="endovi-hero-inner__title h1">
					<?php echo wp_kses_post( $_title ); ?>
				</h1>
			</div>
			<?php if ( $description ) : ?>
				<div class="endovi-hero-inner__description-container">
					<p class="endovi-hero-inner__description text-normal text-gray">
						<?php echo wp_kses_post( $description ); ?>
					</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
