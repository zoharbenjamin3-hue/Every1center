<?php
/**
 * Comments template. Comments are closed by default on the imported pages,
 * but this file is required by the WP theme review process.
 *
 * @package Every1Center
 */

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$count = get_comments_number();
			printf(
				_n( '%s comment', '%s comments', $count, 'every1center' ),
				number_format_i18n( $count )
			);
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'avatar_size' => 48,
			) );
			?>
		</ol>

		<?php
		the_comments_navigation( array(
			'prev_text' => __( '&laquo; Older comments', 'every1center' ),
			'next_text' => __( 'Newer comments &raquo;', 'every1center' ),
		) );
		?>
	<?php endif; ?>

	<?php
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'every1center' ); ?></p>
	<?php endif; ?>

	<?php
	comment_form( array(
		'title_reply'        => __( 'Leave a comment', 'every1center' ),
		'class_submit'       => 'btn btn-primary',
		'label_submit'       => __( 'Post comment', 'every1center' ),
		'comment_notes_after' => '',
	) );
	?>
</div>
