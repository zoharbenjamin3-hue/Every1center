<?php
/**
 * Sidebar.
 *
 * @package Every1Center
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	?>
	<aside id="secondary" class="widget-area sidebar-default" aria-label="<?php esc_attr_e( 'Sidebar', 'every1center' ); ?>">
		<section class="widget widget-help">
			<h2 class="widget-title"><?php esc_html_e( 'Need help right now?', 'every1center' ); ?></h2>
			<p><?php esc_html_e( 'Speak to an intake coordinator confidentially, 24/7.', 'every1center' ); ?></p>
			<?php every1_phone_link( __( 'Call (518) 714-0355', 'every1center' ), 'btn btn-primary btn-block' ); ?>
			<a class="btn btn-outline btn-block" href="<?php echo esc_url( home_url( '/request-a-call/' ) ); ?>"><?php esc_html_e( 'Request a Callback', 'every1center' ); ?></a>
		</section>

		<section class="widget widget-quick-links">
			<h2 class="widget-title"><?php esc_html_e( 'Popular Topics', 'every1center' ); ?></h2>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/detox/alcohol/' ) ); ?>"><?php esc_html_e( 'Alcohol Detox', 'every1center' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/detox/fentanyl/' ) ); ?>"><?php esc_html_e( 'Fentanyl Detox', 'every1center' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/detox/benzo/' ) ); ?>"><?php esc_html_e( 'Benzo Detox', 'every1center' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/programs/inpatient-rehab/' ) ); ?>"><?php esc_html_e( 'Inpatient Rehab', 'every1center' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/insurance/' ) ); ?>"><?php esc_html_e( 'Insurance Coverage', 'every1center' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/programs/intervention/' ) ); ?>"><?php esc_html_e( 'Interventions', 'every1center' ); ?></a></li>
			</ul>
		</section>
	</aside>
	<?php
	return;
}
?>
<aside id="secondary" class="widget-area" aria-label="<?php esc_attr_e( 'Sidebar', 'every1center' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
