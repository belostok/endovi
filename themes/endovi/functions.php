<?php
// Type your constants here
const ENDOVI_WP_ENV         = 'development';
const ENDOVI_PATH           = __DIR__ . DIRECTORY_SEPARATOR;
const ENDOVI_THEME_INCLUDES = ENDOVI_PATH . 'includes' . DIRECTORY_SEPARATOR;
const ENDOVI_THEME_BLOCKS   = ENDOVI_PATH . 'build/blocks/';

define( 'ENDOVI_TEMPLATE_URL', get_template_directory_uri() . '/' );
define( 'ENDOVI_STYLESHEET_URL', get_stylesheet_uri() );
define( 'ENDOVI_THEME_PATH', get_template_directory() . DIRECTORY_SEPARATOR );
define( 'ENDOVI_STATIC_MEDIA_URL', get_template_directory_uri() . '/static_media/' );

// Creating global variable to see what styles were already added to prevent multiple insertions of the same stylesheet
global $endovi_used_inline_styles;
$endovi_used_inline_styles = [];

require_once ENDOVI_THEME_INCLUDES . 'traits/trait-singleton.php';
require_once ENDOVI_THEME_INCLUDES . 'classes/class-constants.php';
require_once ENDOVI_THEME_INCLUDES . 'acf.php';
require_once ENDOVI_THEME_INCLUDES . 'analytics-scripts.php';
require_once ENDOVI_THEME_INCLUDES . 'blocks.php';
require_once ENDOVI_THEME_INCLUDES . 'cf7.php';
require_once ENDOVI_THEME_INCLUDES . 'cleaner.php';
require_once ENDOVI_THEME_INCLUDES . 'content.php';
require_once ENDOVI_THEME_INCLUDES . 'content-parts.php';
require_once ENDOVI_THEME_INCLUDES . 'core.php';
require_once ENDOVI_THEME_INCLUDES . 'cpt.php';
require_once ENDOVI_THEME_INCLUDES . 'customizer.php';
require_once ENDOVI_THEME_INCLUDES . 'enqueue.php';
require_once ENDOVI_THEME_INCLUDES . 'helpers.php';
require_once ENDOVI_THEME_INCLUDES . 'hooks.php';
require_once ENDOVI_THEME_INCLUDES . 'media.php';
require_once ENDOVI_THEME_INCLUDES . 'media-svg.php';

endoviTheme\ACF\start();
endoviTheme\AnalyticsScripts\start();
endoviTheme\Blocks\start();
endoviTheme\CF7\start();
endoviTheme\Cleaner\start();
endoviTheme\Content\start();
endoviTheme\Core\start();
endoviTheme\CPT\start();
endoviTheme\Customizer\start();
endoviTheme\Enqueue\start();
endoviTheme\Media\start();
endoviTheme\MediaSVG\start();

// Require Composer autoloader if it exists
if ( file_exists( WP_CONTENT_DIR . '/vendor/autoload.php' ) ) {
	require_once WP_CONTENT_DIR . '/vendor/autoload.php';
}
