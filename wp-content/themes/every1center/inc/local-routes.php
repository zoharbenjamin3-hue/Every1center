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
			'context' => 'Albany is a practical starting point for many Capital Region families, but the best next step may be in Albany, Troy, Saratoga, the Hudson Valley, or elsewhere in New York. Availability, insurance, transportation, and the provider’s clinical assessment all matter.',
			'questions' => array(
				'What levels of drug rehab are available in the Albany area?',
				'What should we ask about detox, medication, and withdrawal safety?',
				'How do we compare an Albany program with an option elsewhere in New York?',
			),
		),
		'drug-rehab-troy-ny' => array(
			'title' => 'Drug Rehab Troy NY | Detox & Inpatient Treatment Guidance | Every1 Center',
			'h1' => 'Drug Rehab & Detox Options in Troy, NY',
			'intro' => 'Every1 Center provides confidential guidance for people in Troy comparing drug rehab, detox, inpatient treatment, outpatient programs, and family intervention support. We do not operate a treatment facility or provide medical care; we help you prepare for an informed conversation with licensed providers.',
			'focus' => 'drug rehab Troy NY',
			'context' => 'For families in Troy, nearby care can include options across the wider Capital Region. A thoughtful search weighs the provider’s assessment, the level of care, travel needs, and family involvement—not distance alone.',
			'questions' => array(
				'How do we compare nearby rehab options from Troy?',
				'When might detox or inpatient treatment be discussed?',
				'What questions should family members ask before an admission call?',
			),
		),
		'addiction-treatment-albany-ny' => array(
			'title' => 'Addiction Treatment Albany NY | Compare Care Options | Every1 Center',
			'h1' => 'Addiction Treatment Options in Albany, NY',
			'intro' => 'Addiction treatment is not one program. People may need medically supervised detox, residential care, partial hospitalization, intensive outpatient treatment, counseling, or recovery support. Every1 Center helps families understand those options and organize next steps.',
			'focus' => 'addiction treatment Albany NY',
			'context' => 'A useful treatment search starts by identifying the decision in front of you: immediate safety, withdrawal, a structured residential setting, outpatient continuity, or family support. A licensed provider—not an online listing—determines whether its program is clinically appropriate.',
			'questions' => array(
				'What is the difference between detox, inpatient, PHP, and IOP?',
				'What information should we have ready when speaking with providers?',
				'How do insurance, timing, and family participation affect the decision?',
			),
		),
		'detox-albany-ny' => array(
			'title' => 'Detox Albany NY | Medical Detox Options & Next Steps | Every1 Center',
			'h1' => 'Medical Detox Options in Albany, NY',
			'intro' => 'Withdrawal from alcohol, benzodiazepines, opioids, and other substances can require medical evaluation. This page helps Albany families understand when a licensed detox provider may be appropriate and what to ask before making contact.',
			'focus' => 'detox Albany NY',
			'context' => 'No online page can determine whether a person needs medical detox. Withdrawal risk depends on the substance, pattern of use, health history, medications, and other factors. When there is a safety concern, contact emergency services, 988, or a licensed medical provider immediately.',
			'questions' => array(
				'What should we ask a licensed detox provider about withdrawal monitoring?',
				'How is the next level of treatment coordinated after detox?',
				'What practical items should a family confirm before admission?',
			),
		),
		'inpatient-rehab-albany-ny' => array(
			'title' => 'Inpatient Rehab Albany NY | Residential Treatment Options | Every1 Center',
			'h1' => 'Inpatient Drug Rehab & Residential Treatment Options in Albany, NY',
			'intro' => 'Inpatient and residential programs differ in clinical structure, length of stay, insurance participation, medication policies, and family involvement. Every1 Center helps you compare questions to ask licensed programs in and around Albany.',
			'focus' => 'inpatient rehab Albany NY',
			'context' => '“Inpatient rehab” is often used broadly. Before making a decision, families should ask a program how it defines residential or inpatient care, who provides clinical services, how medications are managed, what family contact looks like, and how aftercare is planned.',
			'questions' => array(
				'How does a program describe its residential or inpatient structure?',
				'What should we ask about insurance, length of stay, and family contact?',
				'How does a provider plan for outpatient care or recovery support afterward?',
			),
		),
		'drug-rehab-near-me' => array(
			'title' => 'Drug Rehab Near Me | Capital Region Detox & Treatment Guidance | Every1 Center',
			'h1' => 'Looking for Drug Rehab Near You?',
			'intro' => 'For people in the Capital Region, “drug rehab near me” can mean a nearby detox program, inpatient treatment, outpatient care, or a program that matches insurance and clinical needs. Every1 Center helps you clarify the question before you contact a licensed provider.',
			'focus' => 'drug rehab near me',
			'context' => '“Near me” should be one factor, not the only factor. A nearby provider may be helpful, but families also compare safety needs, level of care, insurance, provider availability, transportation, and the person’s willingness to engage.',
			'questions' => array(
				'How close does a treatment option need to be for our situation?',
				'What does a licensed provider need to know before discussing admission?',
				'How do we avoid choosing based on a directory listing alone?',
			),
		),
		'drug-rehab-upstate-new-york' => array(
			'title' => 'Drug Rehab Upstate NY | Detox & Inpatient Treatment Guidance | Every1 Center',
			'h1' => 'Drug Rehab, Detox & Inpatient Treatment Across Upstate New York',
			'intro' => 'Every1 Center helps people throughout Upstate New York compare drug rehab, detox, inpatient treatment, outpatient programming, interventions, and recovery-support options. We provide navigation support and education, while clinical care is delivered by licensed providers.',
			'focus' => 'drug rehab Upstate NY',
			'context' => 'Upstate New York covers a large area, so a care search may include the Capital Region, Hudson Valley, Central New York, or other communities. Every1 Center helps organize the question; licensed providers make their own clinical and admission decisions.',
			'questions' => array(
				'How do we compare treatment options across Upstate New York?',
				'When should we consider detox, inpatient rehab, or outpatient care?',
				'What should we confirm about travel, insurance, and discharge planning?',
			),
		),
		'drug-detox-upstate-new-york' => array(
			'title' => 'Drug Detox Upstate NY | Questions to Ask Licensed Providers | Every1 Center',
			'h1' => 'Drug Detox Options Across Upstate New York',
			'intro' => 'People searching for drug detox in Upstate New York often need clear, timely information. Every1 Center helps families prepare for conversations with licensed detox providers, including questions about medical evaluation, availability, insurance, and next-step treatment planning.',
			'focus' => 'drug detox Upstate NY',
			'context' => 'Detoxification is clinical care provided by licensed medical teams. Every1 Center does not provide detox or make clinical determinations; we help families understand the process and organize questions for providers.',
			'questions' => array(
				'What questions should we ask about withdrawal monitoring and medical evaluation?',
				'How can a detox provider coordinate a transition to the next level of care?',
				'What information should we verify about insurance and admission timing?',
			),
		),
		'inpatient-drug-rehab-upstate-new-york' => array(
			'title' => 'Inpatient Drug Rehab Upstate NY | Compare Treatment Options | Every1 Center',
			'h1' => 'Inpatient Drug Rehab Options in Upstate New York',
			'intro' => 'When considering inpatient drug rehab in Upstate New York, families need a way to compare program structure, provider credentials, family involvement, insurance questions, and aftercare planning. Every1 Center provides independent navigation support before you contact licensed programs.',
			'focus' => 'inpatient drug rehab Upstate NY',
			'context' => 'A program’s location and amenities do not by themselves determine fit. Ask each licensed provider about the care it offers, who provides it, what admission criteria apply, and how it coordinates the next step after discharge.',
			'questions' => array(
				'What does each program mean by inpatient or residential treatment?',
				'How are medical, mental-health, and medication questions handled?',
				'What family communication and discharge planning should we expect?',
			),
		),
		'intensive-outpatient-upstate-new-york' => array(
			'title' => 'Intensive Outpatient Upstate NY | IOP & PHP Options | Every1 Center',
			'h1' => 'Intensive Outpatient & PHP Options in Upstate New York',
			'intro' => 'Intensive outpatient programs and partial hospitalization programs can be part of a broader treatment plan. Every1 Center helps families understand the questions to ask licensed providers about schedule, clinical services, transportation, insurance, and continuity of care.',
			'focus' => 'intensive outpatient Upstate NY',
			'context' => 'PHP and IOP are not interchangeable, and availability varies by provider. A provider’s own assessment determines whether it can appropriately serve someone and what level of support it recommends.',
			'questions' => array(
				'How do PHP and IOP schedules differ from residential treatment?',
				'What should we ask about transportation, work, school, and family logistics?',
				'How does an outpatient provider handle continuity and referral needs?',
			),
		),
		'intervention-support-upstate-new-york' => array(
			'title' => 'Intervention Support Upstate NY | Family Guidance | Every1 Center',
			'h1' => 'Intervention Support for Upstate New York Families',
			'intro' => 'When a family is considering an intervention, the immediate goal is a safe, informed next conversation—not pressure or a scripted promise of admission. Every1 Center helps families prepare, understand care options, and connect directly with appropriate licensed providers.',
			'focus' => 'intervention support Upstate NY',
			'context' => 'Every situation is different. If there is an immediate danger, overdose concern, medical emergency, or risk of self-harm, call 911 or 988 rather than relying on an intervention plan or a website.',
			'questions' => array(
				'What information can a family gather before seeking intervention support?',
				'How can we discuss treatment options without promising a specific outcome?',
				'When should a family seek emergency or crisis help instead?',
			),
		),
		'drug-rehab-schenectady-ny' => array(
			'title' => 'Drug Rehab Schenectady NY | Detox & Inpatient Options | Every1 Center',
			'h1' => 'Drug Rehab, Detox & Inpatient Options for Schenectady, NY',
			'intro' => 'When someone in Schenectady needs help for alcohol or drug use, the search can quickly become overwhelming. Every1 Center helps individuals and families understand detox, inpatient rehab, residential treatment, PHP, IOP, intervention, and recovery-support options before they speak directly with licensed providers.',
			'focus' => 'drug rehab Schenectady NY',
			'context' => 'Families in Schenectady may compare options across the Capital Region and wider Upstate New York. A good decision weighs immediate safety, the level of care a provider recommends, insurance, transportation, and whether the program can meet the person’s needs—not just the first listing in a search result.',
			'questions' => array(
				'What should we ask about detox and withdrawal safety?',
				'How do we compare inpatient and outpatient programs from Schenectady?',
				'What information should we confirm before speaking with admissions?',
			),
		),
		'drug-rehab-clifton-park-ny' => array(
			'title' => 'Drug Rehab Clifton Park NY | Detox & Treatment Guidance | Every1 Center',
			'h1' => 'Drug Rehab & Detox Options for Clifton Park, NY',
			'intro' => 'Every1 Center provides independent guidance for Clifton Park families comparing drug rehab, medical detox, inpatient treatment, outpatient programs, and intervention support. We do not operate a treatment facility or make clinical decisions; we help you prepare for informed conversations with licensed providers.',
			'focus' => 'drug rehab Clifton Park NY',
			'context' => 'A Clifton Park search can include providers throughout the Capital Region and Upstate New York. The appropriate next step depends on the provider’s assessment, availability, practical travel needs, insurance, and the level of support the individual can safely use.',
			'questions' => array(
				'How do we decide whether nearby care or a broader search makes sense?',
				'What should we ask about residential treatment and family communication?',
				'How do we verify insurance details directly with a provider and plan?',
			),
		),
		'drug-rehab-saratoga-springs-ny' => array(
			'title' => 'Drug Rehab Saratoga Springs NY | Detox & Inpatient Options | Every1 Center',
			'h1' => 'Drug Rehab, Detox & Inpatient Options for Saratoga Springs, NY',
			'intro' => 'Families searching for drug rehab in Saratoga Springs may be comparing detox, residential treatment, inpatient rehab, PHP, IOP, and recovery support. Every1 Center helps organize the questions so you can connect directly with licensed providers and make an informed next decision.',
			'focus' => 'drug rehab Saratoga Springs NY',
			'context' => 'The search does not need to stop at one city boundary. Families often balance proximity with a provider’s clinical assessment, availability, insurance participation, schedule, family involvement, and discharge-planning process.',
			'questions' => array(
				'What questions help us compare detox, residential care, and outpatient care?',
				'How can a family plan transportation and communication before an admission call?',
				'What should we ask about support after a program ends?',
			),
		),
		'drug-rehab-latham-ny' => array(
			'title' => 'Drug Rehab Latham NY | Detox & Treatment Options | Every1 Center',
			'h1' => 'Drug Rehab & Detox Treatment Options for Latham, NY',
			'intro' => 'Every1 Center helps people in Latham and the Capital Region understand the differences between detox, inpatient drug rehab, residential programs, PHP, IOP, intervention support, and recovery planning. Clinical services and admission decisions are made by licensed providers.',
			'focus' => 'drug rehab Latham NY',
			'context' => 'A useful treatment search starts with the situation in front of the person and family. Immediate safety, withdrawal concerns, co-occurring needs, practical travel, insurance, and the provider’s own assessment can all affect the appropriate conversation to have next.',
			'questions' => array(
				'When should a family ask about medical evaluation or withdrawal concerns?',
				'What is the difference between a residential program, PHP, and IOP?',
				'What should we confirm about scheduling, insurance, and family support?',
			),
		),
		'addiction-treatment-capital-region-ny' => array(
			'title' => 'Addiction Treatment Capital Region NY | Compare Care Options | Every1 Center',
			'h1' => 'Addiction Treatment Options Across New York’s Capital Region',
			'intro' => 'Every1 Center provides independent addiction-treatment navigation for people and families in the Capital Region who are comparing detox, inpatient rehab, residential treatment, PHP, IOP, intervention support, and continuing-care options. We help you prepare for direct conversations with licensed providers.',
			'focus' => 'addiction treatment Capital Region NY',
			'context' => 'The Capital Region includes many communities, and the right next conversation may not be limited to the closest result. Families can compare a provider’s assessment, scope of care, availability, insurance, travel requirements, family communication, and plan for the transition after treatment.',
			'questions' => array(
				'How do we compare treatment options across the Capital Region?',
				'Which questions help separate a program directory from a real provider conversation?',
				'How do we plan safely when the situation feels urgent?',
			),
		),
	);
}

