#!/usr/bin/env python3
"""
Build self-contained, browser-viewable HTML previews of the Every1 Center theme.

Why this exists: the rebuild ships as a WordPress theme + WXR import. Without a
running WordPress install you can't see it. This script renders the key
templates (homepage, an interior page, a blog post) to standalone .html files
with the real theme CSS inlined, so you can just double-click and view.

Usage:
    python3 preview/build-preview.py

Reads:
    ../wp-content/themes/every1center/assets/css/main.css

Writes:
    preview/index.html          (homepage — front-page.php)
    preview/interior.html       (a /detox/ landing page — page.php)
    preview/blog-post.html      (a single blog post — single.php)

These are previews only. The real site is the WordPress theme; this is just a
faithful static render of the same markup + CSS.
"""

import re
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent
CSS_PATH = ROOT / 'wp-content/themes/every1center/assets/css/main.css'
OUT_DIR = ROOT / 'preview'

FONTS = (
    '<link rel="preconnect" href="https://fonts.googleapis.com">'
    '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>'
    '<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800'
    '&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">'
)

PREVIEW_BANNER = (
    '<div style="background:#0d3156;color:#fff;text-align:center;'
    'padding:.5rem 1rem;font:600 13px/1.4 Inter,sans-serif;">'
    'STATIC PREVIEW &mdash; faithful render of the Every1 Center WordPress theme. '
    'The live site is the theme in <code style="background:rgba(255,255,255,.2);'
    'padding:1px 5px;border-radius:3px;">wp-content/themes/every1center/</code>.'
    '</div>'
)


def header(active=''):
    """Site header + top bar, matching header.php."""
    def cls(name):
        return ' style="background:#eef4fb;color:#0b5cab;"' if name == active else ''
    return f'''
<div class="top-bar">
  <div class="container top-bar__inner">
    <div class="top-bar__left">
      <span class="top-bar__badge">&#9889; 24/7 Confidential Help</span>
      <span class="top-bar__address">8 Shepherd Dr, Troy, NY</span>
    </div>
    <div class="top-bar__right">
      <a class="top-bar__phone" href="tel:+15187140355">&#9742; (518) 714-0355</a>
    </div>
  </div>
</div>
<header class="site-header">
  <div class="container site-header__inner">
    <div class="site-branding">
      <p class="site-title"><a href="index.html">Every1 Center</a></p>
      <p class="site-description">Independent Treatment Navigation &amp; Family Support</p>
    </div>
    <button class="menu-toggle" aria-expanded="false" aria-controls="nav">
      <span class="menu-toggle__bars"><span></span><span></span><span></span></span>
      <span class="screen-reader-text">Menu</span>
    </button>
    <nav class="main-navigation" id="nav" aria-label="Primary">
      <ul class="primary-menu">
        <li><a href="index.html"{cls('home')}>Home</a></li>
        <li><a href="city-albany.html"{cls('detox')}>Treatment Options</a></li>
		<li><a href="city-pages.html">Interventions</a></li>
        <li><a href="#">Family Support</a></li>
        <li><a href="#">Therapy</a></li>
        <li><a href="#">Insurance</a></li>
        <li><a href="city-pages.html">Locations</a></li>
        <li><a href="blog-post.html"{cls('blog')}>Blog</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>
    <div class="site-header__cta">
      <a class="btn btn-primary btn-sm phone-link" href="tel:+15187140355">&#9742; Call (518) 714-0355</a>
    </div>
  </div>
</header>'''


def breadcrumbs(trail):
    items = []
    for i, (label, is_last) in enumerate(trail):
        if is_last:
            items.append(f'<li aria-current="page">{label}</li>')
        else:
            items.append(f'<li><a href="#">{label}</a></li>')
        if not is_last:
            items.append('<span class="bc-sep">&raquo;</span>')
    return f'''
<div class="page-header-strip">
  <div class="container">
    <nav class="breadcrumbs" aria-label="Breadcrumb"><ol>{''.join(items)}</ol></nav>
  </div>
</div>'''


