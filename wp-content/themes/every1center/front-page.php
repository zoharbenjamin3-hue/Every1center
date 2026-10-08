<?php
/**
 * Homepage template.
 *
 * @package Every1Center
 */

get_header(); ?>

<main id="primary" class="site-main home-main">

	<section class="hero" aria-labelledby="hero-heading">
		<div class="container hero__inner">
			<div class="hero__content">
				<p class="eyebrow"><?php esc_html_e( '24/7 Confidential Help — Upstate NY', 'every1center' ); ?></p>
				<h1 id="hero-heading"><?php esc_html_e( 'Drug Rehab, Detox &amp; Inpatient Treatment Guidance in Troy, NY', 'every1center' ); ?></h1>
				<p class="hero__lede"><?php esc_html_e( 'Confidential help for individuals and families comparing detox, inpatient drug rehab, residential treatment, PHP, IOP, and recovery support. Every1 Center helps you understand choices and connect directly with appropriate licensed providers.', 'every1center' ); ?></p>
				<div class="hero__actions">
					<?php every1_phone_link( __( 'Call (518) 714-0355', 'every1center' ), 'btn btn-primary btn-lg' ); ?>
					<a class="btn btn-outline btn-lg" href="<?php echo esc_url( home_url( '/request-a-call/' ) ); ?>"><?php esc_html_e( 'Request a Callback', 'every1center' ); ?></a>
				</div>
				<ul class="hero__trust">
					<li><span aria-hidden="true">&check;</span> <?php esc_html_e( 'Insurance verified in minutes', 'every1center' ); ?></li>
					<li><span aria-hidden="true">&check;</span> <?php esc_html_e( 'Dual-diagnosis pathways', 'every1center' ); ?></li>
					<li><span aria-hidden="true">&check;</span> <?php esc_html_e( 'Same-day next-step support', 'every1center' ); ?></li>
				</ul>
			</div>
			<aside class="hero__card" aria-label="<?php esc_attr_e( 'Quick assessment', 'every1center' ); ?>">
				<h2><?php esc_html_e( 'Talk through your options.', 'every1center' ); ?></h2>
				<p><?php esc_html_e( 'Confidential guidance for you or your family. No obligation.', 'every1center' ); ?></p>
				<dl class="hero__card-meta">
					<dt><?php esc_html_e( 'Phone', 'every1center' ); ?></dt>
					<dd><a href="tel:+15187140355">(518) 714-0355</a></dd>
					<dt><?php esc_html_e( 'Hours', 'every1center' ); ?></dt>
					<dd><?php esc_html_e( 'Open 24/7', 'every1center' ); ?></dd>
					<dt><?php esc_html_e( 'Service Area', 'every1center' ); ?></dt>
					<dd><?php esc_html_e( 'Capital Region, Finger Lakes, North Country', 'every1center' ); ?></dd>
				</dl>
				<a class="btn btn-primary btn-block" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php esc_html_e( 'Get Confidential Guidance', 'every1center' ); ?></a>
			</aside>
		</div>
	</section>

	<section class="trust-bar" aria-label="<?php esc_attr_e( 'What we help with', 'every1center' ); ?>">
		<div class="container trust-bar__grid">
			<div class="trust-bar__item"><strong><?php esc_html_e( 'Alcohol', 'every1center' ); ?></strong></div>
			<div class="trust-bar__item"><strong><?php esc_html_e( 'Opioids &amp; Fentanyl', 'every1center' ); ?></strong></div>
			<div class="trust-bar__item"><strong><?php esc_html_e( 'Benzodiazepines', 'every1center' ); ?></strong></div>
			<div class="trust-bar__item"><strong><?php esc_html_e( 'Cocaine &amp; Stimulants', 'every1center' ); ?></strong></div>
			<div class="trust-bar__item"><strong><?php esc_html_e( 'Methamphetamine', 'every1center' ); ?></strong></div>
			<div class="trust-bar__item"><strong><?php esc_html_e( 'Dual Diagnosis', 'every1center' ); ?></strong></div>
		</div>
	</section>

	<section class="services" aria-labelledby="services-heading">
		<div class="container">
			<header class="section-header">
				<p class="eyebrow"><?php esc_html_e( 'How we help', 'every1center' ); ?></p>
				<h2 id="services-heading"><?php esc_html_e( 'A clear path from crisis to recovery.', 'every1center' ); ?></h2>
				<p class="section-sub"><?php esc_html_e( 'We make the process easier to understand: what each level of care means, what questions to ask, and how to plan a safe next step with a licensed provider.', 'every1center' ); ?></p>
			</header>

			<div class="card-grid card-grid--3">
				<a class="service-card" href="<?php echo esc_url( home_url( '/detox/' ) ); ?>">
					<h3><?php esc_html_e( 'Medical Detox Options', 'every1center' ); ?></h3>
					<p><?php esc_html_e( 'Understand when medically supervised withdrawal care may be appropriate and what to ask a provider.', 'every1center' ); ?></p>
					<span class="card-cta"><?php esc_html_e( 'Explore detox options', 'every1center' ); ?> &rarr;</span>
				</a>
				<a class="service-card" href="<?php echo esc_url( home_url( '/programs/inpatient-rehab/' ) ); ?>">
					<h3><?php esc_html_e( 'Inpatient Drug Rehab', 'every1center' ); ?></h3>
					<p><?php esc_html_e( 'Compare residential programs, questions for admissions teams, and factors that may affect fit.', 'every1center' ); ?></p>
					<span class="card-cta"><?php esc_html_e( 'Compare options', 'every1center' ); ?> &rarr;</span>
				</a>
				<a class="service-card" href="<?php echo esc_url( home_url( '/programs/partial-hospitalization/' ) ); ?>">
					<h3><?php esc_html_e( 'PHP &amp; IOP', 'every1center' ); ?></h3>
					<p><?php esc_html_e( 'Learn how partial hospitalization and intensive outpatient care differ from residential care.', 'every1center' ); ?></p>
					<span class="card-cta"><?php esc_html_e( 'Compare PHP/IOP', 'every1center' ); ?> &rarr;</span>
				</a>
				<a class="service-card" href="<?php echo esc_url( home_url( '/programs/intervention/' ) ); ?>">
					<h3><?php esc_html_e( 'Professional Interventions', 'every1center' ); ?></h3>
					<p><?php esc_html_e( 'Structured support for families preparing for a difficult conversation about getting help.', 'every1center' ); ?></p>
					<span class="card-cta"><?php esc_html_e( 'Learn more', 'every1center' ); ?> &rarr;</span>
				</a>
				<a class="service-card" href="<?php echo esc_url( home_url( '/therapy/' ) ); ?>">
					<h3><?php esc_html_e( 'Therapy &amp; Counseling', 'every1center' ); ?></h3>
					<p><?php esc_html_e( 'Explore common therapy approaches and questions to discuss with a licensed clinician.', 'every1center' ); ?></p>
					<span class="card-cta"><?php esc_html_e( 'See therapies', 'every1center' ); ?> &rarr;</span>
				</a>
				<a class="service-card" href="<?php echo esc_url( home_url( '/programs/sober-transport/' ) ); ?>">
					<h3><?php esc_html_e( 'Sober Transport', 'every1center' ); ?></h3>
					<p><?php esc_html_e( 'Learn what sober transport can involve and how to evaluate a provider for a safe transition.', 'every1center' ); ?></p>
					<span class="card-cta"><?php esc_html_e( 'Arrange transport', 'every1center' ); ?> &rarr;</span>
				</a>
			</div>
		</div>
	</section>

	<section class="steps" aria-labelledby="steps-heading">
		<div class="container">
			<header class="section-header section-header--center">
				<p class="eyebrow"><?php esc_html_e( 'How it works', 'every1center' ); ?></p>
				<h2 id="steps-heading"><?php esc_html_e( 'Three steps to start today.', 'every1center' ); ?></h2>
			</header>
			<ol class="steps-list">
				<li>
					<span class="steps-list__num">1</span>
					<h3><?php esc_html_e( 'Call or request a callback', 'every1center' ); ?></h3>
					<p><?php esc_html_e( 'Speak privately with a navigator about what is happening and what support may be useful.', 'every1center' ); ?></p>
				</li>
				<li>
					<span class="steps-list__num">2</span>
					<h3><?php esc_html_e( 'Review options', 'every1center' ); ?></h3>
					<p><?php esc_html_e( 'Review levels of care, insurance questions, location, and any immediate safety considerations.', 'every1center' ); ?></p>
				</li>
				<li>
					<span class="steps-list__num">3</span>
					<h3><?php esc_html_e( 'Plan the next step', 'every1center' ); ?></h3>
					<p><?php esc_html_e( 'When a provider is selected, we help you prepare the questions and logistics for connecting directly.', 'every1center' ); ?></p>
				</li>
			</ol>
		</div>
	</section>

	<section class="insurance" aria-labelledby="insurance-heading">
		<div class="container">
			<header class="section-header">
				<p class="eyebrow"><?php esc_html_e( 'Insurance verified', 'every1center' ); ?></p>
				<h2 id="insurance-heading"><?php esc_html_e( 'Understand insurance questions before contacting a provider.', 'every1center' ); ?></h2>
				<p class="section-sub"><?php esc_html_e( 'Coverage depends on the plan and provider. Use these guides to prepare for a benefits conversation.', 'every1center' ); ?></p>
			</header>
			<ul class="insurance-grid">
				<li><a href="<?php echo esc_url( home_url( '/insurance/aetna-insurance-for-drug-and-alcohol-rehab/' ) ); ?>">Aetna</a></li>
				<li><a href="<?php echo esc_url( home_url( '/insurance/cigna-insurance-for-drug-and-alcohol-rehab/' ) ); ?>">Cigna</a></li>
				<li><a href="<?php echo esc_url( home_url( '/insurance/united-healthcare-group-insurance-for-drug-and-alcohol-rehab/' ) ); ?>">UnitedHealthcare</a></li>
				<li><a href="<?php echo esc_url( home_url( '/insurance/blue-cross-blue-shield-bcbs-insurance-for-drug-and-alcohol-rehab/' ) ); ?>">BCBS</a></li>
				<li><a href="<?php echo esc_url( home_url( '/insurance/empire-plan-for-drug-and-alcohol-rehab/' ) ); ?>">Empire Plan</a></li>
				<li><a href="<?php echo esc_url( home_url( '/insurance/nyship-for-drug-and-alcohol-rehab/' ) ); ?>">NYSHIP</a></li>
				<li><a href="<?php echo esc_url( home_url( '/insurance/geha-insurance-for-drug-and-alcohol-rehab/' ) ); ?>">GEHA</a></li>
				<li><a href="<?php echo esc_url( home_url( '/insurance/' ) ); ?>" class="all-link"><?php esc_html_e( 'See all plans', 'every1center' ); ?> &rarr;</a></li>
			</ul>
		</div>
	</section>

	<section class="locations" aria-labelledby="locations-heading">
		<div class="container">
			<header class="section-header">
				<p class="eyebrow"><?php esc_html_e( 'Areas we serve', 'every1center' ); ?></p>
				<h2 id="locations-heading"><?php esc_html_e( 'Upstate NY, the Capital Region, and beyond.', 'every1center' ); ?></h2>
			</header>
			<ul class="location-grid">
				<li><a href="<?php echo esc_url( home_url( '/rehab-centers/drug-rehab-troy-ny/' ) ); ?>">Troy, NY</a></li>
				<li><a href="<?php echo esc_url( home_url( '/rehab-centers/drug-rehab-albany-ny/' ) ); ?>">Albany, NY</a></li>
				<li><a href="<?php echo esc_url( home_url( '/rehab-centers/drug-rehab-saratoga-springs-ny/' ) ); ?>">Saratoga Springs, NY</a></li>
				<li><a href="<?php echo esc_url( home_url( '/rehab-centers/drug-rehab-clifton-park-ny/' ) ); ?>">Clifton Park, NY</a></li>
				<li><a href="<?php echo esc_url( home_url( '/rehab-centers/drug-rehab-latham-ny/' ) ); ?>">Latham, NY</a></li>
				<li><a href="<?php echo esc_url( home_url( '/rehab-centers/drug-rehab-hudson-valley/' ) ); ?>">Hudson Valley</a></li>
				<li><a href="<?php echo esc_url( home_url( '/rehab-centers/drug-rehabs-near-newburgh-ny/' ) ); ?>">Newburgh, NY</a></li>
				<li><a href="<?php echo esc_url( home_url( '/rehab-centers/addiction-treatment-capital-region-ny/' ) ); ?>">Capital Region</a></li>
				<li><a href="<?php echo esc_url( home_url( '/rehab-centers/' ) ); ?>" class="all-link"><?php esc_html_e( 'View all locations', 'every1center' ); ?> &rarr;</a></li>
			</ul>
		</div>
	</section>

	<section class="blog-teaser" aria-labelledby="blog-heading">
		<div class="container">
			<header class="section-header">
				<p class="eyebrow"><?php esc_html_e( 'Education &amp; resources', 'every1center' ); ?></p>
				<h2 id="blog-heading"><?php esc_html_e( 'Latest from the Every1 Center blog.', 'every1center' ); ?></h2>
			</header>
			<div class="post-grid">
				<?php
				$recent = new WP_Query( array(
					'post_type'           => 'post',
					'posts_per_page'      => 3,
					'ignore_sticky_posts' => true,
				) );
				if ( $recent->have_posts() ) :
					while ( $recent->have_posts() ) : $recent->the_post();
				?>
					<article <?php post_class( 'post-card' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<a class="post-card__media" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
								<?php the_post_thumbnail( 'every1-card', array( 'loading' => 'lazy' ) ); ?>
							</a>
						<?php endif; ?>
						<div class="post-card__body">
							<h3 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="post-card__excerpt"><?php the_excerpt(); ?></div>
							<a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'every1center' ); ?> &rarr;</a>
						</div>
					</article>
				<?php
					endwhile;
					wp_reset_postdata();
				else :
					echo '<p>' . esc_html__( 'New articles are coming soon.', 'every1center' ) . '</p>';
				endif;
				?>
			</div>
			<div class="text-center">
				<a class="btn btn-outline" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Visit the blog', 'every1center' ); ?></a>
			</div>
		</div>
	</section>

	<?php every1_cta_band(
		__( 'Talk to someone now — confidential help, 24/7.', 'every1center' ),
		__( 'Insurance verified in minutes. Trusted placement across Upstate NY.', 'every1center' )
	); ?>

</main>

<?php
get_footer();
