<?php
/**
 * Theme setup, supports, and menus.
 *
 * @package Every1Center
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function every1_theme_setup() {
	load_theme_textdomain( 'every1center', EVERY1_THEME_DIR . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
		'navigation-widgets',
	) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-header' );

	register_nav_menus( array(
		'primary'      => __( 'Primary Menu', 'every1center' ),
		'footer'       => __( 'Footer Menu', 'every1center' ),
		'utility'      => __( 'Utility (Top Bar)', 'every1center' ),
		'mobile'       => __( 'Mobile Menu', 'every1center' ),
	) );

	add_editor_style( 'assets/css/editor.css' );

	add_image_size( 'every1-hero', 1920, 900, true );
	add_image_size( 'every1-card', 640, 400, true );
}
add_action( 'after_setup_theme', 'every1_theme_setup' );

function every1_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'every1_content_width', 1100 );
}
add_action( 'after_setup_theme', 'every1_content_width', 0 );

function every1_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'every1center' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Right sidebar for blog and resource pages.', 'every1center' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Column 1', 'every1center' ),
		'id'            => 'footer-1',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Column 2', 'every1center' ),
		'id'            => 'footer-2',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Column 3', 'every1center' ),
		'id'            => 'footer-3',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'every1_widgets_init' );

function every1_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'every1_excerpt_length' );

function every1_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'every1_excerpt_more' );

function every1_body_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	if ( is_front_page() ) {
		$classes[] = 'home-page';
	}
	if ( is_page() ) {
		global $post;
		if ( $post ) {
			$classes[] = 'page-slug-' . sanitize_html_class( $post->post_name );
		}
	}
	return $classes;
}
add_filter( 'body_class', 'every1_body_classes' );

function every1_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'every1_pingback_header' );

function every1_skip_link_focus_fix() {
	?>
	<script>
	(function() {
		var isIe = /(trident|msie)/i.test( navigator.userAgent );
		if ( isIe && document.getElementById && window.addEventListener ) {
			window.addEventListener( 'hashchange', function() {
				var id = location.hash.substring( 1 ), el;
				if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) { return; }
				el = document.getElementById( id );
				if ( el ) {
					if ( ! /^(?:a|select|input|button|textarea)$/i.test( el.tagName ) ) {
						el.tabIndex = -1;
					}
					el.focus();
				}
			}, false );
		}
	})();
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'every1_skip_link_focus_fix' );
