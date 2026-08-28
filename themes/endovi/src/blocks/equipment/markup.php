<?php
/**
 * Block Name: Equipment
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'equipment_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$items = get_array( get_field( 'equipment_items' ) );

if ( empty( $items ) ) {
	return null;
}

$_title       = trim_string( get_field( 'equipment_title' ) );
$image        = (int) get_field( 'equipment_image' );
$image_mobile = (int) get_field( 'equipment_image_mobile' );
$image_mobile = $image_mobile ? $image_mobile : $image;
$note         = trim_string( get_field( 'equipment_note' ) );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-equipment endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-equipment__wrapper endovi-wrapper relative">
		<?php if ( $_title ) : ?>
			<div class="endovi-equipment__title-container">
				<h2 class="endovi-equipment__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="endovi-equipment__grid">
			<div class="endovi-equipment__side endovi-equipment__side_image flex jcc aic">
				<?php if ( $image ) : ?>
					<div class="endovi-equipment__image-container img-contain">
						<?php endovi_the_image( $image, 'endovi-equipment__image desktop' ); ?>
						<?php endovi_the_image( $image_mobile, 'endovi-equipment__image mobile' ); ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="endovi-equipment__side endovi-equipment__side_list flex fdc jcspb">
				<ul class="endovi-equipment__list">
					<?php
					foreach ( $items as $item ) :
						$position  = trim_string( $item['position'] ?? '' );
						$pos_count = trim_string( $item['count'] ?? '' );
						$pos_unit  = trim_string( $item['unit'] ?? '' );
						$sub_items = get_array( $item['items'] ?? [] );
						$has_sub   = ! empty( $sub_items );
						?>
						<li class="endovi-equipment__list-item<?php echo esc_attr( $has_sub ? ' endovi-equipment__list-item_has-sub' : '' ); ?><?php echo esc_attr( ! $position ? ' endovi-equipment__list-item_no-pos' : '' ); ?>">
							<?php if ( $position ) : ?>
								<h4 class="endovi-equipment__list-item-title h4">
									<?php echo esc_html( $position ); ?>
								</h4>
							<?php endif; ?>
							<?php if ( ! $has_sub ) : ?>
								<?php if ( $pos_count ) : ?>
									<div class="endovi-equipment__list-item-value-container flex text-normal">
										<span class="endovi-equipment__list-item-value">
											<?php echo esc_html( $pos_count ); ?>
										</span>
										<?php if ( $pos_unit ) : ?>
											<span class="endovi-equipment__list-item-unit">
												<?php echo esc_html( $pos_unit ); ?>
											</span>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							<?php else : ?>
								<ul class="endovi-equipment__sub-list">
									<?php
									foreach ( $sub_items as $sub_item ) :
										$sub_position  = trim_string( $sub_item['position'] ?? '' );
										$sub_pos_count = trim_string( $sub_item['count'] ?? '' );
										$sub_pos_unit  = trim_string( $sub_item['unit'] ?? '' );

										if ( ! $sub_position ) {
											continue;
										}
										?>
										<li class="endovi-equipment__sub-list-item">
											<p class="endovi-equipment__list-item-title text-normal text-gray">
												<?php echo esc_html( $sub_position ); ?>
											</p>
											<?php if ( $sub_pos_count ) : ?>
												<div class="endovi-equipment__list-item-value-container text-normal flex">
													<span class="endovi-equipment__sub-list-item-value">
														<?php echo esc_html( $sub_pos_count ); ?>
													</span>
													<?php if ( $sub_pos_unit ) : ?>
														<span class="endovi-equipment__sub-list-item-unit">
															<?php echo esc_html( $sub_pos_unit ); ?>
														</span>
													<?php endif; ?>
												</div>
											<?php endif; ?>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
				<?php if ( $note ) : ?>
				<div class="endovi-equipment__note-container">
					<p class="endovi-equipment__note text-normal text-gray">
						<?php echo esc_html( $note ); ?>
					</p>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
