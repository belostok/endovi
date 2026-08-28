<?php

use function endoviTheme\Helpers\trim_string;

$icon        = (int) ( $args['icon'] ?? 0 );
$_title      = trim_string( $args['title'] ?? '' );
$description = trim_string( $args['description'] ?? '' );
$classes     = trim_string( $args['classes'] ?? '' );

if ( ! $description && ! $_title ) {
	return null;
}
?>
<div class="endovi-card-icon <?php echo esc_attr( $classes ); ?>">
	<div class="endovi-card-icon__inner flex fdc">
		<?php if ( $icon ) : ?>
			<div class="endovi-card-icon__icon-container img-contain">
				<?php endovi_the_image( $icon, 'endovi-card-icon__icon' ); ?>
			</div>
		<?php endif; ?>
		<div class="endovi-card-icon__content flex fdc">
			<?php if ( $_title ) : ?>
				<div class="endovi-card-icon__title-container">
					<h4 class="endovi-card-icon__title h4">
						<?php echo wp_kses_post( $_title ); ?>
					</h4>
				</div>
			<?php endif; ?>
			<?php if ( $description ) : ?>
				<div class="endovi-card-icon__description-container">
					<p class="endovi-card-icon__description text-normal text-gray">
						<?php echo wp_kses_post( $description ); ?>
					</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
