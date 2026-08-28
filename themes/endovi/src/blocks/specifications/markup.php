<?php
/**
 * Block Name: Specifications
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'specifications_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$_title       = trim_string( get_field( 'specifications_title' ) );
$title_color  = trim_string( get_field( 'specifications_title_color' ) );
$description  = trim_string( get_field( 'specifications_description' ) );
$image        = (int) get_field( 'specifications_image' );
$image_mobile = (int) get_field( 'specifications_image_mobile' );
$image_mobile = $image_mobile ? $image_mobile : $image;
$image_center = (int) get_field( 'specifications_image_center' );
$items        = get_array( get_field( 'specifications_items' ) );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-specifications ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-specifications__container endovi-container relative">
		<?php if ( $image ) : ?>
			<div class="endovi-specifications__image-container absolute img-cover">
				<?php endovi_the_image( $image, 'endovi-specifications__image desktop' ); ?>
				<?php endovi_the_image( $image_mobile, 'endovi-specifications__image mobile' ); ?>
			</div>
		<?php endif; ?>
		<div class="endovi-specifications__wrapper endovi-wrapper relative flex fdc jcspb">
			<?php if ( ! $description ) : ?>
				<div class="endovi-specifications__title-container">
					<?php if ( $_title ) : ?>
						<h2
							class="endovi-specifications__title h2"
							<?php echo $title_color ? 'style="color:' . esc_attr( $title_color ) . '"' : ''; ?>
						>
							<?php echo wp_kses_post( $_title ); ?>
						</h2>
					<?php endif; ?>
				</div>
				<?php if ( $image_center ) : ?>
					<div class="endovi-specifications__image-center-container">
						<?php endovi_the_image( $image_center, 'endovi-specifications__image-center' ); ?>
					</div>
				<?php endif; ?>
			<?php else : ?>
				<div class="endovi-specifications__description-container">
					<h3 class="endovi-specifications__description h3">
						<?php echo wp_kses_post( $description ); ?>
					</h3>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $items ) ) : ?>
				<div class="endovi-specifications__items">
					<?php
					foreach ( $items as $item ) :
						$item_description = trim_string( $item['description'] ?? '' );

						if ( ! $item_description ) {
							continue;
						}
						?>
						<?php
						get_template_part(
							'partials/card',
							null,
							array(
								'title' => $item_description,
							)
						);
						?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
