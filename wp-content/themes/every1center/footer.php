<?php
/**
 * Site footer.
 *
 * @package Every1Center
 */
?>
	<?php if ( ! is_front_page() && ! is_404() ) : ?>
		<?php every1_cta_band(); ?>
	<?php endif; ?>

	<footer id="colophon" class="site-footer">
		<div class="container site-footer__top">
			<div class="footer-col footer-col--brand">
				<?php
				if ( has_custom_logo() ) {
					the_custom_logo();
				} else {
					?>
					<p class="footer-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				}
				?>
				<p class="footer-tagline"><?php esc_html_e( 'Independent addiction-treatment guidance, family support, and education. Confidential, compassionate, 24/7.', 'every1center' ); ?></p>
				<address class="footer-address">
					8 Shepherd Dr Suite 2<br>
					Troy, NY 12180<br>
					<a href="tel:+15187140355">(518) 714-0355</a><br>
					<a href="mailto:info@playground.every1center.com">info@playground.every1center.com</a>
				</address>
				<ul class="social-links">
					<li><a href="https://www.instagram.com/every1center/" rel="noopener" target="_blank" aria-label="<?php esc_attr_e( 'Every1 Center on Instagram', 'every1center' ); ?>">Instagram</a></li>
				</ul>
			</div>

			<div class="footer-col">
				<?php if ( is_active_sidebar( 'footer-1' ) ) { dynamic_sidebar( 'footer-1' ); } else { ?>
					<h3 class="widget-title"><?php esc_html_e( 'Detox', 'every1center' ); ?></h3>
					<ul class="footer-links">
						<li><a href="<?php echo esc_url( home_url( '/detox/' ) ); ?>"><?php esc_html_e( 'Detox Overview', 'every1center' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/detox/alcohol/' ) ); ?>"><?php esc_html_e( 'Alcohol Detox', 'every1center' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/detox/opioids/' ) ); ?>"><?php esc_html_e( 'Opioid Detox', 'every1center' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/detox/heroin/' ) ); ?>"><?php esc_html_e( 'Heroin Detox', 'every1center' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/detox/fentanyl/' ) ); ?>"><?php esc_html_e( 'Fentanyl Detox', 'every1center' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/detox/benzo/' ) ); ?>"><?php esc_html_e( 'Benzo Detox', 'every1center' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/detox/cocaine/' ) ); ?>"><?php esc_html_e( 'Cocaine Detox', 'every1center' ); ?></a></li>
					</ul>
				<?php } ?>
			</div>

			<div class="footer-col">
				<?php if ( is_active_sidebar( 'footer-2' ) ) { dynamic_sidebar( 'footer-2' ); } else { ?>
					<h3 class="widget-title"><?php esc_html_e( 'Programs', 'every1center' ); ?></h3>
					<ul class="footer-links">
						<li><a href="<?php echo esc_url( home_url( '/programs/inpatient-rehab/' ) ); ?>"><?php esc_html_e( 'Inpatient Rehab', 'every1center' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/programs/residential-treatment/' ) ); ?>"><?php esc_html_e( 'Residential Treatment', 'every1center' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/programs/partial-hospitalization/' ) ); ?>"><?php esc_html_e( 'Partial Hospitalization', 'every1center' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/programs/intensive-outpatient/' ) ); ?>"><?php esc_html_e( 'Intensive Outpatient', 'every1center' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/programs/outpatient/' ) ); ?>"><?php esc_html_e( 'Outpatient', 'every1center' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/programs/long-term/' ) ); ?>"><?php esc_html_e( 'Long-Term Rehab', 'every1center' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/programs/intervention/' ) ); ?>"><?php esc_html_e( 'Interventions', 'every1center' ); ?></a></li>
					</ul>
				<?php } ?>
			</div>

			<div class="footer-col">
				<?php if ( is_active_sidebar( 'footer-3' ) ) { dynamic_sidebar( 'footer-3' ); } else { ?>
					<h3 class="widget-title"><?php esc_html_e( 'Company', 'every1center' ); ?></h3>
					<ul class="footer-links">
						<li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"><?php esc_html_e( 'About Us', 'every1center' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/our-team/' ) ); ?>"><?php esc_html_e( 'Our Team', 'every1center' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/insurance/' ) ); ?>"><?php esc_html_e( 'Insurance', 'every1center' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>"><?php esc_html_e( 'Resources', 'every1center' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'every1center' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php esc_html_e( 'Contact', 'every1center' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/request-a-call/' ) ); ?>"><?php esc_html_e( 'Request a Call', 'every1center' ); ?></a></li>
					</ul>
				<?php } ?>
			</div>
		</div>

		<div class="site-footer__bottom">
			<div class="container">
				<p class="copyright">&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> Every1 Center. <?php esc_html_e( 'All rights reserved.', 'every1center' ); ?></p>
				<nav class="footer-nav" aria-label="<?php esc_attr_e( 'Footer', 'every1center' ); ?>">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'menu_class'     => 'footer-menu',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => function () {
							echo '<ul class="footer-menu">';
							echo '<li><a href="' . esc_url( home_url( '/privacy-policy/' ) ) . '">' . esc_html__( 'Privacy Policy', 'every1center' ) . '</a></li>';
							echo '<li><a href="' . esc_url( home_url( '/terms-of-service/' ) ) . '">' . esc_html__( 'Terms of Service', 'every1center' ) . '</a></li>';
							echo '<li><a href="' . esc_url( home_url( '/contact-us/' ) ) . '">' . esc_html__( 'Contact', 'every1center' ) . '</a></li>';
							echo '</ul>';
						},
					) );
					?>
				</nav>
				<p class="legal-fine-print"><?php esc_html_e( 'If you or someone you know is in crisis, call 988 (Suicide & Crisis Lifeline) or 911 immediately. Every1 Center provides educational information and referral support; we do not provide medical advice or emergency services.', 'every1center' ); ?></p>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<a class="floating-call" href="tel:+15187140355" aria-label="<?php esc_attr_e( 'Call Every1 Center at 5187140355', 'every1center' ); ?>">
	<span aria-hidden="true">&#9742;</span>
	<span class="floating-call__text"><?php esc_html_e( 'Call 24/7', 'every1center' ); ?></span>
</a>

<?php wp_footer(); ?>
</body>
</html>
