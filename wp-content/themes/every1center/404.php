<?php
/**
 * 404 template.
 *
 * @package Every1Center
 */

get_header(); ?>

<main id="primary" class="site-main error-404">
	<div class="container error-404__inner">
		<p class="eyebrow"><?php esc_html_e( '404', 'every1center' ); ?></p>
		<h1><?php esc_html_e( 'We can\'t find that page.', 'every1center' ); ?></h1>
		<p class="error-404__lede"><?php esc_html_e( 'The page may have moved or no longer exists. If you came here looking for help, please call us — we\'re here 24/7.', 'every1center' ); ?></p>

		<div class="error-404__actions">
			<?php every1_phone_link( __( 'Call (518) 714-0355', 'every1center' ), 'btn btn-primary btn-lg' ); ?>
			<a class="btn btn-outline btn-lg" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to Home', 'every1center' ); ?></a>
		</div>

		<div class="error-404__search">
			<h2><?php esc_html_e( 'Or search the site', 'every1center' ); ?></h2>
			<?php get_search_form(); ?>
		</div>

		<div class="error-404__links">
			<h2><?php esc_html_e( 'Popular pages', 'every1center' ); ?></h2>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/detox/' ) ); ?>"><?php esc_html_e( 'Detox Programs', 'every1center' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/programs/' ) ); ?>"><?php esc_html_e( 'Treatment Programs', 'every1center' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/insurance/' ) ); ?>"><?php esc_html_e( 'Insurance', 'every1center' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"><?php esc_html_e( 'About Us', 'every1center' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php esc_html_e( 'Contact', 'every1center' ); ?></a></li>
			</ul>
		</div>
	</div>
</main>

<?php
get_footer();
