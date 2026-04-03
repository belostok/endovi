<?php

use function endoviTheme\Helpers\trim_string;

$_title  = trim_string( $args['title'] ?? '' );
$classes = trim_string( $args['classes'] ?? '' );
?>
<h4 class="endovi-corner-title h4 <?php echo esc_attr( $classes ); ?>">
	<?php echo esc_html( $_title ); ?>
</h4>