CTA_BAND = '''
<section class="cta-band">
  <div class="container">
    <div class="cta-band__text">
      <h2>Talk to someone now &mdash; confidential help, 24/7.</h2>
      <p>Independent guidance for treatment options, intervention, and family next steps.</p>
    </div>
    <div class="cta-band__actions">
      <a class="btn btn-light phone-link" href="tel:+15187140355">&#9742; Call (518) 714-0355</a>
      <a class="btn btn-outline-light" href="#">Request a Callback</a>
    </div>
  </div>
</section>'''


FOOTER = '''
<footer class="site-footer">
  <div class="container site-footer__top">
    <div class="footer-col footer-col--brand">
      <p class="footer-title"><a href="index.html">Every1 Center</a></p>
      <p class="footer-tagline">Independent addiction-treatment guidance, family support, and education. Confidential, compassionate, 24/7.</p>
      <address class="footer-address">
        8 Shepherd Dr Suite 2<br>Troy, NY 12180<br>
        <a href="tel:+15187140355">(518) 714-0355</a><br>
        <a href="mailto:info@playground.every1center.com">info@playground.every1center.com</a>
      </address>
      <ul class="social-links"><li><a href="#">Instagram</a></li></ul>
    </div>
    <div class="footer-col">
      <h3 class="widget-title">Detox</h3>
      <ul class="footer-links">
        <li><a href="#">Detox Overview</a></li><li><a href="#">Alcohol Detox</a></li>
        <li><a href="#">Opioid Detox</a></li><li><a href="#">Heroin Detox</a></li>
        <li><a href="#">Fentanyl Detox</a></li><li><a href="#">Benzo Detox</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h3 class="widget-title">Programs</h3>
      <ul class="footer-links">
        <li><a href="#">Inpatient Rehab</a></li><li><a href="#">Residential Treatment</a></li>
        <li><a href="#">Partial Hospitalization</a></li><li><a href="#">Intensive Outpatient</a></li>
        <li><a href="#">Outpatient</a></li><li><a href="#">Interventions</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h3 class="widget-title">Company</h3>
      <ul class="footer-links">
        <li><a href="#">About Us</a></li><li><a href="#">Our Team</a></li>
        <li><a href="#">Insurance</a></li><li><a href="#">Resources</a></li>
        <li><a href="#">Blog</a></li><li><a href="#">Contact</a></li>
      </ul>
    </div>
  </div>
  <div class="site-footer__bottom">
    <div class="container">
      <p class="copyright">&copy; 2026 Every1 Center. All rights reserved.</p>
      <nav class="footer-nav" aria-label="Footer">
        <ul class="footer-menu">
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms of Service</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
      <p class="legal-fine-print">If you or someone you know is in crisis, call 988 (Suicide &amp; Crisis Lifeline) or 911 immediately. Every1 Center provides educational information and referral support; we do not provide medical advice or emergency services.</p>
    </div>
  </div>
</footer>
<a class="floating-call" href="tel:+15187140355"><span>&#9742;</span><span class="floating-call__text">Call 24/7</span></a>'''


