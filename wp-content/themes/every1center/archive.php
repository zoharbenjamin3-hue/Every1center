<?php
/**
 * Archive template (category, tag, taxonomy, date).
 *
 * @package Every1Center
 */

get_header(); ?>

<main id="primary" class="site-main archive-main">
	<div class="container layout-with-sidebar">
		<div class="main-content">
			<header class="page-title-block">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header>

			<?php if ( have_posts() ) : ?>
				<div class="post-grid">
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<a class="post-card__media" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
								<?php the_post_thumbnail( 'every1-card', array( 'loading' => 'lazy' ) ); ?>
							</a>
						<?php endif; ?>
						<div class="post-card__body">
							<div class="post-card__meta"><?php every1_post_categories(); ?></div>
							<h2 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="post-card__excerpt"><?php the_excerpt(); ?></div>
							<a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'every1center' ); ?> &rarr;</a>
						</div>
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
				<p><?php esc_html_e( 'No posts in this archive yet.', 'every1center' ); ?></p>
			<?php endif; ?>
		</div>

		<?php get_sidebar(); ?>
	</div>
</main>

<?php
get_footer();
