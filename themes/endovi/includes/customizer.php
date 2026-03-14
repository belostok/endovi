<?php

namespace endoviTheme\Customizer;

use WP_Customize_Manager;
use WP_Customize_Media_Control;

function start() {
	$callback = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'customize_register', $callback( 'customize_identify' ) );
	add_action( 'customize_register', $callback( 'customize_analytics' ) );
}

/**
 * Customize identify
 *
 * @param WP_Customize_Manager $wp_customize
 *
 * @return void
 */
function customize_identify( WP_Customize_Manager $wp_customize ) {
	$wp_customize->add_setting(
		'endovi_logo',
		[
			'default'   => '',
			'transport' => 'refresh',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'endovi_logo',
			[
				'label'     => esc_html__( 'Upload your logo image', 'endovi' ),
				'settings'  => 'endovi_logo',
				'section'   => 'title_tagline',
				'mime_type' => 'image',
				'priority'  => 1,
			]
		)
	);

	$wp_customize->add_setting(
		'endovi_mobile_logo',
		[
			'default'   => '',
			'transport' => 'refresh',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'endovi_mobile_logo',
			[
				'label'     => esc_html__( 'Upload your logo image for mobile', 'endovi' ),
				'settings'  => 'endovi_mobile_logo',
				'section'   => 'title_tagline',
				'mime_type' => 'image',
				'priority'  => 1,
			]
		)
	);
}

/**
 * Customize analytics
 *
 * @param WP_Customize_Manager $wp_customize
 *
 * @return void
 */
function customize_analytics( WP_Customize_Manager $wp_customize ) {
	$wp_customize->add_section(
		'endovi_analytics',
		array(
			'title'       => esc_html__( 'Analytics', 'endovi' ),
			'description' => esc_html__( 'Site analytics snippets', 'endovi' ),
			'priority'    => 20,
		)
	);

	$wp_customize->add_setting(
		'endovi_fbpixel',
		array(
			'default' => '',
		)
	);

	$wp_customize->add_control(
		'endovi_fbpixel',
		array(
			'label'    => esc_html__( 'Facebook Pixel ID', 'endovi' ),
			'type'     => 'text',
			'settings' => 'endovi_fbpixel',
			'section'  => 'endovi_analytics',
		)
	);

	$wp_customize->add_setting(
		'endovi_gtm',
		array(
			'default' => '',
		)
	);

	$wp_customize->add_control(
		'endovi_gtm',
		array(
			'label'    => esc_html__( 'Google Tag Manager ID', 'endovi' ),
			'type'     => 'text',
			'settings' => 'endovi_gtm',
			'section'  => 'endovi_analytics',
		)
	);

	$wp_customize->add_setting(
		'endovi_google_verification',
		array(
			'default' => '',
		)
	);

	$wp_customize->add_control(
		'endovi_google_verification',
		array(
			'label'    => esc_html__( 'Google Verification Code', 'endovi' ),
			'type'     => 'text',
			'settings' => 'endovi_google_verification',
			'section'  => 'endovi_analytics',
		)
	);

	$wp_customize->add_setting(
		'endovi_linkedin_insight',
		array(
			'default' => '',
		)
	);

	$wp_customize->add_control(
		'endovi_linkedin_insight',
		array(
			'label'    => esc_html__( 'LinkedIn Insight Tag ID', 'endovi' ),
			'type'     => 'text',
			'settings' => 'endovi_linkedin_insight',
			'section'  => 'endovi_analytics',
		)
	);
}