HOME_MAIN = '''
<main class="site-main home-main">
  <section class="hero">
    <div class="container hero__inner">
      <div class="hero__content">
        <p class="eyebrow">24/7 Confidential Help &mdash; Upstate NY</p>
        <h1>Drug Rehab, Detox &amp; Inpatient Treatment Guidance in Troy, NY</h1>
        <p class="hero__lede">Confidential help for individuals and families comparing detox, inpatient drug rehab, residential treatment, PHP, IOP, and recovery support. Every1 Center helps you understand choices and connect directly with appropriate licensed providers.</p>
        <div class="hero__actions">
          <a class="btn btn-primary btn-lg phone-link" href="tel:+15187140355">&#9742; Call (518) 714-0355</a>
          <a class="btn btn-outline-light btn-lg" href="#">Request a Callback</a>
        </div>
        <ul class="hero__trust">
          <li><span>&check;</span> Insurance verified in minutes</li>
          <li><span>&check;</span> Dual-diagnosis pathways</li>
          <li><span>&check;</span> Same-day next-step support</li>
        </ul>
      </div>
      <aside class="hero__card">
        <h2>Talk through your options.</h2>
        <p>Confidential guidance for you or your family. No obligation.</p>
        <dl class="hero__card-meta">
          <dt>Phone</dt><dd><a href="tel:+15187140355">(518) 714-0355</a></dd>
          <dt>Hours</dt><dd>Open 24/7</dd>
          <dt>What we do</dt><dd>Guidance, intervention &amp; placement support</dd>
        </dl>
        <a class="btn btn-primary btn-block" href="#">Get Confidential Guidance</a>
      </aside>
    </div>
  </section>

  <section class="trust-bar">
    <div class="container trust-bar__grid">
      <div class="trust-bar__item"><strong>Alcohol</strong></div>
      <div class="trust-bar__item"><strong>Opioids &amp; Fentanyl</strong></div>
      <div class="trust-bar__item"><strong>Benzodiazepines</strong></div>
      <div class="trust-bar__item"><strong>Cocaine &amp; Stimulants</strong></div>
      <div class="trust-bar__item"><strong>Methamphetamine</strong></div>
      <div class="trust-bar__item"><strong>Dual Diagnosis</strong></div>
    </div>
  </section>

  <section class="services">
    <div class="container">
      <header class="section-header">
        <p class="eyebrow">How we help</p>
        <h2>A clear path from crisis to recovery.</h2>
        <p class="section-sub">We make the process easier to understand: what each level of care means, what questions to ask, and how to plan a safe next step with a licensed provider. Every1 Center does not provide medical treatment.</p>
      </header>
      <div class="card-grid card-grid--3">
        <a class="service-card" href="interior.html"><h3>Medical Detox Options</h3><p>Understand when medically supervised withdrawal care may be appropriate and what to ask a provider.</p><span class="card-cta">Explore detox options &rarr;</span></a>
        <a class="service-card" href="#"><h3>Inpatient Drug Rehab</h3><p>Compare residential programs, questions for admissions teams, and factors that may affect fit.</p><span class="card-cta">Compare options &rarr;</span></a>
        <a class="service-card" href="#"><h3>PHP &amp; IOP</h3><p>Learn how partial hospitalization and intensive outpatient care differ from residential care.</p><span class="card-cta">Compare PHP/IOP &rarr;</span></a>
        <a class="service-card" href="#"><h3>Professional Interventions</h3><p>Structured support for families preparing for a difficult conversation about getting help.</p><span class="card-cta">Learn more &rarr;</span></a>
        <a class="service-card" href="#"><h3>Therapy &amp; Counseling</h3><p>Explore common therapy approaches and questions to discuss with a licensed clinician.</p><span class="card-cta">See therapies &rarr;</span></a>
        <a class="service-card" href="#"><h3>Sober Transport</h3><p>Learn what sober transport can involve and how to evaluate a provider for a safe transition.</p><span class="card-cta">Arrange transport &rarr;</span></a>
      </div>
    </div>
  </section>

  <section class="steps">
    <div class="container">
      <header class="section-header section-header--center">
        <p class="eyebrow">How it works</p>
        <h2>Three steps to start today.</h2>
      </header>
      <ol class="steps-list">
        <li><span class="steps-list__num">1</span><h3>Call or request a callback</h3><p>Speak privately with a navigator about what is happening and what support may be useful.</p></li>
        <li><span class="steps-list__num">2</span><h3>Review options</h3><p>Review levels of care, insurance questions, location, and any immediate safety considerations.</p></li>
        <li><span class="steps-list__num">3</span><h3>Plan the next step</h3><p>When a provider is selected, we help you prepare the questions and logistics for connecting directly.</p></li>
      </ol>
    </div>
  </section>

  <section class="insurance">
    <div class="container">
      <header class="section-header">
        <p class="eyebrow">Insurance verified</p>
        <h2>Understand insurance questions before contacting a provider.</h2>
        <p class="section-sub">Coverage depends on the plan and provider. Use these guides to prepare for a benefits conversation.</p>
      </header>
      <ul class="insurance-grid">
        <li><a href="#">Aetna</a></li><li><a href="#">Cigna</a></li>
        <li><a href="#">UnitedHealthcare</a></li><li><a href="#">BCBS</a></li>
        <li><a href="#">Empire Plan</a></li><li><a href="#">NYSHIP</a></li>
        <li><a href="#">GEHA</a></li><li><a href="#" class="all-link">See all plans &rarr;</a></li>
      </ul>
    </div>
  </section>

  <section class="locations">
    <div class="container">
      <header class="section-header">
        <p class="eyebrow">Areas we serve</p>
        <h2>Upstate NY, the Capital Region, and beyond.</h2>
      </header>
      <ul class="location-grid">
        <li><a href="city-troy.html">Troy, NY</a></li><li><a href="city-albany.html">Albany, NY</a></li>
        <li><a href="city-saratoga-springs.html">Saratoga Springs, NY</a></li><li><a href="city-clifton-park.html">Clifton Park, NY</a></li>
        <li><a href="city-latham.html">Latham, NY</a></li><li><a href="city-schenectady.html">Schenectady, NY</a></li>
        <li><a href="city-pages.html" class="all-link">View city pages &rarr;</a></li>
      </ul>
    </div>
  </section>

  <section class="blog-teaser">
    <div class="container">
      <header class="section-header">
        <p class="eyebrow">Education &amp; resources</p>
        <h2>Latest from the Every1 Center blog.</h2>
      </header>
      <div class="post-grid">
        <article class="post-card"><div class="post-card__body"><h3 class="post-card__title"><a href="blog-post.html">How Long Does Fentanyl Stay in Your System?</a></h3><div class="post-card__excerpt">See fentanyl detection times for urine, blood, saliva, and hair, plus factors that affect results and why testing matters.</div><a class="read-more" href="blog-post.html">Read more &rarr;</a></div></article>
        <article class="post-card"><div class="post-card__body"><h3 class="post-card__title"><a href="blog-post.html">What Are the Signs of Opioid Addiction?</a></h3><div class="post-card__excerpt">Spot opioid addiction early: physical, behavioral, and psychological signs, withdrawal symptoms, and when to seek urgent help.</div><a class="read-more" href="blog-post.html">Read more &rarr;</a></div></article>
        <article class="post-card"><div class="post-card__body"><h3 class="post-card__title"><a href="blog-post.html">Is Alcohol Detox Dangerous Without Medical Supervision?</a></h3><div class="post-card__excerpt">Yes &mdash; unsupervised alcohol detox can be fatal. Learn timelines, seizure and DT risks, and how medical detox keeps you safe.</div><a class="read-more" href="blog-post.html">Read more &rarr;</a></div></article>
      </div>
      <div class="text-center"><a class="btn btn-outline" href="blog-post.html">Visit the blog</a></div>
    </div>
  </section>
''' + CTA_BAND + '''
</main>'''


