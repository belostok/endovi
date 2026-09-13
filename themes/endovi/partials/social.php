<?php

use function endoviTheme\Helpers\get_array;
use function endoviTheme\Helpers\trim_string;

$icons = get_array( $args['icons'] ?? [] );

if ( empty( $icons ) ) {
	return null;
}

$classes = trim_string( $args['classes'] ?? '' );
?>
<div class="endovi-social flex fwrap <?php echo esc_attr( $classes ); ?>">
	<?php
	foreach ( $icons as $icon ) :
		$icon_image = (int) ( $icon['image'] ?? 0 );
		$icon_link  = trim_string( $icon['link'] ?? '' );

		if ( ! $icon_image || ! $icon_link ) {
			continue;
		}
		?>
		<a href="<?php echo esc_url( $icon_link ); ?>" class="endovi-social__item img-contain default-hover">
			<?php endovi_the_image( $icon_image, 'endovi-social__icon' ); ?>
		</a>
	<?php endforeach; ?>
</div>
