<?php
namespace endoviTheme\AJAX;

use function endoviTheme\Helpers\trim_string;

add_action( 'wp_ajax_endovi_get_popup', __NAMESPACE__ . '\\get_popup' );
add_action( 'wp_ajax_nopriv_endovi_get_popup', __NAMESPACE__ . '\\get_popup' );

function get_popup() {
	check_ajax_referer( 'endovi-nonce', 'nonce' );

	$form_id = trim_string( wp_unslash( $_POST['form'] ?? '' ) );

	if ( ! $form_id ) {
		wp_send_json_error();
	}

	$title = trim_string( wp_unslash( $_POST['title'] ?? '' ) );

	ob_start();

	get_template_part(
		'partials/popup-form',
		null,
		[
			'form_id' => $form_id,
			'title'   => $title,
		]
	);

	$html = ob_get_clean();

	if ( ! $html ) {
		wp_send_json_error();
	}

	wp_send_json_success(
		[
			'html' => $html,
		]
	);
}
