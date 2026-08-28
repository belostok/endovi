<?php
/**
 * Block Name: Two Cards Description
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'two_cards_description_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$items              = get_array( get_field( 'two_cards_description_items' ) );
$_title             = trim_string( get_field( 'two_cards_description_title' ) );
$sub_title          = trim_string( get_field( 'two_cards_description_sub_title' ) );
$description        = trim_string( get_field( 'two_cards_description_description' ) );
$footer_description = trim_string( get_field( 'two_cards_description_footer_description' ) );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-two-cards-description endovi-container relative ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-two-cards-description__wrapper endovi-wrapper relative">
		<?php if ( $_title ) : ?>
			<div class="endovi-two-cards-description__title-container">
				<h2 class="endovi-two-cards-description__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<?php if ( $sub_title ) : ?>
			<div class="endovi-two-cards-description__sub-title-container">
				<h3 class="endovi-two-cards-description__sub-title h3">
					<?php echo wp_kses_post( $sub_title ); ?>
				</h3>
			</div>
		<?php endif; ?>
		<?php if ( $description ) : ?>
			<div class="endovi-two-cards-description__description-container">
				<p class="endovi-two-cards-description__description text-normal text-gray">
					<?php echo wp_kses_post( $description ); ?>
				</p>
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $items ) ) : ?>
			<div class="endovi-two-cards-description__items flex fwrap jcc">
				<?php
				foreach ( $items as $item ) :
					?>
					<div class="endovi-two-cards-description__item-outer">
						<?php
						get_template_part(
							'partials/card',
							'image',
							array(
								'image' => (int) ( $item['image'] ?? 0 ),
								'title' => trim_string( $item['title'] ?? '' ),
							)
						)
						?>
					</div>
					<?php
				endforeach;
				?>
			</div>
		<?php endif; ?>
		<?php if ( $footer_description ) : ?>
			<div class="endovi-two-cards-description__footer-description-container">
				<p class="endovi-two-cards-description__footer-description text-small text-gray">
					<?php echo wp_kses_post( $footer_description ); ?>
				</p>
			</div>
		<?php endif; ?>
	</div>
</section>