INTERIOR_MAIN = '''
<main class="site-main page-main">
  <article class="entry entry-page">
    <header class="entry-header container">
      <h1 class="entry-title">Alcohol Detox &amp; Recovery Support in 2025: Get Help Now</h1>
      <p class="entry-lede">Alcohol detox help is available now. Get support and find the right treatment or drug rehab near Upstate, NY. Call today for assistance.</p>
    </header>
    <div class="entry-content container">
      <p class="entry-intro">Alcohol detox help is available now. Get support and find the right treatment or drug rehab near Upstate, NY. Call today for assistance.</p>
      <h2>About Alcohol Detox</h2>
      <p>Every1 Center provides confidential, 24/7 support to individuals and families navigating addiction. Whether you are researching alcohol detox for yourself or a loved one, an intake coordinator can help you understand options, verify insurance benefits in minutes, and coordinate safe placement across Upstate New York.</p>
      <h3>Topics covered</h3>
      <ul>
        <li>Alcohol withdrawal symptoms and timeline</li>
        <li>Medical detox vs. tapering at home</li>
        <li>Seizure and delirium tremens (DT) risk</li>
        <li>Inpatient alcohol detox near you</li>
        <li>Insurance and Medicaid coverage</li>
      </ul>
      <h2>How Every1 Center can help</h2>
      <ul>
        <li>Confidential phone assessment with a trained coordinator</li>
        <li>Insurance benefit verification in minutes</li>
        <li>Placement at vetted detox, inpatient, and outpatient partners</li>
        <li>Sober transport and family handoff coordination</li>
        <li>Dual-diagnosis and medication-assisted treatment (MAT) pathways</li>
      </ul>
      <blockquote>Unsupervised alcohol withdrawal can be life-threatening. Medical detox provides 24/7 monitoring so withdrawal is managed safely.</blockquote>
      <h2>Talk to someone today</h2>
      <p>Call <a href="tel:+15187140355"><strong>(518) 714-0355</strong></a> for 24/7 confidential help, or <a href="#">request a callback</a> when it is convenient.</p>
      <p class="editor-note"><em>Note: This is a placeholder page generated during the site rebuild (slug: <code>alcohol</code>). Replace this body with the full editorial copy.</em></p>
    </div>
  </article>
</main>'''


