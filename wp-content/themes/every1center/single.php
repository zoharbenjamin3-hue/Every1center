<?php
/**
 * Single post template.
 *
 * @package Every1Center
 */

get_header(); ?>

<main id="primary" class="site-main single-main">
	<div class="container layout-with-sidebar">
		<div class="main-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry-single' ); ?>>
					<header class="entry-header">
						<?php every1_post_categories(); ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="entry-meta">
							<?php every1_posted_on(); ?>
							<span class="meta-sep" aria-hidden="true">&middot;</span>
							<?php every1_posted_by(); ?>
						</div>
					</header>

					<?php if ( has_post_thumbnail() ) : ?>
						<div class="entry-featured">
							<?php the_post_thumbnail( 'every1-hero', array( 'loading' => 'eager' ) ); ?>
						</div>
					<?php endif; ?>

					<div class="entry-content">
						<?php
						the_content();
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'every1center' ),
							'after'  => '</div>',
						) );
						?>
					</div>

					<footer class="entry-footer">
						<?php every1_entry_footer(); ?>
					</footer>
				</article>

				<nav class="post-pagination" aria-label="<?php esc_attr_e( 'Post navigation', 'every1center' ); ?>">
					<?php
					the_post_navigation( array(
						'prev_text' => '<span class="nav-direction">' . esc_html__( '&larr; Previous', 'every1center' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-direction">' . esc_html__( 'Next &rarr;', 'every1center' ) . '</span> <span class="nav-title">%title</span>',
					) );
					?>
				</nav>

				<?php
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>
			<?php endwhile; ?>
		</div>

		<?php get_sidebar(); ?>
	</div>
</main>

<?php
get_footer();
