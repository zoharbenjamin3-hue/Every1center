<?php
/**
 * Purpose-built local search landing pages for Every1 Center.
 * These routes describe treatment options and navigation support; they do not
 * represent Every1 Center as a licensed treatment provider or facility.
 *
 * @package Every1Center
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function every1_local_search_pages() {
	return array(
		'drug-rehab-albany-ny' => array(
			'title' => 'Drug Rehab Albany NY | Detox & Inpatient Treatment Guidance | Every1 Center',
			'h1' => 'Drug Rehab, Detox & Inpatient Treatment Guidance in Albany, NY',
			'intro' => 'When you are looking for drug rehab in Albany, the first decision is often what level of care may fit the situation. Every1 Center helps individuals and families understand detox, inpatient rehab, residential treatment, PHP, IOP, and recovery-support options before connecting directly with licensed providers.',
			'focus' => 'drug rehab Albany NY',
		),
		'drug-rehab-troy-ny' => array(
			'title' => 'Drug Rehab Troy NY | Detox & Inpatient Treatment Guidance | Every1 Center',
			'h1' => 'Drug Rehab & Detox Options in Troy, NY',
			'intro' => 'Every1 Center provides confidential guidance for people in Troy comparing drug rehab, detox, inpatient treatment, outpatient programs, and family intervention support. We do not operate a treatment facility or provide medical care; we help you prepare for an informed conversation with licensed providers.',
			'focus' => 'drug rehab Troy NY',
		),
		'addiction-treatment-albany-ny' => array(
			'title' => 'Addiction Treatment Albany NY | Compare Care Options | Every1 Center',
			'h1' => 'Addiction Treatment Options in Albany, NY',
			'intro' => 'Addiction treatment is not one program. People may need medically supervised detox, residential care, partial hospitalization, intensive outpatient treatment, counseling, or recovery support. Every1 Center helps families understand those options and organize next steps.',
			'focus' => 'addiction treatment Albany NY',
		),
		'detox-albany-ny' => array(
			'title' => 'Detox Albany NY | Medical Detox Options & Next Steps | Every1 Center',
			'h1' => 'Medical Detox Options in Albany, NY',
			'intro' => 'Withdrawal from alcohol, benzodiazepines, opioids, and other substances can require medical evaluation. This page helps Albany families understand when a licensed detox provider may be appropriate and what to ask before making contact.',
			'focus' => 'detox Albany NY',
		),
		'inpatient-rehab-albany-ny' => array(
			'title' => 'Inpatient Rehab Albany NY | Residential Treatment Options | Every1 Center',
			'h1' => 'Inpatient Drug Rehab & Residential Treatment Options in Albany, NY',
			'intro' => 'Inpatient and residential programs differ in clinical structure, length of stay, insurance participation, medication policies, and family involvement. Every1 Center helps you compare questions to ask licensed programs in and around Albany.',
			'focus' => 'inpatient rehab Albany NY',
		),
		'drug-rehab-near-me' => array(
			'title' => 'Drug Rehab Near Me | Capital Region Detox & Treatment Guidance | Every1 Center',
			'h1' => 'Looking for Drug Rehab Near You?',
			'intro' => 'For people in the Capital Region, “drug rehab near me” can mean a nearby detox program, inpatient treatment, outpatient care, or a program that matches insurance and clinical needs. Every1 Center helps you clarify the question before you contact a licensed provider.',
			'focus' => 'drug rehab near me',
		),
		'drug-rehab-upstate-new-york' => array(
			'title' => 'Drug Rehab Upstate NY | Detox & Inpatient Treatment Guidance | Every1 Center',
			'h1' => 'Drug Rehab, Detox & Inpatient Treatment Across Upstate New York',
			'intro' => 'Every1 Center helps people throughout Upstate New York compare drug rehab, detox, inpatient treatment, outpatient programming, interventions, and recovery-support options. We provide navigation support and education, while clinical care is delivered by licensed providers.',
			'focus' => 'drug rehab Upstate NY',
		),
	);
}

function every1_register_local_search_routes() {
	foreach ( array_keys( every1_local_search_pages() ) as $slug ) {
		add_rewrite_rule( '^' . preg_quote( $slug, '/' ) . '/?$', 'index.php?every1_local_search=' . $slug, 'top' );
	}
}
add_action( 'init', 'every1_register_local_search_routes' );

function every1_local_search_query_var( $vars ) {
	$vars[] = 'every1_local_search';
	return $vars;
}
add_filter( 'query_vars', 'every1_local_search_query_var' );

function every1_local_search_template( $template ) {
	$slug = get_query_var( 'every1_local_search' );
	if ( $slug && isset( every1_local_search_pages()[ $slug ] ) ) {
		return EVERY1_THEME_DIR . '/templates/local-search-page.php';
	}
	return $template;
}
add_filter( 'template_include', 'every1_local_search_template' );

function every1_local_search_document_title( $title ) {
	$slug = get_query_var( 'every1_local_search' );
	$pages = every1_local_search_pages();
	return ( $slug && isset( $pages[ $slug ] ) ) ? $pages[ $slug ]['title'] : $title;
}
add_filter( 'pre_get_document_title', 'every1_local_search_document_title' );

function every1_local_search_meta() {
	$slug  = get_query_var( 'every1_local_search' );
	$pages = every1_local_search_pages();
	if ( ! $slug || ! isset( $pages[ $slug ] ) ) {
		return;
	}

	$page = $pages[ $slug ];
	$url  = home_url( '/' . $slug . '/' );
	$desc = wp_trim_words( $page['intro'], 32, '...' );
	$schema = array(
		'@context' => 'https://schema.org',
		'@type'    => 'WebPage',
		'name'     => $page['title'],
		'description' => $desc,
		'url'      => $url,
		'about'    => array(
			'@type' => 'Thing',
			'name'  => $page['focus'],
		),
		'isPartOf' => array(
			'@type' => 'WebSite',
			'name'  => 'Every1 Center',
			'url'   => home_url( '/' ),
		),
	);

	echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
	echo '<link rel="canonical" href="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:type" content="website">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $page['title'] ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $desc ) . '">' . "\n";
	echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
add_action( 'wp_head', 'every1_local_search_meta', 3 );

function every1_flush_local_search_routes() {
	every1_register_local_search_routes();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'every1_flush_local_search_routes' );
