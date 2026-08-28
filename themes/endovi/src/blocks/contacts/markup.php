<?php
/**
 * Block Name: Contacts
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'contacts_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$items = get_array( get_field( 'contacts_items' ) );

if ( empty( $items ) ) {
	return null;
}

$_title = trim_string( get_field( 'contacts_title' ) );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-contacts endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

if ( count( $items ) === 4 ) {
	$class_names .= ' endovi-contacts_four-items';
}

if ( ! $_title ) {
	$class_names .= ' endovi-contacts_no-title';
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
	<div class="endovi-contacts__wrapper endovi-wrapper">
		<?php if ( $_title ) : ?>
			<div class="endovi-contacts__title-container">
				<h2 class="endovi-contacts__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="endovi-contacts__items">
			<?php
			foreach ( $items as $item ) :
				$item_title = trim_string( $item['title'] ?? '' );
				$is_icons   = (bool) ( $item['is_icons'] ?? false );
				$icons      = get_array( $item['icons'] ?? [] );
				$values     = trim_string( $item['values'] ?? '' );

				if ( ( $is_icons && empty( $icons ) ) || ( ! $is_icons && ! $values ) ) {
					continue;
				}
				?>
				<div class="endovi-contacts__item">
					<?php if ( $item_title ) : ?>
						<div class="endovi-contacts__item-title-container">
							<p class="endovi-contacts__item-title text-normal text-gray">
								<?php echo esc_html( $item_title ); ?>
							</p>
						</div>
					<?php endif; ?>
					<?php if ( $is_icons ) : ?>
						<div class="endovi-contacts__item-social-container flex fwrap">
							<?php
							foreach ( $icons as $icon ) :
								$icon_image = (int) ( $icon['image'] ?? 0 );
								$icon_link  = trim_string( $icon['link'] ?? '' );

								if ( ! $icon_image || ! $icon_link ) {
									continue;
								}
								?>
								<a href="<?php echo esc_url( $icon_link ); ?>" class="endovi-contacts__item-social img-contain default-hover">
									<?php endovi_the_image( $icon_image, 'endovi-contacts__item-social-icon' ); ?>
								</a>
							<?php endforeach; ?>
						</div>
					<?php else : ?>
						<div class="endovi-contacts__item-content">
							<?php echo wp_kses_post( $values ); ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
