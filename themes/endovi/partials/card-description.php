<?php

use function endoviTheme\Helpers\trim_string;

$image       = (int) ( $args['image'] ?? 0 );
$_title      = trim_string( $args['title'] ?? '' );
$description = trim_string( $args['description'] ?? '' );
$classes     = trim_string( $args['classes'] ?? '' );
?>
<div class="endovi-card-description <?php echo esc_attr( $classes ); ?>">
	<div class="endovi-card-description__inner flex fdc">
		<?php if ( $image ) : ?>
			<div class="endovi-card-description__image-wrapper">
				<div class="endovi-card-description__image-container img-cover">
					<?php endovi_the_image( $image, 'endovi-card-description__image' ); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( $_title || $description ) : ?>
			<div class="endovi-card-description__content flex fdc">
				<?php if ( $_title ) : ?>
					<div class="endovi-card-description__title-container">
						<h4 class="endovi-card-description__title h4">
							<?php echo wp_kses_post( $_title ); ?>
						</h4>
					</div>
				<?php endif; ?>
				<?php if ( $description ) : ?>
					<div class="endovi-card-description__description-container text-normal text-gray">
						<?php echo wp_kses_post( $description ); ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</div>
