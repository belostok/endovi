<?php

use function endoviTheme\Helpers\trim_string;

$text       = trim_string( $args['text'] ?? '' );
$_link      = trim_string( $args['link'] ?? '' );
$icon_color = trim_string( $args['icon_color'] ?? '#020033' );
$is_value   = (bool) ( $args['is_value'] ?? false );
$classes    = trim_string( $args['classes'] ?? '' );

if ( ! $text || ! $_link ) {
	return null;
}

if ( str_contains( $classes, 'endovi-button_orange' ) ) {
	$icon_color = '#FFF';
}
?>
<a href="<?php echo $is_value ? esc_attr( $_link ) : esc_url( $_link ); ?>" class="endovi-button <?php echo esc_attr( $classes ); ?>">
	<span><?php echo esc_html( $text ); ?></span>
	<?php if ( $icon_color ) : ?>
		<svg width="10" height="8" viewBox="0 0 10 8" fill="none"
			xmlns="http://www.w3.org/2000/svg">
			<path
				d="M9.35355 4.03544C9.54882 3.84018 9.54882 3.52359 9.35355 3.32833L6.17157 0.146351C5.97631 -0.0489108 5.65973 -0.0489108 5.46447 0.146351C5.2692 0.341614 5.2692 0.658196 5.46447 0.853458L8.29289 3.68189L5.46447 6.51031C5.2692 6.70557 5.2692 7.02216 5.46447 7.21742C5.65973 7.41268 5.97631 7.41268 6.17157 7.21742L9.35355 4.03544ZM0 3.68188L-4.37113e-08 4.18188L9 4.18189L9 3.68189L9 3.18189L4.37113e-08 3.18188L0 3.68188Z"
				fill="<?php echo esc_attr( $icon_color ); ?>"/>
		</svg>
	<?php endif; ?>
</a>
