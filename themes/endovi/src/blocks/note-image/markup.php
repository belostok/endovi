<?php
/**
 * Block Name: Note Image
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;

$hide = (bool) get_field( 'note_image_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$description = trim_string( get_field( 'note_image_description' ) );
$image       = (int) get_field( 'note_image_image' );

if ( ! $description || ! $image ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-note-image endovi-container relative ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-note-image__image-container img-cover absolute">
		<?php endovi_the_image( $image, 'endovi-note-image__image' ); ?>
	</div>
	<div class="endovi-note-image__wrapper endovi-wrapper relative">
		<div class="endovi-note-image__card">
			<h4 class="endovi-note-image__description-container h4">
				<?php echo wp_kses_post( $description ); ?>
			</h4>
		</div>
	</div>
</section>
