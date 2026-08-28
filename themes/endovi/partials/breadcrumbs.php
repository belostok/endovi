<?php

use function endoviTheme\Helpers\trim_string;

$classes = trim_string( $args['classes'] ?? '' );
?>
<div class="<?php echo esc_attr( $classes ); ?>">
	<?php
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		yoast_breadcrumb( '<p id="endovi-breadcrumbs">', '</p>' );
	}
	?>
</div>
