<?php

use function endoviTheme\Helpers\trim_string;

$_title  = trim_string( $args['title'] ?? '' );
$classes = trim_string( $args['classes'] ?? '' );

if ( ! $_title ) {
	return null;
}
?>
<div class="endovi-card <?php echo esc_attr( $classes ); ?>">
	<div class="endovi-card__title-container">
		<h4 class="endovi-card__title h4">
			<?php echo wp_kses_post( $_title ); ?>
		</h4>
	</div>
</div>
