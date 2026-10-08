<?php
/**
 * Template tags used across the theme.
 *
 * @package Every1Center
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function every1_phone_number() {
	return '+1-518-714-0355';
}

function every1_phone_display() {
	return '(518) 714-0355';
}

function every1_phone_link( $label = '', $classes = 'btn btn-primary' ) {
	$label = $label ? $label : esc_html__( 'Call (518) 714-0355', 'every1center' );
	$tel   = preg_replace( '/[^0-9+]/', '', every1_phone_number() );
	printf(
		'<a class="%1$s phone-link" href="tel:%2$s" data-event="phone_call"><span class="icon-phone" aria-hidden="true">&#9742;</span> %3$s</a>',
		esc_attr( $classes ),
		esc_attr( $tel ),
		esc_html( $label )
	);
}

function every1_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( DATE_W3C ) ),
		esc_html( get_the_modified_date() )
	);

	printf(
		'<span class="posted-on">%1$s <a href="%2$s" rel="bookmark">%3$s</a></span>',
		esc_html__( 'Posted on', 'every1center' ),
		esc_url( get_permalink() ),
		$time_string
	);
}

function every1_posted_by() {
	printf(
		'<span class="byline">%1$s <span class="author vcard"><a class="url fn n" href="%2$s">%3$s</a></span></span>',
		esc_html__( 'by', 'every1center' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_html( get_the_author() )
	);
}

function every1_post_categories() {
	if ( 'post' === get_post_type() ) {
		$categories_list = get_the_category_list( esc_html__( ', ', 'every1center' ) );
		if ( $categories_list ) {
			printf( '<span class="cat-links">%1$s</span>', $categories_list );
		}
	}
}

function every1_entry_footer() {
	if ( get_edit_post_link() ) {
		echo '<span class="edit-link">';
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Post title. */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'every1center' ),
					array( 'span' => array( 'class' => array() ) )
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link-sep">&middot; </span>',
			''
		);
		echo '</span>';
	}
}

function every1_cta_band( $heading = '', $subheading = '' ) {
	$heading    = $heading ? $heading : __( 'Talk to someone now — confidential help, 24/7.', 'every1center' );
	$subheading = $subheading ? $subheading : __( 'Insurance verified in minutes. Trusted placement across Upstate NY.', 'every1center' );
	?>
	<section class="cta-band" aria-labelledby="cta-band-heading">
		<div class="container">
			<div class="cta-band__text">
				<h2 id="cta-band-heading"><?php echo esc_html( $heading ); ?></h2>
				<p><?php echo esc_html( $subheading ); ?></p>
			</div>
			<div class="cta-band__actions">
				<?php every1_phone_link( __( 'Call (518) 714-0355', 'every1center' ), 'btn btn-light' ); ?>
				<a class="btn btn-outline-light" href="<?php echo esc_url( home_url( '/request-a-call/' ) ); ?>"><?php esc_html_e( 'Request a Callback', 'every1center' ); ?></a>
			</div>
		</div>
	</section>
	<?php
}
