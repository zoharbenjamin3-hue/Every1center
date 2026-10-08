<?php
/**
 * Default page template.
 *
 * @package Every1Center
 */

get_header(); ?>

<main id="primary" class="site-main page-main">
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry-page' ); ?>>
			<header class="entry-header container">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php
				$rm_desc = get_post_meta( get_the_ID(), 'rank_math_description', true );
				if ( $rm_desc ) : ?>
					<p class="entry-lede"><?php echo esc_html( $rm_desc ); ?></p>
				<?php elseif ( has_excerpt() ) : ?>
					<p class="entry-lede"><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="entry-featured container">
					<?php the_post_thumbnail( 'every1-hero', array( 'loading' => 'eager' ) ); ?>
				</div>
			<?php endif; ?>

			<div class="entry-content container">
				<?php
				the_content();
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'every1center' ),
					'after'  => '</div>',
				) );
				?>
			</div>

			<footer class="entry-footer container">
				<?php every1_entry_footer(); ?>
			</footer>
		</article>
	<?php endwhile; ?>
</main>

<?php
get_footer();
