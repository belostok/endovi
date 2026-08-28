<?php
/**
 * Block Name: Three Cards Description
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'three_cards_description_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$items = get_array( get_field( 'three_cards_description_items' ) );

if ( empty( $items ) ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-three-cards-description ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-three-cards-description__container endovi-container">
		<div class="endovi-three-cards-description__wrapper endovi-wrapper">
			<div class="endovi-three-cards-description__items">
				<?php foreach ( $items as $item ) : ?>
					<?php
					get_template_part(
						'partials/card',
						'description',
						array(
							'image'       => (int) ( $item['image'] ?? 0 ),
							'title'       => trim_string( $item['title'] ?? '' ),
							'description' => trim_string( $item['description'] ?? '' ),
						)
					);
					?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
