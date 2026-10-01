<?php
/**
 * Plugin Name: Disable plugin auto-updates
 * Description: Turns off automatic plugin updates. Manual updates stay available.
 */

add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'plugins_auto_update_enabled', '__return_false' );