BLOG_MAIN = '''
<main class="site-main single-main">
  <div class="container layout-with-sidebar">
    <div class="main-content">
      <article class="entry entry-single">
        <header class="entry-header">
          <span class="cat-links"><a href="#">Education</a></span>
          <h1 class="entry-title">How Long Does Fentanyl Stay in Your System by Test?</h1>
          <div class="entry-meta">
            <span class="posted-on">Posted on <time>May 15, 2026</time></span>
            <span class="meta-sep">&middot;</span>
            <span class="byline">by <span class="author">Every1 Center</span></span>
          </div>
        </header>
        <div class="entry-content">
          <p class="entry-intro">See fentanyl detection times for urine, blood, saliva, and hair, plus factors that affect results and why testing matters. Find treatment and 24/7 help in NY.</p>
          <h2>About Fentanyl Detection Times</h2>
          <p>Every1 Center provides confidential, 24/7 support to individuals and families navigating addiction. Whether you are researching fentanyl detection times for yourself or a loved one, an intake coordinator can help you understand options, verify insurance benefits in minutes, and coordinate safe placement across Upstate New York.</p>
          <h3>Topics covered</h3>
          <ul>
            <li>How long does fentanyl stay in urine</li>
            <li>Fentanyl blood test detection</li>
            <li>Fentanyl saliva test detection time</li>
            <li>Fentanyl hair test 90 days</li>
            <li>Factors affecting fentanyl detection</li>
          </ul>
          <h2>How Every1 Center can help</h2>
          <ul>
            <li>Confidential phone assessment with a trained coordinator</li>
            <li>Insurance benefit verification in minutes</li>
            <li>Placement at vetted detox, inpatient, and outpatient partners</li>
          </ul>
          <h2>Talk to someone today</h2>
          <p>Call <a href="tel:+15187140355"><strong>(518) 714-0355</strong></a> for 24/7 confidential help.</p>
        </div>
      </article>
    </div>
    <aside class="widget-area sidebar-default">
      <section class="widget widget-help">
        <h2 class="widget-title">Need help right now?</h2>
        <p>Speak to an intake coordinator confidentially, 24/7.</p>
        <a class="btn btn-primary btn-block phone-link" href="tel:+15187140355">&#9742; Call (518) 714-0355</a>
        <a class="btn btn-outline btn-block" href="#">Request a Callback</a>
      </section>
      <section class="widget widget-quick-links">
        <h2 class="widget-title">Popular Topics</h2>
        <ul>
          <li><a href="#">Alcohol Detox</a></li><li><a href="#">Fentanyl Detox</a></li>
          <li><a href="#">Benzo Detox</a></li><li><a href="#">Inpatient Rehab</a></li>
          <li><a href="#">Insurance Coverage</a></li><li><a href="#">Interventions</a></li>
        </ul>
      </section>
    </aside>
  </div>
</main>'''


