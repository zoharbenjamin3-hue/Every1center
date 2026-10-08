<?php
/**
 * Accessible nav menu walker with submenu toggle buttons.
 *
 * @package Every1Center
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Every1_Nav_Walker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"sub-menu depth-{$depth}\">\n";
	}

	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$has_children = in_array( 'menu-item-has-children', $classes, true );

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id          = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id          = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . '>';

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$attributes .= ' ' . $attr . '="' . esc_attr( $value ) . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output  = ( ! empty( $args->before ) ? $args->before : '' );
		$item_output .= '<a' . $attributes . '>';
		$item_output .= ( ! empty( $args->link_before ) ? $args->link_before : '' );
		$item_output .= $title;
		$item_output .= ( ! empty( $args->link_after ) ? $args->link_after : '' );
		$item_output .= '</a>';

		if ( $has_children && $depth === 0 ) {
			$item_output .= '<button class="submenu-toggle" aria-expanded="false" aria-label="' . esc_attr__( 'Open submenu', 'every1center' ) . '"><span aria-hidden="true">+</span></button>';
		}

		$item_output .= ( ! empty( $args->after ) ? $args->after : '' );

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

function every1_fallback_menu() {
	echo '<ul class="primary-menu fallback">';
	$pages = array(
		'/'                          => __( 'Home', 'every1center' ),
		'/detox/'                    => __( 'Detox', 'every1center' ),
		'/programs/'                 => __( 'Programs', 'every1center' ),
		'/treatment/'                => __( 'Treatment', 'every1center' ),
		'/therapy/'                  => __( 'Therapy', 'every1center' ),
		'/insurance/'                => __( 'Insurance', 'every1center' ),
		'/rehab-centers/'            => __( 'Locations', 'every1center' ),
		'/resources/'                => __( 'Resources', 'every1center' ),
		'/blog/'                     => __( 'Blog', 'every1center' ),
		'/about-us/'                 => __( 'About', 'every1center' ),
		'/contact-us/'               => __( 'Contact', 'every1center' ),
	);
	foreach ( $pages as $url => $label ) {
		echo '<li><a href="' . esc_url( home_url( $url ) ) . '">' . esc_html( $label ) . '</a></li>';
	}
	echo '</ul>';
}
