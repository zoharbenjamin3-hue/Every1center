<?php
/**
 * Enqueue scripts and styles.
 *
 * @package Every1Center
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function every1_enqueue_assets() {
	wp_enqueue_style(
		'every1-google-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'every1-main',
		EVERY1_THEME_URI . '/assets/css/main.css',
		array( 'every1-google-fonts' ),
		EVERY1_THEME_VERSION
	);

	wp_style_add_data( 'every1-main', 'rtl', 'replace' );

	wp_enqueue_script(
		'every1-main',
		EVERY1_THEME_URI . '/assets/js/main.js',
		array(),
		EVERY1_THEME_VERSION,
		true
	);

	wp_localize_script( 'every1-main', 'every1Settings', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'every1_nonce' ),
		'phone'   => '+15187140355',
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'every1_enqueue_assets' );

function every1_preconnect( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'every1_preconnect', 10, 2 );