# These are rendered counterparts of the completed WordPress city-page routes.
# They make the city-page design reviewable without running WordPress locally.
CITY_PAGES = [
    {
        'file': 'city-albany.html',
        'label': 'Albany, NY',
        'title': 'Drug Rehab Albany NY | Detox & Inpatient Treatment Guidance',
        'h1': 'Drug Rehab, Detox & Inpatient Treatment Guidance in Albany, NY',
        'intro': 'When you are looking for drug rehab in Albany, the first decision is often what level of care may fit the situation. Every1 Center helps individuals and families understand detox, inpatient rehab, residential treatment, PHP, IOP, and recovery-support options before connecting directly with licensed providers.',
        'context': 'Albany is a practical starting point for many Capital Region families, but the best next step may be in Albany, Troy, Saratoga, the Hudson Valley, or elsewhere in New York. Availability, insurance, transportation, and the provider’s clinical assessment all matter.',
    },
    {
        'file': 'city-troy.html',
        'label': 'Troy, NY',
        'title': 'Drug Rehab Troy NY | Detox & Inpatient Treatment Guidance',
        'h1': 'Drug Rehab & Detox Options in Troy, NY',
        'intro': 'Every1 Center provides confidential guidance for people in Troy comparing drug rehab, detox, inpatient treatment, outpatient programs, and family intervention support. We do not operate a treatment facility or provide medical care; we help you prepare for an informed conversation with licensed providers.',
        'context': 'For families in Troy, nearby care can include options across the wider Capital Region. A thoughtful search weighs the provider’s assessment, the level of care, travel needs, and family involvement—not distance alone.',
    },
    {
        'file': 'city-schenectady.html',
        'label': 'Schenectady, NY',
        'title': 'Drug Rehab Schenectady NY | Detox & Inpatient Options',
        'h1': 'Drug Rehab, Detox & Inpatient Options for Schenectady, NY',
        'intro': 'When someone in Schenectady needs help for alcohol or drug use, the search can quickly become overwhelming. Every1 Center helps individuals and families understand detox, inpatient rehab, residential treatment, PHP, IOP, intervention, and recovery-support options before they speak directly with licensed providers.',
        'context': 'Families in Schenectady may compare options across the Capital Region and wider Upstate New York. A good decision weighs immediate safety, the level of care a provider recommends, insurance, transportation, and whether the program can meet the person’s needs—not just the first listing in a search result.',
    },
    {
        'file': 'city-clifton-park.html',
        'label': 'Clifton Park, NY',
        'title': 'Drug Rehab Clifton Park NY | Detox & Treatment Guidance',
        'h1': 'Drug Rehab & Detox Options for Clifton Park, NY',
        'intro': 'Every1 Center provides independent guidance for Clifton Park families comparing drug rehab, medical detox, inpatient treatment, outpatient programs, and intervention support. We do not operate a treatment facility or make clinical decisions; we help you prepare for informed conversations with licensed providers.',
        'context': 'A Clifton Park search can include providers throughout the Capital Region and Upstate New York. The appropriate next step depends on the provider’s assessment, availability, practical travel needs, insurance, and the level of support the individual can safely use.',
    },
    {
        'file': 'city-saratoga-springs.html',
        'label': 'Saratoga Springs, NY',
        'title': 'Drug Rehab Saratoga Springs NY | Detox & Inpatient Options',
        'h1': 'Drug Rehab, Detox & Inpatient Options for Saratoga Springs, NY',
        'intro': 'Families searching for drug rehab in Saratoga Springs may be comparing detox, residential treatment, inpatient rehab, PHP, IOP, and recovery support. Every1 Center helps organize the questions so you can connect directly with licensed providers and make an informed next decision.',
        'context': 'The search does not need to stop at one city boundary. Families often balance proximity with a provider’s clinical assessment, availability, insurance participation, schedule, family involvement, and discharge-planning process.',
    },
    {
        'file': 'city-latham.html',
        'label': 'Latham, NY',
        'title': 'Drug Rehab Latham NY | Detox & Treatment Options',
        'h1': 'Drug Rehab & Detox Treatment Options for Latham, NY',
        'intro': 'Every1 Center helps people in Latham and the Capital Region understand the differences between detox, inpatient drug rehab, residential programs, PHP, IOP, intervention support, and recovery planning. Clinical services and admission decisions are made by licensed providers.',
        'context': 'A useful treatment search starts with the situation in front of the person and family. Immediate safety, withdrawal concerns, co-occurring needs, practical travel, insurance, and the provider’s own assessment can all affect the appropriate conversation to have next.',
    },
]


