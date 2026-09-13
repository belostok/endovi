<?php
/**
 * Block Name: Mediacenter
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

if ( empty( $block['id'] ) ) {
	return null;
}

$items = get_array( get_field( 'mediacenter_items' ) );

if ( empty( $items ) ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-mediacenter endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-mediacenter__wrapper endovi-wrapper flex jcc">
		<div class="endovi-mediacenter__items flex jcc fwrap">
			<?php
			foreach ( $items as $item ) :
				$item_title = trim_string( get_the_title( $item ) );
				$item_link  = trim_string( get_permalink( $item ) );

				if ( ! $item_title || ! $item_link ) {
					continue;
				}
				?>
				<div class="endovi-mediacenter__item">
					<div class="endovi-mediacenter__item-inner flex fdc jcspb relative">
						<div class="endovi-mediacenter__item-title-container relative">
							<h3 class="endovi-mediacenter__item-title h3">
								<?php echo esc_html( $item_title ); ?>
							</h3>
						</div>
						<div class="endovi-mediacenter__item-button-container relative">
							<?php
							get_template_part(
								'partials/button',
								null,
								array(
									'link'    => $item_link,
									'text'    => esc_html__( 'Подробнее', 'endovi' ),
									'classes' => 'endovi-mediacenter__item-button endovi-button_orange',
								)
							)
							?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
