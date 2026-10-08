<?php
/**
 * Customizer additions.
 *
 * @package Every1Center
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function every1_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	if ( $wp_customize->get_setting( 'header_textcolor' ) ) {
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}

	$wp_customize->add_section( 'every1_contact', array(
		'title'    => __( 'Contact Details', 'every1center' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'every1_phone', array(
		'default'           => '(518) 714-0355',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'every1_phone', array(
		'label'   => __( 'Display Phone Number', 'every1center' ),
		'section' => 'every1_contact',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'every1_phone_tel', array(
		'default'           => '+15187140355',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'every1_phone_tel', array(
		'label'       => __( 'Phone (tel: link format)', 'every1center' ),
		'section'     => 'every1_contact',
		'type'        => 'text',
		'description' => __( 'E.g. +15187140355 (no spaces or punctuation).', 'every1center' ),
	) );

	$wp_customize->add_setting( 'every1_email', array(
		'default'           => 'info@playground.every1center.com',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'every1_email', array(
		'label'   => __( 'Contact Email', 'every1center' ),
		'section' => 'every1_contact',
		'type'    => 'email',
	) );

	$wp_customize->add_setting( 'every1_address', array(
		'default'           => '8 Shepherd Dr Suite 2, Troy, NY 12180',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'every1_address', array(
		'label'   => __( 'Business Address', 'every1center' ),
		'section' => 'every1_contact',
		'type'    => 'text',
	) );
}
add_action( 'customize_register', 'every1_customize_register' );

function every1_customize_preview_js() {
	wp_enqueue_script( 'every1-customizer', EVERY1_THEME_URI . '/assets/js/customizer.js', array( 'customize-preview' ), EVERY1_THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'every1_customize_preview_js' );
