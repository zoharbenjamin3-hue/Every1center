<?php
/**
 * Search results template.
 *
 * @package Every1Center
 */

get_header(); ?>

<main id="primary" class="site-main search-main">
	<div class="container layout-with-sidebar">
		<div class="main-content">
			<header class="page-title-block">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Results for: %s', 'every1center' ), '<span>' . esc_html( get_search_query() ) . '</span>' );
					?>
				</h1>
				<?php get_search_form(); ?>
			</header>

			<?php if ( have_posts() ) : ?>
				<div class="post-list">
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'search-result' ); ?>>
						<h2 class="search-result__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p class="search-result__url"><?php the_permalink(); ?></p>
						<div class="search-result__excerpt"><?php the_excerpt(); ?></div>
					</article>
				<?php endwhile; ?>
				</div>

				<?php
				the_posts_pagination( array(
					'prev_text' => __( '&laquo; Newer', 'every1center' ),
					'next_text' => __( 'Older &raquo;', 'every1center' ),
				) );
				?>
			<?php else : ?>
				<p><?php esc_html_e( 'Sorry, nothing matched your search. Try different keywords or call us at (518) 714-0355.', 'every1center' ); ?></p>
			<?php endif; ?>
		</div>

		<?php get_sidebar(); ?>
	</div>
</main>

<?php
get_footer();
