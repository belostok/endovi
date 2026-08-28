<?php
/**
 * Block Name: Vacancies
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'vacancies_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$items = get_array( get_field( 'vacancies_items' ) );

if ( empty( $items ) ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-vacancies endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-vacancies__wrapper endovi-wrapper">
		<div class="endovi-vacancies__items flex fdc">
			<?php
			foreach ( $items as $item ) :
				$item_title       = trim_string( $item['title'] ?? '' );
				$item_description = trim_string( $item['description'] ?? '' );

				if ( ! $item_title && ! $item_description ) {
					continue;
				}
				?>
				<div class="endovi-vacancies__item flex fdc">
					<?php if ( $item_title ) : ?>
						<div class="endovi-vacancies__item-title-container">
							<h3 class="endovi-vacancies__item-title h3">
								<?php echo wp_kses_post( $item_title ); ?>
							</h3>
						</div>
					<?php endif; ?>
					<?php if ( $item_description ) : ?>
						<div class="endovi-vacancies__item-description-container">
							<p class="endovi-vacancies__item-description text-normal text-gray">
								<?php echo wp_kses_post( $item_description ); ?>
							</p>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