def city_page_body(item):
    links = ''.join(
        f'<li><a href="{city["file"]}">{city["label"]}</a></li>'
        for city in CITY_PAGES if city['file'] != item['file']
    )
    return f'''
{breadcrumbs([('Home', False), ('Treatment Navigation', False), (item['label'], True)])}
<main class="site-main local-search-page">
  <section class="hero" aria-labelledby="city-heading">
    <div class="container hero__inner">
      <div class="hero__content">
        <p class="eyebrow">Capital Region &amp; Upstate New York</p>
        <h1 id="city-heading">{item['h1']}</h1>
        <p class="hero__lede">{item['intro']}</p>
        <div class="hero__actions">
          <a class="btn btn-primary btn-lg phone-link" href="tel:+15187140355">&#9742; Talk Through Options</a>
          <a class="btn btn-outline-light btn-lg" href="#family-questions">Family Questions</a>
        </div>
        <ul class="hero__trust">
          <li><span>&check;</span> Detox and withdrawal-care questions</li>
          <li><span>&check;</span> Inpatient and outpatient comparisons</li>
          <li><span>&check;</span> Family next-step planning</li>
        </ul>
      </div>
      <aside class="hero__card" aria-label="Important disclosure">
        <h2>Independent guidance.</h2>
        <p>Every1 Center does not provide detoxification, inpatient rehab, or medical treatment. Licensed providers determine clinical appropriateness, availability, and admission.</p>
        <a class="btn btn-primary btn-block" href="tel:+15187140355">Request a Confidential Call</a>
      </aside>
    </div>
  </section>

  <section aria-labelledby="local-search-heading">
    <div class="container content-section__narrow">
      <header class="section-header">
        <p class="eyebrow">A local search, without assumptions</p>
        <h2 id="local-search-heading">Use the search to ask better questions.</h2>
        <p class="section-sub">{item['context']}</p>
      </header>
      <div class="card-grid card-grid--3">
        <article class="service-card"><p class="eyebrow">Step 1</p><h3>Start with safety.</h3><p>If there is an immediate medical, overdose, withdrawal, or mental-health emergency, call 911 or 988. A website is not emergency care.</p></article>
        <article class="service-card"><p class="eyebrow">Step 2</p><h3>Compare the right questions.</h3><p>Ask licensed providers how they assess needs, what care they offer, and how they handle insurance, family contact, and transitions.</p></article>
        <article class="service-card"><p class="eyebrow">Step 3</p><h3>Confirm the details.</h3><p>Verify availability, transportation, coverage, medication policies, and next-step planning directly with the provider and insurance plan.</p></article>
      </div>
    </div>
  </section>

  <section class="steps" aria-labelledby="levels-heading">
    <div class="container">
      <header class="section-header section-header--center">
        <p class="eyebrow">Treatment levels</p>
        <h2 id="levels-heading">Understand the options before choosing a program.</h2>
      </header>
      <ol class="steps-list">
        <li><span class="steps-list__num">1</span><h3>Medical detox</h3><p>For withdrawal concerns, a licensed provider can explain its medical evaluation process and whether it can safely assess the situation.</p></li>
        <li><span class="steps-list__num">2</span><h3>Inpatient or residential care</h3><p>Compare structure, clinical services, length of stay, family communication, and planning for the next stage of care.</p></li>
        <li><span class="steps-list__num">3</span><h3>PHP, IOP, or outpatient care</h3><p>Ask how programming fits with housing, work, school, transportation, and ongoing support needs.</p></li>
      </ol>
    </div>
  </section>

  <section id="family-questions" aria-labelledby="faq-heading">
    <div class="container content-section__narrow">
      <header class="section-header"><p class="eyebrow">Answers for families</p><h2 id="faq-heading">Common questions about finding help.</h2></header>
      <div class="faq-list">
        <details class="faq-item"><summary>Does Every1 Center operate a detox or inpatient rehab program?</summary><p>No. Every1 Center is an independent treatment-navigation and family-support resource. Licensed providers deliver clinical services and make their own assessment and admission decisions.</p></details>
        <details class="faq-item"><summary>Do we need to know the right level of care before calling?</summary><p>No. It is reasonable to start with immediate safety concerns, the family’s questions, and practical factors. A licensed provider can explain what it offers and whether it can evaluate the situation.</p></details>
        <details class="faq-item"><summary>How should we compare options near {item['label']}?</summary><p>Compare assessment process, availability, insurance, travel, family communication, medication policies, and transition planning. Proximity alone should not decide the outcome.</p></details>
      </div>
    </div>
  </section>

  <section class="insurance" aria-labelledby="nearby-heading">
    <div class="container">
      <header class="section-header"><p class="eyebrow">Explore city guidance</p><h2 id="nearby-heading">Capital Region drug rehab and detox information.</h2></header>
      <ul class="location-grid">{links}<li><a href="city-pages.html" class="all-link">View city pages &rarr;</a></li></ul>
    </div>
  </section>
  {CTA_BAND}
</main>'''


