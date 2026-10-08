<?php
/**
 * Every1 Center theme functions.
 *
 * @package Every1Center
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'EVERY1_THEME_VERSION', '1.0.0' );
define( 'EVERY1_THEME_DIR', get_template_directory() );
define( 'EVERY1_THEME_URI', get_template_directory_uri() );

require_once EVERY1_THEME_DIR . '/inc/theme-setup.php';
require_once EVERY1_THEME_DIR . '/inc/enqueue.php';
require_once EVERY1_THEME_DIR . '/inc/nav-walker.php';
require_once EVERY1_THEME_DIR . '/inc/seo.php';
require_once EVERY1_THEME_DIR . '/inc/local-routes.php';
require_once EVERY1_THEME_DIR . '/inc/template-tags.php';
require_once EVERY1_THEME_DIR . '/inc/customizer.php';
