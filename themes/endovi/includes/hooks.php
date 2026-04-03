<?php

namespace endoviTheme\Hooks;

add_shortcode( 'current-year', __NAMESPACE__ . '\\current_year' );
/**
 * Output current year
 *
 * @return mixed
 */
function current_year() {
	return esc_html( wp_date( 'Y' ) );
}
