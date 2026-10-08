<?php
/**
 * SEO fallback when Rank Math is not active, plus schema and meta helpers.
 *
 * @package Every1Center
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function every1_is_rank_math_active() {
	return class_exists( 'RankMath' ) || defined( 'RANK_MATH_VERSION' );
}

function every1_meta_description() {
	if ( every1_is_rank_math_active() ) {
		return;
	}

	$description = '';

	if ( is_singular() ) {
		global $post;
		$rm_desc = get_post_meta( $post->ID, 'rank_math_description', true );
		if ( $rm_desc ) {
			$description = $rm_desc;
		} elseif ( has_excerpt( $post->ID ) ) {
			$description = wp_strip_all_tags( get_the_excerpt( $post ) );
		} else {
			$description = wp_trim_words( wp_strip_all_tags( $post->post_content ), 28, '...' );
		}
	} elseif ( is_home() || is_front_page() ) {
		$description = get_bloginfo( 'description' );
	} elseif ( is_category() || is_tag() || is_tax() ) {
		$term = get_queried_object();
		if ( $term && ! empty( $term->description ) ) {
			$description = wp_strip_all_tags( $term->description );
		}
	}

	if ( $description ) {
		echo "\n<meta name=\"description\" content=\"" . esc_attr( $description ) . "\">\n";
	}
}
add_action( 'wp_head', 'every1_meta_description', 1 );

function every1_open_graph() {
	if ( every1_is_rank_math_active() ) {
		return;
	}

	$site_name = get_bloginfo( 'name' );
	$url       = '';
	$title     = '';
	$desc      = '';
	$image     = '';

	if ( is_singular() ) {
		global $post;
		$url   = get_permalink( $post );
		$rm_t  = get_post_meta( $post->ID, 'rank_math_title', true );
		$rm_d  = get_post_meta( $post->ID, 'rank_math_description', true );
		$title = $rm_t ? $rm_t : get_the_title( $post );
		$desc  = $rm_d ? $rm_d : wp_trim_words( wp_strip_all_tags( $post->post_content ), 28, '...' );
		if ( has_post_thumbnail( $post ) ) {
			$image = get_the_post_thumbnail_url( $post, 'every1-hero' );
		}
	} elseif ( is_front_page() || is_home() ) {
		$url   = home_url( '/' );
		$title = get_bloginfo( 'name' );
		$desc  = get_bloginfo( 'description' );
	}

	if ( ! $image ) {
		$image = EVERY1_THEME_URI . '/assets/images/og-default.jpg';
	}

	if ( $title ) {
		echo '<meta property="og:type" content="' . ( is_singular( 'post' ) ? 'article' : 'website' ) . '">' . "\n";
		echo '<meta property="og:site_name" content="' . esc_attr( $site_name ) . '">' . "\n";
		echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
		echo '<meta property="og:description" content="' . esc_attr( $desc ) . '">' . "\n";
		echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
		echo '<meta property="og:image" content="' . esc_url( $image ) . '">' . "\n";
		echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
		echo '<meta name="twitter:site" content="@every1center">' . "\n";
		echo '<meta name="twitter:title" content="' . esc_attr( $title ) . '">' . "\n";
		echo '<meta name="twitter:description" content="' . esc_attr( $desc ) . '">' . "\n";
		echo '<meta name="twitter:image" content="' . esc_url( $image ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'every1_open_graph', 2 );

function every1_organization_schema() {
	if ( ! ( is_front_page() || is_page( array( 'about', 'about-us', 'contact-us', 'home' ) ) ) ) {
		return;
	}

	$schema = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'Organization',
		'name'        => 'Every1 Center',
		'description' => 'Independent addiction-treatment navigation, intervention support, and family education for people exploring licensed care options.',
		'url'         => home_url( '/' ),
		'contactPoint' => array(
			'@type'       => 'ContactPoint',
			'telephone'   => '+1-518-714-0355',
			'contactType' => 'customer support',
			'availableLanguage' => 'English',
		),
		'sameAs'      => array(
			'https://www.instagram.com/every1center/',
		),
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
add_action( 'wp_head', 'every1_organization_schema', 20 );

function every1_breadcrumbs() {
	if ( function_exists( 'rank_math_the_breadcrumbs' ) ) {
		rank_math_the_breadcrumbs();
		return;
	}

	$separator = '<span class="bc-sep" aria-hidden="true">&raquo;</span>';
	echo '<nav class="breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumb', 'every1center' ) . '"><ol>';
	echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'every1center' ) . '</a></li>';

	if ( is_singular( 'post' ) ) {
		echo $separator;
		$cats = get_the_category();
		if ( ! empty( $cats ) ) {
			$cat = $cats[0];
			echo '<li><a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a></li>';
			echo $separator;
		}
		echo '<li aria-current="page">' . esc_html( get_the_title() ) . '</li>';
	} elseif ( is_page() ) {
		global $post;
		$ancestors = array_reverse( get_post_ancestors( $post ) );
		foreach ( $ancestors as $ancestor ) {
			echo $separator;
			echo '<li><a href="' . esc_url( get_permalink( $ancestor ) ) . '">' . esc_html( get_the_title( $ancestor ) ) . '</a></li>';
		}
		echo $separator;
		echo '<li aria-current="page">' . esc_html( get_the_title() ) . '</li>';
	} elseif ( is_category() || is_tag() || is_tax() ) {
		echo $separator;
		echo '<li aria-current="page">' . esc_html( single_term_title( '', false ) ) . '</li>';
	} elseif ( is_search() ) {
		echo $separator;
		echo '<li aria-current="page">' . esc_html( sprintf( __( 'Results for "%s"', 'every1center' ), get_search_query() ) ) . '</li>';
	} elseif ( is_404() ) {
		echo $separator;
		echo '<li aria-current="page">' . esc_html__( '404 Error: page not found', 'every1center' ) . '</li>';
	}

	echo '</ol></nav>';
}