function every1_register_local_search_routes() {
	foreach ( array_keys( every1_local_search_pages() ) as $slug ) {
		add_rewrite_rule( '^' . preg_quote( $slug, '/' ) . '/?$', 'index.php?every1_local_search=' . $slug, 'top' );
	}
	add_rewrite_rule( '^every1-local-sitemap\.xml$', 'index.php?every1_local_sitemap=1', 'top' );
}
add_action( 'init', 'every1_register_local_search_routes' );

function every1_local_search_query_var( $vars ) {
	$vars[] = 'every1_local_search';
	$vars[] = 'every1_local_sitemap';
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

/**
 * Answers are intentionally editorial and navigation-focused. They do not
 * diagnose, recommend a level of care, or represent Every1 as a provider.
 */
function every1_local_search_faqs( $page ) {
	return array(
		array(
			'question' => 'Does Every1 Center provide detox or inpatient drug rehab?',
			'answer'   => 'No. Every1 Center is an independent treatment-navigation and family-support resource. Detoxification, inpatient rehab, and other clinical services are provided by licensed providers that make their own assessment and admission decisions.',
		),
		array(
			'question' => 'Do we need to know the right level of care before we ask for help?',
			'answer'   => 'No. A useful first step is to identify urgent safety concerns, the questions the family has, and the practical factors that matter. A licensed provider can explain what it offers and whether it can appropriately evaluate the situation.',
		),
		array(
			'question' => 'How should we compare ' . $page['focus'] . ' options?',
			'answer'   => 'Compare the provider’s own assessment process, availability, insurance information, travel requirements, family communication, medication policies, and transition planning. Do not rely on a directory listing or proximity alone.',
		),
	);
}

function every1_local_search_meta() {
	$slug  = get_query_var( 'every1_local_search' );
	$pages = every1_local_search_pages();
	if ( ! $slug || ! isset( $pages[ $slug ] ) ) {
		return;
	}

	$page = $pages[ $slug ];
	$url  = home_url( '/' . $slug . '/' );
	$desc = wp_trim_words( $page['intro'], 32, '...' );
	$faq    = every1_local_search_faqs( $page );
	$schema = array(
		'@context' => 'https://schema.org',
		'@graph'   => array(
			array(
				'@type'       => 'WebPage',
				'@id'          => $url . '#webpage',
				'name'         => $page['title'],
				'description'  => $desc,
				'url'          => $url,
				'about'        => array(
					'@type' => 'Thing',
					'name'  => $page['focus'],
				),
				'isPartOf'     => array(
					'@type' => 'WebSite',
					'name'  => 'Every1 Center',
					'url'   => home_url( '/' ),
				),
				'breadcrumb'   => array( '@id' => $url . '#breadcrumb' ),
			),
			array(
				'@type'           => 'BreadcrumbList',
				'@id'              => $url . '#breadcrumb',
				'itemListElement'  => array(
					array( '@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => home_url( '/' ) ),
					array( '@type' => 'ListItem', 'position' => 2, 'name' => 'Treatment Navigation', 'item' => home_url( '/drug-rehab-upstate-new-york/' ) ),
					array( '@type' => 'ListItem', 'position' => 3, 'name' => $page['h1'], 'item' => $url ),
				),
			),
			array(
				'@type'      => 'FAQPage',
				'@id'         => $url . '#faq',
				'mainEntity' => array_map(
					function( $item ) {
						return array(
							'@type'          => 'Question',
							'name'           => $item['question'],
							'acceptedAnswer' => array(
								'@type' => 'Answer',
								'text'  => $item['answer'],
							),
						);
					},
					$faq
				),
			),
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

/**
 * Publish a small, separate sitemap for the virtual local-search pages.
 * This complements, rather than replaces, a plugin or core WordPress sitemap.
 */
function every1_local_search_sitemap() {
	if ( ! get_query_var( 'every1_local_sitemap' ) ) {
		return;
	}

	status_header( 200 );
	nocache_headers();
	header( 'Content-Type: application/xml; charset=' . get_bloginfo( 'charset' ), true );

	echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
	foreach ( array_keys( every1_local_search_pages() ) as $slug ) {
		echo "\t<url><loc>" . esc_url( home_url( '/' . $slug . '/' ) ) . "</loc></url>\n";
	}
	echo '</urlset>';
	exit;
}
add_action( 'template_redirect', 'every1_local_search_sitemap', 0 );

function every1_local_search_robots_txt( $output, $public ) {
	if ( '0' === (string) $public ) {
		return $output;
	}

	return rtrim( $output ) . "\nSitemap: " . esc_url( home_url( '/every1-local-sitemap.xml' ) ) . "\n";
}
add_filter( 'robots_txt', 'every1_local_search_robots_txt', 10, 2 );

function every1_flush_local_search_routes() {
	every1_register_local_search_routes();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'every1_flush_local_search_routes' );
