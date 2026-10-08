<?php
/**
 * Site header.
 *
 * @package Every1Center
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'every1center' ); ?></a>

<div id="page" class="site">

	<div class="top-bar" role="region" aria-label="<?php esc_attr_e( 'Site utilities', 'every1center' ); ?>">
		<div class="container top-bar__inner">
			<div class="top-bar__left">
				<span class="top-bar__badge"><span aria-hidden="true">&#9889;</span> <?php esc_html_e( '24/7 Confidential Help', 'every1center' ); ?></span>
				<span class="top-bar__address">8 Shepherd Dr, Troy, NY</span>
			</div>
			<div class="top-bar__right">
				<?php
				if ( has_nav_menu( 'utility' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'utility',
						'menu_class'     => 'utility-menu',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => false,
					) );
				}
				?>
				<a class="top-bar__phone" href="tel:+15187140355"><span aria-hidden="true">&#9742;</span> (518) 714-0355</a>
			</div>
		</div>
	</div>

	<header id="masthead" class="site-header">
		<div class="container site-header__inner">
			<div class="site-branding">
				<?php
				if ( has_custom_logo() ) {
					the_custom_logo();
				} else {
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo esc_html( $description ); ?></p>
						<?php
					endif;
				}
				?>
			</div>

			<button class="menu-toggle" aria-controls="primary-navigation" aria-expanded="false">
				<span class="menu-toggle__bars" aria-hidden="true"><span></span><span></span><span></span></span>
				<span class="screen-reader-text"><?php esc_html_e( 'Toggle menu', 'every1center' ); ?></span>
			</button>

			<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary', 'every1center' ); ?>">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-navigation',
					'menu_class'     => 'primary-menu',
					'container'      => false,
					'walker'         => new Every1_Nav_Walker(),
					'fallback_cb'    => 'every1_fallback_menu',
				) );
				?>
			</nav>

			<div class="site-header__cta">
				<?php every1_phone_link( __( 'Call (518) 714-0355', 'every1center' ), 'btn btn-primary btn-sm' ); ?>
			</div>
		</div>
	</header>

	<?php if ( ! is_front_page() ) : ?>
	<div class="page-header-strip">
		<div class="container">
			<?php every1_breadcrumbs(); ?>
		</div>
	</div>
	<?php endif; ?>