def city_hub_body():
    cards = ''.join(
        f'<a class="service-card" href="{item["file"]}"><h3>Drug Rehab {item["label"]}</h3><p>Full city guidance: detox, inpatient treatment, outpatient options, family questions, and clear disclosure.</p><span class="card-cta">View completed page &rarr;</span></a>'
        for item in CITY_PAGES
    )
    return f'''
<main class="site-main">
  <section class="hero"><div class="container hero__inner"><div class="hero__content"><p class="eyebrow">Capital Region &amp; Upstate NY</p><h1>Drug Rehab and Detox Guidance by City</h1><p class="hero__lede">Explore complete, family-first city pages for Albany, Troy, Schenectady, Clifton Park, Saratoga Springs, and Latham. Every1 Center provides independent guidance, not medical treatment.</p></div><aside class="hero__card"><h2>Choose a city.</h2><p>Each page uses the same complete decision framework—no bare location routes.</p><a class="btn btn-primary btn-block" href="city-albany.html">Start with Albany</a></aside></div></section>
  <section><div class="container"><header class="section-header"><p class="eyebrow">Completed city pages</p><h2>Built for the questions a family actually has.</h2></header><div class="card-grid card-grid--3">{cards}</div></div></section>
</main>'''


def page(title, css, body, active=''):
    return f'''<!doctype html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{title}</title>
{FONTS}
<style>
{css}
</style>
</head>
<body>
{PREVIEW_BANNER}
{header(active)}
{body}
{FOOTER}
</body>
</html>'''


def main():
    css = CSS_PATH.read_text(encoding='utf-8')

    home_body = HOME_MAIN
    interior_body = breadcrumbs([('Home', False), ('Detox', False), ('Alcohol Detox', True)]) + INTERIOR_MAIN + CTA_BAND
    blog_body = breadcrumbs([('Home', False), ('Education', False), ('How Long Does Fentanyl Stay in Your System', True)]) + BLOG_MAIN + CTA_BAND

    (OUT_DIR / 'index.html').write_text(
        page('Drug Rehab, Detox & Inpatient Treatment Guidance | Every1 Center Troy NY', css, home_body, 'home'),
        encoding='utf-8')
    (OUT_DIR / 'interior.html').write_text(
        page('Alcohol Detox & Recovery Support — Every1 Center', css, interior_body, 'detox'),
        encoding='utf-8')
    (OUT_DIR / 'blog-post.html').write_text(
        page('How Long Does Fentanyl Stay in Your System — Every1 Center', css, blog_body, 'blog'),
        encoding='utf-8')

    (OUT_DIR / 'city-pages.html').write_text(
        page('Drug Rehab and Detox Guidance by City | Every1 Center', css, city_hub_body()),
        encoding='utf-8')
    for city in CITY_PAGES:
        (OUT_DIR / city['file']).write_text(
            page(city['title'], css, city_page_body(city), 'detox'),
            encoding='utf-8')

    print('Wrote homepage, interior, blog, city hub, and city-page previews')


if __name__ == '__main__':
    main()
