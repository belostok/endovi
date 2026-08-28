<?php

use function endoviTheme\Helpers\trim_string;

$image   = (int) ( $args['image'] ?? 0 );
$_title  = trim_string( $args['title'] ?? '' );
$classes = trim_string( $args['classes'] ?? '' );
?>
<div class="endovi-card-image flex fdc <?php echo esc_attr( $classes ); ?>">
	<?php if ( $image ) : ?>
		<div class="endovi-card-image__image-outer flex jcc aic">
			<div class="endovi-card-image__image-container img-cover">
				<?php endovi_the_image( $image, 'endovi-card-image__image' ); ?>
			</div>
		</div>
	<?php endif; ?>
	<?php if ( $_title ) : ?>
		<div class="endovi-card-image__title-container">
			<h4 class="endovi-card-image__title h4">
				<?php echo wp_kses_post( $_title ); ?>
			</h4>
		</div>
	<?php endif; ?>
</div>
