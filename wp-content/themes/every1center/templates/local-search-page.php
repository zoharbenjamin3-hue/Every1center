<?php
/** @package Every1Center */

$slug  = get_query_var( 'every1_local_search' );
$pages = every1_local_search_pages();
$page  = isset( $pages[ $slug ] ) ? $pages[ $slug ] : null;

if ( ! $page ) {
	global $wp_query;
	$wp_query->set_404();
	status_header( 404 );
	nocache_headers();
	include get_404_template();
	return;
}

get_header();
?>
<main id="primary" class="site-main local-search-page">
	<section class="hero" aria-labelledby="local-search-heading">
		<div class="container hero__inner">
			<div class="hero__content">
				<p class="eyebrow">Capital Region &amp; Upstate New York</p>
				<h1 id="local-search-heading"><?php echo esc_html( $page['h1'] ); ?></h1>
				<p class="hero__lede"><?php echo esc_html( $page['intro'] ); ?></p>
				<div class="hero__actions">
					<?php every1_phone_link( __( 'Talk Through Options', 'every1center' ), 'btn btn-primary btn-lg' ); ?>
					<a class="btn btn-outline-light btn-lg" href="<?php echo esc_url( home_url( '/intervention-support-upstate-new-york/' ) ); ?>">Intervention Support</a>
				</div>
				<ul class="hero__trust">
					<li><span aria-hidden="true">&check;</span> Detox &amp; withdrawal-care questions</li>
					<li><span aria-hidden="true">&check;</span> Inpatient and outpatient comparisons</li>
					<li><span aria-hidden="true">&check;</span> Family next-step planning</li>
				</ul>
			</div>
			<aside class="hero__card" aria-label="Important disclosure">
				<h2>Independent guidance.</h2>
				<p>Every1 Center does not provide detoxification, inpatient rehab, or medical treatment. Licensed providers determine clinical appropriateness, availability, and admission.</p>
				<a class="btn btn-primary btn-block" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Request a Confidential Call</a>
			</aside>
		</div>
	</section>

	<section class="content-section" aria-labelledby="local-context-heading">
		<div class="container content-section__narrow">
			<p class="eyebrow">A local search, without assumptions</p>
			<h2 id="local-context-heading">Use the search to ask better questions.</h2>
			<p class="section-sub"><?php echo esc_html( $page['context'] ); ?></p>
			<div class="card-grid card-grid--3 local-search-questions">
				<?php foreach ( $page['questions'] as $index => $question ) : ?>
					<article class="service-card">
						<p class="eyebrow">Question <?php echo esc_html( $index + 1 ); ?></p>
						<h3><?php echo esc_html( $question ); ?></h3>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section aria-labelledby="levels-heading">
		<div class="container">
			<header class="section-header">
				<p class="eyebrow">Treatment levels</p>
				<h2 id="levels-heading">Understand the options before you choose a program.</h2>
				<p class="section-sub">The right question is not simply “which rehab is closest?” It is what level of licensed care is appropriate, available, and realistic for the person and family.</p>
			</header>
			<div class="card-grid card-grid--3">
				<a class="service-card" href="<?php echo esc_url( home_url( '/drug-detox-upstate-new-york/' ) ); ?>"><h3>Medical Detox</h3><p>Learn when withdrawal may call for medical evaluation and what to ask a detox provider.</p><span class="card-cta">Explore detox &rarr;</span></a>
				<a class="service-card" href="<?php echo esc_url( home_url( '/inpatient-drug-rehab-upstate-new-york/' ) ); ?>"><h3>Inpatient &amp; Residential Rehab</h3><p>Compare program structure, length of stay, insurance questions, and family involvement.</p><span class="card-cta">Compare inpatient care &rarr;</span></a>
				<a class="service-card" href="<?php echo esc_url( home_url( '/intensive-outpatient-upstate-new-york/' ) ); ?>"><h3>PHP &amp; IOP</h3><p>Understand intensive outpatient options and when a step-down level of care may be considered.</p><span class="card-cta">Explore outpatient care &rarr;</span></a>
			</div>
		</div>
	</section>

	<section class="steps" aria-labelledby="questions-heading">
		<div class="container">
			<header class="section-header section-header--center"><p class="eyebrow">Before you call</p><h2 id="questions-heading">Questions that help families move faster.</h2></header>
			<ol class="steps-list">
				<li><span class="steps-list__num">1</span><h3>Safety first</h3><p>Ask whether there are immediate medical, overdose, withdrawal, or mental-health safety concerns. Call 911 or 988 for an emergency or crisis.</p></li>
				<li><span class="steps-list__num">2</span><h3>Clarify the care need</h3><p>Ask licensed providers about detox, residential, PHP, IOP, medication needs, and any co-occurring mental-health concerns.</p></li>
				<li><span class="steps-list__num">3</span><h3>Confirm the details</h3><p>Verify insurance directly with the provider and plan, understand availability, and ask about travel, family contact, and discharge planning.</p></li>
			</ol>
		</div>
	</section>

	<section class="insurance" aria-labelledby="nearby-heading">
		<div class="container">
			<header class="section-header"><p class="eyebrow">Explore related guidance</p><h2 id="nearby-heading">Drug rehab and detox information for the Capital Region.</h2></header>
			<ul class="location-grid">
				<li><a href="<?php echo esc_url( home_url( '/drug-rehab-albany-ny/' ) ); ?>">Drug Rehab Albany, NY</a></li>
				<li><a href="<?php echo esc_url( home_url( '/drug-rehab-troy-ny/' ) ); ?>">Drug Rehab Troy, NY</a></li>
				<li><a href="<?php echo esc_url( home_url( '/detox-albany-ny/' ) ); ?>">Detox Albany, NY</a></li>
				<li><a href="<?php echo esc_url( home_url( '/inpatient-rehab-albany-ny/' ) ); ?>">Inpatient Rehab Albany, NY</a></li>
				<li><a href="<?php echo esc_url( home_url( '/drug-rehab-upstate-new-york/' ) ); ?>">Drug Rehab Upstate New York</a></li>
				<li><a href="<?php echo esc_url( home_url( '/drug-detox-upstate-new-york/' ) ); ?>">Drug Detox Upstate New York</a></li>
				<li><a href="<?php echo esc_url( home_url( '/inpatient-drug-rehab-upstate-new-york/' ) ); ?>">Inpatient Drug Rehab Upstate NY</a></li>
				<li><a href="<?php echo esc_url( home_url( '/intensive-outpatient-upstate-new-york/' ) ); ?>">Intensive Outpatient Upstate NY</a></li>
				<li><a href="<?php echo esc_url( home_url( '/intervention-support-upstate-new-york/' ) ); ?>">Professional Intervention Support</a></li>
			</ul>
		</div>
	</section>
</main>
<?php get_footer();
